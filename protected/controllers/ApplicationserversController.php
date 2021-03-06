<?php

class ApplicationserversController extends Controller
{
    public function filters()
    {
        return array(
            'accessControl',
            'postOnly + update, create, delete',
            'ajaxOnly + update, create, delete',
        );
    }

    public function accessRules()
    {
        return array(
            array(
                'allow',
                'actions'=>array('list','update','create','delete'),
                'users'=>array('@'),
            ),
            array(
                'deny',
                'users'=>array('*'),
            ),
        );
    }

    public function actionList()
    {
        if (!isset($_GET['YII_CSRF_TOKEN']))
            throw new CHttpException(400, 'Bad Request');
        else if ($_GET['YII_CSRF_TOKEN'] !=  Yii::app()->request->csrfToken)
            throw new CHttpException(400, 'Bad Request');

        $limit = Yii::app()->params['app_servers_per_page'];
        $page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
        $offset = ($page-1)*$limit;
        $filter = array();

        if (isset($_GET['application_id']) && !empty($_GET['application_id']))
            $filter['application_id'] = (string) $_GET['application_id'];

        $app_servers = $this->get_data($filter, $limit, $offset);

        $return_data = array(
            'page'=>$page,
            'totalPage'=> ($app_servers['total_count'] == 0) ? 1 : ceil($app_servers['total_count']/$limit),
            'totalData'=>$app_servers['total_count'],
            'limit'=>$limit,
            'resultData'=>$app_servers['data'],
        );

        echo CJSON::encode($return_data);
    }
    
    private function get_data($filter='', $limit=5, $offset=0)
    {
        $criteria = new CDbCriteria;

        if(is_array($filter))
        {
            if(isset($filter['application_id']))
                $criteria->compare('application_id', $filter['application_id']);
        }
        $count = ApplicationServers::model()->count($criteria);
        
        $criteria->limit = $limit;
        $criteria->offset = $offset;
        $criteria->join = "JOIN servers s ON s.server_id=t.server_id";
        $criteria->order = 's.server_type, s.name';

        $model = ApplicationServers::model()->findAll($criteria);
        $data  = array();

        //XSS Purifier here
        // $p = new CHtmlPurifier();
        // $p->options = array('URI.AllowedSchemes'=>array(
        //     'http' => true,
        //     'https' => true,
        // ));

        foreach($model as $row)
        {
            $app_server = array(
                'application_id'    => $row->application_id,
                'server_id'         => $row->server_id,
                'application_path'  => str_replace('<', '&lt', $row->application_path),
                'application_log'   => str_replace('<', '&lt', $row->application_log),
                'date_created'      => $row->date_created,
                'date_updated'      => $row->date_updated,
                'created_by'        => $row->created_by,
                'updated_by'        => $row->updated_by,

                'server_type'       => $row->server->server_type,
                'name'              => $row->server->name,
                'private_ip'        => $row->server->private_ip,
                'public_ip'         => $row->server->public_ip,
                'hostname'          => $row->server->hostname,
                'network'           => $row->server->network,
            );

            $data[] = $app_server;
        }

        return array(
            'data'=>$data,
            'data_count'=>count($data),
            'total_count'=>$count,          
        );
    }

    public function actionCreate()
    {
        $data = $_POST;

        // clean input here
        $data['application_id']    = trim($data['application_id']);
        $data['server_id']         = trim($data['server_id']);
        $data['application_path']  = trim($data['application_path']);
        $data['application_log']   = trim($data['application_log']);

        if (!empty($data)) {
            //FORM VALIDATION HERE
            $errors = array();

            // server is required
            if (strlen($data['server_id']) == 0) {
                array_push($errors, 'SERVER_ERROR: Please choose a server');
            // server chosen does not exist
            } else if (!Servers::model()->exists('server_id=:server_id', array(':server_id'=>$data['server_id']))) {
                array_push($errors, 'SERVER_ERROR: Server does not exist');
            // server is taken
            } else if (ApplicationServers::model()->findByPk(array(
                'server_id'=>$data['server_id'],'application_id'=>$data['application_id'])) != null) {
                array_push($errors, 'SERVER_ERROR: The application is already in this server');
            // check if application is already in a server of the same type
            } else if ($data['check_duplicate'] == 'true') {
                $duplicate_type = Servers::model()->findAll(array(
                    'join' => 'JOIN application_servers a ON t.server_id = a.server_id',
                    'condition' => 'a.application_id=:application_id AND t.server_type=:server_type',
                    'params' => array(
                        'application_id' => $data['application_id'],
                        'server_type' => $data['server_type'],
                    ),
                ));
                if (count($duplicate_type) != 0) {
                    array_push($errors, 'DUPLICATE_ERROR: The application is already in a server of the same type.');
                }
            }

            //data is good
            if (count($errors) == 0) {
                $app_server = new ApplicationServers;
                $app_server->application_id = $data['application_id'];
                $app_server->server_id = $data['server_id'];
                $app_server->application_path = $data['application_path'];
                $app_server->application_log = $data['application_log'];
                $app_server->date_created = date("Y-m-d H:i:s");
                $app_server->date_updated = '0000-00-00 00:00:00';
                $app_server->created_by = Yii::app()->user->name;
                $app_server->save();

                echo CJSON::encode(array(
                    'type' => 'success',
                    'data' => '',
                ));
            } else {
                echo CJSON::encode(array(
                    'type' => 'error',
                    'data' => implode(',', $errors),
                ));
            }
        } else {
            echo CJSON::encode(array(
                'type' => 'error',
                'data' => 'CSRF_ERROR: CSRF Token did not match',
            ));
        }
    }

    public function actionUpdate()
    {
        $data = $_POST;

        //will be empty if CSRF authentication fails
        if (!empty($data)) {
            $updates = array(
                'application_path' => str_replace('<', '&lt', trim($data['application_path'])),
                'application_log'  => str_replace('<', '&lt', trim($data['application_log'])),
                'date_updated'     => date("Y-m-d H:i:s"),
                'updated_by'       => Yii::app()->user->name,
            );

            ApplicationServers::model()->updateByPk(array(
                'application_id' => (int) $data['application_id'],
                'server_id' => (int) $data['server_id'],
            ), $updates);

            echo CJSON::encode(array(
                'type' => 'success',
                'data' => $updates,
            ));
        } else {
            echo CJSON::encode(array(
                'type' => 'error',
                'data' => 'CSRF_ERROR: CSRF Token did not match',
            ));
        }
    }

    public function actionDelete()
    {
        $data = $_POST;

        if (!empty($data)) {
            ApplicationServers::model()->deleteByPk(array(
                'application_id' => (int) $data['application_id'],
                'server_id' => (int) $data['server_id'],
            ));

            echo CJSON::encode(array(
                'type' => 'success',
                'data' => '',
            ));

        } else {
            echo CJSON::encode(array(
                'type' => 'error',
                'data' => 'CSRF_ERROR: CSRF Token did not match',
            ));
        }
    }
}