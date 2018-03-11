<?php 

namespace frontend\widgets;

use yii\base\Widget;
use yii\helpers\Html;
use backend\models\Category;
use frontend\component\Cart;


class Header extends Widget
{
    public function init()
    {
        parent::init();
    }

    public function run()
    {
    	$cate = new Category();

        $cart = new Cart();
        $data['cartstore'] = $cart->cartstore;
        // var_dump($cartstore);die;
        $data['cost'] = $cart->getCost;
        // var_dump($cost); die;
        $data['totalItem'] = $cart->getTotalItem();
        // var_dump($totalItem); die;
        // 
        $data['cate'] = $cate->getAllCateRoot();

        return $this->render('Header', ['data'=>$data]);
    }
}

?>