<?php
/* @var $this AlunoController */
/* @var $model Aluno */

$this->breadcrumbs=array(
	'Alunos'=>array('index'),
	$model->usuario_id,
);

$this->menu=array(
	array('label'=>'List Aluno', 'url'=>array('index')),
	array('label'=>'Create Aluno', 'url'=>array('/usuario/create')),
	array('label'=>'Update Aluno', 'url'=>array('update', 'id'=>$model->usuario_id)),
	array('label'=>'Delete Aluno', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->usuario_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Aluno', 'url'=>array('admin')),
);
?>

<h1>View Aluno #<?php echo $model->usuario_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'usuario_id',
		'objetivo_id',
		'historico',
		'gaming_level',
		'observacoes_medicas',
		'registro_professor',
		'plano_id',
		'status_pagamento',
	),
)); ?>
