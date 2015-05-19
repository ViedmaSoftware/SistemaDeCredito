<?php
/* @var $this TipoDireccionController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	'Tipo Direccions',
);

$this->menu=array(
	array('label'=>'Create TipoDireccion','url'=>array('create')),
	array('label'=>'Manage TipoDireccion','url'=>array('admin')),
);
?>

<h1>Tipo Direccions</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>