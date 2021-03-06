<?php

/**
 * This is the model class for table "project_point_persons".
 *
 * The followings are the available columns in table 'project_point_persons':
 * @property integer $project_id
 * @property string $username
 * @property string $user_group
 * @property string $description
 * @property string $date_created
 * @property string $date_updated
 */
class ProjectPointPersons extends CActiveRecord
{
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'project_point_persons';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('project_id, date_created, date_updated', 'required'),
            array('project_id', 'numerical', 'integerOnly'=>true),
            array('username, description', 'length', 'max'=>255),
            array('user_group', 'length', 'max'=>30),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('project_id, username, user_group, description, date_created, date_updated', 'safe', 'on'=>'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'project_id' => 'Project',
            'username' => 'Username',
            'user_group' => 'User Group',
            'description' => 'Description',
            'date_created' => 'Date Created',
            'date_updated' => 'Date Updated',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     *
     * Typical usecase:
     * - Initialize the model fields with values from filter form.
     * - Execute this method to get CActiveDataProvider instance which will filter
     * models according to data in model fields.
     * - Pass data provider to CGridView, CListView or any similar widget.
     *
     * @return CActiveDataProvider the data provider that can return the models
     * based on the search/filter conditions.
     */
    public function search()
    {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria=new CDbCriteria;

        $criteria->compare('project_id',$this->project_id);
        $criteria->compare('username',$this->username,true);
        $criteria->compare('user_group',$this->user_group,true);
        $criteria->compare('description',$this->description,true);
        $criteria->compare('date_created',$this->date_created,true);
        $criteria->compare('date_updated',$this->date_updated,true);

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return ProjectPointPersons the static model class
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
}