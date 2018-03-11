<?php

namespace frontend\controllers;
use backend\models\Imagesreal;

class ImagesrealController extends \yii\web\Controller
{
    public function actionIndex()
    {
    	$model = new Imagesreal();
    	$data = $model->getAllimgreal();
        return $this->render('index', ['data'=>$data]);
    }

}
