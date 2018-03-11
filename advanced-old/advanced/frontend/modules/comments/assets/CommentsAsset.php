<?php

namespace frontend\modules\comments\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class CommentsAsset extends AssetBundle {

    public $sourcePath = '@frontend/modules/comments/assets';
    public $css = [

    ];
    public $js = [
        // 'js/myJS.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
    

}