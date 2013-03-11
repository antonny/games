<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'register-form',
    'htmlOptions'=>array('enctype' => 'multipart/form-data')

)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>



	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>80,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>
    <div class="row">
		<?php echo $form->labelEx($model,'info'); ?>
		<?php echo $form->textArea($model,'info',array('size'=>80,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'info'); ?>
	</div>
    	<div class="row">
		<?php echo $form->labelEx($model,'width'); ?>
		<?php echo $form->textField($model,'width',array('size'=>80,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'width'); ?>
	</div>

    	<div class="row">
		<?php echo $form->labelEx($model,'length'); ?>
		<?php echo $form->textField($model,'length',array('size'=>80,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'length'); ?>
	</div>

    	<div class="row">
		<?php echo $form->labelEx($model,'tkantype');
		$models = Fabrictype::model()->findAll();
 
// при помощи listData создаем массив вида $ключ=>$значение
$list = CHtml::listData($models, 
                'id', 'name');
		
		
		
		
		 ?>
		<?php echo '<br>'.$form->dropDownList($model,'tkantype',$list); ?>
		<?php echo $form->error($model,'tkantype'); ?>
	</div>
  
    	<div class="row">
		<?php echo $form->labelEx($model,'price'); ?>
		<?php echo $form->textField($model,'price',array('size'=>80,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'price'); ?>
	</div>

    	<div class="row">
		<?php echo $form->labelEx($model,'color'); ?>
		<?php echo $form->textField($model,'color',array('size'=>80,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'color'); ?>
	</div>
 
    	<div class="row">
		<?php echo $form->labelEx($model,'img'); ?>
		<?php echo $form->fileField($model,'img',array('size'=>80,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'img'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div>
