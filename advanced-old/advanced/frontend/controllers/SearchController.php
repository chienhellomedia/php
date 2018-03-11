<?php

namespace frontend\controllers;
use backend\models\Product;
use backend\models\Blog;
use Yii;

class SearchController extends \yii\web\Controller
{
	public function actionIndex()
	{
		if (Yii::$app->request->get()) {
    		// var_dump(Yii::$app->request->get()); die;
			$filter = Yii::$app->request->get()["option"];
			if (Yii::$app->request->get()["key"]) {
				$name = Yii::$app->request->get()["key"];
			} else {
				return $this->render('index');
			}    		
			switch ($filter) {
				case 'product':
				$product = new Product();
				$data = $product->getAllProductSearch($name);
					// var_dump($data); die;
				$pages = $product->getAllProductSearchPage($name);
				return $this->render('productsearch', ['datapro'=>$data, 'pages'=>$pages]);
				break;

				case 'news':
				$blog = new Blog();
				$data = $blog->getAllBlogSearch($name);
					// var_dump($data); die;
				$pages = $blog->getAllBlogSearchPage($name);
				return $this->render('blogsearch', ['blog'=>$data, 'pages'=>$pages]);
				break;

				default:
					// code...
				break;
			}
		}
		return $this->render('index');
	}





}
