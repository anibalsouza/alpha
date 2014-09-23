<?php
/* @var $this AlunoController */
/* @var $model Aluno */

$this->breadcrumbs=array(
	'Alunos'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Aluno', 'url'=>array('index')),
	array('label'=>'Create Aluno', 'url'=>array('create')),
	array('label'=>'Update Aluno', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Aluno', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Aluno', 'url'=>array('admin')),
);
?>

<h1>View Aluno <?php echo $model->nome_conhecido; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
//		'id',
		'nome_conhecido',
		'nome_completo',
		'email',
		'equipe_id',
//		'user_type',
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