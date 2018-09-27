<?php
/* @var $this FoneController */
/* @var $data Fone */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('fone_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->fone_id), array('view', 'id'=>$data->fone_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('seg_id')); ?>:</b>
	<?php echo CHtml::encode($data->seg_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('numero')); ?>:</b>
	<?php echo CHtml::encode($data->numero); ?>
	<br />


</div>