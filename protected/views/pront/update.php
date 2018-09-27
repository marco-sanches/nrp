<?php
/* @var $this ProntController */
/* @var $model Pront */

$this->breadcrumbs=array(
	'Prontuários' => array('admin'),
	'Alterar',
	$model->pront => array('view', 'id' => $model->pront),
);

$this->menu=array(
	//array('label'=>'List Pront', 'url'=>array('index')),
	array('label' => 'Novo prontário', 'url' => array('create')),
	array('label' => 'Detalhes', 'url' => array('view', 'id' => $model->pront)),
	//array('label'=>'Gerenciar', 'url'=>array('admin')),
	array('label' => 'Voltar', 'url' => 'javascript:history.go(-1)',)
);
?>

<h1>Alterar prontuário</h1>

<?php if(Yii::app()->user->hasFlash('success')): ?>
	<div class="flash-success">
		<?php echo Yii::app()->user->getFlash('success'); ?>
	</div>    
<?php endif; ?>

<div class="form">

	<?php
	$form=$this->beginWidget('CActiveForm', array(
		'id' => 'pront-form',
		// Please note: When you enable ajax validation, make sure the corresponding
		// controller action is handling ajax validation correctly.
		// There is a call to performAjaxValidation() commented in generated controller code.
		// See class documentation of CActiveForm for details on this.
		'enableAjaxValidation' => false,
	));
	?>

	<p class="note">Campos com <span class="required">*</span> são obrigatórios.</p>

	<?php
	$this->widget('zii.widgets.jui.CJuiTabs', array(
		'tabs' => array(
			'Prontuário' => $this->renderPartial('_form_pront', array('model' => $model, 'form' => $form), TRUE),
			'Benefício' => $this->renderPartial('_form_benef', array('model' => $model, 'model1' => $model1, 'model6' => $model6, 'form' => $form), TRUE),
			'Segurado' => $this->renderPartial('_form_seg', array('model' => $model, 'model1' => $model1, 'model2' => $model2, 'model3' => $model3, 'model4' => $model4, 'model5' => $model5, 'escol' => $escol, 'form' => $form), TRUE),
			'Ocupação laboral' => $this->renderPartial('_form_ocup', array('model2' => $model2, 'model3' => $model3, 'model5' => $model5, 'form' => $form), TRUE),
			'Contato' => $this->renderPartial('_form_fone', array('fone' => $fone, 'form' => $form), TRUE),
		),
		'options' => array(
			'collapsible' => false,
		),
	));
	?>
	<div class="row buttons">
		<?php echo CHtml::submitButton('Salvar alterações'); ?>
	</div>	

	<?php $this->endWidget(); ?>

</div><!-- form -->
