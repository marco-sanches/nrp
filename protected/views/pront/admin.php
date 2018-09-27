<?php
/* @var $this ProntController */
/* @var $model Pront */

$this->breadcrumbs=array(
	'Prontuários',
);

$this->menu=array(	
	array('label' => 'Novo prontuário', 'url' => array('create')),	
	array('label' => 'Empregadores', 'url' => Yii::app()->homeUrl . '?r=emp'),
);
?>

<!--<h1>Gerenciamento de prontuários</h1>-->

<!--<p>-->
	Opcionalmente você pode usar um dos operadores de comparação (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
	ou <b>=</b>) no começo de cada um dos valores de pesquisa para especificar o tipo de comparação a ser feita.
<!--</p>-->

<?php
$this->widget('zii.widgets.grid.CGridView', array(
	'enablePagination' => true,
	'enableHistory' => true,
	'pager' => array(
		'class' => 'CLinkPager',
		'header' => '',
		'firstPageLabel' => '<<',
		'prevPageLabel' => '<',
		'lastPageLabel' => '>>',
		'nextPageLabel' => '>'
		),
	'id' => 'pront-grid',
	'dataProvider' => $model->search(),
	'filter' => $model,
	'columns' => array(
		'pront',
		array(
			'name' => 'nb',
			'header' => 'Benefício',
			'type' => 'raw',
			'value' => '($data->nb==null)?"não informado":$data->nb',
			'htmlOptions' => array('width' => '80', 'style'=>'text-align:center'),
		),
		array(
			'name' => 'seg.nome',
			'type' => 'raw',
			'header' => 'Segurado',
			'filter' => CHtml::activeTextField($model, 'seg_nome'),
			'value' => '$data->seg->nome',
			'htmlOptions' => array('width' => '300'),
		),
		                                
		array(
			'name' => 'prgm',
			'header' => 'Programa',
			'filter' => array('1' => 'sim', '0' => 'não'),
			'value' => '($data->prgm=="1")?("sim"):("não")',
			'htmlOptions' => array('style' => 'text-align: center'),
		),
		
		array(
			'name' => 'mprot',
			'header' => 'Protese',
			'filter' => array('1' => 'sim', '0' => 'não'),
			'value' => '($data->mprot=="1")?("sim"):("não")',
			'htmlOptions' => array('style' => 'text-align: center'),
		),
		array(
			'name' => 'jud',
			'header' => 'Judicial',
			'filter' => array('1' => 'sim', '0' => 'não'),
			'value' => '($data->jud=="1")?("sim"):("não")',
			'htmlOptions' => array('style' => 'text-align: center'),
		),
				
		array(
			'class' => 'CButtonColumn',
			'template' => '{view} {update}',
		),
	),
));
