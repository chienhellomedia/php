<?php

namespace backend\controllers;

use Yii;
use backend\models\Order;
use backend\models\OrderSearch;
use backend\models\Orderdetail;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * OrderController implements the CRUD actions for Order model.
 */
class OrderController extends MainController
{
    /**
     * @inheritdoc
     */
    // public function behaviors()
    // {
    //     return [
    //         'verbs' => [
    //             'class' => VerbFilter::className(),
    //             'actions' => [
    //                 'delete' => ['POST'],
    //             ],
    //         ],
    //     ];
    // }

    /**
     * Lists all Order models.
     * @return mixed
     */
    public function actionIndex()
    {
        // if (Yii::$app->request->post()) {
        //     $status = Yii::$app->request->post('status');
        //     $status = (INT)str_replace('#home-', '', $status);
        // } else {
        //     $status = 0;
        // }

        $searchModel = new OrderSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $data = Order::find()->groupBy('status')->all();

         // $datastatus = Order::find()->where(['status'=>$status])->all();
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'data' => $data,
            // 'datastatus' => $datastatus,
            ]);
    }

    /**
     * Displays a single Order model.
     * @param integer $id
     * @return mixed
     */
    
    public function actionInfo($id)
    {
     $model = Order::findOne(['id'=>$id]);
     if($model->load(Yii::$app->request->post())){
        if ($model->save()) {
            Yii::$app->session->setFlash('success', 'Thành công.');          
        } else {
            Yii::$app->session->setFlash('error', 'không thành công'); 
        }
    }
    $orderdetail = new Orderdetail;
    $orderdetail = $orderdetail->getAllOrderDetail($id);
        // var_dump($orderdetail);
    return $this->render('info', [
        'model' => $this->findModel($id),
        'orderdetail' => $orderdetail,
        ]);
}

    /**
     * Updates an existing Order model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                ]);
        }
    }

    /**
     * Deletes an existing Order model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        // $this->findModel($id)->delete();
        if ($this->findModel($id)->delete()) {            
            Yii::$app->session->setFlash('success', 'Xóa Thành công.'); 
            return $this->redirect(['index']);
        }
    }

    /**
     * Finds the Order model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Order the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Order::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
