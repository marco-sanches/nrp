<?php
/* @var $this BenefController */
/* @var $model Benef */

$this->breadcrumbs=array(
	'Benefs'=>array('index'),
	$model->nb=>array('view','id'=>$model->nb),
	'Update',
);

$this->menu=array(
	array('label'=>'List Benef', 'url'=>array('index')),
	array('label'=>'Create Benef', 'url'=>array('create')),
	array('label'=>'View Benef', 'url'=>array('view', 'id'=>$model->nb)),
	array('label'=>'Manage Benef', 'url'=>array('admin')),
);
?>

<h1>Update Benef <?php echo $model->nb; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>