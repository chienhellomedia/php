<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;
use yii\helpers\Url;

AppAsset::register($this); ?>
<?php $this->beginPage() ?>
<?php $this->beginBody() ?>
<?php echo $content; ?>
<?php $this->endBody() ?>
<?php $this->endPage() ?>
