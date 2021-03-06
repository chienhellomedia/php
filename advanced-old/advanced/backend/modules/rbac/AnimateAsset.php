<?php

namespace backend\modules\rbac;

use yii\web\AssetBundle;

/**
 * Description of AnimateAsset
 *
 * @author luongit <luongitvnsoft@gmail.com>
 * @since 2.5
 */
class AnimateAsset extends AssetBundle
{
    /**
     * @inheritdoc
     */
    public $sourcePath = '@backend/modules/rbac/assets';
    /**
     * @inheritdoc
     */
    public $css = [
        'animate.css',
    ];

}
