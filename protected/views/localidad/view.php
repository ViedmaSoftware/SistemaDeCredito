<?php
/* @var $this LocalidadController */
/* @var $model Localidad */
?>

<?php
$this->breadcrumbs=array(
	'Localidads'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Localidad', 'url'=>array('index')),
	array('label'=>'Create Localidad', 'url'=>array('create')),
	array('label'=>'Update Localidad', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Localidad', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Localidad', 'url'=>array('admin')),
);
?>

<h1>View Localidad #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView',array(
    'htmlOptions' => array(
        'class' => 'table table-striped table-condensed table-hover',
    ),
    'data'=>$model,
    'attributes'=>array(
		'id',
		'nombre',
		'codigo_postal',
		'codigo_telefono',
		'id_departamento',
	),
)); ?>