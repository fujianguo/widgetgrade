<?php

class GradeCateRelatedBehavior extends CActiveRecordBehavior {

	public function afterSave($event) {
		$owner = $this->getOwner();
		
	}
	
	public function beforeSave($event) {
		$owner = $this->getOwner();
	
	}
		
}

?>