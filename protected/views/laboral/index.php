<?php
/* @var $this LaboralController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	'Laborals',
);

$this->menu=array(
	array('label'=>'Create Laboral','url'=>array('create')),
	array('label'=>'Manage Laboral','url'=>array('admin')),
);
?>

<h1>Laborals</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>