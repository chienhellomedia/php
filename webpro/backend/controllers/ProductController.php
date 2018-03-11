<?php

namespace backend\controllers;

use Yii;
use backend\models\Product;
use backend\models\Category;
use backend\models\Images;
use backend\models\ProductSearch;
use backend\models\PriceList;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\models\Functions;

/**
 * ProductController implements the CRUD actions for Product model.
 */
class ProductController extends Controller
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
     * Lists all Product models.
     * @return mixed
     */
    public function actionIndex()
    {
      $searchModel = new ProductSearch();
      $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

      return $this->render('index', [
        'searchModel' => $searchModel,
        'dataProvider' => $dataProvider,
      ]);
    }

    /**
     * Displays a single Product model.
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
     * Creates a new Product model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        // echo "<pre>";
        // print_r($_POST); die;
      $model = new Product();
      $slug = new Functions();
      $cate = new Category();
      $pricelist = new PriceList();

      $data['cate'] = $cate->getCategoryParent();

      if (isset(Yii::$app->request->post()["Product"]["name"])) {
        $pathslug = Yii::$app->request->post()["Product"]["name"];
      } else {
        $pathslug = '';
      }

      $model->slug = $slug->changeTitle($pathslug);
      $model->new = isset(Yii::$app->request->post()["Product"]['new']) ? 10 : NULL;
      $model->bestseller = isset(Yii::$app->request->post()["Product"]['bestseller']) ? 10 : NULL;
      $model->featured = isset(Yii::$app->request->post()["Product"]['featured']) ? 10 : NULL;
      $model->instock = isset(Yii::$app->request->post()["Product"]['instock']) ? 10 : NULL;
      $model->status = isset(Yii::$app->request->post()["Product"]['status']) ? 10 : 0;
      $model->created_at = time();
      $model->updated_at = time();

      $pricelist = $pricelist->getAllPriceList();
      $data['pricelist'] = yii\helpers\ArrayHelper::map($pricelist, 'name', 'name');

      if ($model->load(Yii::$app->request->post())) {

        $main_img = $model->saveData($model, Yii::$app->request->post());
        $images_detail = isset(Yii::$app->request->post()['images_detail']) ? Yii::$app->request->post()['images_detail'] : NULL;

        $arrayImg = array();
        $arrayImg[0] =  $main_img;
        foreach ($images_detail as $key => $value) {
          if ($value != NULL) {
            $arrayImg[] = $value;
          }
        }   
        
        $model->images = $arrayImg[0];
        if ($model->save()) {

          foreach ($arrayImg as $img) {
            $imgMd  = new Images;
            $imgMd->image = $img;
            $imgMd->product_id = $model->id;
            $imgMd->status = 10;
            $imgMd->created_at = time();
            $imgMd->updated_at = time();
            $imgMd->save();
          }         

          Yii::$app->session->setFlash('success', "Thêm mới sản phẩm thành công");
          return $this->redirect(['view', 'id' => $model->id]);

        } else {
         Yii::$app->session->setFlash('danger', "Thêm mới sản phẩm không thành công");
         return $this->render('create',
          [
            'model' => $model,
            'data' => $data,
          ]);
       }          
     } else {
      return $this->render('create', 
        [
          'model' => $model,
          'data' => $data,
        ]);
    }
  }

    /**
     * Updates an existing Product model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
     //  
      $model = $this->findModel($id);

      $cate = new Category();
      $pricelist = new PriceList();
      $slug = new Functions();
      $pricelist = $pricelist->getAllPriceList();

      $data['cate'] = $cate->getCategoryParent();
      $data['pricelist'] = yii\helpers\ArrayHelper::map($pricelist, 'name', 'name');

      if ($model->load(Yii::$app->request->post())) {
        $model->hotdeal = isset(Yii::$app->request->post()['hotdeal']) ? Yii::$app->request->post()['hotdeal'] : 0;
        $model->new = isset($_POST['new']) ? $_POST['new'] : 0;
     //     echo "<pre>";
     // print_r($model->new); die;
        $model->bestseller = isset($_POST['bestseller']) ? $_POST['bestseller'] : 0;
        $model->featured = isset($_POST['featured']) ? $_POST['featured'] : 0;
        $model->instock = isset($_POST['instock']) ? $_POST['instock'] : 0;
        $model->status = isset($_POST['status']) ? $_POST['status'] : 0;

        if (isset(Yii::$app->request->post()["Product"]["name"])) {
          $pathslug = Yii::$app->request->post()["Product"]["name"];
        } else {
          $pathslug = '';
        }
        $model->slug = $slug->changeTitle($pathslug);

        if (preg_match("/base64/",Yii::$app->request->post()["Product"]["images"])) {
          $main_img = $model->saveData($model, Yii::$app->request->post());
        } else {
          $main_img =  Yii::$app->request->post()["Product"]["images"];
        }
        

        $model->updated_at = time();
        $images_detail = isset(Yii::$app->request->post()['images_detail']) ? Yii::$app->request->post()['images_detail'] : NULL;

        $arrayImg = array();
        $arrayImg[0] =  $main_img;
        foreach ($images_detail as $key => $value) {
          if($value != NULL) {
            $arrayImg[] = $value;
          }
        }   
        $data['details'] = Images::find()->where(['product_id'=>$id, 'status' =>10])->all(); 
        if($data['details'] != null ){
          foreach ($data['details'] as  $image) {
            $image->delete();
          }
        }

        $model->images = $arrayImg[0];
        if ($model->save()) {
          unset($arrayImg[0]);
          foreach ($arrayImg as $img) {
            $imgMd  = new Images;
            $imgMd->image = $img;
            $imgMd->product_id = $model->id;
            $imgMd->status = 10;
            $imgMd->created_at = time();
            $imgMd->updated_at = time();
            $imgMd->save();
          } 

          Yii::$app->session->setFlash('success', "Sửa sản phẩm thành công");
          return $this->redirect(['view', 'id' => $model->id]);

        } else {
         Yii::$app->session->setFlash('danger', "Sửa sản phẩm không thành công");
         $data['details'] = Images::find()->where(['product_id'=>$id, 'status' =>10])->all(); 
         return $this->render('update',
          [
            'model' => $model,
            'data' => $data,
          ]);
       }          
     } else {
      $data['details'] = Images::find()->where(['product_id'=>$id, 'status' =>10])->all(); 
      return $this->render('update', 
        [
          'model' => $model,
          'data' => $data,
        ]);
    }
  }

    /**
     * Deletes an existing Product model.
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
     * Finds the Product model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Product the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
      if (($model = Product::findOne($id)) !== null) {
        return $model;
      } else {
        throw new NotFoundHttpException('The requested page does not exist.');
      }
    }
  }
