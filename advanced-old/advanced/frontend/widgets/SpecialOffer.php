<?php 
namespace frontend\widgets;
use yii\base\Widget;
use yii\helpers\Html;
use backend\models\Product;

class SpecialOffer extends Widget
{
    public function init()
    {
        parent::init();        
    }

    public function run()
    {
    	$product = new Product;
    	$offer = $product->getProSepcialoffer();
        return $this->render('SpecialOffer', ['offer'=>$offer]);
    }
}