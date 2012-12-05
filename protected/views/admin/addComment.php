《玩具总动员》<br/>
<?php
$form = $this->beginWidget ( 'CActiveForm', array (
		'action' => 'addComment',
		'method' => 'post',
) );
?>

关键词id:<?php echo $form->textField($comment,'keywordid')?><?php echo $form->error($comment,'keywordid')?><br/>
---<br/>
用户id：<?php echo $form->textField($comment,'userid')?><?php echo $form->error($comment,'userid')?><br/>
用户昵称:<?php echo $form->textField($comment,'nickname')?><?php echo $form->error($comment,'nickname')?><br/>
---<br/>
评论标题：<?php echo $form->textField($comment,'commenttitle')?><?php echo $form->error($comment,'commenttitle')?><br/>
评论内容：<br/><?php echo $form->textArea($comment, 'commentcontent')?><?php echo $form->error($comment, 'commentcontent')?><br/>
验证码：<input type="text" name="verificationcode"> <br/>
---<br/>
<?php echo CHtml::submitButton('评论')?>

<?php $this->endWidget();?>
