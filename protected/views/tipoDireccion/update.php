<?php
/* @var $this TipoDireccionController */
/* @var $model TipoDireccion */
?>

<?php
$this->breadcrumbs=array(
	'Tipo Direccions'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List TipoDireccion', 'url'=>array('index')),
	array('label'=>'Create TipoDireccion', 'url'=>array('create')),
	array('label'=>'View TipoDireccion', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage TipoDireccion', 'url'=>array('admin')),
);
?>

    <h1>Update TipoDireccion <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>