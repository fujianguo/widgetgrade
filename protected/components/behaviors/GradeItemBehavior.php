<?php

class GradeItemBehavior extends CActiveRecordBehavior {

	public function beforeSave($event) {
	
		$owner = $this->getOwner();
		if($owner->isNewRecord) {
			$owner->gradeitemvalue = 0;
			$owner->displayorder = $owner->count()+1;
		} else {
		}
		
	
	}	
	public function afterSave($event) {
		$owner = $this->getOwner();
		
	}


}

?>