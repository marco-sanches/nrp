<div class="row">
	<?php echo $form->labelEx($model5, 'descr'); ?>
	<?php
	$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
		'name' => 'prof',
		'value' => 'digite a profissão',
		'source' => $this->createUrl('pront/autocompleteProfissao'),
		// additional javascript options for the autocomplete plugin
		'options' => array(
			'showAnim' => 'fold',
			'select' => "js:function(event,ui){
				$('#p_id').val(ui.item.prof_id);
				$('#p_nme').val(ui.item.descr);				
			 }",
			'response' => 'js:function( event, ui ) {
						if (ui.content.length === 0) {
							$("#empty-message-prof").text("Nenhuma opção encontrada!");
							} else {
							$("#empty-message").empty();
						}
					}',
		),
		'htmlOptions' => array('style' => 'width:500px; color:blue;'),
	));
	?>
	<?php echo $form->hiddenField($model2, 'prof_id', array('id' => 'p_id')); ?>
	<?php echo $form->error($model2, 'prof_id'); ?>	
	<?php echo $form->textField($model5, 'descr', array('id' => 'p_nme', 'style' => 'width:500px')); ?>
<?php echo $form->error($model5, 'descr'); ?>
	<h4><span id="empty-message-prof" class="errorMessage"></span></h4>
</div>





<div class="row">
	<?php echo $form->labelEx($model3, 'nome_emp'); ?>
	<?php
	$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
		'name' => 'emp',
		'value' => 'digite o nome do empregador',
		'source' => $this->createUrl('pront/autocompleteEmpresa'),
		// additional javascript options for the autocomplete plugin
		'options' => array(
			'showAnim' => 'fold',
			'select' => "js:function(event,ui){
				$('#e_id').val(ui.item.emp_id);
				$('#e_nme').val(ui.item.nome_emp);
				$(this).val('');
				return false;
			 }",
			'response' => 'js:function( event, ui ) {
						if (ui.content.length === 0) {
							$("#empty-message-emp").text("Nenhuma opção encontrada!");
							} else {
							$("#empty-message").empty();
						}
					}',
		),
		'htmlOptions' => array('style' => 'width:500px; color:blue;'),
	));
	?>
	<?php echo $form->hiddenField($model2, 'emp_id', array('id' => 'e_id')); ?>
	<?php echo $form->error($model2, 'emp_id'); ?>	
<?php echo $form->textField($model3, 'nome_emp', array('id' => 'e_nme', 'style' => 'width:500px')); ?>
<?php echo $form->error($model3, 'nome_emp'); ?>
	<h4><span id="empty-message-emp" class="errorMessage"></span></h4>
</div>