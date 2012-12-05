<?php

class SiteController extends Controller {
	
	/**
	 * 处理用户评分
	 */
	public function actionUpdateGradeValue() {
	
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
	public function actionFindAllGrade() {
	
	
		$grades = Grade::model()->findAll();
	
		var_dump($grades);
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