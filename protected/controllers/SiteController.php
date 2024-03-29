<?php

class SiteController extends Controller {
	
	public $layout = '//layouts/column2';
	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layo uts/main.php'
		$this->render('index');
	}

	/**
	 * 处理用户评分
	 */
	public function actionGrade() {
	
		$grade = Grade::model()->findByPk(30);
		if(isset($_POST['Grade'])) {
			
			$grade->setAttributes($_POST['Grade']);
			$result = $grade->save();
			echo $result;
		} else {
			$this->render('addGradeValue', array(
					'model' => $grade,
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
	 * 获得所有的评分
	 * 1按最新排序
	 * 2按最热排序
	 */
	public function actionLists() {
	
		$grades = Grade::model()->findAll();
		
		foreach ($grades as $grade) {
// 			var_dump($grade);
			echo '<pre>';
// 			$gradeItems = GradeItem::model()->with('grade')->findAll();
			CVarDumper::dump($grade->gradeItems);
		}
	
		
	}
	
}