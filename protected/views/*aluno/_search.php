<?php
/* @var $this AlunoController */
/* @var $model Aluno */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'usuario_id'); ?>
		<?php echo $form->textField($model,'usuario_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'objetivo_id'); ?>
		<?php echo $form->textField($model,'objetivo_id',array('size'=>60,'maxlength'=>100)); ?>
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