<?php
/* @var $this ProntController */
/* @var $model Pront */

$this->breadcrumbs=array(
	'Prontuários' => array('admin'),
	$model->pront,
);

$this->menu=array(
	/* array('label'=>'List Pront', 'url'=>array('index')),
	  array('label'=>'Create Pront', 'url'=>array('create')),
	  array('label'=>'Update Pront', 'url'=>array('update', 'id'=>$model->pront)),
	  array('label'=>'Delete Pront', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->pront),'confirm'=>'Are you sure you want to delete this item?')),
	  array('label'=>'Manage Pront', 'url'=>array('admin')), */
	array('label' => 'Excluir', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->pront), 'confirm' => 'Deseja realmente excluir este prontuário?')),
	array('label' => 'Voltar', 'url' => 'javascript:history.go(-1)'),
);
?>

<h1>Prontuário <?php echo $model->pront; ?> - detalhes</h1>

<?php if(Yii::app()->user->hasFlash('success')): ?>
	<div class="flash-success">
		<?php echo Yii::app()->user->getFlash('success'); ?>
	</div>    
<?php endif; ?>

<?php
$this->widget('zii.widgets.CDetailView', array(
	'data' => $model,
	'attributes' => array(
		'pront',
		//'nb',
		array(
			'name' => 'nb',
			'type' => 'html',
			'value' => CHtml::link(CHtml::encode($model->nb), array('benef/view', 'id' => $model->nb, 'pront' => $model->pront)),
		),
		//'nb0.esp.desc_esp:raw:Espécie',
		array(
			'name' => 'Especie',
			'type' => 'raw',
			'value' => ($model->nb0->esp_id == null) ? 'não informada' : $model->nb0->esp->esp_id . ' - ' . $model->nb0->esp->desc_esp,
		),
		//'seg.nome:url:Segurado',   
		array(
			'name' => 'Segurado',
			'type' => 'html',
			'value' => CHtml::link(CHtml::encode($model->seg->nome), array('seg/view', 'id' => $model->seg->id, 'pront' => $model->pront)),
		),
		array(
			'name' => 'Municipio',
			'type' => 'raw',
			'value' => ($model->seg->munic_id == null) ? 'não informado' : $model->seg->munic->nome . '/' . $model->seg->munic->uf,
		),
		//'seg.emp.nome_emp:raw:Vínculo',
		array(
			'name' => 'Vinculo',
			'type' => 'raw',
			'value' => ($model->seg->emp_id == null) ? 'não informado' : $model->seg->emp->nome_emp,
		),
		array(
			'name' => 'erp',
			'value' => ($model->erp == null) ? 'não informado' : $model->erp,
		),
		array(
			'name' => 'prgm',
			'type' => 'raw',
			'value' => ($model->prgm == "1") ? ('<font color="green"><b>sim</b></font>') : ("não"),
		),
		//'encerr_id',
		//'mprot',
		array(
			'name' => 'mprot',
			'type' => 'raw',
			'value' => ($model->mprot == "1") ? ("sim") : ("não"),
		),
		//'jud',
		array(
			'name' => 'jud',
			'type' => 'raw',
			'value' => ($model->jud == '1') ? ('<font color="red"><b>sim</b></font>') : ('não'),
		),
		//'cert',
		array(
			'name' => 'cert',
			'type' => 'raw',
			//'header'=>'Certificado',
			//'filter'=>array('1'=>'sim', '0'=>'não'),
			'value' => ($model->cert == "1") ? ("sim") : ("não"),
		),
	),
));
?>
