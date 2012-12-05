<?php
$form = $this->beginWidget ( 'CActiveForm', array (
		'action' => 'getGrade',
		'method' => 'post',
		'htmlOptions'=>array('enctype'=>'multipart/form-data'),
) );
?>

关键词id：<?php echo $form->textField($grade,'keywordid')?><br/>
关键词：<?php echo $form->textField($grade,'keyword')?><br/>
---<br/>
上传文件：<?php echo $form->FileField($grade,'picpath'); ?> <br/>
---<br/>
评分项：<?php echo $form->checkBoxList($gradeItem,'gradeitem',array('娱乐' => '娱乐','视觉' => '视觉','品味' => '品味'),array('separator'=>''));?><br/>
---<br/>
分类：<?php echo $form->checkBoxList($gradeCategory,'categroyname',array('电影' => '电影','生活' => '生活','体育' => '体育'),array('separator'=>''));?><br/>
---<br/>
创建者id：<?php echo $form->textField($grade,'createrid'); ?> <br/>
创建者昵称：<?php echo $form->textField($grade,'creaternickname'); ?> <br/>
---<br/>

<?php echo CHtml::submitButton('提交')?>

<?php $this->endWidget();?>