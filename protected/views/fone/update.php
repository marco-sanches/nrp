<?php
/* @var $this FoneController */
/* @var $model Fone */

$this->breadcrumbs=array(
	'Fones'=>array('index'),
	$model->fone_id=>array('view','id'=>$model->fone_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Fone', 'url'=>array('index')),
	array('label'=>'Create Fone', 'url'=>array('create')),
	array('label'=>'View Fone', 'url'=>array('view', 'id'=>$model->fone_id)),
	array('label'=>'Manage Fone', 'url'=>array('admin')),
);
?>

<h1>Update Fone <?php echo $model->fone_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>