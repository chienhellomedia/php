<?php

namespace backend\controllers;

use Yii;
use backend\models\Member;
use backend\models\AuthItem;
use backend\models\AuthAssignment;
use backend\models\MemberSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MemberController implements the CRUD actions for Member model.
 */
class MemberController extends MainController
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
     * Lists all Member models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MemberSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            ]);
    }

    /**
     * Displays a single Member model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $not_in = [];
        $auth_assignment  = AuthAssignment::find()->asArray()->all();
        if ( $auth_assignment ) {
            foreach( $auth_assignment  as $item){
                $not_in[$item['item_name']] = $item['item_name'];
            }
        }
        // $not_in = rtrim($not_in,',');
        // echo '<pre>';
        // print_r($not_in);die;

        $pers = AuthItem::find()->where(['type'=>2])->andWhere(['NOT IN','name',$not_in])->all();
        $roles = AuthItem::find()->where(['type'=>1])->andWhere(['NOT IN','name',$not_in])->all();
        $model = $this->findModel($id);
        if (Yii::$app->request->post()) {
            $post = Yii::$app->request->post();

            if (isset($post['permission'])) {                
               if ($model->add_per($post['permission'])) {
                   Yii::$app->session->setFlash('success','Gán thành công ! ');
               }else{
                Yii::$app->session->setFlash('danger','Gán không thành công ! ');
                }
            }
            if (isset($post['permission_assined'])) {
                $model->remove_per($post['permission_assined']);
            }           
        }
        return $this->render('view', [
            'model' => $model,
            'roles' => $roles,
            'pers' => $pers,
            'asssigns' => $model->asssignss,
            ]);
}

    /**
     * Creates a new Member model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Member();

        if ($model->load(Yii::$app->request->post())) {
            $model->created_at = time();
            $model->updated_at = time();
            $password = $model->password;
            $model->setPassword($password);            
            $model->generateAuthKey();

            if ( $model->save()) {

                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            return $this->render('create', [
                'model' => $model,
                ]);
        }
    }

    /**
     * Updates an existing Member model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $model->updated_at = time();
            $password = $model->password;
            $model->setPassword($password);            
            $model->generateAuthKey();
            // print_r($model); 
            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            return $this->render('update', [
                'model' => $model,
                ]);
        }
    }

    /**
     * Deletes an existing Member model.
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
     * Finds the Member model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Member the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Member::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    
}
