<?php

class AdminController extends Controller {

	
	/**
	 * 显示添加评分页面
	 */
	public function actionAdd() {
		
		$grade = new Grade();
		$gradeItem = new GradeItem();
		$gradeCategory = new GradeCategory();
		
		$this->render('addGrade', array(
				'grade' => $grade,
				'gradeItem' => $gradeItem,
				'gradeCategory' => $gradeCategory
				));
		
	}
	
	/**
	 * 处理添加一个评分请求
	 */
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
	
	/**
	 * 显示一个用户评分页面
	 */
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
	
	/**
	 * 处理用户评分
	 */
	public function actionGetGradeValue() {
		
		$grade = Grade::model()->findByPk(9);
		if(isset($_POST['Grade'])) {
			$gradeForm = $_POST['Grade'];
			$grade->gradevalue = $grade->gradevalue + $gradeForm['gradevalue'];
			$grade->gradecounts = $grade->gradecounts + 1;
			$result = $grade->save();
				if($result) {
				$criteria = new CDbCriteria();
				$criteria->addCondition('tbl_grade_id=9');
				$gradeItems = GradeItem::model()->findAll($criteria);
				
				foreach ($gradeItems as $gradeItem) {
					if(isset($_POST[$gradeItem->_id])) {
						$gradeItem->gradeitemvalue = $gradeItem->gradeitemvalue + $_POST[$gradeItem->_id];
						$gradeItem->save();
					}
				}
			}
			echo 'success';
		}
	}
	
	/**
	 * 显示一个用户评论页面
	 */
	public function actionShowComment() {
		$comment = new Comment();
		$this->render('addComment',array(
				'comment' => $comment
				));	
	}
	
	/**
	 * 处理用户评论请求
	 */
	public function actionAddComment() {
		
		if(isset($_POST['Comment'])) {
			$comment = new Comment();
			$comment->setAttributes($_POST['Comment']);
			$comment->goodcounts = 0;
			$comment->commenttime = date('Y-m-d H:i:s',time());
			$result = $comment->save();
			if($result) {
				echo 'success';
			}  else {
				$this->render('addComment',array(
						'comment' => $comment
				));
			}
		} 
	}
	
	/**
	 * 获得关键词下所有的评论显示
	 */
	public function actionFindAllComment() {
		
		$criteria = new CDbCriteria();
		$criteria->addCondition('keywordid=10010');
		$comments = Comment::model()->findAll($criteria);
		$this->render('findAllComments',array(
					'comments' => $comments
				));
		
	}
	
	/**
	 * 获得所有的评分
	 * 1按最新排序
	 * 2按最热排序
	 */
	public function actionFindAllGrade() {
		
		
		$grades = Grade::model()->findAll();
		
		var_dump($grades);
	}
	
	/**
	 * 用户点击“支持”对评论进行好评
	 * 修改一个评论的好评数
	 */
	public function actionUpdateComment() {
		
		if(isset($_POST['Comment'])) {
			$comment = Comment::model()->findByPk($_POST['Comment']['_id']);
			$comment->goodcounts = $comment->goodcounts + 1;
			$result = $comment->save();
			if($result) {
				echo 'success';
			}
		}
		
	}
	
}

?>