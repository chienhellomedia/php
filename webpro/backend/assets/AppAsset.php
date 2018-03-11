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
        'css/site.css',
        'css/croppie.css',
        'css/font-awesome.min.css',
        'css/custom.css',
    ];
    public $js = [
        'js/croppie.min.js',
        'js/crop.js',
        'tinymce/tinymce.min.js',
        'tinymce/tinymce.js',
        'js/main.js',
        
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
