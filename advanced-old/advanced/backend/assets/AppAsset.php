<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
    'css/font-awesome.min.css',
    'css/main.css',
    'css/jquery-ui.css',
    'css/customize.css',
    ];
    public $js = [
    'js/bootstrap.min.js',
    'js/jquery-ui.js',
    'js/plugins/pace.min.js',
    'js/main.js',
    'tinymce/tinymce.min.js',
    'js/tinymce.js',
    'js/function.js',

    ];
    public $depends = [
    'yii\web\YiiAsset',
    'yii\bootstrap\BootstrapAsset',
    ];
}
