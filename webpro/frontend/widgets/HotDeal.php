<?php 

namespace frontend\widgets;

use yii\base\Widget;
use yii\helpers\Html;
use backend\models\Product;

class HotDeal extends Widget
{

    public function init()
    {
        parent::init();
    }

    public function run()
    {
    	$hotdeal = new Product();
    	$data = $hotdeal->getAllProductHotDeal();
// var_dump($data); die;
        return $this->render('HotDeal', ['data'=>$data]);
    }
}

?>