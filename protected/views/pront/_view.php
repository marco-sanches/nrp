<?php
/* @var $this ProntController */
/* @var $data Pront */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('pront')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->pront), array('view', 'id'=>$data->pront)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nb')); ?>:</b>
	<?php echo CHtml::encode($data->nb); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('erp')); ?>:</b>
	<?php echo CHtml::encode($data->erp); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('encerr')); ?>:</b>
	<?php echo CHtml::encode($data->encerr); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('seg_id')); ?>:</b>
	<?php echo CHtml::encode($data->seg->nome); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('prgm')); ?>:</b>
	<?php echo CHtml::encode($data->prgm); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('encerr_id')); ?>:</b>
	<?php echo CHtml::encode($data->encerr_id); ?>
	<br />

        <b><?php echo CHtml::encode($data->getAttributeLabel('mprot')); ?>:</b>
	<?php echo CHtml::encode($data->mprot); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('jud')); ?>:</b>
	<?php echo CHtml::encode($data->jud); ?>
	<br />
        
        <b><?php echo CHtml::encode($data->getAttributeLabel('cert')); ?>:</b>
	<?php echo CHtml::encode($data->cert); ?>
	<br />
        
	<?php /*
	

	

	*/ ?>

</div>