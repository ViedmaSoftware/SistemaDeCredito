<?php
/* @var $this DireccionController */
/* @var $model Direccion */
/* @var $form TbActiveForm */
?>

<div class="form">

    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'direccion-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

    <p class="help-block">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

             <?php echo "<input type='hidden' name='Direccion[id_persona]' value='$id_persona'>"; ?>
            <?php echo $form->textFieldControlGroup($model,'nombre',array('span'=>5,'maxlength'=>35)); ?>

            <?php echo $form->textFieldControlGroup($model,'nrocalle',array('span'=>5,'maxlength'=>5)); ?>

            <?php echo $form->textFieldControlGroup($model,'escalera',array('span'=>5,'maxlength'=>5)); ?>

            <?php echo $form->textFieldControlGroup($model,'piso',array('span'=>5,'maxlength'=>5)); ?>

            <?php echo $form->textFieldControlGroup($model,'departamento',array('span'=>5,'maxlength'=>5)); ?>

            <?php echo $form->textFieldControlGroup($model,'id_tipo_direccion',array('span'=>5)); ?>

            <?php echo $form->textFieldControlGroup($model,'id_localidad',array('span'=>5)); ?>

        <div class="form-actions">
        <?php echo TbHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array(
		    'color'=>TbHtml::BUTTON_COLOR_PRIMARY,
		    'size'=>TbHtml::BUTTON_SIZE_LARGE,
		)); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->