
<?php echo CHtml::value($model, 'keyword')?><br/>
<a href="#">我来打分</a>
<a href="#">我要评论</a>
<?php
$form = $this->beginWidget ( 'lib.widgets.CActiveFormAdv', array (
		'method' => 'post',
) );
?>

	总体评分(必填):<br/>
	1<?php echo $form->radioButton($model,'gradevalue',array('value'=>$model->gradevalue + 1, 'uncheckValue'=>null),array('separator'=>''));?>
	2<?php echo $form->radioButton($model,'gradevalue',array('value'=>$model->gradevalue + 2, 'uncheckValue'=>null),array('separator'=>''));?>
	3<?php echo $form->radioButton($model,'gradevalue',array('value'=>$model->gradevalue + 3, 'uncheckValue'=>null),array('separator'=>''));?>
	4<?php echo $form->radioButton($model,'gradevalue',array('value'=>$model->gradevalue + 4, 'uncheckValue'=>null),array('separator'=>''));?>
	5<?php echo $form->radioButton($model,'gradevalue',array('value'=>$model->gradevalue + 5, 'uncheckValue'=>null),array('separator'=>''));?>
	<?php echo $form->error($model,'gradevalue')?>
	<br/>
	分项评分(选填)<br/>
	<?php foreach ($model->gradeItems as $key=>$gradeItem) :?>
	
	<?php echo CHtml::value($model, "gradeItems.{$key}.gradeitem")?>-
	<?php echo CHtml::value($model, "gradeItems.{$key}.gradeitemvalue")?>
	:
	1<?php echo $form->radioButton($model,"gradeItems.{$key}.gradeitemvalue",array('value'=>$model->gradeItems[$key]->gradeitemvalue + 1, 'uncheckValue'=>null),array('separator'=>''));?>
	2<?php echo $form->radioButton($model,"gradeItems.{$key}.gradeitemvalue",array('value'=>$model->gradeItems[$key]->gradeitemvalue + 2, 'uncheckValue'=>null),array('separator'=>''));?>
	3<?php echo $form->radioButton($model,"gradeItems.{$key}.gradeitemvalue",array('value'=>$model->gradeItems[$key]->gradeitemvalue + 3, 'uncheckValue'=>null),array('separator'=>''));?>
	4<?php echo $form->radioButton($model,"gradeItems.{$key}.gradeitemvalue",array('value'=>$model->gradeItems[$key]->gradeitemvalue + 4, 'uncheckValue'=>null),array('separator'=>''));?>
	5<?php echo $form->radioButton($model,"gradeItems.{$key}.gradeitemvalue",array('value'=>$model->gradeItems[$key]->gradeitemvalue + 5, 'uncheckValue'=>null),array('separator'=>''));?>
	 <!-- 
	<input type="radio" name="<?php echo $gradeItem->_id;?>" value="1"/>
	<input type="radio" name="<?php echo $gradeItem->_id;?>" value="2"/>
	<input type="radio" name="<?php echo $gradeItem->_id;?>" value="3"/>
	<input type="radio" name="<?php echo $gradeItem->_id;?>" value="4"/>
	<input type="radio" name="<?php echo $gradeItem->_id;?>" value="5"/>
	 -->
	<br/>	
	<?php endforeach;?>
	
<?php echo CHtml::submitButton('评分')?>

<?php $this->endWidget();?>

