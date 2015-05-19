<?php
/* @var $this LaboralController */
/* @var $model Laboral */
?>

<?php
$this->breadcrumbs=array(
	'Laborals'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Laboral', 'url'=>array('index')),
	array('label'=>'Create Laboral', 'url'=>array('create')),
	array('label'=>'View Laboral', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Laboral', 'url'=>array('admin')),
);
?>

    <h1>Update Laboral <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>