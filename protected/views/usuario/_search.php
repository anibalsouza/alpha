<?php
/* @var $this UsuarioController */
/* @var $model Usuario */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nome_conhecido'); ?>
		<?php echo $form->textField($model,'nome_conhecido',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nome_completo'); ?>
		<?php echo $form->textField($model,'nome_completo',array('size'=>60,'maxlength'=>60)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>60)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'equipe_id'); ?>
		<?php echo $form->textField($model,'equipe_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'user_type'); ?>
		<?php echo $form->textField($model,'user_type'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'pass'); ?>
		<?php echo $form->passwordField($model,'pass',array('size'=>16,'maxlength'=>16)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cpf'); ?>
		<?php echo $form->textField($model,'cpf',array('size'=>11,'maxlength'=>11)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'endereco_rua'); ?>
		<?php echo $form->textField($model,'endereco_rua',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'endereco_numero'); ?>
		<?php echo $form->textField($model,'endereco_numero'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'endereco_complemento'); ?>
		<?php echo $form->textField($model,'endereco_complemento',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'endereco_cep'); ?>
		<?php echo $form->textField($model,'endereco_cep',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'telefone_residencial'); ?>
		<?php echo $form->textField($model,'telefone_residencial',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'telefone_celular'); ?>
		<?php echo $form->textField($model,'telefone_celular',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'objetivo'); ?>
		<?php echo $form->textField($model,'objetivo',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'historico'); ?>
		<?php echo $form->textField($model,'historico',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'gaming_level'); ?>
		<?php echo $form->textField($model,'gaming_level'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'observacoes_medicas'); ?>
		<?php echo $form->textField($model,'observacoes_medicas',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'registro_professor'); ?>
		<?php echo $form->textField($model,'registro_professor',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'plano_id'); ?>
		<?php echo $form->textField($model,'plano_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'status_pagamento'); ?>
		<?php echo $form->textField($model,'status_pagamento',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->