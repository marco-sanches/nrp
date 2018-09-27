<?php
/* @var $this BenefController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Benefs',
);

$this->menu=array(
	array('label'=>'Create Benef', 'url'=>array('create')),
	array('label'=>'Manage Benef', 'url'=>array('admin')),
);
?>

<h1>Benefs</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
