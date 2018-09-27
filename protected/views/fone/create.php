<?php
/* @var $this FoneController */
/* @var $model Fone */

$this->breadcrumbs=array(
	'Fones'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Fone', 'url'=>array('index')),
	array('label'=>'Manage Fone', 'url'=>array('admin')),
);
?>

<h1>Create Fone</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>