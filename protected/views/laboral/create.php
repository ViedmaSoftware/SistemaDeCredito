<?php
/* @var $this LaboralController */
/* @var $model Laboral */
?>

<?php
$this->breadcrumbs=array(
	'Laborals'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Laboral', 'url'=>array('index')),
	array('label'=>'Manage Laboral', 'url'=>array('admin')),
);
?>

<h1>Create Laboral</h1>

<?php $this->renderPartial('_form', array('model'=>$model,'Direccion'=>$Direccion)); ?>