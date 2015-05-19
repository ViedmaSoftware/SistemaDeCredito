<?php
/* @var $this VinculacionController */
/* @var $model Vinculacion */

$this->breadcrumbs=array(
	'Vinculacions'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Vinculacion', 'url'=>array('index')),
	array('label'=>'Create Vinculacion', 'url'=>array('create')),
	array('label'=>'View Vinculacion', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Vinculacion', 'url'=>array('admin')),
);
?>

<h1>Update Vinculacion <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>