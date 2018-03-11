<?php

namespace frontend\controllers;
use backend\models\Product;
use backend\models\Category;
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

	public function actionDetail($slug) 
	{
		$product = new Product();
		$detail = $product->getOneProductBySlug($slug);
		return $this->render('detail', ['detail' => $detail]);
	}

	public function actionFilterprice() 
	{
		
		if ( Yii::$app->request->get()) {
			$a = Yii::$app->request->get('par1');
				
			$b = Yii::$app->request->get('par2');
			$slug = Yii::$app->request->get('slug');

			$cate = Category::find()->where(['slug'=>$slug])->one();
			$id = $cate->id;
			$product = new Product();
			$fil = $product->getAllProductByPrice($id, $a, $b);					
			$pages = $product->getAllProductByPricepage($id, $a, $b);					
			return $this->render('filter', ['fil' => $fil, 'pages'=>$pages]);
		} 
	} 	


	public function actionProfilter()
	{		
		if (Yii::$app->request->get('slug')) {
			$slug = Yii::$app->request->get('slug');
			$cate = Category::find()->where(['slug'=>$slug])->one();
			$id = $cate->id;

			if (Yii::$app->request->get('filter')) {
				$filter = Yii::$app->request->get('filter');

				switch ($filter) {

					case 'pricelowest':
					$product = new Product();
					$data = $product->getProLowestPrice($id);
					$pages = $product->getProLowestPricepage($id);
					return $this->render('productfilter', ['profilter'=>$data, 'pages'=>$pages]);
					break;

					case 'pricehighest':
					$product = new Product();
					$data = $product->getProHightestPrice($id);
					$pages = $product->getProHightestPricepage($id);
					return $this->render('productfilter', ['profilter'=>$data, 'pages'=>$pages]);
					break;

					case 'productname':
					$product = new Product();
					$data = $product->getProNameSort($id);
					$pages = $product->getProNameSortpage($id);
					return $this->render('productfilter', ['profilter'=>$data, 'pages'=>$pages]);
					break;

					default:
					$product = new Product();
					$data = $product->getAllProductBySlug($id);
					$datpagesa = $product->getAllProductBySlugpage($id);
					return $this->render('productfilter', ['profilter'=>$data, 'pages'=>$pages]);
					break;
				}
			} 		
		}		
	}



}
