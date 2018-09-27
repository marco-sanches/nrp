<?php
/* @var $this ProntController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Pronts',
);

$this->menu=array(
	array('label'=>'Create Pront', 'url'=>array('create')),
	array('label'=>'Manage Pront', 'url'=>array('admin')),
);
?>

<h1>Pronts</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
