<?php
/* @var $this ProfessorController */
/* @var $model Professor */

$this->breadcrumbs=array(
	'Professors'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Professor', 'url'=>array('index')),
	array('label'=>'Create Professor', 'url'=>array('create')),
	array('label'=>'Update Professor', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Professor', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Professor', 'url'=>array('admin')),
);
?>

<h1>View Professor #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nome_conhecido',
		'nome_completo',
		'email',
		'equipe_id',
		'user_type',
		'pass',
		'cpf',
		'endereco_rua',
		'endereco_numero',
		'endereco_complemento',
		'endereco_cep',
		'telefone_residencial',
		'telefone_celular',
		'objetivo',
		'historico',
		'gaming_level',
		'observacoes_medicas',
		'registro_professor',
		'plano_id',
		'status_pagamento',
	),
)); ?>
