<?php
/* @var $this AdminController */
/* @var $model Admin */

$this->breadcrumbs=array(
	'Admins'=>array('index'),
	$model->nome_conhecido=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Admin', 'url'=>array('index')),
	array('label'=>'Create Admin', 'url'=>array('create')),
	array('label'=>'View Admin', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Admin', 'url'=>array('admin')),
);
?>

<h1>Update Admin <?php echo $model->nome_conhecido; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>