<?php

class ProjectsController extends Controller
{
    public $extraJS;
    public $modals;
    
    public function actionIndex()
    {
        $this->modals = 'projects-modal';
        $this->extraJS = '<script src="' . Yii::app()->request->baseUrl . '/js/projects.js"></script>';
        $this->render('projects');
    }

    public function actionList()
    {
        $limit = Yii::app()->params['projects_per_page'];
        $page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
        $offset = ($page-1)*$limit;
        $filter = array();
        
        if (isset($_GET['name']) && !empty($_GET['name']))
                $filter['name'] = (string) $_GET['name'];

        if (isset($_GET['code']) && !empty($_GET['code']))
            $filter['code'] = (string) $_GET['code'];

        if (isset($_GET['status']) && !empty($_GET['status']))
            $filter['status'] = (string) $_GET['status'];

        $projects = $this->get_data($filter, $limit, $offset);

        $return_data = array(
            'page'=>$page,
            'totalPage'=>ceil($projects['total_count']/$limit),
            'totalData'=>$projects['total_count'],
            'limit'=>$limit,
            'resultData'=>$projects['data'],
        );

        echo CJSON::encode($return_data);
    }
    
    private function get_data($filter='', $limit=20, $offset=0)
    {
        $criteria = new CDbCriteria;
        $criteria->limit = $limit;
        $criteria->offset = $offset;

        if(is_array($filter))
        {
            if(isset($filter['name']))
                $criteria->compare('name', $filter['name']);

            if(isset($filter['code']))
                $criteria->compare('code', $filter['code']);

            if(isset($filter['status']))
                $criteria->compare('status', $filter['status']);
        }
        
        if($filter)
            $count = Projects::model()->count($criteria);
        else
            $count = Projects::model()->count();

        $model = Projects::model()->findAll($criteria);
        $data  = array();

        foreach($model as $row)
        {
            $data[] = array(
                'project_id'        => $row->project_id,
                'name'              => $row->name,
                'code'              => $row->code,
                'description'       => $row->description,
                'status'            => $row->status,
                'production_date'   => date(Yii::app()->params['dateformat_display'], strtotime($row->production_date)),
                'termination_date'  => date(Yii::app()->params['dateformat_display'], strtotime($row->termination_date)),
                'date_created'      => date(Yii::app()->params['dateformat_display'], strtotime($row->date_created)),
                'date_updated'      => date(Yii::app()->params['dateformat_display'], strtotime($row->date_updated))
            );
        }

        return array(
            'data'=>$data,
            'data_count'=>count($data),
            'total_count'=>$count,          
        );
    }
}