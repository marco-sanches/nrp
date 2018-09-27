<?php
/* @var $this SegController */
/* @var $model Seg */

$this->breadcrumbs=array(
	'Segs'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Seg', 'url'=>array('index')),
	array('label'=>'Manage Seg', 'url'=>array('admin')),
);
?>

<h1>Create Seg</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>