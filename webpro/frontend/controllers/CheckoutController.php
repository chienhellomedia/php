<?php

namespace frontend\controllers;
use Yii;
use frontend\component\Cart;
use frontend\models\Checkout;
use Yii\helpers\Html;
use backend\models\Delivery;
use backend\models\Payment;
use yii\helpers\ArrayHelper;
use yii\filters\VerbFilter;


class CheckoutController extends \yii\web\Controller
{
    public function actionIndex()
    {
       
        $model = new Checkout();
        $cart = new Cart();
        $cartstore = $cart->cartstore;
        $cost = $cart->getCost;
      
        if ($model->load(Yii::$app->request->post())) :
            if (isset($cartstore) && $model->total != 0) :
                if ($order = $model->order()) :
                    $model->orderdetail($order->id);
                    if ($model->sendEmail(Yii::$app->params['adminEmail'], $order->id)) { //cus_id luu thong tin nguoi dat hang
                          $cart->removeall();
                            return $this->render('success');
                    }
                  
                endif;

            else :
                return $this->render('index', [
                    'model' => $model,
                    'cartstore' => $cartstore,
                    'cost' => $cost, 
                ]);
            
            endif;

        else :
                return $this->render('index', [
                'model' => $model,
                'cartstore' => $cartstore,
                'cost' => $cost,   
            ]);
        endif;
    }
}
