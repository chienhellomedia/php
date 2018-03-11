<?php 
use frontend\widgets\SideMenu;
use frontend\widgets\BannerWidget;
use frontend\widgets\Video;

use frontend\widgets\Certi;
use frontend\widgets\Facebook;
use frontend\widgets\Blogtag;
use yii\helpers\Url;
use yii\widgets\LinkPager;
use yii\widgets\Pjax;
use frontend\component\Functions;

$slug = Yii::$app->request->get('slug') ? Yii::$app->request->get('slug') : NULL

?>
<div class="body-content outer-top-xs">
  <div class='container'>
    <div class='row'>
      <div class='col-md-3 sidebar'>
        <!-- ================================== TOP NAVIGATION ================================== -->
        <div class="side-menu animate-dropdown outer-bottom-xs">
          <?php echo SideMenu::widget() ?>
        </div><!-- /.side-menu -->
        <?php echo Video::widget(); ?>
        <!-- ================================== TOP NAVIGATION : END ================================== -->     
        <div class="sidebar-module-container">

          <div class="sidebar-filter">
            <div class="sidebar-widget wow fadeInUp">
              <div class="widget-header">
                <h4 class="widget-title">Lọc theo giá</h4>
              </div>
              <div class="sidebar-widget-body m-t-10">
                <div class="price-range-holder">
                  <span class="min-max">
                    <span class="pull-left">5K</span>
                    <span class="pull-right">1000K</span>
                  </span>
                  <input type="text" id="amount" style="border:0; color:#666666; font-weight:bold;text-align:center;">

                  <input type="text" class="price-slider" value="" >

                </div><!-- /.price-range-holder -->
                <a href="<?php echo Url::to(['/product/filter']) ?>" data-geturl="<?php echo $slug ?>" class="lnk btn btn-primary btn-filter-price">Lọc</a>

              </div><!-- /.sidebar-widget-body -->
            </div><!-- /.sidebar-widget -->
            
            
          </div><!-- /.sidebar-module-container -->
        </div><!-- /.sidebar -->
        <br>
        <?php echo Blogtag::widget(); ?>
        <?php echo Facebook::Widget(); ?>
        <?php echo Certi::Widget() ?>

      </div>
      <div class='col-md-9'>
        <!-- ========================================== SECTION – HERO ========================================= -->

        <?php echo BannerWidget::Widget() ?>




        <!-- ========================================= SECTION – HERO : END ========================================= -->
        <?php Pjax::begin(); ?>
        <div class="load-div-pro">
          <div class="clearfix filters-container m-t-10">
            <div class="row">
              <div class="col col-sm-6 col-md-2">
                <div class="filter-tabs">
                  <ul id="filter-tabs" class="nav nav-tabs nav-tab-box nav-tab-fa-icon">
                    <li class="active">
                      <a data-toggle="tab" href="#grid-container"><i class="icon fa fa-th-large"></i>Grid</a>
                    </li>
                    
                  </ul>
                </div><!-- /.filter-tabs -->
              </div><!-- /.col -->
              <div class="col col-sm-12 col-md-6">
                <div class="col col-sm-3 col-md-8 no-padding">
                  <div class="lbl-cnt"></div><!-- /.lbl-cnt -->
                </div><!-- /.col -->
              </div><!-- /.col -->
              <div class="col col-sm-6 col-md-4 text-right">
                <div class="pagination-container">
                  <?php
                  echo LinkPager::widget([
                    'pagination' => $pages,
                    'prevPageLabel' => '<i class="fa fa-angle-left"></i>',
                    'nextPageLabel' => '<i class="fa fa-angle-right"></i>',
                    'maxButtonCount' => 3,
                    'options' => [
                      'class' => 'list-inline list-unstyled',
                    ],
                    ]); ?>
                  </div><!-- /.pagination-container -->   
                </div><!-- /.col -->
              </div><!-- /.row -->
            </div>
            <div class="search-result-container ">
              <div id="myTabContent" class="tab-content category-list">
                <div class="tab-pane active " id="grid-container">
                  <div class="category-product">
                    <div class="row">                 
                      <?php if($datapro) :
                      foreach ($datapro as $pro) :
                        ?>
                        <div class="col-sm-6 col-md-4 wow fadeInUp">
                          <div class="products">

                            <div class="product">   
                              <div class="product-image">
                                <div class="image">
                                  <a href="<?= Url::to(['/product/details', 'slug'=>$pro->slug]) ?>"><img  src="<?= Yii::$app->params['homepath']. $pro->images?>" alt=""></a>
                                </div><!-- /.image -->      

                                <?php Functions::CheckSale($pro->startsale, $pro->endsale, $pro->saleoff) ?>                             
                              </div><!-- /.product-image -->


                              <div class="product-info text-left">
                                <h3 class="name"><a href="<?= Url::to(['/product/details', 'slug'=>$pro->slug]) ?>"><?= $pro->name ?></a></h3>
                                <div class="description"></div>

                                <div class="product-price"> 
                                  <?php Functions::CheckPrice($pro->startsale, $pro->endsale, $pro->pricesale, $pro->price); ?>
                                  
                                  <span style="font-size: 15px; font-weight: bold">/<?php echo $pro->pricelist ?></span>

                                </div>
                                <!-- /.product-price -->

                              </div><!-- /.product-info -->
                              <div class="cart clearfix animate-effect">
                                <div class="action">
                                  <ul class="list-unstyled">
                                    <li class="add-cart-button btn-group">
                                      <button data-toggle="tooltip" 
                                      class="btn btn-primary icon btn-cart" 
                                      data-pirce="<?php echo Functions::price($pro->startsale, $pro->endsale, $pro->pricesale, $pro->price); ?>"
                                      href="<?php echo Url::to(['/cart/addcart', 'id'=>$pro->id]) ?>"
                                      data-img="<?php echo yii::$app->params['homepath'].$pro->images ?>"
                                      data-name="<?php echo $pro->name ?>"
                                      data-pricelist="<?php echo $pro->pricelist ?>"
                                      type="button" title="Thêm giỏ hàng">
                                      <i class="fa fa-shopping-cart"></i>                                                 
                                    </button>
                                    <!-- <button class="btn btn-primary cart-btn" type="button">Thêm giỏ hàng</button> -->
                                  </li>

                                  <li class="lnk wishlist">
                                    <a data-toggle="tooltip" class="add-to-wishlist" data-name="<?php echo $pro->name; ?>" data-img="<?php echo $pro->images ?>" data-id="wishlist-<?php echo $pro->id ?>" href="<?php echo Url::to(['/wishlist/addwishlist', 'id'=>$pro->id]) ?>" 
                                      data-count="<?= isset(Yii::$app->user->identity->id) ? Yii::$app->user->identity->id : NULL ?>"
                                      title="Yêu thích">
                                      <i class="icon fa fa-heart"></i>
                                    </a>
                                  </li>

                                </ul>
                              </div><!-- /.action -->
                            </div><!-- /.cart -->
                          </div><!-- /.product -->

                        </div><!-- /.products -->
                      </div><!-- /.item -->
                    <?php  endforeach; else: ?>
                    <h4>Không có sản phẩm nào phù hợp với giá yêu cầu.</h4>
                  <?php endif; ?>
                </div><!-- /.row -->
              </div><!-- /.category-product -->

            </div><!-- /.tab-pane -->

            <!-- /.tab-pane #list-container -->
          </div><!-- /.tab-content -->
          <div class="clearfix filters-container">

            <div class="text-right">
              <div class="pagination-container">
                <?php
                echo LinkPager::widget([
                  'pagination' => $pages,
                  'prevPageLabel' => '<i class="fa fa-angle-left"></i>',
                  'nextPageLabel' => '<i class="fa fa-angle-right"></i>',
                  'maxButtonCount' => 3,
                  'options' => [
                    'class' => 'list-inline list-unstyled',
                  ],

                  ]); ?>
                </div><!-- /.pagination-container -->         
              </div><!-- /.text-right -->

            </div><!-- /.filters-container -->

          </div><!-- /.search-result-container -->

        </div><!-- /.col -->
      </div><!-- /.row -->
      <!-- ============================================== BRANDS CAROUSEL ============================================== -->
      <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->  
    </div><!-- /.container -->

  </div><!-- /.body-content -->
</div>
<!-- ============================================================= FOOTER ============================================================= -->
