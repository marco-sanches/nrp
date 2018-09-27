<strong>digite apenas os números</strong><br><br>
<div class="row">		
		<?php echo $form->labelEx($fone,'fone0'); ?>
		<?php echo $form->textField($fone,'fone0',array('size'=>12,'maxlength'=>15,'style'=>'text-align:center')); ?>
		<?php echo $form->error($fone,'fone0'); ?>
	
		<?php echo $form->labelEx($fone,'fone1'); ?>
		<?php echo $form->textField($fone,'fone1',array('size'=>12,'maxlength'=>15,'style'=>'text-align:center')); ?>
		<?php echo $form->error($fone,'fone1'); ?>
	
		<?php echo $form->labelEx($fone,'fone2'); ?>
		<?php echo $form->textField($fone,'fone2',array('size'=>12,'maxlength'=>15,'style'=>'text-align:center')); ?>
		<?php echo $form->error($fone,'fone2'); ?>		
	</div>