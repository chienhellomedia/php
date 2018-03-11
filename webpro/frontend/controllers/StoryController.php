<?php

namespace frontend\controllers;
use backend\models\About;

class StoryController extends \yii\web\Controller
{
    public function actionIndex()
    {
    	$data = About::find()->all();
        return $this->render('index', ['data'=>$data]);
    }

}
