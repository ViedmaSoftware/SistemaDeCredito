<?php
/* @var $this LaboralController */
/* @var $data Laboral */
?>

<div class="view">

    	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ocupacion')); ?>:</b>
	<?php echo CHtml::encode($data->ocupacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('actividad')); ?>:</b>
	<?php echo CHtml::encode($data->actividad); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sueldo')); ?>:</b>
	<?php echo CHtml::encode($data->sueldo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ingreso')); ?>:</b>
	<?php echo CHtml::encode($data->ingreso); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre_institucion')); ?>:</b>
	<?php echo CHtml::encode($data->nombre_institucion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cuil_institucion')); ?>:</b>
	<?php echo CHtml::encode($data->cuil_institucion); ?>
	<br />


</div>