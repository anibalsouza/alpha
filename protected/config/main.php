<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	
	'defaultController' => 'site/index',
	
	'name'=>'Alpha Run!',
	'theme'=>'shadow_dancer',
	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'ext.mail.YiiMailMessage',
		'application.modules.bum.models.*',
    	'application.modules.bum.components.*',
	),

	'modules'=>array(
		'message' => array(
			'userModel' => 'Usuario',
			'getNameMethod' => 'getFullName',
			'getSuggestMethod' => 'getSuggest',
			),	
			
		'mailbox'=> array(  
    		'userClass' => 'Usuario',
    		'userIdColumn' => 'id',
    		'usernameColumn' =>  'nome_completo'
    		),
    	'bum'=>array(
    		'install' => false,
    		),
		
		
		
		/*'gii'=>array( // uncomment the following to enable the Gii tool
			'class'=>'system.gii.GiiModule',
			'password'=>'Enter Your Password H',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('*.*.*.*','::1'),
		),*/
		
	),

	// application components
	'components'=>array(
		'mail' => array(
    		'class' => 'ext.mail.YiiMail',
    		'transportType' => 'smtp',
		    'transportOptions' => array(
		        'host' => 'smtp.gmail.com',
		        'username' => 'contato.alpharun@gmail.com',
		        'password' => 'Alpha010203',
		        'port' => '465',
		        'encryption'=>'ssl',
				 ),
		    'viewPath' => 'bum.views.mail',
		    'logging' => false,
		    'dryRun' => false
			),

		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
			'class' => 'BumWebUser',
        	'loginUrl' => array('//bum/users/login'), // required
        ),
		
		'authManager'=>array(
        	'class'=>'CDbAuthManager',
        	'connectionID'=>'db',
        	),
		
		'widgetFactory'=>array(
            'widgets'=>array(
                'CGridView'=>array(
                    'htmlOptions'=>array('cellspacing'=>'0','cellpadding'=>'0'),
					'itemsCssClass'=>'item-class',
					'pagerCssClass'=>'pager-class'
                ),
                'CJuiTabs'=>array(
                    'htmlOptions'=>array('class'=>'shadowtabs'),
                ),
                'CJuiAccordion'=>array(
                    'htmlOptions'=>array('class'=>'shadowaccordion'),
                ),
                'CJuiProgressBar'=>array(
                   'htmlOptions'=>array('class'=>'shadowprogressbar'),
                ),
                'CJuiSlider'=>array(
                    'htmlOptions'=>array('class'=>'shadowslider'),
                ),
                'CJuiSliderInput'=>array(
                    'htmlOptions'=>array('class'=>'shadowslider'),
                ),
                'CJuiButton'=>array(
                    'htmlOptions'=>array('class'=>'shadowbutton'),
                ),
                'CJuiButton'=>array(
                    'htmlOptions'=>array('class'=>'shadowbutton'),
                ),
                'CJuiButton'=>array(
                    'htmlOptions'=>array('class'=>'button green'),
                ),
            ),
        ),
		
		
		// uncomment the following to enable URLs in path-format
		
		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		/*
		'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),
		*/
		// uncomment the following to use a MySQL database
		
		'db'=>array(
			'connectionString' => 'mysql:host=alphadb.ccpdawycehrd.us-west-2.rds.amazonaws.com;dbname=AlphaDB',
			'emulatePrepare' => true,
			'username' => 'AlphaUSER_45',
			'password' => 'an987kjhg$5%6*',
			'charset' => 'utf8',
			'tablePrefix' => '',
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
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				
				array(
					'class'=>'CWebLogRoute',
				),
				
			),
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'anibal.souza@gmail.com',
	),
);