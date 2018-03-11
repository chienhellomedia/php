<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'authClientCollection' => [
        'class' => 'yii\authclient\Collection',
        'clients' => [
            'facebook' => [
                'class' => 'yii\authclient\clients\Facebook',
                'clientId' => '2000866363526208',
                'clientSecret' => '4cebe3cc1e2ea2580aab2cc4728a0ea0',
                ],
            ],
        ],
        
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
            ],
    ],
];
