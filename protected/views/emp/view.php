<?php
/* @var $this EmpController */
/* @var $model Emp */

$this->breadcrumbs=array(
	'Emps'=>array('index'),
	$model->emp_id,
);

$this->menu=array(
	array('label'=>'List Emp', 'url'=>array('index')),
	array('label'=>'Create Emp', 'url'=>array('create')),
	array('label'=>'Update Emp', 'url'=>array('update', 'id'=>$model->emp_id)),
	array('label'=>'Delete Emp', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->emp_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Emp', 'url'=>array('admin')),
);
?>

<h1>View Emp #<?php echo $model->emp_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'emp_id',
		'nome_emp',
	),
)); ?>
