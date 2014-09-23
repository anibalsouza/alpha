<?php
/* @var $this AdminController */
/* @var $data Admin */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nome_conhecido')); ?>:</b>
	<?php echo CHtml::encode($data->nome_conhecido); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nome_completo')); ?>:</b>
	<?php echo CHtml::encode($data->nome_completo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
	<?php echo CHtml::encode($data->email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('equipe_id')); ?>:</b>
	<?php echo CHtml::encode($data->equipe_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_type')); ?>:</b>
	<?php echo CHtml::encode($data->user_type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pass')); ?>:</b>
	<?php echo CHtml::encode($data->pass); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('cpf')); ?>:</b>
	<?php echo CHtml::encode($data->cpf); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('endereco_rua')); ?>:</b>
	<?php echo CHtml::encode($data->endereco_rua); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('endereco_numero')); ?>:</b>
	<?php echo CHtml::encode($data->endereco_numero); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('endereco_complemento')); ?>:</b>
	<?php echo CHtml::encode($data->endereco_complemento); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('endereco_cep')); ?>:</b>
	<?php echo CHtml::encode($data->endereco_cep); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('telefone_residencial')); ?>:</b>
	<?php echo CHtml::encode($data->telefone_residencial); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('telefone_celular')); ?>:</b>
	<?php echo CHtml::encode($data->telefone_celular); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('objetivo')); ?>:</b>
	<?php echo CHtml::encode($data->objetivo); ?>
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

	<b><?php echo CHtml::encode($data->getAttributeLabel('status_pagamento')); ?>:</b>
	<?php echo CHtml::encode($data->status_pagamento); ?>
	<br />

	*/ ?>

</div>