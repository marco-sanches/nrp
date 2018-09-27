<?php
/* @var $this ProntController */
/* @var $model Pront */
/* @var $form CActiveForm */
?>

<div class="row">
	<?php echo $form->labelEx($model, 'pront'); ?>
	<?php echo $form->textField($model, 'pront', array('size' => 6, 'maxlength' => 20, 'style' => 'text-align:center')); ?>
	<?php echo $form->error($model, 'pront'); ?>
</div><br>

<div class="row">
	<?php echo $form->labelEx($model, 'erp'); ?>
	<?php
	$this->widget('CMaskedTextField', array(
		'model' => $model,
		'attribute' => 'erp',
		'mask' => '99/99/9999',
		'htmlOptions' => array('size' => 10, 'style' => 'text-align:center')
	));
	?>
	<?php echo $form->error($model, 'erp'); ?>
</div><br><br>

<div class="compactRadioGroup">
	<?php echo $form->labelEx($model, 'prgm'); ?>
	<?php echo $form->checkbox($model, 'prgm') ?>&nbsp;&nbsp;&nbsp;&nbsp;	

	<?php echo $form->labelEx($model, 'mprot'); ?>
	<?php echo $form->checkbox($model, 'mprot') ?>&nbsp;&nbsp;&nbsp;&nbsp;

	<?php echo $form->labelEx($model, 'jud'); ?>
	<?php echo $form->checkbox($model, 'jud') ?>&nbsp;&nbsp;&nbsp;&nbsp;

	<?php echo $form->labelEx($model, 'cert'); ?>
	<?php echo $form->checkbox($model, 'cert') ?>
</div>