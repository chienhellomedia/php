<?php 
namespace frontend\widgets;
use yii\base\Widget;
use yii\helpers\Html;
use backend\models\Supplier;

class Supplier extends Widget
{
    public function init()
    {
        parent::init();        
    }

    public function run()
    {
    	 $supplier = new Supplier();
        $supp = $supplier->getAllsupplier();
        return $this->render('Supplier', ['supp'=>$supp]);
    }
}