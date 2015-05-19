<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Login',
);
?>

<h1>Login</h1>

<p>Please fill out the following form with your login credentials:</p>

<div class="form">

    
    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'login-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>true,
        'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
    )); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	
                <?php echo $form->textFieldControlGroup($model,'username',array('span'=>3)); ?>
	


                <?php echo $form->passwordFieldControlGroup($model,'password',array('span'=>3)); ?>
		<p class="hint">
			Hint: You may login with <kbd>demo</kbd>/<kbd>demo</kbd> or <kbd>admin</kbd>/<kbd>admin</kbd>.
		</p>


                <?php echo $form->checkBox($model, 'rememberMe', array('label' => 'Remember me')); ?>
	


		<?php echo CHtml::submitButton('Login'); ?>

    <?php $this->endWidget(); ?>
</div><!-- form -->
