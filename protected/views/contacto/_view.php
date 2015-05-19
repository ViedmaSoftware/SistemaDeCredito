<?php
/* @var $this ContactoController */
/* @var $data Contacto */
?>

<div class="view">

    	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('telefono_fijo')); ?>:</b>
	<?php echo CHtml::encode($data->telefono_fijo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('telefono_movil')); ?>:</b>
	<?php echo CHtml::encode($data->telefono_movil); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('telefono_laboral')); ?>:</b>
	<?php echo CHtml::encode($data->telefono_laboral); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('correo_electronico')); ?>:</b>
	<?php echo CHtml::encode($data->correo_electronico); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pagina_web')); ?>:</b>
	<?php echo CHtml::encode($data->pagina_web); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_persona')); ?>:</b>
	<?php echo CHtml::encode($data->id_persona); ?>
	<br />


</div>