<?php
namespace frontend\controllers;
use backend\models\Blog;

class BlogController extends \yii\web\Controller
{
    public function actionIndex()
    {
    	$blog = new Blog();
        $index = $blog->getAllBlog();
        // var_dump($page); die;
        $page = $blog->getAllBlogpage();
        return $this->render('index', ['blog' => $index, 'page'=>$page]);
    }

      public function actionDetail($slug)
    {
    	$blog = new Blog();
    	$blognew = $blog->getDetail($slug);
        return $this->render('detail', ['blogdetail'=>$blognew]);
    }

}