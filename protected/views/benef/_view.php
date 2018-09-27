<?php
/* @var $this BenefController */
/* @var $data Benef */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('nb')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->nb), array('view', 'id'=>$data->nb)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('esp_id')); ?>:</b>
	<?php echo CHtml::encode($data->esp_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dii')); ?>:</b>
	<?php echo CHtml::encode($data->dii); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cid_id')); ?>:</b>
	<?php echo CHtml::encode($data->cid_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pront')); ?>:</b>
	<?php echo CHtml::encode($data->pront); ?>
	<br />


</div>