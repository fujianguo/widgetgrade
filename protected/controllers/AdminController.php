<?php

class AdminController extends Controller {

	/**
	 * 添加一个评分
	 * 处理添加一个评分请求
	 */
	public function actionView() {
	
		if(isset($_POST['Grade']) ||
				isset($_POST['GradeItem']) ||
				isset($_POST['GradeCategory'])) {
			
			$grade = new Grade();
			$grade->setAttributes($_POST['Grade']);
			$result = $grade->save();
			
		} else {
			$grade = new Grade();
			$category = new GradeCategory();
			$this->render('addGrade', array(
					'model' => $grade,
					'category' => $category
			));
		}
		
	}
	
	
	/**
	 * 处理编辑员查看参考
	 * 参考，获得选择分类下关键词评分的评分项
	 */
	public function actionRef() {
		
	}
	
	/**
	 * 处理设置请求
	 * 设置评分
	 */
	public function actionConfig() {
		
	}
	
	/**
	 * 处理配图请求
	 */
	public function actionImage() {
		
	}
	
}

?>