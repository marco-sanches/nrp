<?php
/* @var $this SegController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Segs',
);

$this->menu=array(
	array('label'=>'Create Seg', 'url'=>array('create')),
	array('label'=>'Manage Seg', 'url'=>array('admin')),
);
?>

<h1>Segurados</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
