<?php
/* @var $this commentController */
/* @var $model comment */
/* @var $form CActiveForm */
?>

<div class="form">


<?php

 $form=$this->beginWidget('CActiveForm', array(
	'id'=>'comment-add_comment-form',
	'action'=>'?r=/comment/add_comment'

)); ?>
	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">

		<?php echo $form->hiddenField($model,'author_id'); ?>

	</div>

	<div class="row">

		<?php echo $form->hiddenField($model,'date_add'); ?>

	</div>

	<div class="row">

		<?php echo $form->hiddenField($model,'type',array('value'=>$fabric->id)); ?>

	</div>

	<div class="row">

		<?php echo $form->hiddenField($model,'state'); ?>

	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'txt'); ?>
		<?php echo $form->textArea($model,'txt'); ?>
		<?php echo $form->error($model,'txt'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->