<?php 
namespace frontend\widgets;
use yii\base\Widget;
use yii\helpers\Html;

class productag extends Widget
{
    public function init()
    {
        parent::init();        
    }

    public function run()
    {
    	$blog = new Blog();
    	$blog = $blog->getBlogrecent();
        return $this->render('productag');
    }
}