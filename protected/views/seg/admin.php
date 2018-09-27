<?php
/* @var $this SegController */
/* @var $model Seg */

$this->breadcrumbs=array(	
	'Gerenciar/segurado',
);

/*$this->menu=array(
	array('label'=>'List Seg', 'url'=>array('index')),
	array('label'=>'Create Seg', 'url'=>array('create')),
);*/

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#seg-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Gerenciamento de segurados</h1>

<p>
Opcionalmente você pode usar um dos operadores de comparação (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) no começo de cada um dos valores de pesquisa para especificar o tipo de comparação a ser feita.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'enablePagination'=>true,        
        'pager'=>'LinkPager', // overriding the default CLinkPager class
        'id'=>'seg-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		//'id',
		//'nome',
                array(
                   'name'=>'nome',
                    //'type'=>'raw',
                    //'header'=>'Segurado',
                    //'filter' => CHtml::activeTextField($model,'seg_nome'),
                    //'value'=>'$data->seg->nome',
                    'htmlOptions'=>array('width'=>'450'),
                ),
		//'doc',
                array(
                   'name'=>'doc',
                    //'type'=>'raw',
                    //'header'=>'Segurado',
                    //'filter' => CHtml::activeTextField($model,'seg_nome'),
                    //'value'=>'$data->seg->nome',
                    'htmlOptions'=>array('width'=>'30', 'style'=>'text-align:center'),
                    ),
                /*
		'empresa',
		'fone',
		'dn',		
		'escol_id',
		'prof_id',
		'emp_id',
		'sex',
		'renda',
		'munic_id',
                 * 
                 */		
		array(
			'class'=>'CButtonColumn',
                        'template'=>'{view}',
		),
	),
)); ?>
