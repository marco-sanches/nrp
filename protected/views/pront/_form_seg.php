<?php
/* @var $this ProntController */
/* @var $model Pront */
/* @var $form CActiveForm */
?>

<div class="row">
	<?php echo $form->labelEx($model2, 'doc'); ?>
	<?php
	$this->widget('CMaskedTextField', array(
		'model' => $model2,
		'attribute' => 'doc',
		'mask' => '999.99999.99-9',
		'htmlOptions' => array('size' => 13, 'style' => 'text-align:center'),
	));
	?>
	<?php echo $form->error($model1, 'doc'); ?>
</div>

<div class="row">
	<?php echo $form->labelEx($model2, 'nome'); ?>
	<?php echo $form->textField($model2, 'nome', array('size' => 60, 'maxlength' => 100)); ?>
	<?php echo $form->error($model2, 'nome'); ?>	
</div>

<div class="row">
	<?php echo CHtml::label('Sexo', 'sex'); ?>
	<?php echo $form->dropDownList($model2, 'sex', array(0 => 'masculino', 1 => 'feminino')); ?>
</div>

<div class="row">
	<?php echo $form->labelEx($model2, 'dn'); ?>
	<?php
	$this->widget('CMaskedTextField', array(
		'model' => $model2,
		'attribute' => 'dn',
		'mask' => '99/99/9999',
		'htmlOptions' => array('size' => 10, 'style' => 'text-align:center'),
	));
	?>
	<?php echo $form->error($model2, 'dn'); ?>
</div>

<div class="row">
	<?php echo $form->labelEx($model2, 'renda'); ?>
	<?php echo $form->textField($model2, 'renda', array('size' => 10, 'maxlength'=>8, 'style'=>'text-align:right')); ?>
	<?php echo $form->error($model2, 'renda'); ?>
</div>

<div class="row">
	<?php echo CHtml::label('Escolaridade', 'descr'); ?>
	<?php
	$modele=Escol::model()->findAll(array('order' => 'escol_id'));
	$data1=array();
	foreach($modele as $escol) {
		$data1[$escol->escol_id]=$escol->descr;
	}
	echo $form->dropDownList($model2, 'escol_id', $data1, array(
		'prompt' => 'Selecione uma escolaridade'));
	?>
</div>

<div class="row">
	<?php echo $form->labelEx($model4, 'nome'); ?>
	<?php
	$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
		'name' => 'munic',
		'value' => 'digite o nome do muncípio',
		'source' => $this->createUrl('pront/autocompleteMunicipio'),
		// additional javascript options for the autocomplete plugin
		'options' => array(
			'showAnim' => 'fold',
			'select' => "js:function(event,ui){
					$('#m_id').val(ui.item.id);
					$('#nme').val(ui.item.label);				
				 }",
			'response' => 'js:function( event, ui ) {
							if (ui.content.length === 0) {
								$("#empty-message-munic").text("Nenhuma opção encontrada!");
								} else {
								$("#empty-message").empty();
							}
						}',
		),
		'htmlOptions' => array('style' => 'width:500px; color:blue;'),
	));
	?>	
	<?php echo $form->hiddenField($model2, 'munic_id', array('id' => 'm_id')); ?>
	<?php echo $form->error($model2, 'munic_id'); ?>	
	<?php echo $form->textField($model4, 'nome', array('id' => 'nme', 'style' => 'width:500px')); ?>
	<?php echo $form->error($model4, 'nome'); ?>
	<br><h4><span id="empty-message-munic" class="errorMessage"></span></h4>
</div>