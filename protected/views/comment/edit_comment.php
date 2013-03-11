<?php
/* @var $this CommentController */

$this->breadcrumbs=array(
	'Comment'=>array('/comment'),
	'Edit_comment',
);
?>
<div class="form">
<?php $form=$this->beginWidget('CActiveForm'); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo CHtml::errorSummary($model); ?>


		<?php echo $form->hiddenField($model,'id'); ?>
        <?php echo $form->hiddenField($model,'type'); ?>
        <?php echo $form->hiddenField($model,'author_id'); ?>
       	<?php echo $form->hiddenField($model,'date_add'); ?>
        <?php echo $form->hiddenField($model,'state'); ?>


	<div class="row">
		<?php echo $form->labelEx($model,'txt'); ?>
		<?php echo $form->textArea($model,'txt'); ?>
		<?php echo $form->error($model,'txt'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
