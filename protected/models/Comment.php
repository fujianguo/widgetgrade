<?php

/**
 * This is the model class for table "tbl_comment".
 *
 * The followings are the available columns in table 'tbl_comment':
 * @property integer $_id
 * @property integer $keywordid
 * @property string $commenttitle
 * @property string $commentcontent
 * @property integer $goodcounts
 * @property integer $userid
 * @property string $nickname
 * @property string $commenttime
 * @property integer $audittype
 * @property string $auditdate
 * @property string $auditname
 * @property integer $auditstate
 */
class Comment extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Comment the static model class
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
		return 'tbl_comment';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('keywordid, goodcounts, userid, audittype, auditstate', 'numerical', 'integerOnly'=>true),
			array('commenttitle, nickname', 'length', 'max'=>100),
			array('commentcontent, auditname', 'length', 'max'=>255),
			array('commenttime, auditdate', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('_id, keywordid, commenttitle, commentcontent, goodcounts, userid, nickname, commenttime, audittype, auditdate, auditname, auditstate', 'safe', 'on'=>'search'),
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
			'_id' => 'ID',
			'keywordid' => 'Keywordid',
			'commenttitle' => 'Commenttitle',
			'commentcontent' => 'Commentcontent',
			'goodcounts' => 'Goodcounts',
			'userid' => 'Userid',
			'nickname' => 'Nickname',
			'commenttime' => 'Commenttime',
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
		$criteria->compare('commenttitle',$this->commenttitle,true);
		$criteria->compare('commentcontent',$this->commentcontent,true);
		$criteria->compare('goodcounts',$this->goodcounts);
		$criteria->compare('userid',$this->userid);
		$criteria->compare('nickname',$this->nickname,true);
		$criteria->compare('commenttime',$this->commenttime,true);
		$criteria->compare('audittype',$this->audittype);
		$criteria->compare('auditdate',$this->auditdate,true);
		$criteria->compare('auditname',$this->auditname,true);
		$criteria->compare('auditstate',$this->auditstate);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}