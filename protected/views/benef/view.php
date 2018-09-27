<?php
/* @var $this BenefController */
/* @var $model Benef */

/* $this->breadcrumbs=array(
  'Prontuários'=>array('index'),
  $model->nb,
  ); */

$this->menu=array(
	/* array('label'=>'List Benef', 'url'=>array('index')),
	  array('label'=>'Create Benef', 'url'=>array('create')),
	  array('label'=>'Update Benef', 'url'=>array('update', 'id'=>$model->nb)),
	  array('label'=>'Delete Benef', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->nb),'confirm'=>'Are you sure you want to delete this item?')),
	  array('label'=>'Manage Benef', 'url'=>array('admin')), */
	array('label'=>'Alterar','url'=>array('pront/update', 'id'=>$_GET['pront'])),
	array('label' => 'Voltar', 'url' => 'javascript:history.go(-1)'),
);
?>

<h1>Benefício - detalhes <?php echo $model->nb; ?></h1>

<?php
$this->widget('zii.widgets.CDetailView', array(
	'data' => $model,
	'attributes' => array(
		//'nb',
		//'esp_id',
		array(
			'name' => 'nb',
			'type' => 'raw',
			'value' => $model->nb,
		),
		array(
			'name' => 'Especie',
			'type' => 'raw',
			'value' => $model->esp->esp_id . ' - ' . $model->esp->desc_esp,
		),
		//'dii',
		array(
			'name' => 'dii',
			'value' => ($model->dii == null) ? 'não infomada' : $model->dii,
		),
		array(
			'name' => 'Cid 10',
			'type' => 'raw',
			'value' => ($model->cid_id == null) ? 'não informada' : $model->cid->codigo . ' - ' . $model->cid->descr,
		),
	),
));
?>
