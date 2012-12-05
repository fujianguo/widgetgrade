<?php

class AuditController extends Controller {

	/**
	 * 为评分添加一个审核人
	 */
	public function actionAddGrade() {
		$arr['Grade'] = array(
			'audittype'	=> 0,
			'auditdate' => date('Y-m-d H:i:s',time()),
			'auditname' => '小明',
			'auditstate' => 1
				);
		
		$grade = Grade::model()->findByPk(9);
		if(isset($_POST['Grade'])) {
			$grade->setAttributes($_POST['Grade']);
			$result = $grade->save();
			if($result) {
				echo 'success';
			} else {
				echo 'error';
			}
		}
 	}
	
 	/**
 	 * 为评论添加一个审核人
 	 */
	public function actionAddComment() {
		
		$arr['Comment'] = array(
				'audittype'	=> 0,
				'auditdate' => date('Y-m-d H:i:s',time()),
				'auditname' => '小明',
				'auditstate' => 1
		);
		
		$comment = Comment::model()->findByPk(9);
		if(isset($_POST['Comment'])) {
			$comment->setAttributes($_POST['Comment']);
			$result = $comment->save();
			if($result) {
				echo 'success';
			} else {
				echo 'error';
			}
		}
		
	}
	
}

?>