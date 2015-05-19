<?php
/* @var $this LaboralController */
/* @var $model Laboral */
/* @var $form TbActiveForm */
?>

<div class="form">

    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'laboral-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

    <p class="help-block">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

            <?php echo $form->textFieldControlGroup($model,'ocupacion',array('span'=>5,'maxlength'=>45)); ?>

            <?php echo $form->textFieldControlGroup($model,'actividad',array('span'=>5,'maxlength'=>45)); ?>

            <?php echo $form->textFieldControlGroup($model,'sueldo',array('span'=>5,'maxlength'=>10)); ?>

            <?php echo $form->textFieldControlGroup($model,'ingreso',array('span'=>5)); ?>

            <?php echo $form->textFieldControlGroup($model,'nombre_institucion',array('span'=>5,'maxlength'=>50)); ?>

            <?php echo $form->textFieldControlGroup($model,'cuil_institucion',array('span'=>5,'maxlength'=>45)); ?>
    
    <!--Direccion-->
    
            <?php echo $form->textFieldControlGroup($Direccion,'nombre',array('span'=>5,'maxlength'=>35)); ?>

            <?php echo $form->textFieldControlGroup($Direccion,'nrocalle',array('span'=>5,'maxlength'=>5)); ?>

            <?php echo $form->textFieldControlGroup($Direccion,'escalera',array('span'=>5,'maxlength'=>5)); ?>

            <?php echo $form->textFieldControlGroup($Direccion,'piso',array('span'=>5,'maxlength'=>5)); ?>

            <?php echo $form->textFieldControlGroup($Direccion,'departamento',array('span'=>5,'maxlength'=>5)); ?>
            
            <?php echo $form->dropDownListControlGroup($Direccion, 'id_tipo_direccion', 
                                                CHtml::listData(TipoDireccion::model()->findAll(),'id', 'detalle'),
                                                 array('empty' => 'Seleccionar')
                                             ); ?>
            
            <?php echo $form->dropDownListControlGroup($Direccion, 'id_localidad', 
                                                CHtml::listData(Localidad::model()->findAll(),'id', 'nombre'),
                                                 array('empty' => 'Seleccionar')
                                             ); ?>

            <?php echo $form->textFieldControlGroup($Direccion,'id_localidad',array('span'=>5)); ?>

        <div class="form-actions">
        <?php echo TbHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array(
		    'color'=>TbHtml::BUTTON_COLOR_PRIMARY,
		    'size'=>TbHtml::BUTTON_SIZE_LARGE,
		)); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->