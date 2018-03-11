<?php

namespace  backend\modules\rbac\controllers;

use Yii;
use backend\helpers\MainController;

/**
 * DefaultController
 *
 * @author Misbahul D Munir <misbahuldmunir@gmail.com>
 * @since 1.0
 */
class DefaultController extends MainController
{

    /**
     * Action index
     */
    public function actionIndex($page = 'README.md')
    {
        if (strpos($page, '.png') !== false) {
            $file = Yii::getAlias("@backend/modules/rbac/{$page}");
            return Yii::$app->getResponse()->sendFile($file);
        }
        return $this->render('index', ['page' => $page]);
    }
}
