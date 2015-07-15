<?php

$config = [
    'id' => 'yii2-dashboard-web',
    'name' => 'Yii2 Dashboard Demo',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'tests\app\controllers',
    'extensions' => require(VENDOR_DIR . '/yiisoft/extensions.php'),
    'bootstrap' => [
        'cornernote\dashboard\Bootstrap', // "type": "yii2-extension" - does not work when this project is the root
        'dashboard',
    ],
    'aliases' => [
        '@vendor' => VENDOR_DIR,
        '@bower' => VENDOR_DIR . '/bower-asset',
        '@cornernote/dashboard' => realpath(__DIR__ . '../../../../src'),
    ],
    'params' => [
        'supportEmail' => 'test@example.com',
    ],
    'components' => [
        'assetManager' => [
            'basePath' => __DIR__ . '/../web/assets',
        ],
        'cache' => [
            'class' => 'yii\caching\DummyCache',
        ],
        'db' => require __DIR__ . '/db.php',
        //'errorHandler' => [
        //    'errorAction' => 'site/error',
        //],
        'log' => [
            'traceLevel' => getenv('YII_TRACE_LEVEL'),
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning', 'info'],
                    'logVars' => ['_GET', '_POST', '_FILES', '_COOKIE', '_SESSION'],
                    'logFile' => '@app/runtime/logs/web.log',
                    'dirMode' => 0777
                ],
            ],
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'useFileTransport' => true
        ],
        'request' => [
            'enableCsrfValidation' => false,
            'enableCookieValidation' => false
        ],
        'authManager' => [
            'class' => 'yii\rbac\PhpManager',
        ],
        'user' => [
            'identityClass' => 'tests\app\models\User',
        ],
    ],
    'modules' => [
        'dashboard' => [
            'class' => 'cornernote\dashboard\Module',
            'layouts' => [
                'default' => 'cornernote\dashboard\layouts\DefaultLayout',
                'example' => 'tests\app\dashboard\layouts\ExampleLayout',
            ],
            'panels' => [
                'text' => 'cornernote\dashboard\panels\TextPanel',
                'example' => 'tests\app\dashboard\panels\ExamplePanel',
            ],
        ],
    ],
];

if (defined('YII_APP_BASE_PATH')) {
    $config = Codeception\Configuration::mergeConfigs(
        $config,
        require YII_APP_BASE_PATH . '/tests/codeception/config/config.php'
    );
}

return $config;
