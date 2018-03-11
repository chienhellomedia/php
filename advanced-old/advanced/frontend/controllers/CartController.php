<?php

namespace frontend\controllers;
use Yii;
use frontend\components\Cart;
use backend\models\Product;

class CartController extends \yii\web\Controller
{
	/*
	Cart class to manage Shopping Cart
	 */
  public function actionIndex()
  {
    $cart = new Cart();
    $cartstore = $cart->cartstore;
        // var_dump($cartstore);die;
    $cost = $cart->getCost;
    $totalItem = $cart->getTotalItem();
        // var_dump($cost); die;
    return $this->render('index', 
     [
     'cartstore' => $cartstore,
       'cost' => $cost,                
       'totalItem' => $totalItem,        		
     ]);
  }

  public function actionAddcart($id, $qtt)
  {
    
   $data = new Product();
   $product = $data->getOneProduct($id);
   
   $cart = new Cart();
   
   if ($product) {
     $cart->add($product, $qtt);       
   } else {
    echo 'Error';
  }
  var_dump($cart->cartstore);

}


public function actionRemoveCart($id)
{
  $data = new Product();
  // $data = $data->getOneProduct($id);
  $cart = new Cart();  
  $cart->remove($id);
}

public function actionUpdateCart()
{
  $cart = new Cart();
  // var_dump(Yii::$app->request->post()); die;
  // var_dump(unserialize('data'));die;
  if (Yii::$app->request->post()) {
    $id = $_POST['id'];
    $qtt = $_POST['qtt'];
   
    // echo $id;
    $cart->update($id, $qtt);
  }

}
public function actionUpdateCartAll()
{
  $cart=new Cart();
  if (Yii::$app->request->post()) {
    $id=$_POST["id"];
    $qtt=$_POST["qtt"];
    $cart->update($id,$qtt);

  }
  return $this->redirect(['/cart']);
}
public function actionClear() {
  $cart = new Cart();       
  $cart->removeAll();
}

}
