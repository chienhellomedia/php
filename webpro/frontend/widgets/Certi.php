<?php 

namespace frontend\widgets;

use yii\base\Widget;
use yii\helpers\Html;
use backend\models\Certificate;

class Certi extends Widget
{

    public function init()
    {
        parent::init();
    }

    public function run()
    {
    	$data = Certificate::find()->all();

        return $this->render('Certi', ['data'=>$data]);
    }
}

?>