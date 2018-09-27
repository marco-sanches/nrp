<?php
/* @var $this EmpController */
/* @var $model Emp */

$this->breadcrumbs=array(
	'Emps'=>array('index'),
	$model->emp_id=>array('view','id'=>$model->emp_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Emp', 'url'=>array('index')),
	array('label'=>'Create Emp', 'url'=>array('create')),
	array('label'=>'View Emp', 'url'=>array('view', 'id'=>$model->emp_id)),
	array('label'=>'Manage Emp', 'url'=>array('admin')),
);
?>

<h1>Update Emp <?php echo $model->emp_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>