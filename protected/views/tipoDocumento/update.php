<?php
/* @var $this TipoDocumentoController */
/* @var $model TipoDocumento */
?>

<?php
$this->breadcrumbs=array(
	'Tipo Documentos'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List TipoDocumento', 'url'=>array('index')),
	array('label'=>'Create TipoDocumento', 'url'=>array('create')),
	array('label'=>'View TipoDocumento', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage TipoDocumento', 'url'=>array('admin')),
);
?>

    <h1>Update TipoDocumento <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>