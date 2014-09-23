<?php
/* @var $this AlunoController */
/* @var $model Aluno */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'aluno-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'nome_conhecido'); ?>
		<?php echo $form->textField($model,'nome_conhecido',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'nome_conhecido'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nome_completo'); ?>
		<?php echo $form->textField($model,'nome_completo',array('size'=>60,'maxlength'=>60)); ?>
		<?php echo $form->error($model,'nome_completo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>60)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pass'); ?>
		<?php echo $form->passwordField($model,'pass',array('size'=>16,'maxlength'=>16)); ?>
		<?php echo $form->error($model,'pass'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cpf'); ?>
		<?php echo $form->textField($model,'cpf',array('size'=>11,'maxlength'=>11)); ?>
		<?php echo $form->error($model,'cpf'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'endereco_rua'); ?>
		<?php echo $form->textField($model,'endereco_rua',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'endereco_rua'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'endereco_numero'); ?>
		<?php echo $form->textField($model,'endereco_numero'); ?>
		<?php echo $form->error($model,'endereco_numero'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'endereco_complemento'); ?>
		<?php echo $form->textField($model,'endereco_complemento',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'endereco_complemento'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'endereco_cep'); ?>
		<?php echo $form->textField($model,'endereco_cep',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'endereco_cep'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'telefone_residencial'); ?>
		<?php echo $form->textField($model,'telefone_residencial',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'telefone_residencial'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'telefone_celular'); ?>
		<?php echo $form->textField($model,'telefone_celular',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'telefone_celular'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'objetivo'); ?>
		<?php echo $form->textField($model,'objetivo',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'objetivo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'historico'); ?>
		<?php echo $form->textField($model,'historico',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'historico'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'gaming_level'); ?>
		<?php echo $form->textField($model,'gaming_level'); ?>
		<?php echo $form->error($model,'gaming_level'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'observacoes_medicas'); ?>
		<?php echo $form->textField($model,'observacoes_medicas',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'observacoes_medicas'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'registro_professor'); ?>
		<?php echo $form->textField($model,'registro_professor',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'registro_professor'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'plano_id'); ?>
		<?php echo $form->textField($model,'plano_id'); ?>
		<?php echo $form->error($model,'plano_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status_pagamento'); ?>
		<?php echo $form->textField($model,'status_pagamento',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'status_pagamento'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>


<?php $this->endWidget(); ?>

</div><!-- form -->