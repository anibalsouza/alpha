<?php
/* @var $this ProfessorController */
/* @var $model Professor */

$this->breadcrumbs=array(
	'Professors'=>array('index'),
	$model->usuario_id=>array('view','id'=>$model->usuario_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Professor', 'url'=>array('index')),
	array('label'=>'Create Professor', 'url'=>array('/usuario/create')),
	array('label'=>'View Professor', 'url'=>array('view', 'id'=>$model->usuario_id)),
	array('label'=>'Manage Professor', 'url'=>array('admin')),
);
?>

<h1>Update Professor <?php echo $model->usuario_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>