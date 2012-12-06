<?php

class GradeBehavior extends CActiveRecordBehavior {

	public function beforeSave($event) {
		$owner = $this->getOwner();
		if($owner->isNewRecord) {
			$file = CUploadedFile::getInstance($owner, 'picpath');
			if(isset($file)) {
				$randName=date('Ymdhis').rand(100,999).'.'.$file->getExtensionName();
				$result = $file->saveAs(Yii::app()->basePath.'/../upload/'.$randName);
				$owner->picpath = '/upload/'.$randName;
				
				foreach ($_POST['Grade']['gradeItems'] as $gradeItem) {
					$arr[] = $gradeItem['gradeitem'];
				}
				$owner->gradeitems = implode (',',$arr);
				$owner->gradevalue = 0;
				$owner->gradecounts = 0;
				$owner->createtime = date('Y-m-d H:i:s',time());
			}
		} else {
// 			$owner->gradevalue = $owner->gradevalue + $_POST['Grade']['gradevalue'];
			$owner->gradecounts = $owner->gradecounts + 1;
		}
		
	}
	
	public function afterSave($event) {
		
		
	}
	
}