<?php
namespace frontend\controllers;
use Yii;
use backend\models\Order;
use backend\models\Orderdetail;
class OrderController extends \yii\web\Controller
{
	public function actionList()
	{
		$model = new Order();
		if (isset(Yii::$app->user->identity->id)) {
			$id = Yii::$app->user->identity->id;
			$model = $model->getOrderById($id);
			return $this->render('list', ['model'=>$model]);
		}
	} 

	public function actionOrderDetail($id)
	{
		$model = new Orderdetail();		
		$model = $model->getAllOrderDetail($id);
		return $this->render('orderdetail', ['model'=>$model]);
	}
}
