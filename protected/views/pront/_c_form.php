<div class="row">
	<?php echo $form->labelEx($pront, 'erp'); ?>
	<?php
	$this->widget('CMaskedTextField', array(
		'model' => $pront,
		'attribute' => 'erp',
		'mask' => '99/99/9999',
		'htmlOptions' => array('size' => 10, 'style' => 'text-align:center')
	));
	?>
	<?php echo $form->error($pront, 'erp'); ?>
</div><br><br>

<div class="compactRadioGroup">
	<?php echo $form->labelEx($pront, 'prgm'); ?>
	<?php echo $form->checkbox($pront, 'prgm') ?>&nbsp;&nbsp;&nbsp;&nbsp;	

	<?php echo $form->labelEx($pront, 'mprot'); ?>
	<?php echo $form->checkbox($pront, 'mprot') ?>&nbsp;&nbsp;&nbsp;&nbsp;

	<?php echo $form->labelEx($pront, 'jud'); ?>
	<?php echo $form->checkbox($pront, 'jud') ?>&nbsp;&nbsp;&nbsp;&nbsp;

	<?php echo $form->labelEx($pront, 'cert'); ?>
	<?php echo $form->checkbox($pront, 'cert') ?>
</div>