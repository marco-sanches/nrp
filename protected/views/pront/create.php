<?php
/* @var $this ProntController */
/* @var $model Pront */

$this->breadcrumbs=array(
	'Prontuários'=>array('admin'),
	'Novo',
);

$this->menu=array(
	array('label'=>'Empregadores', 'url' => Yii::app()->homeUrl.'?r=emp/create')	
);
?>

<h1>Novo prontuário</h1>

<div class="form">

	<?php
	$form=$this->beginWidget('CActiveForm', array(
		'id' => 'create-pront',
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
			'Prontuário' => $this->renderPartial('_c_form', array('pront' => $pront, 'benef'=>$benef, 'form' => $form), TRUE),
			'Benefício' => $this->renderPartial('_c_form_benef', array('benef' => $benef, 'form' => $form), TRUE),
			'Segurado' => $this->renderPartial('_c_form_seg', array('seg' => $seg, 'form' => $form), TRUE),
			'Ocupação laboral' => $this->renderPartial('_c_form_ocup', array('seg' => $seg, 'form' => $form), TRUE),
			'Contato' => $this->renderPartial('_c_form_fone', array('fone' => $fone, 'form' => $form), TRUE),
		),
		
		'options' => array(
			'collapsible' => false,
		),
	));
	?>
	<div class="row buttons">
		<?php echo CHtml::submitButton('Gravar dados'); ?>
	</div>	

	<?php $this->endWidget(); ?>

</div><!-- form -->