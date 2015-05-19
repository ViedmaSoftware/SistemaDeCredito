<?php
/* @var $this LaboralController */
/* @var $model Laboral */
?>

<?php
$this->breadcrumbs=array(
	'Laborals'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Laboral', 'url'=>array('index')),
	array('label'=>'Create Laboral', 'url'=>array('create')),
	array('label'=>'Update Laboral', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Laboral', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Laboral', 'url'=>array('admin')),
);
?>

<h1>View Laboral #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView',array(
    'htmlOptions' => array(
        'class' => 'table table-striped table-condensed table-hover',
    ),
    'data'=>$model,
    'attributes'=>array(
		'id',
		'ocupacion',
		'actividad',
		'sueldo',
		'ingreso',
		'nombre_institucion',
		'cuil_institucion',
	),
)); ?>