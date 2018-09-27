<?php
/* @var $this ProntController */
/* @var $model Pront */
/* @var $form CActiveForm */
?>
<strong>Se alterar o número do benefício, digite só os números com dez dígitos</strong><br><br>
<div class="row">	
	<?php echo $form->labelEx($model1, 'nb'); ?>
	<?php echo $form->textField($model1, 'nb', array('style' => 'width:8em; text-align:center;')); ?>
	<?php echo $form->error($model1, 'nb'); ?>
</div>

<div class="row">
	<?php echo $form->labelEx($model1, 'dii'); ?>
	<?php
	$this->widget('CMaskedTextField', array(
		'model' => $model1,
		'attribute' => 'dii',
		'mask' => '99/99/9999',
		'htmlOptions' => array('size' => 10, 'style' => 'text-align:center'),
	));
	?>
	<?php echo $form->error($model1, 'dii'); ?>
</div>

<div class="row">
	<?php echo CHtml::label('Espécie de benefício', 'desc_esp'); ?>
	<?php
	$models=Esp::model()->espReab(array('order' => 'desc_esp'));
	$data=array();
	foreach($models as $especie) {
		$data[$especie->esp_id]=$especie->desc_esp . ' - B' . $especie->esp_id;
	}
	echo $form->dropDownList($model1, 'esp_id', $data, array(
		'prompt' => 'Selecione uma espécie'));
	?>
</div>

<div class="row">
	<?php echo CHtml::label('Código e descrição da doença', 'descr') ?>
	<?php $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
		'name' => 'CID',
		'value' => 'digite a primeira letra maiúscula ou a descrição da doença',
		'source' => $this->createUrl('pront/autocompleteCID'),
		// additional javascript options for the autocomplete plugin
		'options' => array(
			'showAnim' => 'fold',
			'select' => "js:function(event,ui){
				$('#id').val(ui.item.cid_id);				
				$('#desc').val(ui.item.label);
			 }",
			'response' => 'js:function( event, ui ) {
						if (ui.content.length === 0) {
							$("#empty-message-cid").text("Nenhuma opção encontrada!");
							} else {
							$("#empty-message").empty();
						}
					}',
		),
		'htmlOptions' => array('style' => 'width:500px; color:blue;'),
	));
	?><br>	
	<?php echo $form->hiddenField($model1, 'cid_id', array('id' => 'id')); ?>
	<?php echo $form->error($model1, 'cid_id'); ?>	
	<?php echo $form->textField($model6, 'codigo', array('id' => 'cod', 'style' => 'width:4em; text-align:center;')); ?>
	<?php echo $form->error($model6, 'codigo'); ?>	
	<?php echo $form->textField($model6, 'descr', array('id' => 'desc', 'style' => 'width:500px')); ?>
	<?php echo $form->error($model6, 'descr'); ?>
	<h4><span id="empty-message-cid" class="errorMessage"></span></h4>
</div>




