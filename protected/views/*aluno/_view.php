<?php
/* @var $this AlunoController */
/* @var $data Aluno */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('usuario_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->usuario_id), array('view', 'id'=>$data->usuario_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('objetivo_id')); ?>:</b>
	<?php echo CHtml::encode($data->objetivo_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('historico')); ?>:</b>
	<?php echo CHtml::encode($data->historico); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('gaming_level')); ?>:</b>
	<?php echo CHtml::encode($data->gaming_level); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('observacoes_medicas')); ?>:</b>
	<?php echo CHtml::encode($data->observacoes_medicas); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('registro_professor')); ?>:</b>
	<?php echo CHtml::encode($data->registro_professor); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('plano_id')); ?>:</b>
	<?php echo CHtml::encode($data->plano_id); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('status_pagamento')); ?>:</b>
	<?php echo CHtml::encode($data->status_pagamento); ?>
	<br />

	*/ ?>

</div>