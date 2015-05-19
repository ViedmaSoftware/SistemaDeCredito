<?php
/* @var $this PersonaController */
/* @var $model Persona */
/* @var $form TbActiveForm */
?>

<div class="form">

    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'persona-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

    <p class="help-block">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>
    <?php echo $form->errorSummary($Direccion); ?>
    <?php echo $form->errorSummary($Contacto); ?>

            <?php echo $form->textFieldControlGroup($model,'nro_documento',array('span'=>5,'maxlength'=>15)); ?>

            <?php echo $form->textFieldControlGroup($model,'apellido',array('span'=>5,'maxlength'=>35)); ?>

            <?php echo $form->textFieldControlGroup($model,'nombre',array('span'=>5,'maxlength'=>35)); ?>

            <?php
            echo $form->labelEx($model,'nacimiento');
            $this->widget('zii.widgets.jui.CJuiDatePicker',array(
                        'model'=>$model,
                        'attribute'=>'xnacimiento', 
                        'language' => 'es',
                        // additional javascript options for the date picker plugin
                        'options'=>array(
                            'showAnim'=>'fold',
                        ),
                        'htmlOptions'=>array(
                            'style'=>'height:20px;'
                        ),
            ));
                    
                    
            ?>
    
            <?php echo $form->dropDownListControlGroup($model, 'sexo', 
                                                        array('Masculino'=>'Masculino','Femenino'=>'Femenino'),
                                                         array('empty' => 'Seleccionar')
                                                     ); ?>
            <?php echo $form->dropDownListControlGroup($model, 'id_tipo_documento', 
                                                        CHtml::listData(TipoDocumento::model()->findAll(),'id', 'sigla'),
                                                         array('empty' => 'Seleccionar')
                                                     ); ?>
            <?php echo $form->dropDownListControlGroup($model, 'id_estado_civil', 
                                                        CHtml::listData(EstadoCivil::model()->findAll(),'id', 'detalle'),
                                                         array('empty' => 'Seleccionar')
                                                     ); ?>

    
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
             
            <!--Contacto-->
            <?php echo $form->textFieldControlGroup($Contacto,'telefono_fijo',array('span'=>5,'maxlength'=>20)); ?>

            <?php echo $form->textFieldControlGroup($Contacto,'telefono_movil',array('span'=>5,'maxlength'=>20)); ?>

            <?php echo $form->textFieldControlGroup($Contacto,'telefono_laboral',array('span'=>5,'maxlength'=>20)); ?>

            <?php echo $form->textFieldControlGroup($Contacto,'correo_electronico',array('span'=>5,'maxlength'=>100)); ?>

            <?php echo $form->textFieldControlGroup($Contacto,'pagina_web',array('span'=>5,'maxlength'=>100)); ?>
 

        <div class="form-actions">
        <?php echo TbHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array(
		    'color'=>TbHtml::BUTTON_COLOR_PRIMARY,
		    'size'=>TbHtml::BUTTON_SIZE_LARGE,
		)); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->