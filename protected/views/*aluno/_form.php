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
		<?php echo $form->labelEx($model,'objetivo_id'); ?>
		<?php echo $form->textField($model,'objetivo_id',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'objetivo_id'); ?>
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