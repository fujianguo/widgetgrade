<?php

/**
 * This is the model class for table "tbl_grade_cate_related".
 *
 * The followings are the available columns in table 'tbl_grade_cate_related':
 * @property integer $_id
 * @property integer $tbl_grade_id
 * @property integer $tbl_grade_category_id
 *
 * The followings are the available model relations:
 * @property TblGradeCategory $tblGradeCategory
 * @property TblGrade $tblGrade
 */
class GradeCateRelated extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return GradeCateRelated the static model class
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
		return 'tbl_grade_cate_related';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tbl_grade_id, tbl_grade_category_id', 'required'),
			array('tbl_grade_id, tbl_grade_category_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('_id, tbl_grade_id, tbl_grade_category_id', 'safe', 'on'=>'search'),
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
			'tblGradeCategory' => array(self::BELONGS_TO, 'TblGradeCategory', 'tbl_grade_category_id'),
			'tblGrade' => array(self::BELONGS_TO, 'TblGrade', 'tbl_grade_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'_id' => 'ID',
			'tbl_grade_id' => 'Tbl Grade',
			'tbl_grade_category_id' => 'Tbl Grade Category',
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
		$criteria->compare('tbl_grade_id',$this->tbl_grade_id);
		$criteria->compare('tbl_grade_category_id',$this->tbl_grade_category_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}