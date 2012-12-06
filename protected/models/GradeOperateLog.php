<?php

/**
 * This is the model class for table "tbl_grade_operate_log".
 *
 * The followings are the available columns in table 'tbl_grade_operate_log':
 * @property integer $_id
 * @property string $opttype
 * @property string $opttime
 * @property string $optname
 * @property string $content
 * @property integer $tbl_grade_id
 *
 * The followings are the available model relations:
 * @property TblGrade $tblGrade
 */
class GradeOperateLog extends CActiveRecordAdv
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return GradeOperateLog the static model class
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
		return 'tbl_grade_operate_log';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tbl_grade_id', 'numerical', 'integerOnly'=>true),
			array('opttype', 'length', 'max'=>64),
			array('opttime', 'length', 'max'=>50),
			array('optname, content', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('_id, opttype, opttime, optname, content, tbl_grade_id', 'safe', 'on'=>'search'),
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
			'opttype' => '操作类型',
			'opttime' => '操作时间',
			'optname' => '操作人姓名',
			'content' => '内容',
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
		$criteria->compare('opttype',$this->opttype,true);
		$criteria->compare('opttime',$this->opttime,true);
		$criteria->compare('optname',$this->optname,true);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('tbl_grade_id',$this->tbl_grade_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}