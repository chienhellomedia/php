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

		} else if (!Yii::$app->request->get('slug')) {
			$product = new Product();
			$datapro = $product->getAllProductRand();
			$pages = $product->getAllProductRandpage();
			return $this->render('index', ['datapro' => $datapro, 'pages'=>$pages]);
		}
	}

	public function actionDetail($slug) 
	{
		$product = new Product();
		$detail = $product->getOneProductBySlug($slug);
		// var_dump($detail); die;
		return $this->render('detail', ['detail' => $detail]);
	}

	public function actionFilterprice() 
	{

		if ( Yii::$app->request->get('par1') ) {
			$a = Yii::$app->request->get('par1');
			
			if (Yii::$app->request->get('par2')) {
				$b = Yii::$app->request->get('par2');

				if (Yii::$app->request->get('slug')) {
					$slug = Yii::$app->request->get('slug');

					$cate = Category::find()->where(['slug'=>$slug])->one();
					$id = $cate->id;
					$product = new Product();
					$fil = $product->getOneProductByPrice($id, $a, $b);					
					return $this->render('filter', ['fil' => $fil]);
				} else if (!Yii::$app->request->get('slug')) {					
					$product = new Product();
					$fil = $product->getOneProductPriceAll($a, $b);
					return $this->render('filter', ['fil' => $fil]);
				}
			} 	
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
					return $this->render('productfilter', ['profilter'=>$data]);
					break;

					case 'pricehighest':
					$product = new Product();
					$data = $product->getProHightestPrice($id);
					return $this->render('productfilter', ['profilter'=>$data]);
					break;

					case 'productname':
					$product = new Product();
					$data = $product->getProNameSort($id);
					return $this->render('productfilter', ['profilter'=>$data]);
					break;
					
					default:
					$product = new Product();
					$data = $product->getAllProductBySlug($id);
					return $this->render('productfilter', ['profilter'=>$data]);
					break;
				}
			} 		
		} else {
			if (Yii::$app->request->get('filter')) {
				$filter = Yii::$app->request->get('filter');

				switch ($filter) {

					case 'pricelowest':
					$product = new Product();
					$data = $product->getProLowestPriceNo();
					return $this->render('productfilter', ['profilter'=>$data]);
					break;

					case 'pricehighest':
					$product = new Product();
					$data = $product->getProHightestPriceNo();
					return $this->render('productfilter', ['profilter'=>$data]);
					break;

					case 'productname':
					$product = new Product();
					$data = $product->getProNameSortNo();
					return $this->render('productfilter', ['profilter'=>$data]);
					break;
					
					default:
					$product = new Product();
					$data = $product->getAllProductBySlug($id);
					return $this->render('productfilter', ['profilter'=>$data]);
					break;
				}
			} 
		}		
	}

	
	
}
