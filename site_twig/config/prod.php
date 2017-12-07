<?php

// configure your app for the production environment

$app['twig.path'] = array(__DIR__.'/../templates');
//$app['twig.options'] = array('cache' => __DIR__.'/../var/cache/twig');

$app->register(new Silex\Provider\SwiftmailerServiceProvider());


	

$app->register(new Silex\Provider\DoctrineServiceProvider(), array(

	'db.options' => array(
		'driver' => 'pdo_mysql',
		'host' => 'localhost',
		'dbname' => 'balance_ton_code',
		'user' => 'root',
		'password' => '',
		'charset'   => 'utf8'
	)
));

$app['swiftmailer.options'] = array(
    'host' => 'auth.smtp.1and1.fr',
    'port' => '587',
    'username' => 'projet@boisseau-informatique.fr',
    'password' => 'Projetwf3',
    'encryption' => 'tls',
    'auth_mode' => null,
    'swiftmailer.sender_address' => 'damien.flogny@gmail.com',
);

$app->register(new Silex\Provider\SessionServiceProvider());

/*$app['twig']->addExtension(new Twig_Extensions_Extension_Intl());*/