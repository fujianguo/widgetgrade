<?php

/**
 * This is the model class for table "tbl_grade".
 *
 * The followings are the available columns in table 'tbl_grade':
 * @property integer $_id
 * @property integer $keywordid
 * @property string $keyword
 * @property string $picpath
 * @property integer $gradevalue
 * @property integer $gradecounts
 * @property string $gradeitems
 * @property integer $createrid
 * @property string $createtime
 * @property string $creaternickname
 * @property integer $audittype
 * @property string $auditdate
 * @property string $auditname
 * @property integer $auditstate
 *
 * The followings are the available model relations:
 * @property TblGradeCateRelated[] $tblGradeCateRelateds
 * @property TblGradeItem[] $tblGradeItems
 * @property TblGradeOperateLog[] $tblGradeOperateLogs
 */
class Grade extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Grade the static model class
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
		return 'tbl_grade';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('gradevalue', 'required'),
			array('keywordid, gradevalue, gradecounts, createrid, audittype, auditstate', 'numerical', 'integerOnly'=>true),
			array('keyword, picpath, createtime, auditdate', 'length', 'max'=>50),
			array('gradeitems', 'length', 'max'=>500),
			array('creaternickname', 'length', 'max'=>100),
			array('auditname', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('_id, keywordid, keyword, picpath, gradevalue, gradecounts, gradeitems, createrid, createtime, creaternickname, audittype, auditdate, auditname, auditstate', 'safe', 'on'=>'search'),
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
			'tblGradeCateRelateds' => array(self::HAS_MANY, 'TblGradeCateRelated', 'tbl_grade_id'),
			'tblGradeItems' => array(self::HAS_MANY, 'TblGradeItem', 'tbl_grade_id'),
			'tblGradeOperateLogs' => array(self::HAS_MANY, 'TblGradeOperateLog', 'tbl_grade_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'_id' => 'ID',
			'keywordid' => 'Keywordid',
			'keyword' => 'Keyword',
			'picpath' => 'Picpath',
			'gradevalue' => 'Gradevalue',
			'gradecounts' => 'Gradecounts',
			'gradeitems' => 'Gradeitems',
			'createrid' => 'Createrid',
			'createtime' => 'Createtime',
			'creaternickname' => 'Creaternickname',
			'audittype' => 'Audittype',
			'auditdate' => 'Auditdate',
			'auditname' => 'Auditname',
			'auditstate' => 'Auditstate',
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
		$criteria->compare('keywordid',$this->keywordid);
		$criteria->compare('keyword',$this->keyword,true);
		$criteria->compare('picpath',$this->picpath,true);
		$criteria->compare('gradevalue',$this->gradevalue);
		$criteria->compare('gradecounts',$this->gradecounts);
		$criteria->compare('gradeitems',$this->gradeitems,true);
		$criteria->compare('createrid',$this->createrid);
		$criteria->compare('createtime',$this->createtime,true);
		$criteria->compare('creaternickname',$this->creaternickname,true);
		$criteria->compare('audittype',$this->audittype);
		$criteria->compare('auditdate',$this->auditdate,true);
		$criteria->compare('auditname',$this->auditname,true);
		$criteria->compare('auditstate',$this->auditstate);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}