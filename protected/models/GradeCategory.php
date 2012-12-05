<?php

/**
 * This is the model class for table "tbl_grade_category".
 *
 * The followings are the available columns in table 'tbl_grade_category':
 * @property integer $_id
 * @property string $categroyname
 * @property integer $parentid
 *
 * The followings are the available model relations:
 * @property TblGradeCateRelated[] $tblGradeCateRelateds
 */
class GradeCategory extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return GradeCategory the static model class
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
		return 'tbl_grade_category';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('parentid', 'numerical', 'integerOnly'=>true),
			array('categroyname', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('_id, categroyname, parentid', 'safe', 'on'=>'search'),
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
			'tblGradeCateRelateds' => array(self::HAS_MANY, 'TblGradeCateRelated', 'tbl_grade_category_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'_id' => 'ID',
			'categroyname' => 'Categroyname',
			'parentid' => 'Parentid',
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
		$criteria->compare('categroyname',$this->categroyname,true);
		$criteria->compare('parentid',$this->parentid);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}