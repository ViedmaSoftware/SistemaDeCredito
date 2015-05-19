<?php
/* @var $this TipoDocumentoController */
/* @var $model TipoDocumento */
?>

<?php
$this->breadcrumbs=array(
	'Tipo Documentos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List TipoDocumento', 'url'=>array('index')),
	array('label'=>'Manage TipoDocumento', 'url'=>array('admin')),
);
?>

<h1>Create TipoDocumento</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>