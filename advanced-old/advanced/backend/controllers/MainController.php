<?php 
namespace backend\controllers;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

class MainController extends Controller
{
	
	/**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'allow' => true,
                        'roles' => ['@'],
                        // 'matchCallback' => function ($rule, $action) {
                        //     $control = Yii::$app->controller->id;
                        //     $action = Yii::$app->controller->action->id;
                        //     $role = $action.'-'.$control;

                        //     if($control != 'site'){
                        //         return Yii::$app->user->can($role);
                        //     }else{
                        //         return true;
                        //     }
                        // }
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }
}
?>