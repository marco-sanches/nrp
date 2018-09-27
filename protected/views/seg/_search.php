<?php
/* @var $this SegController */
/* @var $model Seg */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nome'); ?>
		<?php echo $form->textField($model,'nome',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'doc'); ?>
		<?php echo $form->textField($model,'doc',array('size'=>12,'maxlength'=>12)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'empresa'); ?>
		<?php echo $form->textField($model,'empresa',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fone'); ?>
		<?php echo $form->textField($model,'fone',array('size'=>12,'maxlength'=>12)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'dn'); ?>
		<?php echo $form->textField($model,'dn'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'escol_id'); ?>
		<?php echo $form->textField($model,'escol_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'prof_id'); ?>
		<?php echo $form->textField($model,'prof_id',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'emp_id'); ?>
		<?php echo $form->textField($model,'emp_id',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sex'); ?>
		<?php echo $form->textField($model,'sex'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'renda'); ?>
		<?php echo $form->textField($model,'renda'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'munic_id'); ?>
		<?php echo $form->textField($model,'munic_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->