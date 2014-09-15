<?php
/* @var $this EquipeController */
/* @var $model Equipe */

$this->breadcrumbs=array(
	'Equipes'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Equipe', 'url'=>array('index')),
	array('label'=>'Create Equipe', 'url'=>array('create')),
	array('label'=>'View Equipe', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Equipe', 'url'=>array('admin')),
);
?>

<h1>Update Equipe <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>