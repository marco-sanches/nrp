<strong>Digite o número do benefício com dez dígitos (só números)</strong><br><br>
<div class="row">		 
            <?php echo $form->labelEx($benef,'nb'); ?>
            <?php $this->widget('CMaskedTextField',array(
                    'model'=>$benef,
                    'attribute'=>'nb',
                    'mask'=>'999.999.999-9',
                    'htmlOptions'=>array('size'=>10, 'style'=>'text-align:center', 'width'=>'200px'),
                ));           
            ?>
            <?php echo $form->error($benef,'nb'); ?>
</div>

<div class="row">
	<?php echo $form->labelEx($benef, 'dii'); ?>
	<?php
	$this->widget('CMaskedTextField', array(
		'model' => $benef,
		'attribute' => 'dii',
		'mask' => '99/99/9999',
		'htmlOptions' => array('size' => 10, 'style' => 'text-align:center'),
	));
	?>
	<?php echo $form->error($benef, 'dii'); ?>
</div>

<div class="row">
	<?php echo CHtml::label('Espécie de benefício', 'desc_esp'); ?>
	<?php $models=Esp::model()->espReab(array('order' => 'desc_esp'));
	$data=array();
	foreach($models as $especie) {
		$data[$especie->esp_id]=$especie->desc_esp . ' - B' . $especie->esp_id;
	}
	echo $form->dropDownList($benef, 'esp_id', $data, array(
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
				$('#cid_id').val(ui.item.cid_id);				
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
	<?php echo $form->hiddenField($benef, 'cid_id', array('id' => 'cid_id')); ?>
	<?php echo $form->error($benef, 'cid_id'); ?>	
	<?php echo CHtml::textField('desc', '', array('id'=>'desc', 'style'=>'width:500px'));?>	
	<h4><span id="empty-message-cid" class="errorMessage"></span></h4>
</div>