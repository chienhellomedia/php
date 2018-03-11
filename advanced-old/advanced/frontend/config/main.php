<?php 
 use yii\web\Request;
 $baseUrl = str_replace('/frontend/web', '', (new Request)->getBaseUrl());
 ?>
<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'modules' => [
        'comments' => [
            'class' => 'frontend\modules\comments\comments',
        ],
    ],
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
        
        'baseUrl' => $baseUrl,
         
        'urlManager' => [
            'baseUrl' => $baseUrl,
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                'trang-chu' => 'site/index',
                'bai-viet' => 'blog/index',
                'san-pham-yeu-thich' => 'wishlist/index',
                'gio-hang' => 'cart/index',
                'dang-ky-dang-nhap' => 'site/login',
                 'san-pham-<slug>' => 'product/index',
                 'san-pham/<slug>' => 'product/detail',
            ],
        ],
       
        
    ],
    'params' => $params,
];
