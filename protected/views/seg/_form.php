<?php
/* @var $this SegController */
/* @var $model Seg */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'seg-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'id'); ?>
		<?php echo $form->textField($model,'id',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nome'); ?>
		<?php echo $form->textField($model,'nome',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'nome'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'doc'); ?>
		<?php echo $form->textField($model,'doc',array('size'=>12,'maxlength'=>12)); ?>
		<?php echo $form->error($model,'doc'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'empresa'); ?>
		<?php echo $form->textField($model,'empresa',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'empresa'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fone'); ?>
		<?php echo $form->textField($model,'fone',array('size'=>12,'maxlength'=>12)); ?>
		<?php echo $form->error($model,'fone'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'dn'); ?>
		<?php echo $form->textField($model,'dn'); ?>
		<?php echo $form->error($model,'dn'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'escol_id'); ?>
		<?php echo $form->textField($model,'escol_id'); ?>
		<?php echo $form->error($model,'escol_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'prof_id'); ?>
		<?php echo $form->textField($model,'prof_id',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'prof_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'emp_id'); ?>
		<?php echo $form->textField($model,'emp_id',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'emp_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sex'); ?>
		<?php echo $form->textField($model,'sex'); ?>
		<?php echo $form->error($model,'sex'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'renda'); ?>
		<?php echo $form->textField($model,'renda'); ?>
		<?php echo $form->error($model,'renda'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'munic_id'); ?>
		<?php echo $form->textField($model,'munic_id'); ?>
		<?php echo $form->error($model,'munic_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->