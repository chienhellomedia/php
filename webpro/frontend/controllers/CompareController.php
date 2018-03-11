<?php

namespace frontend\controllers;
use Yii;
use frontend\components\Compare;
use backend\models\Product;

class CompareController extends \yii\web\Controller
{
	/*
	Cart class to manage Shopping Cart
	 */
	public function actionIndex()
	{
		$comparestore = new Compare();
		 $compare = $comparestore->comparestore;   
		// var_dump($comparestore->comparestore); die;
		return $this->render('index', ['compare' => $compare]);
	}

	public function actionAddcompare($id)
	{

		$data = new Product();
		$product = $data->getOneProduct($id);
		$compare = new Compare();   
		if ($product) {
			$compare->addcompare($product);       
		} else {
			echo 'Error';
		}
  // echo '<pre>';
  // print_r($compare->comparestore);
  // echo '</pre>';

	}


	public function actionRemove($id)
	{

		$compare = new Compare();  
		$compare->removecompare($id);
		
	}


}
