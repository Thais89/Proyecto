<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'timezone' => 'America/Caracas',
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],    
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'zoTEjc11t6HDzCdUafGF78tp49hbF4ce',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => false,
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'smtp.gmail.com',
                'username' => 'deliverysc2016@gmail.com',
                'password' => 'Proyecto*2016',
                'port' => '587',          
                'encryption' => 'tls',
            ],
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => require(__DIR__ . '/db.php'),        
        
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                'home'              => 'site/index',
                'servicios'         => 'site/servicios',
                'acerca'            => 'site/about',
                'como-enviar'       => 'site/como-enviar',
                'contactos'         => 'site/contact',
                'registro-usuario'  => 'site/registro-usuario',
                'confirmar-usuario/<authKey>'  => 'site/confirmar-usuario',
                'usuarios/home'     => 'usuarios/index',
                'login'             => 'site/login',

            ],
        ],
        
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return $config;
