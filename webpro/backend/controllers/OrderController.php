<?php

namespace backend\controllers;

use Yii;
use backend\models\Order;
use backend\models\OrderSearch;
use backend\models\Orderdetail;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use kartik\mpdf\Pdf;
/**
 * OrderController implements the CRUD actions for Order model.
 */
class OrderController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Order models.
     * @return mixed
     */
   public function actionIndex()
    {

        $searchModel = new OrderSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $data = Order::find()->groupBy('status')->all();

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'data' => $data,
            ]);
    }

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

    public function actionPdf($id) {
       $orderdetail = new OrderDetail;
       $orderdetail = $orderdetail->getAllOrderDetail($id);
       $this->layout = 'pdf';
       $content = $this->render('pdf',[
        'model' => $this->findModel($id),
        'orderdetail' => $orderdetail,
        ]);

       $pdf = new Pdf([
        'mode' => Pdf::MODE_UTF8, 
        'format' => Pdf::FORMAT_A4, 
        // 'orientation' => Pdf::ORIENT_PORTRAIT, 
        // 'destination' => Pdf::DEST_BROWSER, 
        'content' => $content,  
        'marginLeft' =>15,
        'marginRight' =>15,
        'marginTop' =>15,
        'marginBottom' =>15,
        'marginHeader' =>5,
        'marginFooter' =>10,
        'options' => ['title' => 'Thông đơn hàng'],

        ]);

       return $pdf->render(); 
   }

   public function actionSearch () {
        if (Yii::$app->request->isAjax) {
           $input = $_POST['input'];
            $search = Order::find()->where(['like', 'fullname', $input])->all();
            // var_dump($search); die;
            return $this->render('search', ['search'=>$search]);
       }
   }
    /**
     * Displays a single Order model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Order model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Order();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
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
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
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
