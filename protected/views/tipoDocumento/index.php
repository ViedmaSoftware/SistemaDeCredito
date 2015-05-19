<?php
/* @var $this TipoDocumentoController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	'Tipo Documentos',
);

$this->menu=array(
	array('label'=>'Create TipoDocumento','url'=>array('create')),
	array('label'=>'Manage TipoDocumento','url'=>array('admin')),
);
?>

<h1>Tipo Documentos</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>