<?php
/* @var $this TipoDireccionController */
/* @var $model TipoDireccion */
?>

<?php
$this->breadcrumbs=array(
	'Tipo Direccions'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List TipoDireccion', 'url'=>array('index')),
	array('label'=>'Manage TipoDireccion', 'url'=>array('admin')),
);
?>

<h1>Create TipoDireccion</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>