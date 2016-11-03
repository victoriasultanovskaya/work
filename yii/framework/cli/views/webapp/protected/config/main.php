<?php

// Set the path of Bootstrap to be the root of the project.
//Yii::setPathOfAlias('bootstrap', realpath(dirname(__FILE__).'/../../../'));

$config = array(
	'basePath'=>realpath(dirname(__FILE__).'/..'),
	'name'=>'Lixen Application',

	'preload'=>array(
		'bootstrap',
		'log',
	),

	'import'=>array(
		'application.models.*',
		'application.components.*',
        	'application.modules.user.models.*',
        	'application.modules.user.components.*',
	),

	'modules'=>array(
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'pass',
			'ipFilters'=>false,
			'generatorPaths'=>array('bootstrap.gii'),
		),
            'user'=>array(
                # encrypting method (php hash function)
                'hash' => 'md5',
                # send activation email
                'sendActivationMail' => true,
                # allow access for non-activated users
                'loginNotActiv' => false,
                # activate user on registration (only sendActivationMail = false)
                'activeAfterRegister' => false,
                # automatically login from registration
                'autoLogin' => true,
                # registration path
                'registrationUrl' => array('/user/registration'),
                # recovery password path
                'recoveryUrl' => array('/user/recovery'),
                # login form path
                'loginUrl' => array('/user/login'),
                # page after login
                'returnUrl' => array('/user/profile'),
                # page after logout
                'returnLogoutUrl' => array('/user/login'),
            ),

	),

	'components'=>array(
		'bootstrap'=>array(
			'class'=>'ext.bootstrap.components.Bootstrap',
			'responsiveCss'=>true,
		),
        	'user'=>array(
            	// enable cookie-based authentication
            		'class' => 'WebUser',
            		'allowAutoLogin'=>true,
            		'loginUrl' => array('/user/login'),
        	),
		'db'=>array(
			'connectionString' => 'pgsql:host=localhost;dbname=lixen',
			'emulatePrepare' => true,
			'username' => 'admin',
			'password' => '',
			'charset' => 'utf8',
			'tablePrefix' => 'tbl_',
		),
		'errorHandler'=>array(
			'errorAction'=>'site/error',
		),
		'fb'=>array(
			'class'=>'ext.facebook.components.FacebookConnect',
			'appID'=>'106265262835735',
			'appNamespace'=>'yii-bootstrap',
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
			),
		),
		'urlManager'=>array(
			'showScriptName'=>false,
			'urlFormat'=>'path',
			'urlSuffix'=>'.html',
			'rules'=>array(
				'index'=>'site/index',
				'setup'=>'site/setup',
			),
		),
	),

	// Application-level parameters
	'params'=>array(
		'appTitle'=>'Yii-Bootstrap - Bringing together the Yii PHP framework and Twitter\'s Bootstrap',
		'appDescription'=>'Yii-Bootstrap is an extension for Yii that provides a wide range of server-side widgets that allow you to easily use Bootstrap with Yii.',
	),
);

return file_exists(dirname(__FILE__).'/local.php')
		? CMap::mergeArray($config, require('local.php'))
		: $config;
