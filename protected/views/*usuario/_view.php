<?php
/* @var $this UsuarioController */
/* @var $data Usuario */
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

	*/ ?>

</div>