<?php
/* @var $this EquipeController */
/* @var $model Equipe */

$this->breadcrumbs=array(
	'Equipes'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Equipe', 'url'=>array('index')),
	array('label'=>'Create Equipe', 'url'=>array('create')),
	array('label'=>'Update Equipe', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Equipe', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Equipe', 'url'=>array('admin')),
);
?>

<h1>View Equipe #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nome',
		'usuario_id',
	),
)); ?>
