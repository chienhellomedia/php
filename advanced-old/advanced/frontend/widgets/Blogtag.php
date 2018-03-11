<?php 
namespace frontend\widgets;
use yii\base\Widget;
use yii\helpers\Html;
use backend\models\Blog;

class Blogtag extends Widget
{
    public function init()
    {
        parent::init();        
    }

    public function run()
    {
    	$blog = new Blog();
    	$blog = $blog->getBlogrecent();
        return $this->render('Blogtag', ['blog'=>$blog]);
    }
}