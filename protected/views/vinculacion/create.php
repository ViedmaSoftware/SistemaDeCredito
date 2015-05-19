<?php
/* @var $this VinculacionController */
/* @var $model Vinculacion */

$this->breadcrumbs=array(
	'Vinculacions'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Vinculacion', 'url'=>array('index')),
	array('label'=>'Manage Vinculacion', 'url'=>array('admin')),
);
?>

<h1>Create Vinculacion</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>