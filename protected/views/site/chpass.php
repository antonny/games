<?php
$this->pageTitle=Yii::app()->name . ' - Change password';
$this->breadcrumbs=array(
	'Change password',
);
?>

<h1>Change password</h1>
<?php if(Yii::app()->user->hasFlash('changepass')){ ?>

<div class="flash-success">
	<?php echo Yii::app()->user->getFlash('changepass'); ?>
</div>

<?php } ?>

<p>Please fill out the following form with your login credentials:</p>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableAjaxValidation'=>true,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<div class="row">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username'); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password'); ?>
		<?php echo $form->error($model,'password'); ?>

	</div>


<div class="row">
		<label for="Register_newpassword" class="required">New Password <span class="required">*</span></label>		<input name="Register[newpassword]" id="Register_newpassword" type="password" maxlength="128" />
	</div>
<div class="row">
		<label for="Register_appnewpassword" class="required">New Password Confirm<span class="required">*</span></label>		<input name="Register[appnewpassword]" id="Register_appnewpassword" type="password" maxlength="128" />
	</div>
	<div class="row submit">
		<?php echo CHtml::submitButton('Change'); ?>
	</div>

<?php $this->endWidget(); ?>
</div><!-- form -->
