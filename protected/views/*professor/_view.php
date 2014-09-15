<?php
/* @var $this ProfessorController */
/* @var $data Professor */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('usuario_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->usuario_id), array('view', 'id'=>$data->usuario_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('titulo')); ?>:</b>
	<?php echo CHtml::encode($data->titulo); ?>
	<br />


</div>