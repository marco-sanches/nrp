<?php
/* @var $this EmpController */
/* @var $data Emp */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('emp_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->emp_id), array('view', 'id'=>$data->emp_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nome_emp')); ?>:</b>
	<?php echo CHtml::encode($data->nome_emp); ?>
	<br />


</div>