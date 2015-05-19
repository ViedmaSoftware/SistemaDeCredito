<?php
/* @var $this DireccionController */
/* @var $model Direccion */
?>

<?php
$this->breadcrumbs=array(
	'Direccions'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Direccion', 'url'=>array('index')),
	array('label'=>'Create Direccion', 'url'=>array('create')),
	array('label'=>'Update Direccion', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Direccion', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Direccion', 'url'=>array('admin')),
);
?>

<h1>View Direccion #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView',array(
    'htmlOptions' => array(
        'class' => 'table table-striped table-condensed table-hover',
    ),
    'data'=>$model,
    'attributes'=>array(
		'id',
		'nombre',
		'nrocalle',
		'escalera',
		'piso',
		'departamento',
		'id_tipo_direccion',
		'id_localidad',
	),
)); ?>