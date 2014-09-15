<?php
/* @var $this AlunoController */
/* @var $model Aluno */

$this->breadcrumbs=array(
	'Alunos'=>array('index'),
	$model->usuario_id=>array('view','id'=>$model->usuario_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Aluno', 'url'=>array('index')),
	array('label'=>'Create Aluno', 'url'=>array('/usuario/create')),
	array('label'=>'View Aluno', 'url'=>array('view', 'id'=>$model->usuario_id)),
	array('label'=>'Manage Aluno', 'url'=>array('admin')),
);
?>

<h1>Update Aluno <?php echo $model->usuario_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>