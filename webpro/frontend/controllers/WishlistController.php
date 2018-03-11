<?php

namespace frontend\controllers;
use Yii;
use backend\models\Wishlist;

class WishlistController extends \yii\web\Controller
{
	public function actionIndex()
	{
		if (isset(Yii::$app->user->identity->id)) {
			$id = Yii::$app->user->identity->id;
		} else {
			$id = NULL;
		}
		
        $data = new Wishlist();
        $data = $data->getWishListByUser($id);
		return $this->render('index', ['data' => $data]);
	}

	public function actionAddwishlist ($id)
	{		
		$pro = Wishlist::find()->where(['product_id'=>$id])->one();
		if (isset(Yii::$app->user->identity->id) && !$pro) {
			$model = new Wishlist();
			$model->cus_id = Yii::$app->user->id;
			$model->product_id = $id;
			$model->created_at = time();
			$model->status = 10;
			$model->save();	
		} 
	}
	public function actionDelwishlist ($id)
	 {
        \Yii::$app
            ->db
            ->createCommand()
            ->delete('wishlist', ['product_id' => $id])
            ->execute();       
    }



}
