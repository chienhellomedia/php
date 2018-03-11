<?php 
namespace frontend\widgets;
use yii\base\Widget;
use yii\helpers\Html;
use backend\models\Category;

class Header extends Widget
{
    public function init()
    {
        parent::init();        
    }

    public function run()
    {
    	$cate = new Category();
    	$parent = $cate->getAllCateRoot();    	
    	// echo "<pre>";
    	// var_dump($parent); die;
        return $this->render('Header', 
        	[
        		'parent' => $parent,
        		
        	]);
    }
}