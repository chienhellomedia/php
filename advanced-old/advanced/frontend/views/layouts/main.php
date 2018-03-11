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
use frontend\widgets\ModalPopup;

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

<!--Start of Tawk.to Script-->
<!-- <script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/599bf5b91b1bed47ceb05f44/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script> -->
<!--End of Tawk.to Script-->

<body class="cnt-home">
 
  <?php $this->beginBody() ?>

  <?php date_default_timezone_set("Asia/Vientiane"); ?>
  <?= Header::widget(); ?>
  <?= Alert::widget() ?>
  <?= $content; ?>
  <?= Footer::widget(); ?> 
  <?= \bluezed\scrollTop\ScrollTop::widget() ?>
  <?= ModalPopup::widget(); ?>  

  <div id="fb-root"></div>
  <script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.10&appId=2000866363526208";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));</script>



  <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
