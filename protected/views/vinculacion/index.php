<?php
/* @var $this VinculacionController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Vinculacions',
);

$this->menu=array(
	array('label'=>'Create Vinculacion', 'url'=>array('create')),
	array('label'=>'Manage Vinculacion', 'url'=>array('admin')),
);
?>

<h1>Vinculacions</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
