<?php
/* @var $this TipoDireccionController */
/* @var $model TipoDireccion */
?>

<?php
$this->breadcrumbs=array(
	'Tipo Direccions'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List TipoDireccion', 'url'=>array('index')),
	array('label'=>'Create TipoDireccion', 'url'=>array('create')),
	array('label'=>'Update TipoDireccion', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete TipoDireccion', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TipoDireccion', 'url'=>array('admin')),
);
?>

<h1>View TipoDireccion #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView',array(
    'htmlOptions' => array(
        'class' => 'table table-striped table-condensed table-hover',
    ),
    'data'=>$model,
    'attributes'=>array(
		'id',
		'detalle',
	),
)); ?>