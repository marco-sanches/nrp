<?php
/* @var $this ProntController */
/* @var $model Pront */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'pront'); ?>
		<?php echo $form->textField($model,'pront',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nb'); ?>
		<?php echo $form->textField($model,'nb',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'erp'); ?>
		<?php echo $form->textField($model,'erp'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'encerr'); ?>
		<?php echo $form->textField($model,'encerr'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'seg_id'); ?>
		<?php echo $form->textField($model,'seg_id',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'prgm'); ?>
		<?php echo $form->textField($model,'prgm'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'encerr_id'); ?>
		<?php echo $form->textField($model,'encerr_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'mprot'); ?>
		<?php echo $form->textField($model,'mprot'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'jud'); ?>
		<?php echo $form->textField($model,'jud'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cert'); ?>
		<?php echo $form->textField($model,'cert'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->