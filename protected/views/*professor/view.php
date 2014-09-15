<?php
/* @var $this ProfessorController */
/* @var $model Professor */

$this->breadcrumbs=array(
	'Professors'=>array('index'),
	$model->usuario_id,
);

$this->menu=array(
	array('label'=>'List Professor', 'url'=>array('index')),
	array('label'=>'Create Professor', 'url'=>array('/usuario/create')),
	array('label'=>'Update Professor', 'url'=>array('update', 'id'=>$model->usuario_id)),
	array('label'=>'Delete Professor', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->usuario_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Professor', 'url'=>array('admin')),
);
?>

<h1>View Professor #<?php echo $model->usuario_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'usuario_id',
		'titulo',
	),
)); ?>
