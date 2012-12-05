
<?php echo CHtml::value($grade, 'keyword')?><br/>
<a href="#">我来打分</a>
<a href="#">我要评论</a>
<?php
$form = $this->beginWidget ( 'CActiveForm', array (
		'action' => 'getGradeValue',
		'method' => 'post',
) );
?>

	总体评分(必填):<br/>
	1<?php echo $form->radioButton($grade,'gradevalue',array('value'=>1, 'uncheckValue'=>null),array('separator'=>''));?>
	2<?php echo $form->radioButton($grade,'gradevalue',array('value'=>2, 'uncheckValue'=>null),array('separator'=>''));?>
	3<?php echo $form->radioButton($grade,'gradevalue',array('value'=>3, 'uncheckValue'=>null),array('separator'=>''));?>
	4<?php echo $form->radioButton($grade,'gradevalue',array('value'=>4, 'uncheckValue'=>null),array('separator'=>''));?>
	5<?php echo $form->radioButton($grade,'gradevalue',array('value'=>5, 'uncheckValue'=>null),array('separator'=>''));?>
	<?php echo $form->error($grade,'gradevalue')?>
	<br/>
	分项评分(选填)<br/>
	<?php foreach ($gradeItems as $gradeItem) :?>
	
	<?php echo CHtml::value($gradeItem, 'gradeitem')?>-
	<?php echo CHtml::value($gradeItem, 'gradeitemvalue')?>
	:
	<!-- 
	1<?php echo $form->radioButton($gradeItem,'_id',array('value'=>1, 'uncheckValue'=>null),array('separator'=>''));?>
	2<?php echo $form->radioButton($gradeItem,'_id',array('value'=>2, 'uncheckValue'=>null),array('separator'=>''));?>
	3<?php echo $form->radioButton($gradeItem,'_id',array('value'=>3, 'uncheckValue'=>null),array('separator'=>''));?>
	4<?php echo $form->radioButton($gradeItem,'_id',array('value'=>4, 'uncheckValue'=>null),array('separator'=>''));?>
	5<?php echo $form->radioButton($gradeItem,'_id',array('value'=>5, 'uncheckValue'=>null),array('separator'=>''));?>
	 -->
	<input type="radio" name="<?php echo $gradeItem->_id;?>" value="1"/>
	<input type="radio" name="<?php echo $gradeItem->_id;?>" value="2"/>
	<input type="radio" name="<?php echo $gradeItem->_id;?>" value="3"/>
	<input type="radio" name="<?php echo $gradeItem->_id;?>" value="4"/>
	<input type="radio" name="<?php echo $gradeItem->_id;?>" value="5"/>
	
	<br/>	
	<?php endforeach;?>
	
<?php echo CHtml::submitButton('评分')?>

<?php $this->endWidget();?>

