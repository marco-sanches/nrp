<?php
/* @var $this SegController */
/* @var $model Seg */

$this->breadcrumbs=array(
	'Segurados' => array('admin'),
	$model->id,
);

$this->menu=array(
	/* array('label'=>'List Seg', 'url'=>array('index')),
	  array('label'=>'Create Seg', 'url'=>array('create')),
	  array('label'=>'Update Seg', 'url'=>array('update', 'id'=>$model->id)),
	  array('label'=>'Delete Seg', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	  array('label'=>'Manage Seg', 'url'=>array('admin')), */
	array('label'=>'Cadastrar telefone', 'url'=>array('fone/create', 'seg_id'=>$model->id)),
	array('label'=>'Alterar','url'=>array('pront/update', 'id'=>$_GET['pront'])),
	array('label' => 'Voltar', 'url' => 'javascript:history.go(-1)',
	)
);
?>

<h1>Cadastro do segurado - detalhes</h1>

<?php
$this->widget('zii.widgets.CDetailView', array(
	'data' => $model,
	'attributes' => array(
		'doc',
		'nome',
		//'emp.nome_emp:raw:Empresa',
		array(
			'name' => 'Vinculo',
			'type' => 'raw',
			'value' => ($model->emp_id == null) ? 'não informado' : $model->emp->nome_emp,
		),
		array(
			'name' => 'fone',
			'type' => 'raw',
			'value' => Fone::model()->getFones($model->id),			
		),
		array(
			'name' => 'nascimento',
			'value' => ($model->dn == null) ? 'não informada' : $model->dn,
		),
		//'escol.descr:raw:Escolaridade',
		array(
			'name' => 'Escolaridade',
			'type' => 'raw',
			'value' => ($model->escol_id == null) ? 'não informada' : $model->escol->descr,
		),
		//'prof_id:raw:CBO',		
		//'prof.descr:raw:Profissão',
		array(
			'name' => 'Profissao',
			'type' => 'raw',
			'value' => ($model->prof_id == null) ? 'não informada' : $model->prof->prof_id . ' - ' . $model->prof->descr,
		),
		array(
			'name' => 'sex',
			'value' => ($model->sex == null) ? 'não informado' : ($model->sex == 0) ? ('masculino') : ('feminimo'),
		),
		//'renda:raw:Renda',
		array(
			'name' => 'renda',
			'type' => 'raw',
			'value' => $model->renda,
		),
		//'munic.nome:raw:Município',
		array(
			'name' => 'Municipio',
			'type' => 'raw',
			'value' => ($model->munic_id == null) ? 'não informado' : $model->munic->nome . '/' . $model->munic->uf,
		),
	),
));
?>
