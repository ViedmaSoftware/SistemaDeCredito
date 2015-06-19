<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Sistema de credito',
        'language'=>'es_ar',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models._base.*',
		'application.models.*',
		'application.components.*',
                'bootstrap.helpers.*',
                'bootstrap.widgets.*',
                'bootstrap.behaviors.*',
                'application.modules.cruge.components.*',
                'application.modules.cruge.extensions.crugemailer.*',
                
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'123456',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
                        'generatorPaths' => array('bootstrap.gii'),
		),
            
                'cruge'=>array(
                        'tableprefix'=>'cruge_',

                        // para que utilice a protected.modules.cruge.models.auth.CrugeAuthDefault.php
                        //
                        // en vez de 'default' pon 'authdemo' para que utilice el demo de autenticacion alterna
                        // para saber mas lee documentacion de la clase modules/cruge/models/auth/AlternateAuthDemo.php
                        //
                        'availableAuthMethods'=>array('default'),

                        'availableAuthModes'=>array('username','email'),

                        // url base para los links de activacion de cuenta de usuario
                        'baseUrl'=>'http://coco.com/',

                         // NO OLVIDES PONER EN FALSE TRAS INSTALAR
                         'debug'=>false,
                         'rbacSetupEnabled'=>false,
                         'allowUserAlways'=>false,

                        // MIENTRAS INSTALAS..PONLO EN: false
                        // lee mas abajo respecto a 'Encriptando las claves'
                        //
                        'useEncryptedPassword' => false,

                        // Algoritmo de la función hash que deseas usar
                        // Los valores admitidos están en: http://www.php.net/manual/en/function.hash-algos.php
                        'hash' => 'md5',

                        // Estos tres atributos controlan la redirección del usuario. Solo serán son usados si no
                        // hay un filtro de sesion definido (el componente MiSesionCruge), es mejor usar un filtro.
                        //  lee en la wiki acerca de:
                        //   "CONTROL AVANZADO DE SESIONES Y EVENTOS DE AUTENTICACION Y SESION"
                        //
                        // ejemplo:
                        //		'afterLoginUrl'=>array('/site/welcome'),  ( !!! no olvidar el slash inicial / )
                        //		'afterLogoutUrl'=>array('/site/page','view'=>'about'),
                        //
                        'afterLoginUrl'=>null,
                        'afterLogoutUrl'=>null,
                        'afterSessionExpiredUrl'=>null,

                        // manejo del layout con cruge.
                        //
                        'loginLayout'=>'//layouts/column1',
                        'registrationLayout'=>'//layouts/column2',
                        'activateAccountLayout'=>'//layouts/column2',
                        'editProfileLayout'=>'//layouts/column2',
                        // en la siguiente puedes especificar el valor "ui" o "column2" para que use el layout
                        // de fabrica, es basico pero funcional.  si pones otro valor considera que cruge
                        // requerirá de un portlet para desplegar un menu con las opciones de administrador.
                        //
                        'generalUserManagementLayout'=>'ui',

                        // permite indicar un array con los nombres de campos personalizados, 
                        // incluyendo username y/o email para personalizar la respuesta de una consulta a: 
                        // $usuario->getUserDescription(); 
                        'userDescriptionFieldsArray'=>array('email'), 

                ),//cruge
            
            'Administracion',
		
	),

	// application components
	'components'=>array(
                'user'=>array(
                        'allowAutoLogin'=>true,
                        'class' => 'application.modules.cruge.components.CrugeWebUser',
                        'loginUrl' => array('/cruge/ui/login'),
                ),
                'authManager' => array(
                        //'class' => 'application.modules.cruge.components.CrugeAuthManager',
                         'class' => 'application.components.MyCrugeAuthManager',
                ),
                'crugemailer'=>array(
                        'class' => 'application.modules.cruge.components.CrugeMailer',
                        'mailfrom' => 'email-desde-donde-quieres-enviar-los-mensajes@xxxx.com',
                        'subjectprefix' => 'Tu Encabezado del asunto - ',
                        'debug' => true,
                ),
                /*'format' => array(
                        'datetimeFormat'=>"d M, Y h:m:s a",
                ),*/
            
               'format'=> array('class'=>'CLocalizedFormatter'),
		/*'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),*/
		// uncomment the following to enable URLs in path-format
		
		//predeterminado
                'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		/*'urlManager'=>array(
                    'urlFormat'=>'path',
                    'rules'=>array(
                        'post/<id:\d+>/<title:.*?>'=>'post/view',
                        'posts/<tag:.*?>'=>'post/index',
                        // REST patterns
                        array('api/list', 'pattern'=>'api/<model:\w+>', 'verb'=>'GET'),
                        array('api/view', 'pattern'=>'api/<model:\w+>/<id:\d+>', 'verb'=>'GET'),
                        array('api/update', 'pattern'=>'api/<model:\w+>/<id:\d+>', 'verb'=>'PUT'),
                        array('api/delete', 'pattern'=>'api/<model:\w+>/<id:\d+>', 'verb'=>'DELETE'),
                        array('api/create', 'pattern'=>'api/<model:\w+>', 'verb'=>'POST'),
                        // Other controllers
                        '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
                    ),
                ),*/
		'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),
		// uncomment the following to use a MySQL database
		
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=lacomarca',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => '',
			'charset' => 'utf8',
		),
		
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning, rbac',
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),
            
             // yiistrap configuration
                'bootstrap' => array(
                    'class' => 'bootstrap.components.TbApi',
                ),
                
                
                // yiiwheels configuration
                'yiiwheels' => array(
                    'class' => 'yiiwheels.YiiWheels',   
                ),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'webmaster@example.com',
	),
    
     // path aliases
    'aliases' => array(
        // yiistrap configuration
        'bootstrap' => realpath(__DIR__ . '/../extensions/bootstrap'), // change if necessary
        // yiiwheels configuration
        'yiiwheels' => realpath(__DIR__ . '/../extensions/yiiwheels'), // change if necessary
    ),
);