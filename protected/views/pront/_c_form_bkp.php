<?php
/* @var $this ProntController */
/* @var $model Pront */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'pront-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos com <span class="required">*</span> são obrigatórios.</p>

	<?php echo $form->errorSummary($model); ?>
        <strong><font color="red">Dados da reabilitação --------------------------------------------------------------------------------------------------------------------------------</font></strong><br/>        
      	<div class="row">		
            <?php echo $form->labelEx($model,'erp'); ?>
            <?php $this->widget('CMaskedTextField',array(
                    'model'=>$model,
                    'attribute'=>'erp',
                    'mask'=>'99/99/9999',
                    'htmlOptions'=>array('size'=>6),
                ));           
	    ?> <b> >>> Este dado não pode ficar em branco!</b>
            <?php echo $form->error($model,'erp'); ?>
        </div>      
                
        <div class="compactRadioGroup">
            <?php echo $form->labelEx($model, 'prgm'); ?>
            <?php echo $form->radioButtonList($model, 'prgm', array('1'=>'Sim', '0'=>'Não'), array('separator'=>' '))?>
		
	</div>
        
        <div class="compactRadioGroup">
            <?php echo $form->labelEx($model, 'mprot'); ?>
            <?php echo $form->radioButtonList($model, 'mprot', array('1'=>'Sim', '0'=>'Não'), array('separator'=>' '))?>
		
	</div>

	<div class="compactRadioGroup">
            <?php echo $form->labelEx($model, 'jud'); ?>
            <?php echo $form->radioButtonList($model, 'jud', array('1'=>'Sim', '0'=>'Não'), array('separator'=>' '))?>
		
	</div>
        
        <br/>
        <strong><font color="blue">Dados do benefício -----------------------------------------------------------------------------------------------------------------------------------</font></strong><br/>
	 <div class="row">		 
            <?php echo $form->labelEx($model1,'nb'); ?>
            <?php $this->widget('CMaskedTextField',array(
                    'model'=>$model1,
                    'attribute'=>'nb',
                    'mask'=>'999.999.999-9',
                    'htmlOptions'=>array('size'=>8),
                ));           
            ?><b> Preencha os dez dígitos (só números).</b>
            <?php echo $form->error($model,'erp'); ?>
        </div>
        
        <div class="row">		
        <?php   $models = Esp::model()->espReab(array('order' => 'desc_esp'));
                $data = array();
                foreach ($models as $especie)
                {$data[$especie->esp_id]=$especie->desc_esp .' - B'. $especie->esp_id;}        
                echo $form->dropDownList($model1, 'esp_id', $data, array(
                'prompt' => 'Selecione uma espécie'));
        ?><b> >>> Este dado não pode ficar em branco!</b>
        </div>

         <div class="row">		
            <?php echo $form->labelEx($model1,'dii'); ?>
            <?php $this->widget('CMaskedTextField',array(
                    'model'=>$model1,
                    'attribute'=>'dii',
                    'mask'=>'99/99/9999',
                    'htmlOptions'=>array('size'=>6),
                ));           
            ?><b> >>> Este dado não pode ficar em branco!</b>
            <?php echo $form->error($model1,'dii'); ?>
        </div>
        
         <div class="row">
        <?php $models =Cid::model()->findAll(array('order' => 'codigo'));
                $data = array();
                foreach ($models as $cid)
                {$data[$cid->cid_id]=$cid->descr .' - '.$cid->codigo;}              
                    echo $form->dropDownList($model1, 'cid_id', $data, array(
                    'prompt' => 'Selecione o CID-10')); ?><b> >>> Dado obrigatório. Escolha um CID!</b>
        </div>
        
        <br>       
        <strong><font color="green">Dados do segurado-----------------------------------------------------------------------------------------------------------------------------------</font></strong><br/>             
         <div class="row">		
            <?php echo $form->labelEx($model2,'doc'); ?>
            <?php $this->widget('CMaskedTextField',array(
                    'model'=>$model2,
                    'attribute'=>'doc',
                    'mask'=>'999.99999.99-9',
                    'htmlOptions'=>array('size'=>11),
                ));           
            ?><b> >>> Dado obrigatório!</b>
            <?php echo $form->error($model2,'doc'); ?>
        </div>        		

        <div class="row">
		<?php echo $form->labelEx($model2,'nome'); ?>
		<?php echo $form->textField($model2,'nome',array('size'=>70,'maxlength'=>200)); ?><b> >>> Dado obrigatório</b>
		<?php echo $form->error($model2,'nome'); ?>
	</div>
        <br><b>Em caso de telefone móvel, digite os onze dígitos (só números no formato nnNNNNNnnnn).<br>
	nn - operadora (DDD)<br>
	NNNNN - prefixo<br>
	nnnn - sufixo</b><br>
	
        <div class="row">
		<div class="fone">
		<?php echo $form->labelEx($model5,'fone0', array('style'=>'width:100px;')); ?>
		<?php echo $form->textField($model5,'fone0',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model5,'fone0'); ?>
	
		<?php echo $form->labelEx($model5,'fone1', array('style'=>'width:100px;')); ?>
		<?php echo $form->textField($model5,'fone1',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model5,'fone1'); ?>
	
		<?php echo $form->labelEx($model5,'fone2', array('style'=>'width:100px;')); ?>
		<?php echo $form->textField($model5,'fone2',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model5,'fone2'); ?>
		</div>
	</div><br>
        
        <div class="row">				
            <?php echo $form->labelEx($model2,'renda'); ?>
            <?php $this->widget('CMaskedTextField',array(
                    'model'=>$model2,
                    'attribute'=>'renda',
                    'mask'=>'99.999,99',                    
                    'htmlOptions'=>array('size'=>6),
                ));           
            ?><b> >>> Dado não obrigatório. Preencha os dez dígitos (só números).</b>
            <?php echo $form->error($model2,'renda'); ?>
        </div>
                
        <div class="compactRadioGroup">		
            <?php echo $form->labelEx($model2, 'sex'); ?>
            <?php echo $form->radioButtonList($model2, 'sex', array('0'=>'Masculino', '1'=>'Feminino'), array('separator'=>' '))?><b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;>>>Obrigado a informar o sexo!</b>
            <?php echo $form->error($model2,'sexo'); ?>
	</div>
        
         <div class="row">		 
            <?php echo $form->labelEx($model2,'dn'); ?>
            <?php $this->widget('CMaskedTextField',array(
                    'model'=>$model2,
                    'attribute'=>'dn',
                    'mask'=>'99/99/9999',
                    'htmlOptions'=>array('size'=>6),
                ));           
	    ?><b> >>> Dado obrigatório</b>
            <?php echo $form->error($model2,'dn'); ?>
        </div>
        
        <div class="row">		
        <?php $modele = Escol::model()->findAll(array('order' => 'escol_id'));
        $data1 = array();
        foreach ($modele as $escol)
        {$data1[$escol->escol_id] = $escol->descr;}
        echo $form->dropDownList($model2, 'escol_id', $data1, array(
        'prompt' => 'Selecione uma escolaridade'));
        ?><b> >>> Dado obrigatório (pode escolher "não informado")</b>
        </div>
        
        <div class="row">		
        <?php $models = $model3->findAll(array('order' => 'nome'));
        $data = array();
        foreach ($models as $cidade)
        {$data[$cidade->id]=$cidade->nome .' - '.$cidade->uf;}
        echo $form->dropDownList($model2, 'munic_id', $data, array(
        'prompt' => 'Selecione um município'));
        ?><b> >>> Dado obrigatório (pode escolher "não informado")</b>
        </div>
               
        <div class="row">		
        <?php $modela = Prof::model()->findAll(array('order' => 'descr'));
        $datos = array();
        foreach ($modela as $prof)
        {$datos[$prof->prof_id]=$prof->descr .' - '. $prof->prof_id;}
        echo $form->dropDownList($model2, 'prof_id', $datos, array(
        'prompt' => 'Selecione uma profissão'));
        ?><b> >>> Dado obrigatório (pode escolher "não informado")</b>
        </div>
        
        <div class="row">		
        <?php $modelu = Emp::model()->findAll(array('order' => 'nome_emp'));
        $datus = array();
        foreach ($modelu as $emp)
        {$datus[$emp->emp_id]=$emp->nome_emp;}
        echo $form->dropDownList($model2, 'emp_id', $datus, array(
        'prompt' => 'Selecione uma empresa'));
        ?><b> >>> Dado obrigatório.<br>Caso nome do empregador não apareça, você pode escolher "não informado" ou fazer o cadastro em Empregadores</b>
        </div>
               
        <br/>
        
        <div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Registrar dados' : 'Alterar dados'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->