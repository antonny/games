<?php
$deleteJS = <<<DEL
$('.row').on('click','#userphoto',function() {
 $(this).parent('.row').next('.row').css('display','block');
 $(this).parent('.row').css('display','none');
});
DEL;
Yii::app()->getClientScript()->registerScript('delete', $deleteJS);
?>
<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - ';
$this->breadcrumbs=array(
	'',
);
?>



<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'update-form',
    'htmlOptions'=>array('enctype' => 'multipart/form-data')

));
?>



 <div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name'); ?>
		<?php echo $form->error($model,'name'); ?>
		</div>
 <div class="row">
		<?php echo $form->labelEx($model,'fname'); ?>
		<?php echo $form->textField($model,'fname'); ?>
		<?php echo $form->error($model,'fname'); ?>
	</div>
 <div class="row">
		<?php echo $form->labelEx($model,'sname'); ?>
		<?php echo $form->textField($model,'sname'); ?>
		<?php echo $form->error($model,'sname'); ?>
		</div>
 

     <?php echo ' <div class="row"><img src="/linenstore/images/'.$model->photo.'"><br><span id="userphoto">'.'Сменить фото'.'</span></div>';?>
    <div class="row" style="display:none">
   	<?php echo $form->labelEx($model,'photo');?>
		<?php echo $form->fileField($model,'photo'); ?>
		<?php echo $form->error($model,'photo'); ?>
		</div>
     <div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email'); ?>
		<?php echo $form->error($model,'email'); ?>
		</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton('Update'); ?>
	</div>

<?php $this->endWidget(); ?>
</div><!-- form -->
