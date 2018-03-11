<?php

namespace backend\helpers;

use Yii;
use yii\web\Controller;
use yii\helpers\Html;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
class MainController extends Controller
{
	public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error','request-password-reset','reset-password'],
                        'allow' => true,
                    ],
                    
                    [
                        'allow' => true,
                        'roles' => ['@'],
                        'matchCallback' => function ($rule, $action) {
                        	$route = '/'.Yii::$app->controller->route;
                            //echo $route;die();
                           if (Yii::$app->user->can($route)) {
                                return true;
                            }
                        }
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['POST'],
                    'delete' => ['POST'],
                    'assign' => ['POST'],
                    'remove' => ['POST'],
                    'refresh' => ['POST'],
                    'activate' => ['POST'],
                ],
            ],
        ];
    }


    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

}
