<?php

class SiteController extends Controller {
	
	/**
	 * 查看一个评分显示
	 * 显示这个评分的评分项
	 * 显示这个评分的关键词所有评论
	 */
	public function actionView() {
		if(isset($_POST['_id'])) {
			$grade = Grade::model()->findByPk($_POST['_id']);
			$criteria = new CDbCriteria();
			$criteria->addCondition('tbl_grade_id='.$grade->_id);
			$gradeItems = GradeItem::model()->findAll($criteria);
			$criteria = new CDbCriteria();
			$criteria->addCondition('keywordid='.$grade->keywordid);
			$comments = Comment::model()->findAll($criteria);
			
			$this->render('view', array(
					'grade' => $grade,
					'gradeItems' => $gradeItems,
					'comments' => $comments
					));
			
		} else {
			echo 'error';
		}
	}
	
	/**
	 * 处理用户评分
	 */
	public function actionGrade() {
	
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
						$result = $gradeItem->save();
					}
				}
				if($result) {
					echo 'success';
					
				}
			}
		} else {
			
			$criteria = new CDbCriteria();
			$criteria->addCondition('tbl_grade_id=9');
			$gradeItems = GradeItem::model()->findAll($criteria);
			
			$this->render('addGradeValue', array(
					'grade' => $grade,
					'gradeItems' => $gradeItems
			));
		}
	}
	
	/**
	 * 处理用户评论请求
	 * 添加一个评论
	 */
	public function actionAdd() {
	
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
		} else {
			$comment = new Comment();
			$this->render('addComment',array(
					'comment' => $comment
			));
		}
	}

	/**
	 * 获得所有的评分
	 * 1按最新排序
	 * 2按最热排序
	 */
	public function actionLists() {
	
		$grades = Grade::model()->findAll();
	
		var_dump($grades);
	}
	
}