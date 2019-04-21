<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-api',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'api\controllers',
    'bootstrap' => ['log'],
    'modules' => [],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-api',
            // 目的是让Request接收到JSON数据
            'parsers' => [
                'application/json' => 'yii\web\JsonParser',
            ]
        ],
        'response' => [
            'class' => 'yii\web\Response',
            'on beforeSend' => function ($event) {
                $response = $event->sender;
                $response->data = [
                    'success' => $response->isSuccessful,
                    'code' => $response->getStatusCode(),
                    'data' => $response->data,
                    'message' => $response->statusText
                ];
                $response->statusCode = 200;
            },
        ],
        'user' => [
            'identityClass' => 'backend\models\Adminuser',
            'enableAutoLogin' => true,
            'enableSession' => false,
//            'identityCookie' => ['name' => '_identity-api', 'httpOnly' => true],
        ],
//        'session' => [
//            // this is the name of the session cookie used for login on the api
//            'name' => 'advanced-api',
//        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager', // or use 'yii\rbac\DbManager'
        ]
        /*
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        */

//        'urlManager' => [
//            'enablePrettyUrl' => true,
//            'enableStrictParsing' => true,
//            'showScriptName' => false,
//            'rules' => [
//                ['class' => 'yii\rest\UrlRule',
//                    'controller' => 'article',
//                    'ruleConfig'=>[
//                        'class'=>'yii\web\UrlRule',
//                        'defaults'=>[
//                            'expand'=>'createdBy',
//                        ]
//                    ],
//                    'extraPatterns'=>[
//                        'POST search' => 'search'
//                    ],
//                ],
//
//                ['class'=>'yii\rest\UrlRule',
//                    'controller'=>'top10',
//                    'except'=>['delete','create','update','view'],
//                    'pluralize'=>false,
//                ],
//
//                ['class'=>'yii\rest\UrlRule',
//                    'controller'=>'adminuser',
//                    'except'=>['delete','create','update','view'],
//                    'pluralize'=>false,
//                    'extraPatterns' => [
//                        'POST login' => 'login',
//                    ]
//
//                ],
//
//
//            ],
//        ],
    ],
    'params' => $params,
];
