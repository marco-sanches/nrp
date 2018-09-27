<?php
/* @var $this SegController */
/* @var $model Seg */

$this->breadcrumbs=array(
	'Segs'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Seg', 'url'=>array('index')),
	array('label'=>'Create Seg', 'url'=>array('create')),
	array('label'=>'View Seg', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Seg', 'url'=>array('admin')),
);
?>

<h1>Update Seg <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>