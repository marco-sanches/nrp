<?php
/* @var $this BenefController */
/* @var $model Benef */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'nb'); ?>
		<?php echo $form->textField($model,'nb',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'esp_id'); ?>
		<?php echo $form->textField($model,'esp_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'dii'); ?>
		<?php echo $form->textField($model,'dii'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cid_id'); ?>
		<?php echo $form->textField($model,'cid_id',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'pront'); ?>
		<?php echo $form->textField($model,'pront',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->