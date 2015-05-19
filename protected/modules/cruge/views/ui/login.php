<h1><?php echo CrugeTranslator::t('logon',"Login"); ?></h1>
<?php if(Yii::app()->user->hasFlash('loginflash')): ?>
<div class="flash-error">
	<?php echo Yii::app()->user->getFlash('loginflash'); ?>
</div>
<?php else: ?>
<div class="form">
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'login-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	//'enableAjaxValidation'=>true,
        'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
    )); ?>

	<?php echo $form->textFieldControlGroup($model,'username',array('span'=>3)); ?>
	
        <?php echo $form->passwordFieldControlGroup($model,'password',array('span'=>3)); ?>

        <?php echo $form->checkBox($model, 'rememberMe', array('label' => 'Remember me')); ?>

	
        <?php Yii::app()->user->ui->tbutton(CrugeTranslator::t('logon', "Login")); ?>
        <?php echo Yii::app()->user->ui->passwordRecoveryLink; ?>
        <?php
                if(Yii::app()->user->um->getDefaultSystem()->getn('registrationonlogin')===1)
                        echo Yii::app()->user->ui->registrationLink;
        ?>
	

	<?php
		//	si el componente CrugeConnector existe lo usa:
		//
		if(Yii::app()->getComponent('crugeconnector') != null){
		if(Yii::app()->crugeconnector->hasEnabledClients){ 
	?>
	<div class='crugeconnector'>
		<span><?php echo CrugeTranslator::t('logon', 'You also can login with');?>:</span>
		<ul>
		<?php 
			$cc = Yii::app()->crugeconnector;
			foreach($cc->enabledClients as $key=>$config){
				$image = CHtml::image($cc->getClientDefaultImage($key));
				echo "<li>".CHtml::link($image,
					$cc->getClientLoginUrl($key))."</li>";
			}
		?>
		</ul>
	</div>
	<?php }} ?>
	

<?php $this->endWidget(); ?>
</div>
<?php endif; ?>
