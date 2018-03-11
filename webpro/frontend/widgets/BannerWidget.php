<?php 

namespace frontend\widgets;

use yii\base\Widget;
use yii\helpers\Html;
use backend\models\Banner;

class BannerWidget extends Widget
{

    public function init()
    {
        parent::init();
    }

    public function run()
    {
    	$data  = Banner::find()->where(['status'=>10])->all();
        return $this->render('BannerWidget', ['data'=>$data]);
    }
}

?>