<?php
/* @var $this FoneController */
/* @var $model Fone */

$this->breadcrumbs=array(
	'Fones'=>array('index'),
	$model->fone_id,
);

$this->menu=array(
	array('label'=>'List Fone', 'url'=>array('index')),
	array('label'=>'Create Fone', 'url'=>array('create')),
	array('label'=>'Update Fone', 'url'=>array('update', 'id'=>$model->fone_id)),
	array('label'=>'Delete Fone', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->fone_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Fone', 'url'=>array('admin')),
);
?>

<h1>View Fone #<?php echo $model->fone_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'fone_id',
		'seg_id',
		'numero',
	),
)); ?>
