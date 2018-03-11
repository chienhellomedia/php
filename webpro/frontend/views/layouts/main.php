<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;
use frontend\widgets\Header;
use frontend\widgets\Footer;
use frontend\widgets\Modal;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    
</head>
<body class="cnt-home">
  <?php $this->beginBody() ?>
  <div class="notice-check"></div>
  <?= Header::widget() ?>
  <?= Alert::widget() ?>
  <?= $content ?>
  <?= Footer::widget() ?>
  <div class="facebook-chat" >
    <p class="show-chat">Chat với chúng tôi</p>
    <div class="fb-page show-facebook" data-href="https://www.facebook.com/thucphamsachHNH/" data-tabs="messages" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true" data-width="300" data-height="340"><blockquote cite="https://www.facebook.com/thucphamsachHNH/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/thucphamsachHNH/">Thực phẩm sạch HNH</a></blockquote></div>
  </div>
  <?= \bluezed\scrollTop\ScrollTop::widget() ?>
  <?= Modal::widget() ?>

  <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
