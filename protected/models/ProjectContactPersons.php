<?php

/**
 * This is the model class for table "project_contact_persons".
 *
 * The followings are the available columns in table 'project_contact_persons':
 * @property integer $project_id
 * @property string $name
 * @property string $company
 * @property string $position
 * @property string $contact_numbers
 * @property string $email
 * @property string $address
 * @property string $notes
 * @property string $date_created
 * @property string $date_updated
 */
class ProjectContactPersons extends CActiveRecord
{
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'project_contact_persons';
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
            array('name, company, position, contact_numbers, email, address, notes', 'length', 'max'=>255),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('project_id, name, company, position, contact_numbers, email, address, notes, date_created, date_updated', 'safe', 'on'=>'search'),
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
            'name' => 'Name',
            'company' => 'Company',
            'position' => 'Position',
            'contact_numbers' => 'Contact Numbers',
            'email' => 'Email',
            'address' => 'Address',
            'notes' => 'Notes',
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
        $criteria->compare('name',$this->name,true);
        $criteria->compare('company',$this->company,true);
        $criteria->compare('position',$this->position,true);
        $criteria->compare('contact_numbers',$this->contact_numbers,true);
        $criteria->compare('email',$this->email,true);
        $criteria->compare('address',$this->address,true);
        $criteria->compare('notes',$this->notes,true);
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
     * @return ProjectContactPersons the static model class
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
}