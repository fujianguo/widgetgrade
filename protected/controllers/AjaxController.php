<?php

class AjaxController extends Controller {

	/**
	 * 增加一个好评的好评数
	 */	
	public function actionDig() {
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