<?php
$form = $this->beginWidget ( 'lib.widgets.CActiveFormAdv', array (
		'method' => 'post',
		'htmlOptions'=>array('enctype'=>'multipart/form-data'),
) );
?>

关键词id：<?php echo $form->textField($model,'keywordid')?><br/>
关键词：<?php echo $form->textField($model,'keyword')?><br/>
---<br/>
上传文件：<?php echo $form->FileField($model,'picpath'); ?> <br/>
---<br/>
评分项：<br/>
<?php //if(empty($model->gradeItems)) :?>
<?php //echo $form->checkBox($model,'gradeItems..gradeitem',array('娱乐' => '娱乐','视觉' => '视觉','品味' => '品味'),array('separator'=>''));?><br/>
<?php //else:?>
<?php echo $form->textField($model,'gradeItems..gradeitem')?><br/>
<?php echo $form->textField($model,'gradeItems..gradeitem')?><br/>
<?php echo $form->textField($model,'gradeItems..gradeitem')?><br/>

<?php //foreach ($model->gradeItems as $key=>$gradeItem) :?>
<?php //echo $form->checkBoxList($model, "gradeItems.{$key}.gradeitem", array($gradeItem->gradeitem => $gradeItem->gradeitem),array('separator'=>''));?>
<?php //endforeach;?>
<?php //endif;?>
---<br/>
分类：<?php //echo $form->checkBoxList($model,'gradeCateRelateds..tbl_grade_category_id',array(13 => '电影',14 => '生活',15 => '体育'),array('separator'=>''));?><br/>
电影输入id-13：<?php echo $form->textField($model,'gradeCateRelateds..tbl_grade_category_id')?><br/>
生活输入id-14：<?php echo $form->textField($model,'gradeCateRelateds..tbl_grade_category_id')?><br/>
体育输入id-15：<?php echo $form->textField($model,'gradeCateRelateds..tbl_grade_category_id')?><br/>
---<br/>
创建者id：<?php echo $form->textField($model,'createrid'); ?> <br/>
创建者昵称：<?php echo $form->textField($model,'creaternickname'); ?> <br/>
---<br/>

<?php echo CHtml::submitButton('评分')?>

<?php $this->endWidget();?>