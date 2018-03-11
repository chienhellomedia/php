<?php

namespace frontend\controllers;
use backend\models\Product;
use backend\models\Category;
use backend\models\Images;
use Yii;

class ProductController extends \yii\web\Controller
{
	public function actionIndex()
	{
		if (Yii::$app->request->get('slug')) {
			$slug = Yii::$app->request->get('slug');
			$cate = Category::find()->where(['slug'=>$slug])->one();
			$id = $cate->id;
			$product = new Product();
			$datapro = $product->getAllProductBySlug($id);
			$pages = $product->getAllProductBySlugPage($id);			
			return $this->render('index', ['datapro' => $datapro, 'pages'=>$pages]);
		} else {
			return $this->render('index');
		}
	}

	public function actionDetails($slug) 
	{
		$product = new Product();
		$detail = $product->getOneProductBySlug($slug);
		$other = $product->getAllProductdetailRand();
		$images = Images::find()->where(['product_id'=>$detail->id])->all();
		return $this->render('details', [
			'detail' => $detail,
			'other' => $other,
			'images' => $images,
		]);
	}

	public function actionFilter() 
	{
		if ( Yii::$app->request->get()) {
			$a = Yii::$app->request->get('par1');

			$b = Yii::$app->request->get('par2');

			$slug = Yii::$app->request->get('slug');

			$cate = Category::find()->where(['slug'=>$slug])->one();
			$id = $cate->id;
			$product = new Product();
			$filter = $product->getAllProductByPrice($id, $a, $b);					
			$pages = $product->getAllProductByPricepage($id, $a, $b);	
			// var_dump($filter); die;			
			return $this->render('filter', ['filter' => $filter, 'pages'=>$pages]);
		} 
	} 	

}
