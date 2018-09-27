<?php
/* @var $this BenefController */
/* @var $model Benef */

$this->breadcrumbs=array(
	'Benefs'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Benef', 'url'=>array('index')),
	array('label'=>'Manage Benef', 'url'=>array('admin')),
);
?>

<h1>Create Benef</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>