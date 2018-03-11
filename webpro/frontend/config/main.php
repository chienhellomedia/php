<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);
use \yii\web\Request;
$baseUrl = str_replace('/frontend/web', '', (new Request)->getBaseUrl());

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-frontend',
            'baseUrl' => $baseUrl,
        ],
        'user' => [
            'identityClass' => 'common\models\Customer',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
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
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        
        'urlManager' => [
         'baseUrl' => $baseUrl,
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                 'trang-chu.html' => 'site/index',
                'tin-tuc/<slug>.html' => 'blog/detail',
                'tin-tuc.html' => 'blog/index',
                'lien-he.html' => 'site/contact',
                'cau-chuyen-hnh.html' => 'story/index',
                'thu-vien-anh.html' => 'imagesreal/index',
                'san-pham-yeu-thich.html' => 'wishlist/index',
                'gio-hang.html' => 'cart/index',
                'thanh-toan.html' => 'checkout/index',
                 'san-pham/<slug>.html/trang-<page>' => 'product/index',
                 'san-pham/<slug>.html' => 'product/index',
                 'san-pham-<slug>.html' => 'product/details',
                 '<slug>/<par1>-<par2>.html/trang-<page>' => 'product/filterprice',
                  'san-pham/<filter>/<slug>.html/trang-<page>' => 'product/profilter',
            ],
        ],
        
    ],
    'params' => $params,
];
