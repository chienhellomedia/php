<?php

namespace backend\controllers;

class FileController extends MainController
{
    public function actionIndex()
    {
        return $this->render('index');
    }

}
