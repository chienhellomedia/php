<?php 
namespace frontend\widgets;
use yii\base\Widget;
use yii\helpers\Html;
use backend\models\Product;

class Hotdeals extends Widget
{
    public function init()
    {
        parent::init();        
    }

    public function run()
    {
    	$hotdeal = new Product();
        $off = $hotdeal->getProOff();
        return $this->render('Hotdeals', ['off' => $off]);
    }
}