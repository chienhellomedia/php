<?php

namespace backend\controllers;

use Yii;
use backend\models\Category;
use backend\models\Product;
use backend\models\PriceList;
use backend\models\ProductSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\models\Images;

/**
 * ProductController implements the CRUD actions for Product model.
 */
class ProductController extends MainController
{
    /**
     * @inheritdoc
     */
    // public function behaviors()
    // {
    //     return [
    //     'verbs' => [
    //     'class' => VerbFilter::className(),
    //     'actions' => [
    //     'delete' => ['POST'],
    //     ],
    //     ],
    //     ];
    // }

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
    // public function actionCreate()
    // {
    //     $model = new Product();

    //     $pricelist = new PriceList();
    //     $pricelist = $pricelist->getAllPriceList();
    //     $pricelist = yii\helpers\ArrayHelper::map($pricelist, 'name', 'name');

    //     $cate = new Category();
    //     $cate = $cate->getCategoryParent();
    //     // var_dump($cate); die;
    //     if ($model->load(Yii::$app->request->post())) {

    //         $model->startsale = date('Y-m-d');
    //         $model->endsale = date('Y-m-d');
    //         $model->created_at = time();
    //         $model->updated_at = time();
    //         if ($model->save()) {
    //             Yii::$app->session->setFlash('success', 'Thành công.');
    //             return $this->redirect(['view', 'id' => $model->id]);
    //         } else {
    //             Yii::$app->session->setFlash('danger', ' không Thành công.');
    //             return $this->render('create', [
    //                 'model' => $model,
    //                 'pricelist' => $pricelist,
    //                 'cate' => $cate,
    //                 ]);
    //         }
    //     } else {
    //         return $this->render('create', [
    //             'model' => $model,
    //             'pricelist' => $pricelist,
    //             'cate' => $cate,
    //             ]);
    //     }
    // }
    /*=======================================*/
    public function actionCreate()
    {

     $model = new Product();

     $pricelist = new PriceList();
     $pricelist = $pricelist->getAllPriceList();
     $pricelist = yii\helpers\ArrayHelper::map($pricelist, 'name', 'name');

     $cate = new Category();
     $cate = $cate->getCategoryParent();


     if ($model->load(Yii::$app->request->post()) ) {

         $images = Yii::$app->request->post('image'); //post mang $images[]
         // var_dump($images); die;
         $model->created_at = time();
         $model->updated_at = time();
         $model->startsale = date('Y-m-d');
         $model->endsale = date('Y-m-d');          
         $model->image =  $images[0];                //lay gia tri cua mang tai phan tu thu 0
         unset($images[0]);

         if($model->save()){
               // neu mặc định trả về true sẽ load lại 1 lần nữa nên lỗi nên cho flasee
            if($images){
                foreach ($images as $img) {
                    $imgMd  = new Images;
                    $imgMd->image = $img;
                    $imgMd->product_id = $model->id;
                    $imgMd->status = 10;
                    $imgMd->created_at = time();
                    $imgMd->updated_at = time();
                    $imgMd->save();
                }         
            }
            yii::$app->session->addFlash('success','Thêm mới thành công');
            return $this->redirect(['view', 'id' => $model->id]);
        }
        else {
         yii::$app->session->addFlash('success','Thêm mới không thành công');
         return $this->render('create', [
            'model' => $model,
            'pricelist' => $pricelist,
            'cate' => $cate,
            ]);
     }

 } else {
    return $this->render('create', [
       'model' => $model,
       'pricelist' => $pricelist,
       'cate' => $cate,
       ]);
}
}
/*=======================================*/
    /**
     * Updates an existing Product model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    // public function actionUpdate($id)
    // {
    //     $model = $this->findModel($id);

    //     $cate = new Category();
    //     $cate = $cate->getCategoryParent();

    //     $pricelist = new PriceList();
    //     $pricelist = $pricelist->getAllPriceList();
    //     $pricelist = yii\helpers\ArrayHelper::map($pricelist, 'name', 'name');

    //     if ($model->load(Yii::$app->request->post())) {
    //         $model->updated_at = time();
    //         $model->save();
    //         return $this->redirect(['view', 'id' => $model->id]);
    //     } else {
    //         return $this->render('update', [
    //             'model' => $model,
    //             'cate' => $cate,
    //             'pricelist' => $pricelist,
    //             ]);
    //     }
    // }
    // /=========================================================/
    public function actionUpdate($id)
    {

        $model = $this->findModel($id);

        $cate = new Category();
        $cate = $cate->getCategoryParent();

        $pricelist = new PriceList();
        $pricelist = $pricelist->getAllPriceList();
        $pricelist = yii\helpers\ArrayHelper::map($pricelist, 'name', 'name');

        if ($model->load(Yii::$app->request->post())) {
         
            $images = Yii::$app->request->post('image'); // bang $images[];
            $model->updated_at = time();            
            
            $imgproduct = Images::find()->where(['product_id'=>$id, 'status' =>10])->all(); 

            if($imgproduct){
                foreach ($imgproduct as  $image) {
                  $image->delete();
              }
          }

          $model->image = $images[0];  // nam trong $images[];
          unset($images[0]);

          if($model->save()){
              if($images){
                foreach ($images as $img) {
                    $imgMd  = new Images;
                    $imgMd->image = $img;
                    $imgMd->product_id = $model->id;
                    $imgMd->status = 10;
                    $imgMd->created_at = time();
                    $imgMd->updated_at = time();
                    $imgMd->save();
                }     

            }
            yii::$app->session->addFlash('success','Cập nhật thành công');
            return $this->redirect(['view', 'id' => $model->id]);
        }
        else {
            yii::$app->session->addFlash('success','Cập nhật không thành công');
            return $this->render('update', [
                'model' => $model,
                'pricelist' => $pricelist,
                'cate' => $cate,
                ]);
        }

    } else {
        return $this->render('update', [
            'model' => $model,
            'pricelist' => $pricelist,
            'cate' => $cate,
            ]);
    }
}
    // /=========================================================/
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
