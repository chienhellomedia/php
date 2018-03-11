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
use backend\widgets\ModelPopup;
use backend\modules\setting;

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
<?php 
$host = 'http://'.$_SERVER['HTTP_HOST'];
$homeUrl = str_replace('/backend/web', '', yii::$app->urlManager->baseUrl);
?>
<script type="text/javascript">
 function homeUrl() {
  return '<?php echo $host.$homeUrl; ?>';
}
         // alert(homeUrl());
       </script>
       <body class="sidebar-mini fixed">
        <?php $this->beginBody() ?>

        <div class="wrapper">
         
          <!-- Navbar-->
          <header class="main-header hidden-print"><a class="logo" href="index.html">Admin</a>
            <nav class="navbar navbar-static-top">
              <!-- Sidebar toggle button--><a class="sidebar-toggle" href="#" data-toggle="offcanvas"></a>
              <!-- Navbar Right Menu-->
              <div class="navbar-custom-menu">
                <ul class="top-nav">
                  <!--Notification Menu-->
                  <li class="dropdown notification-menu"><a class="dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-bell-o fa-lg"></i></a>
                    <ul class="dropdown-menu">
                      <li class="not-head">You have 4 new notifications.</li>
                      <li><a class="media" href="javascript:;"><span class="media-left media-icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-primary"></i><i class="fa fa-envelope fa-stack-1x fa-inverse"></i></span></span>
                        <div class="media-body"><span class="block">Lisa sent you a mail</span><span class="text-muted block">2min ago</span></div></a></li>
                        <li><a class="media" href="javascript:;"><span class="media-left media-icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-danger"></i><i class="fa fa-hdd-o fa-stack-1x fa-inverse"></i></span></span>
                          <div class="media-body"><span class="block">Server Not Working</span><span class="text-muted block">2min ago</span></div></a></li>
                          <li><a class="media" href="javascript:;"><span class="media-left media-icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-success"></i><i class="fa fa-money fa-stack-1x fa-inverse"></i></span></span>
                            <div class="media-body"><span class="block">Transaction xyz complete</span><span class="text-muted block">2min ago</span></div></a></li>
                            <li class="not-footer"><a href="#">See all notifications.</a></li>
                          </ul>
                        </li>
                        <!-- User Menu-->
                        <li class="dropdown"><a class="dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user fa-lg"></i></a>
                          <ul class="dropdown-menu settings-menu">
                            <li><a href="page-user.html"><i class="fa fa-cog fa-lg"></i> Settings</a></li>
                            <li><a href="page-user.html"><i class="fa fa-user fa-lg"></i> Profile</a></li>
                            <li><a href="page-login.html"><i class="fa fa-sign-out fa-lg"></i> Logout</a></li>
                          </ul>
                        </li>
                      </ul>
                    </div>
                  </nav>
                </header>
                <!-- Side-Nav-->
                <aside class="main-sidebar hidden-print">
                  <section class="sidebar">
                    <div class="user-panel">
                      <div class="pull-left image"><img class="img-circle" src="http://localhost:88/advanced/uploads/images/profile/user.png" alt="User Image"></div>
                      <div class="pull-left info">
                        <p>Tony Hoang</p>
                        <p class="designation">Developer</p>
                      </div>
                    </div>
                    <!-- Sidebar Menu-->
                    <ul class="sidebar-menu">
                      <li class="active">
                        <a href="<?php echo Url::to(['/site']) ?>"><i class="fa fa-dashboard"></i><span>Trang chủ</span></a>
                      </li>
                      <li class="treeview">
                        <a href="#">
                          <i class="fa fa-user-circle-o" aria-hidden="true"></i><span>Quản Trị</span><i class="fa fa-angle-right"></i>
                        </a>
                        <ul class="treeview-menu">
                          <li><a href="<?php echo Url::to(['/member/index']) ?>"><i class="fa fa-bars" aria-hidden="true"></i></i> Danh sách Thành viên</a></li>
                          <li><a href="<?php echo Url::to(['/member/create']) ?>"><i class="fa fa-plus-square-o" aria-hidden="true"></i> Tạo Thành viên</a></li>
                        </ul> 
                        <ul class="treeview-menu">
                          <li><a href="<?php echo Url::to(['/role/index']) ?>"><i class="fa fa-bars" aria-hidden="true"></i></i> Quyền và nhóm Quyền</a></li>

                        </ul>
                      </li> 
                      <li class="treeview">
                        <a href="#">
                          <i class="fa fa-group" aria-hidden="true"></i><span>Quản lý Khách hàng</span><i class="fa fa-angle-right"></i>
                        </a>
                        <ul class="treeview-menu">
                          <li><a href="<?php echo Url::to(['/customer/index']) ?>"><i class="fa fa-bars" aria-hidden="true"></i></i> Danh sách Khách hàng</a></li>
                          <li><a href="<?php echo Url::to(['/customer/create']) ?>"><i class="fa fa-plus-square-o" aria-hidden="true"></i> Tạo khách hàng</a></li>
                        </ul>
                      </li>

                      <li class="treeview">
                        <a href="#">
                          <i class="fa fa-cubes" aria-hidden="true"></i><span>Danh mục Sản phẩm</span><i class="fa fa-angle-right"></i>
                        </a>
                        <ul class="treeview-menu">
                          <li><a href="<?php echo Url::to(['/category/index']) ?>"><i class="fa fa-bars" aria-hidden="true"></i></i> Danh sách Danh mục</a></li>
                          <li><a href="<?php echo Url::to(['/category/create']) ?>"><i class="fa fa-plus-square-o" aria-hidden="true"></i> Tạo Danh mục</a></li>
                        </ul>
                      </li>
                      <li class="treeview">
                        <a href="#">
                          <i class="fa fa-cube" aria-hidden="true"></i><span>Quản lý Sản phẩm</span><i class="fa fa-angle-right"></i>
                        </a>
                        <ul class="treeview-menu">
                          <li><a href="<?php echo Url::to(['/product/index']) ?>"><i class="fa fa-bars" aria-hidden="true"></i></i> Danh sách sản phẩm</a></li>
                          <li><a href="<?php echo Url::to(['/product/create']) ?>"><i class="fa fa-plus-square-o" aria-hidden="true"></i> Tạo sản phẩm</a></li>
                        </ul>
                      </li> 

                      <li class="treeview">
                        <a href="#">
                          <i class="fa fa-usd" aria-hidden="true"></i><span>Quản lý Đơn vị giá</span><i class="fa fa-angle-right"></i>
                        </a>
                        <ul class="treeview-menu">
                          <li><a href="<?php echo Url::to(['/price-list/index']) ?>"><i class="fa fa-bars" aria-hidden="true"></i></i> Danh sách đơn vị giá</a></li>
                          <li><a href="<?php echo Url::to(['/price-list/create']) ?>"><i class="fa fa-plus-square-o" aria-hidden="true"></i> Tạo đơn vị giá</a></li>
                        </ul>
                      </li>  

                      <li class="treeview">
                        <a href="#">
                          <img src="http://localhost:88/advanced/uploads/images/icon/72109.png" alt="" class="icon-supplier"><span>Quản lý Nhà Cung cấp</span><i class="fa fa-angle-right"></i>
                        </a>
                        <ul class="treeview-menu">
                          <li><a href="<?php echo Url::to(['/supplier/index']) ?>"><i class="fa fa-bars" aria-hidden="true"></i></i> Danh sách nhà Cung cấp</a></li>
                          <li><a href="<?php echo Url::to(['/supplier/create']) ?>"><i class="fa fa-plus-square-o" aria-hidden="true"></i> Tạo mới nhà Cung cấp</a></li>
                        </ul>
                      </li>  

                      <li class="treeview">
                        <a href="#">
                          <i class="fa fa-truck" aria-hidden="true"></i><span>Quản lý Đơn hàng</span><i class="fa fa-angle-right"></i>
                        </a>
                        <ul class="treeview-menu">
                          <li><a href="<?php echo Url::to(['/order/index']) ?>"><i class="fa fa-bars" aria-hidden="true"></i></i>Danh sách đơn hàng</a></li>                    
                        </ul>
                      </li>



                      <li class="treeview">
                        <a href="#">
                          <i class="fa fa-motorcycle" aria-hidden="true"></i><span>Hình thức giao hàng</span><i class="fa fa-angle-right"></i>
                        </a>
                        <ul class="treeview-menu">
                          <li><a href="<?php echo Url::to(['/delivery/index']) ?>"><i class="fa fa-bars" aria-hidden="true"></i></i>Xem cách thức</a></li>
                          <li><a href="<?php echo Url::to(['/delivery/create']) ?>"><i class="fa fa-plus-square-o" aria-hidden="true"></i> Tạo cách thức</a></li>
                        </ul>
                      </li> 

                      <li class="treeview">
                        <a href="#">
                          <i class="fa fa-paypal" aria-hidden="true"></i><span>Hình thức Thanh toán</span><i class="fa fa-angle-right"></i>
                        </a>
                        <ul class="treeview-menu">
                          <li><a href="<?php echo Url::to(['/payment/index']) ?>"><i class="fa fa-bars" aria-hidden="true"></i></i>Xem cách thức</a></li>
                          <li><a href="<?php echo Url::to(['/payment/create']) ?>"><i class="fa fa-plus-square-o" aria-hidden="true"></i> Tạo cách thức</a></li>
                        </ul>
                      </li> 
                      <li class="treeview">
                        <a href="#">
                          <i class="fa fa-paint-brush" aria-hidden="true"></i><span>Quản lý Bài viết</span><i class="fa fa-angle-right"></i>
                        </a>
                        <ul class="treeview-menu">
                          <li><a href="<?php echo Url::to(['/blog/index']) ?>"><i class="fa fa-bars" aria-hidden="true"></i></i> Danh sách Bài viết</a></li>
                          <li><a href="<?php echo Url::to(['/blog/create']) ?>"><i class="fa fa-plus-square-o" aria-hidden="true"></i> Tạo Bài viết</a></li>
                        </ul>
                      </li>
                      <li class="treeview">
                        <a href="#">
                          <i class="fa fa-file" aria-hidden="true"></i><span>Quản lý File</span><i class="fa fa-angle-right"></i>
                        </a>
                        <ul class="treeview-menu">
                          <li><a href="<?php echo Url::to(['/file/index']) ?>"><i class="fa fa-bars" aria-hidden="true"></i></i> Xem File</a></li>

                        </ul>
                      </li>
                    </ul>
                  </section>
                </aside>
                <div class="content-wrapper">


                 <div class="row"> 
                   <?= Breadcrumbs::widget([
                     'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                     ]) ?>            
                   </div>


                   <div class="row">  
                     <?= Alert::widget() ?>            
                     <?php echo $content; ?>  
                   </div>
                 </div>
               </div>
               <?php echo ModelPopup::widget() ?>
               <?php $this->endBody() ?>
             </body>
             </html>
             <?php $this->endPage() ?>
