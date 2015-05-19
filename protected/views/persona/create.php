<?php
/* @var $this PersonaController */
/* @var $model Persona */
?>

<?php
$this->breadcrumbs=array(
	'Personas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Persona', 'url'=>array('index')),
	array('label'=>'Manage Persona', 'url'=>array('admin')),
);
?>

<h1>Create Persona</h1>

<?php $this->renderPartial('_form', array('model'=>$model,'Direccion'=>$Direccion,'Contacto'=>$Contacto)); ?>