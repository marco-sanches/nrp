 <?php
/* @var $this SegController */
/* @var $data Seg */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nome')); ?>:</b>
	<?php echo CHtml::encode($data->nome); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('doc')); ?>:</b>
	<?php echo CHtml::encode($data->doc); ?>
	<br />
        
        <b><?php echo CHtml::encode($data->getAttributeLabel('fone')); ?>:</b>
	<?php echo CHtml::encode($data->fone); ?>
	<br />
	
        <?php /*
        <b><?php echo CHtml::encode($data->getAttributeLabel('empresa')); ?>:</b>
	<?php echo CHtml::encode($data->empresa); ?>
	<br />
        
	
	
        <b><?php echo CHtml::encode($data->getAttributeLabel('dn')); ?>:</b>
	<?php echo CHtml::encode($data->dn); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('escol_id')); ?>:</b>
	<?php echo CHtml::encode($data->escol->descr); ?>
	<br />        
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('prof_id')); ?>:</b>
	<?php echo CHtml::encode($data->prof_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('emp_id')); ?>:</b>
	<?php echo CHtml::encode($data->emp_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sex')); ?>:</b>
	<?php echo CHtml::encode($data->sex); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('renda')); ?>:</b>
	<?php echo CHtml::encode($data->renda); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('munic_id')); ?>:</b>
	<?php echo CHtml::encode($data->munic_id); ?>
	<br />

	*/ ?>

</div>