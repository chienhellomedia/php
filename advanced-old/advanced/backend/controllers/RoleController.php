<?php

namespace backend\controllers;

use Yii;
use backend\models\AuthItem;
use backend\models\AuthItemSearch;
use backend\models\AuthAssignment;
use backend\models\AuthItemChild;
use backend\models\Customer;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\models\RoleSearch;

/**
 * AuthItemController implements the CRUD actions for AuthItem model.
 */
class RoleController extends MainController
{
    /**
     * Lists all AuthItem models.
     * @return mixed
     */
    public function actionIndex()
    {
        $search = new RoleSearch();
        $dataRole = $search->searchRole(Yii::$app->request->queryParams);
        $dataPermission = $search->searchPermission(Yii::$app->request->queryParams);

        return $this->render('index', [
            'search' => $search,
            'dataRole' => $dataRole,
            'dataPermission' => $dataPermission,
            ]);
    }

    /**
     * Displays a single AuthItem model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        $not_in = [];
        $auth_assignment  = AuthItemChild::find()->asArray()->all();
        if ( $auth_assignment ) {
            foreach( $auth_assignment  as $item){
                $not_in[$item['child']] = $item['child'];
            }
        }

        $roles = AuthItem::find()->where(['type'=>1])->andWhere(['<>','name',$id])->andWhere(['NOT IN','name',$not_in])->all();
        $pers = AuthItem::find()->where(['type'=>2])->andWhere(['NOT IN','name',$not_in])->all();
        $model = AuthItem::findOne(['name'=>$id]);

        if (Yii::$app->request->post()) {
          $post = Yii::$app->request->post();  


          if (isset($post['permission'])) {
            $permission = $post['permission'];
            // $model->add_per($permission); 
            if ($model->add_per($permission)) {
                Yii::$app->session->setFlash('success', 'Thành công');
            }  else {
                Yii::$app->session->setFlash('danger', 'không Thành công');
            }           
        }

        if (isset($post['permission_assined'])) {
           $permission_assined = $post['permission_assined'];
         // $model->remove_per($permission_assined);
           if ($model->remove_per($permission_assined)) {
              Yii::$app->session->setFlash('success', 'Thành công');
          } else {
            Yii::$app->session->setFlash('danger', 'không Thành công');
        }
    }           
}
return $this->render('view', [
    'model' => $model,
    'roles' => $roles,
    'pers' => $pers,
    'roles_asssined' => $model->authItemChildren,
    'children' =>$model->children
    ]);
}



    /**
     * Creates a new AuthItem model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreatePermission()
    {
        $model = new AuthItem();

        if ($model->load(Yii::$app->request->post())) {
            $model->type = 2;
            $model->created_at = time();
            $model->updated_at = time();
            if ($model->save()) {
                Yii::$app->session->setFlash('success','Tạo mới quyền thành công');
                return $this->redirect(['view', 'id' => $model->name]);
            } else {
                return $this->render('create-permission', [
                    'model' => $model,
                    ]);
            }
        } else {
            return $this->render('create-permission', [
                'model' => $model,
                ]);
        }
    }

    public function actionCreateRole()
    {
        $model = new AuthItem();

        if ($model->load(Yii::$app->request->post())) {
            $model->type = 1;
            $model->created_at = time();
            $model->updated_at = time();
            if ($model->save()) {
                Yii::$app->session->setFlash('success','Tạo mới nhóm quyền thành công');
                return $this->redirect(['view', 'id' => $model->name]);
            } else {
                return $this->render('create-role', [
                    'model' => $model,
                    ]);
            }
        } else {
            return $this->render('create-role', [
                'model' => $model,
                ]);
        }
    }

    /**
     * Updates an existing AuthItem model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $model->updated_at = time();
            if ($model->save()) {
                Yii::$app->session->setFlash('success','Thành công');
                return $this->redirect(['view', 'id' => $model->name]);
            } else {
                Yii::$app->session->setFlash('danger','Không thành công');
                 return $this->render('update', [
                'model' => $model,
                ]);
            }
        } else {
            return $this->render('update', [
                'model' => $model,
                ]);
        }
    }

    /**
     * Deletes an existing AuthItem model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the AuthItem model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return AuthItem the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = AuthItem::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
