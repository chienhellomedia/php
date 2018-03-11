<?php 
namespace frontend\widgets;
use yii\base\Widget;
use yii\helpers\Html;
use frontend\components\Cart;

class CartdropDown extends Widget
{
	public function init()
	{
		parent::init();        
	}

	public function run()
	{
		$cart = new Cart();
		$cartstore = $cart->cartstore;
        // var_dump($cartstore);die;
		$cost = $cart->getCost;
        // var_dump($cost); die;
		$totalItem = $cart->getTotalItem();
		// var_dump($totalItem); die;
		return $this->render('CartdropDown', [
			'cartstore' => $cartstore,
			'cost' => $cost,                
			'totalItem' => $totalItem,        		
			]);
	}


}