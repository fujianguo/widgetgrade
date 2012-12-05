<?php

class AdminController extends Controller {

	public function actionAdd() {
		
// 		$this->render('addComment');
		
		$grade = new Grade();
		$gradeItem = new GradeItem();
		$gradeCategory = new GradeCategory();
		
		$this->render('addGrade', array(
				'grade' => $grade,
				'gradeItem' => $gradeItem,
				'gradeCategory' => $gradeCategory
				));
		
	}
	
	public function actionGetGrade() {
		
		if(isset($_POST['Grade']) ||
				 isset($_POST['GradeItem']) ||
				 isset($_POST['GradeCategory'])) {
			$grade = new Grade();
			$grade->setAttributes($_POST['Grade']);
			$file = CUploadedFile::getInstance($grade, 'picpath');
			if(isset($file)) {
				$randName=date('Ymdhis').rand(100,999).'.'.$file->getExtensionName();
				$result = $file->saveAs(Yii::app()->basePath.'/../upload/'.$randName);
				$grade->picpath = '/upload/'.$randName;
				$grade->gradeitems = implode(',',$_POST['GradeItem']['gradeitem']);
				$grade->gradevalue = 0;
				$grade->gradecounts = 0;
				$grade->createtime = date('Y-m-d H:i:s',time());
				$result = $grade->save();
				
				if($result) {
					foreach ($_POST['GradeItem']['gradeitem'] as $gradeitem) {
						$gradeItem = new GradeItem();
						$maxCount = $gradeItem->count();
						$gradeItem->gradeitem = $gradeitem;
						$gradeItem->gradeitemvalue = 0;
						$gradeItem->displayorder = $maxCount+1;
						$gradeItem->tbl_grade_id = $grade->_id;
						$result = $gradeItem->save();
					}
					
					if($result) {
						foreach ($_POST['GradeCategory']['categroyname'] as $categroyname) {
							$gradeCategory = new GradeCategory();
							$gradeCategory->categroyname = $categroyname;
							$gradeCategory->parentid = 0;
							$result = $gradeCategory->save();
							if($result) {
								$gradeCateRelated = new GradeCateRelated();
								$gradeCateRelated->tbl_grade_id = $grade->_id;
								$gradeCateRelated->tbl_grade_category_id = $gradeCategory->_id;
								$gradeCateRelated->save();
							}
						}
					}
				}
			}
		}
		echo 'success';
		
		
	}
	
	public function actionShowGradeValue() {
		
		$grade = Grade::model()->findByPk(9);
		
		$criteria = new CDbCriteria();
		$criteria->addCondition('tbl_grade_id=9');
		$gradeItems = GradeItem::model()->findAll($criteria);
		
		$this->render('addGradeValue', array(
				'grade' => $grade,
				'gradeItems' => $gradeItems
				));	
		
	}
	
	public function actionGetGradeValue() {
		
		$grade = Grade::model()->findByPk(9);
		
		$criteria = new CDbCriteria();
		$criteria->addCondition('tbl_grade_id=9');
		$gradeItems = GradeItem::model()->findAll($criteria);
		
		
		$gradeForm = $_POST['Grade'];
		$gradeItemForm = $_POST['GradeItem'];
		var_dump($gradeItemForm);
	}
	
	
}

?>