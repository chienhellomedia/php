<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;
use yii\widgets\Menu;

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
  <script>
    function homeUrl() {
      return 'http://dev.com/backend/web/';
    }
  </script>
</head>
<body>
  <?php $this->beginBody() ?>

  <div class="wrap">
    <?php
    NavBar::begin([
      'brandLabel' => 'Trang chủ',
      'brandUrl' => Yii::$app->homeUrl,
      'options' => [
        'class' => 'navbar-inverse navbar-fixed-top',
      ],
    ]);
    
    if (Yii::$app->user->isGuest) {
      $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
    } else {
      $menuItems[] = '<li>'
      . Html::beginForm(['/site/logout'], 'post')
      . Html::submitButton(
        'Thoát (' . Yii::$app->user->identity->username . ')',
        ['class' => 'btn btn-link logout']
      )
      . Html::endForm()
      . '</li>';
    }
    echo Nav::widget([
      'options' => ['class' => 'navbar-nav navbar-right'],
      'items' => $menuItems,
    ]);
    NavBar::end();
    ?>

    <div class="container-fluid mt-5">
     <div class="row">
      <div class="col-md-2">
       <?php 
       echo Nav::widget([
        'items' => [
          [
            'label' => 'Trang chủ',
            'url' => ['site/index'],
            'options'=>['style'=>'border-bottom: 1px solid #337ab7'],
          ],
          [
            'label' => 'Quản trị viên',
            'url' => ['user/index'],
            'options'=>['style'=>'border-bottom: 1px solid #337ab7'],
          ],
          [
            'label' => 'Banner',
            'url' => ['banner/index'],
            'options'=>['style'=>'border-bottom: 1px solid #337ab7'],
          ],
          [
            'label' => 'Giới thiệu',
            'url' => ['about/index'],
            'options'=>['style'=>'border-bottom: 1px solid #337ab7'],
          ],
          [
            'label' => 'Hình ảnh thục tế',
            'url' => ['imagesreal/index'],
            'options'=>['style'=>'border-bottom: 1px solid #337ab7'],
          ],
          [
            'label' => 'Khách hàng',
            'url' => ['customer/index'],
            'options'=>['style'=>'border-bottom: 1px solid #337ab7'],
          ],
          [
            'label' => 'Sản phẩm',
            'options'=>['class'=>'dropdown'],
            'items' => [
              ['label' => 'Danh mục SP', 'url' => ['category/index']],
              ['label' => 'Thêm mới danh mục SP', 'url' => ['category/create']],
              ['label' => 'Xem sản phẩm', 'url' => ['product/index']],
              ['label' => 'Thêm mới sản phẩm', 'url' => ['product/create']],
            ],
            'options'=>['style'=>'border-bottom: 1px solid #337ab7'],
          ],
          [
            'label' => 'Đơn hàng',
            'url' => ['order/index'],
            'options'=>['style'=>'border-bottom: 1px solid #337ab7'],
          ],
          [
            'label' => 'Tin tức',
            'url' => ['blog/index'],
            'options'=>['style'=>'border-bottom: 1px solid #337ab7'],
          ],
           [
            'label' => 'Wishlist',
            'url' => ['wishlist/index'],
            'options'=>['style'=>'border-bottom: 1px solid #337ab7'],
          ],


          [
            'label' => 'Quản lý file',
            'url' => ['file/index'],
            // 'options'=>['style'=>'border-bottom: 1px solid #f1f1f1'],
          ],

        ],
    'options' => ['class' =>' list-group', 'style'=>'background: #f1f1f136; border-radius: 5px; border: 1px solid #337ab7'], // set this to nav-tab to get tab-styled navigation
  ]);

  ?>
</div>

<div class="col-md-10 pl-0">
 <div class="main-content clearfix" style="background: #f1f1f136">
   <?= Breadcrumbs::widget([
    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    ]) ?>
    <?= Alert::widget() ?>
    <?= $content ?>

  </div>
</div>
</div>
</div>
</div>

<footer class="footer">
  <div class="container">
    <p class="pull-left">&copy; <?= Html::encode(Yii::$app->name) ?> <?= date('Y') ?></p>

    <p class="pull-right"><?= Yii::powered() ?></p>
  </div>
</footer>
<div class="modal fade" id="modal-banner">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Quản lý file</h4>
      </div>
      <div class="modal-body">
        <iframe src="http://dev.com/backend/web/filemanager/dialog.php?field_id=banner-images" width="100%" height="550px;"></iframe>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="modal-id-product">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Chọn Ảnh chi tiết</h4>
      </div>
      <div class="modal-body">
        <iframe src="http://dev.com/backend/web/filemanager/dialog.php?field_id=images-detail" width="100%" height="550px;"></iframe>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="modal-certificate">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Ảnh giấy chứng nhận</h4>
      </div>
      <div class="modal-body">
        <iframe src="http://dev.com/backend/web/filemanager/dialog.php?field_id=certificate-images" width="100%" height="550px;"></iframe>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="modal-story">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Modal title</h4>
      </div>
      <div class="modal-body">
         <iframe src="http://dev.com/backend/web/filemanager/dialog.php?field_id=about-images" width="100%" height="550px;"></iframe>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modal-imgreal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Quản lý file</h4>
      </div>
      <div class="modal-body">
         <iframe src="http://dev.com/backend/web/filemanager/dialog.php?field_id=imagesreal-big" width="100%" height="550px;"></iframe>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
