<?php

namespace frontend\controllers;
use backend\models\Blog;

class BlogController extends \yii\web\Controller
{
    public function actionIndex()
    {
    	$model = new Blog();
    	$data['all'] = $model->getAllBlog();
    	$data['page'] = $model->getAllBlogpage();
        return $this->render('index', ['data'=>$data]);
    }

    public function actionDetail($slug) {
    	$model = new Blog();
    	$data = $model->getDetail($slug);
    	return $this->render('detail', ['data'=>$data]);
    }

}