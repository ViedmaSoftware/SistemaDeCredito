<?php
/* @var $this DepartamentoController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	'Departamentos',
);

$this->menu=array(
	array('label'=>'Create Departamento','url'=>array('create')),
	array('label'=>'Manage Departamento','url'=>array('admin')),
);
?>

<h1>Departamentos</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>