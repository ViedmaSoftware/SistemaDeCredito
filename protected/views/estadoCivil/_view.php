<?php
/* @var $this EstadoCivilController */
/* @var $data EstadoCivil */
?>

<div class="view">

    	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('detalle')); ?>:</b>
	<?php echo CHtml::encode($data->detalle); ?>
	<br />


</div>