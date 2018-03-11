<?php 
namespace frontend\widgets;
use yii\base\Widget;
use yii\helpers\Html;
use backend\models\Category;

class Sidebarcategory extends Widget
{
    public function init()
    {
        parent::init();        
    }

    public function run()
    {
    	$cate = new Category();
    	$listcate = $cate->getAllCateRoot();
        return $this->render('Sidebarcategory', ['listcate' => $listcate]);
    }
}