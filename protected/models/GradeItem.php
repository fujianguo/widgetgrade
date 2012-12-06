<?php

/**
 * This is the model class for table "tbl_grade_item".
 *
 * The followings are the available columns in table 'tbl_grade_item':
 * @property integer $_id
 * @property string $gradeitem
 * @property integer $gradeitemvalue
 * @property integer $displayorder
 * @property integer $tbl_grade_id
 *
 * The followings are the available model relations:
 * @property TblGrade $tblGrade
 */
class GradeItem extends CActiveRecordAdv
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return GradeItem the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_grade_item';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('gradeitemvalue, displayorder, tbl_grade_id', 'numerical', 'integerOnly'=>true),
			array('gradeitem', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('_id, gradeitem, gradeitemvalue, displayorder, tbl_grade_id', 'safe', 'on'=>'search'),
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
			'grade' => array(self::BELONGS_TO, 'Grade', 'tbl_grade_id'),
		);
	}

	public function cascade() {
		return array(
				'grade'
		);
	}
	
	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'_id' => 'ID',
			'gradeitem' => '评分项标题',
			'gradeitemvalue' => '评分项总值',
			'displayorder' => '排序号',
			'tbl_grade_id' => '评分id',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('_id',$this->_id);
		$criteria->compare('gradeitem',$this->gradeitem,true);
		$criteria->compare('gradeitemvalue',$this->gradeitemvalue);
		$criteria->compare('displayorder',$this->displayorder);
		$criteria->compare('tbl_grade_id',$this->tbl_grade_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function behaviors() {
		return array(
				'gradeItem' => array(
						'class' => 'application.components.behaviors.GradeItemBehavior'
				),
		);
	}
}