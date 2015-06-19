<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
        <?php Yii::app()->bootstrap->register(); ?>
        
</head>

<body>

<div class="container" id="page">

	<div id="header">
		<div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?></div>
	</div><!-- header -->

	<div id="mainmenu">
            <?php
            $this->widget('bootstrap.widgets.TbNavbar', array(
                'brandLabel' => 'Sisteme de Credito', // default is static to top
                'display' => null, // default is static to top
                'items' => array(
                    array(
                        'class' => 'bootstrap.widgets.TbNav',
                        'items' => array(
                            array('label' => 'Home', 'url' => array('/site/index')),
                            array('label' => 'Persona', 'items' => array(
                                    array('label' => 'Agregar', 'url' => array('persona/create')),
                                    array('label' => 'Buscar', 'url' => array('persona/admin')),                                    
                                    array('label' => 'Agregar Tipo Documento', 'url' => array('tipoDocumento/create')),                                    
                                    array('label' => 'Agregar Tipo Direccion', 'url' => array('tipoDireccion/create')),                                    
                                    array('label' => 'Agregar Estado Civil', 'url' => array('estadoCivil/create')),                                    
                                    
                                ),'visible'=>!Yii::app()->user->isGuest),
                            array('label'=>'Administrar Usuarios', 'url'=>Yii::app()->user->ui->userManagementAdminUrl, 'visible'=>!Yii::app()->user->isGuest),
                            array('label'=>'Login'
                                    , 'url'=>Yii::app()->user->ui->loginUrl
                                    , 'visible'=>Yii::app()->user->isGuest),
                            array('label'=>'Logout ('.Yii::app()->user->name.')'
                                    , 'url'=>Yii::app()->user->ui->logoutUrl
                                    , 'visible'=>!Yii::app()->user->isGuest),
                            //array('label' => 'Login', 'url' => array('/site/login'), 'visible' => Yii::app()->user->isGuest),
                            //array('label' => 'Logout (' . Yii::app()->user->name . ')', 'url' => array('/site/logout'), 'visible' => !Yii::app()->user->isGuest)
                        ),
                    ),
                ),
            ));
            ?>
		
	</div><!-- mainmenu -->
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by My Company.<br/>
		All Rights Reserved.<br/>
		<?php echo Yii::powered(); ?>
	</div><!-- footer -->

</div><!-- page -->
<?php echo Yii::app()->user->ui->displayErrorConsole(); ?>
</body>
</html>
