<?php
/* @var $this FoneController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Fones',
);

$this->menu=array(
	array('label'=>'Create Fone', 'url'=>array('create')),
	array('label'=>'Manage Fone', 'url'=>array('admin')),
);
?>

<h1>Fones</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
