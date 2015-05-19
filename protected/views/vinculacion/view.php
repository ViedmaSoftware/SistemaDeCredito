<?php
/* @var $this VinculacionController */
/* @var $model Vinculacion */

$this->breadcrumbs=array(
	'Vinculacions'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Vinculacion', 'url'=>array('index')),
	array('label'=>'Create Vinculacion', 'url'=>array('create')),
	array('label'=>'Update Vinculacion', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Vinculacion', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Vinculacion', 'url'=>array('admin')),
);
?>

<h1>View Vinculacion #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'sigla',
		'detalle',
		'id_laboral',
	),
)); ?>
