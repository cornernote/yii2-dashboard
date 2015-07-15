<?php

return [
    'id' => 'yii2-dashboard-console',
    'name' => 'Yii2 Dashboard',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'tests\app\commands',
    'extensions' => require(VENDOR_DIR . '/yiisoft/extensions.php'),
    'bootstrap' => [
        'dashboard',
    ],
    'aliases' => [
        '@vendor' => VENDOR_DIR,
        '@cornernote/dashboard' => realpath(__DIR__ . '../../../../src'),
    ],
    'params' => [
        'supportEmail' => 'errors@example.com',
    ],
    'components' => [
        'cache' => [
            'class' => YII_ENV == 'heroku' ? 'yii\caching\FileCache' : 'yii\caching\DummyCache',
        ],
        'db' => require __DIR__ . '/db.php',
        'log' => [
            'traceLevel' => getenv('YII_TRACE_LEVEL'),
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning', 'info'],
                    'logFile' => '@app/runtime/logs/console.log',
                    'dirMode' => 0777
                ],
            ],
        ],
        'urlManager' => [
            'scriptUrl' => 'http://example.com/',
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