<?php

/* @var $this yii\web\View */
use backend\models\Product;
use backend\models\Category;
use frontend\widgets\Hotdeals;
use frontend\widgets\SpecialOffer;
use frontend\widgets\Blogtag;
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Trang chủ';
?>
<?php 
// var_dump($data);
$date = date('Y-m-d');
?>
<div class="body-content outer-top-xs" id="top-banner-and-menu">
  <div class="container">
    <div class="row">
      <!-- ============================================== SIDEBAR ============================================== -->  
      <div class="col-xs-12 col-sm-12 col-md-3 sidebar">

        <!-- ================================== TOP NAVIGATION ================================== -->
        <div class="side-menu animate-dropdown outer-bottom-xs">
          <div class="head"><i class="icon fa fa-align-justify fa-fw"></i> Danh mục</div>        
          <nav class="yamm megamenu-horizontal" role="navigation">
            <ul class="nav">
              <?php foreach ($cateAll as $key => $cateall): ?>               
                <li class="dropdown menu-item">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="/advanced/uploads/images/icon/bg-border-center.png" alt="" style="height: 20px; margin-right: 20px"><?php echo $cateall->name; ?></a>
                  <ul class="dropdown-menu mega-menu">
                    <li class="yamm-content">
                      <div class="row">                     

                        <div class="col-sm-12 col-md-12">
                          <ul class="links list-unstyled">
                           <?php 
                           $catesub = new Category();
                           $catesub = $catesub->getAllCateRoot($cateall->id);
                           foreach ($catesub as $key => $valcat) : ?> 

                           <li><a href="<?php echo Url::to(['/product/index', 'slug'=>$valcat->slug]) ?>"><?php echo $valcat->name ?></a></li>

                         <?php endforeach; ?> 
                       </ul>
                     </div><!-- /.col -->


                   </div><!-- /.row -->
                 </li><!-- /.yamm-content -->                    
               </ul><!-- /.dropdown-menu -->          
             </li><!-- /.menu-item -->
           <?php endforeach ?>











         </ul><!-- /.nav -->
       </nav><!-- /.megamenu-horizontal -->
     </div><!-- /.side-menu -->
     <!-- ================================== TOP NAVIGATION : END ================================== -->

     <!-- ============================================== HOT DEALS ============================================== -->
     <?php echo Hotdeals::Widget(); ?>
     <!-- ============================================== HOT DEALS: END ============================================== -->


     <!-- ============================================== SPECIAL OFFER ============================================== -->

     <?php echo SpecialOffer::Widget(); ?>
     <!-- ============================================== SPECIAL OFFER : END ============================================== -->
     <!-- ============================================== PRODUCT TAGS ============================================== -->
     
     <!-- ============================================== SPECIAL DEALS : END ============================================== -->
     <!-- ============================================== NEWSLETTER ============================================== -->
     <!-- tag-blog -->
     <?php echo Blogtag::Widget(); ?>
     <!-- tag-blog -->
     <div class="sidebar-widget newsletter wow fadeInUp outer-bottom-small">
      <h3 class="section-title">Thông báo</h3>
      <div class="sidebar-widget-body outer-top-xs">
        <p>Đăng ký để nhận thông báo mới nhất!</p>
          <?php $form = ActiveForm::begin([
            'method' => 'post',
            'action'=> ['/site/subcribe'],
            ]) ?>
            <div class="form-group">
              <label class="sr-only" for="exampleInputEmail1">Địa chỉ Email</label>
              <input type="email" class="form-control" id="exampleInputEmail1" name="emailsub" placeholder="Nhập địa chỉ Email">
            </div>
            <button class="btn btn-primary" name="subcribe">Đăng ký</button>
          <?php ActiveForm::end() ?>
        </div><!-- /.sidebar-widget-body -->
      </div><!-- /.sidebar-widget -->
      <!-- ============================================== NEWSLETTER: END ============================================== -->

      <!-- ============================================== Testimonials============================================== -->
      <div class="sidebar-widget  wow fadeInUp outer-top-vs ">
        <div id="advertisement" class="advertisement">
          <?php foreach ($supp as $sup) : ?>
            <div class="item">
              <div class="avatar"><img src="<?php echo $sup->image; ?>" alt="Image"></div>
              <div class="testimonials"><em>"</em> <?php echo $sup->speech; ?><em>"</em></div>
              <div class="clients_author"><?php echo $sup->name ?>    <span><?php echo $sup->company ?></span>    </div><!-- /.container-fluid -->
            </div><!-- /.item -->
          <?php endforeach; ?>
        </div><!-- /.owl-carousel -->
      </div>

      <!-- ============================================== Testimonials: END ============================================== -->






    </div><!-- /.sidemenu-holder -->
    <!-- ============================================== SIDEBAR : END ============================================== -->

    <!-- ============================================== CONTENT ============================================== -->
    <div class="col-xs-12 col-sm-12 col-md-9 homebanner-holder">
      <!-- ========================================== SECTION – HERO ========================================= -->

      <div id="hero">
        <div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-sm">

          <div class="item" style="background-image: url(<?php echo Yii::$app->homeUrl ?>assets/images/sliders/01.jpg);">
            <div class="container-fluid">
              <div class="caption bg-color vertical-center text-left">
                <div class="slider-header fadeInDown-1"></div>
                <div class="big-text fadeInDown-1">
                  Rau an toàn
                </div>

                <div class="excerpt fadeInDown-2 hidden-xs">

                  <span>Chúng tôi phân phối các loại Rau Củ Quả An toàn từ các cánh đồng tới ngôi nhà của bạn.</span>

                </div>
                <div class="button-holder fadeInDown-3">
                  <a href="<?php echo Url::to(['/product/index']) ?>" class="btn-lg btn btn-uppercase btn-primary shop-now-button">Mua ngay</a>
                </div>
              </div><!-- /.caption -->
            </div><!-- /.container-fluid -->
          </div><!-- /.item -->

          <div class="item" style="background-image: url(<?php echo Yii::$app->homeUrl ?>assets/images/sliders/02.jpg);">
            <div class="container-fluid">
              <div class="caption bg-color vertical-center text-left">
               <div class="slider-header fadeInDown-1">Giải nhiệt mùa hè</div>
               <div class="big-text fadeInDown-1">
                Các loại Rau tươi mát <span class="highlight"></span>
              </div>

              <div class="excerpt fadeInDown-2 hidden-xs">

                <span>Chúng tôi phân phối các loại Rau Củ Quả An toàn từ các cánh đồng tới ngôi nhà của bạn.</span>

              </div>
              <div class="button-holder fadeInDown-3">
                <a href="<?php echo Url::to(['/product/index']) ?>" class="btn-lg btn btn-uppercase btn-primary shop-now-button">Mua ngay</a>
              </div>
            </div><!-- /.caption -->
          </div><!-- /.container-fluid -->
        </div><!-- /.item -->



      </div><!-- /.owl-carousel -->
    </div>

    <!-- ========================================= SECTION – HERO : END ========================================= -->   

    <!-- ============================================== INFO BOXES ============================================== -->
    <div class="info-boxes wow fadeInUp">
      <div class="info-boxes-inner">
        <div class="row">
          <div class="col-md-6 col-sm-4 col-lg-4">
            <div class="info-box">
              <div class="row">

                <div class="col-xs-12">
                  <h4 class="info-box-heading green">Hoàn tiền</h4>
                </div>
              </div>  
              <h6 class="text">Trong vòng 7 ngày</h6>
            </div>
          </div><!-- .col -->

          <div class="hidden-md col-sm-4 col-lg-4">
            <div class="info-box">
              <div class="row">

                <div class="col-xs-12">
                  <h4 class="info-box-heading green">Miễn phí giao hàng</h4>
                </div>
              </div>
              <h6 class="text">cho các hóa đơn trên 200k</h6>   
            </div>
          </div><!-- .col -->

          <div class="col-md-6 col-sm-4 col-lg-4">
            <div class="info-box">
              <div class="row">

                <div class="col-xs-12">
                  <h4 class="info-box-heading green">Mua hàng Online</h4>
                </div>
              </div>
              <h6 class="text">Thanh toán dễ dàng</h6>    
            </div>
          </div><!-- .col -->
        </div><!-- /.row -->
      </div><!-- /.info-boxes-inner -->

    </div><!-- /.info-boxes -->
    <!-- ============================================== INFO BOXES : END ============================================== -->
    <?php //echo '<pre>'; var_dump($data); echo '</pre>'; ?>
    <!-- ============================================== SCROLL TABS ============================================== -->
    <div id="product-tabs-slider" class="scroll-tabs outer-top-vs wow fadeInUp">
      <div class="more-info-tab clearfix ">    
       <h3 class="new-product-title pull-left">Sản phẩm mới</h3>

     </div>

     <div class="tab-content outer-top-xs">
      <div class="tab-pane in active" id="all">           
        <div class="product-slider">
          <div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">

            <?php foreach ($data as $key => $value) :?>
              <div class="item item-carousel">
                <div class="products">
                  <div class="product">       
                    <div class="product-image">
                      <div class="image">
                        <a href="<?php echo Url::to(['/product/detail', 'slug'=>$value->slug]) ?>"><img  src="<?php echo $value->image ?>" alt=""></a>
                      </div><!-- /.image -->          
                      <?php if ($date >= $value->startsale && $date <= $value->endsale && $value->pricesale != NULL) {
                        echo '<div class="tag sale"><span>sale</span></div>'; 
                      } ?>      
                    </div><!-- /.product-image -->


                    <div class="product-info text-left">
                      <h3 class="name"><a href="<?php echo Url::to(['/product/detail', 'slug'=>$value->slug]) ?>"><?php echo $value->name ?></a></h3>
                      <div class="rating rateit-small"></div>
                      <div class="description"></div>

                      <div class="product-price">                                                      

                        <?php if ($date >= $value->startsale && $date <= $value->endsale && $value->pricesale != NULL) {
                          $price = $value->pricesale;
                          echo '<span class="price">'.number_format($value->pricesale, 0, '', '.').'</span>';
                          echo '<span class="price-before-discount">'.number_format($value->price, 0, '', '.').'</span>';
                        } else {
                          $price = $value->price;
                          echo '<span class="price">'.number_format($value->price, 0, '', '.').'</span>';
                        }

                        ?>

                        <span style="font-size: 15px; font-weight: bold"><?php echo $value->pricelist; ?></span>
                      </div><!-- /.product-price -->

                    </div><!-- /.product-info -->
                    <div class="cart clearfix animate-effect">
                      <div class="action">
                        <ul class="list-unstyled">
                          <li class="add-cart-button btn-group">
                            <a href="<?php echo Url::to(['/cart/addcart', 'id'=>$value->id]) ?>" 
                              class="btn-cart"
                              data-img="<?php echo $value->image ?>"
                              data-name="<?php echo $value->name ?>"
                              data-price="<?php echo number_format($price, 0, '', '.') ?>"
                              title="Thêm giỏ hàng">
                              <button class="btn btn-primary icon" data-toggle="dropdown" type="button">
                                <i class="fa fa-shopping-cart"></i>                                                
                              </button></a> 


                            </li>

                            <li class="lnk wishlist">
                              <a class="add-to-wishlist" data-name="<?php echo $value->name; ?>" data-img="<?php echo $value->image ?>" data-id="wishlist-<?php echo $value->id ?>" href="<?php echo Url::to(['/wishlist/addwishlist', 'id'=>$value->id]) ?>" title="Yêu thích">
                               <i class="icon fa fa-heart"></i>
                             </a>
                           </li>

                           <li class="lnk">
                            <a class="add-to-cart add-compare"
                            data-name="<?php echo $value->name; ?>"
                             href="<?php echo Url::to(['/compare/addcompare', 'id'=>$value->id]) ?>" 
                             title="So sánh">
                              <i class="fa fa-signal" aria-hidden="true"></i>
                            </a>
                          </li>
                        </ul>
                      </div><!-- /.action -->
                    </div><!-- /.cart -->
                  </div><!-- /.product -->


                </div><!-- /.products -->
              </div><!-- /.item -->
            <?php endforeach; ?>


          </div><!-- /.home-owl-carousel -->
        </div><!-- /.product-slider -->
      </div><!-- /.tab-pane -->



    </div><!-- /.tab-content -->
  </div><!-- /.scroll-tabs -->
  <!-- ============================================== SCROLL TABS : END ============================================== -->
  <!-- ============================================== WIDE PRODUCTS ============================================== -->
  <div class="wide-banners wow fadeInUp outer-bottom-xs">
    <div class="row">
      <div class="col-md-7 col-sm-7">
        <div class="wide-banner cnt-strip">
          <div class="image">
            <img class="img-responsive" src="<?php echo Yii::$app->homeUrl ?>uploads/images/slider/01.jpg" alt="">
          </div>

        </div><!-- /.wide-banner -->
      </div><!-- /.col -->
      <div class="col-md-5 col-sm-5">
        <div class="wide-banner cnt-strip">
          <div class="image">
            <img class="img-responsive" src="<?php echo Yii::$app->homeUrl ?>uploads/images/advert/home1-images-banner1-2.png" alt="" style="background-color: #fff">
          </div>

        </div><!-- /.wide-banner -->
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.wide-banners -->

  <!-- ============================================== WIDE PRODUCTS : END ============================================== -->
  <!-- ============================================== FEATURED PRODUCTS ============================================== -->
  <section class="section featured-product wow fadeInUp">
    <h3 class="section-title">Sản phẩm nổi bật</h3>
    <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">

     <?php foreach ($featured as $fea) : ?>

      <div class="item item-carousel">
        <div class="products">

          <div class="product">       
            <div class="product-image">
              <div class="image">
                <a href="<?php echo Url::to(['/product/detail', 'slug'=>$fea->slug]) ?>"><img  src="<?php echo $fea->image ?>" alt=""></a>
              </div><!-- /.image -->          
              <?php if ($fea->new): ?>                                                
                <div class="tag new"><span>new</span></div> 
              <?php elseif ($date >= $fea->startsale && $date <= $fea->endsale && $fea->pricesale != NULL) : ?>      
                <div class="tag sale"><span>sale</span></div>                          
              <?php endif ?>
            </div><!-- /.product-image -->


            <div class="product-info text-left">
              <h3 class="name"><a href="<?php echo Url::to(['product/detail', 'slug'=>$fea->slug]) ?>"><?php echo $fea->name ?></a></h3>
              <div class="rating rateit-small"></div>
              <div class="description"></div>

              <div class="product-price"> 
                <?php if ($date >= $fea->startsale && $date <= $fea->endsale && $fea->pricesale != NULL) : $price = $fea->pricesale;?>
                  <span class="price"><?php echo number_format($fea->price, 0, '', '.'); ?></span>
                  <span class="price-before-discount"><?php echo number_format($fea->pricesale, 0, '', '.'); ?></span>
                <?php else : $price = $fea->price?>
                  <span class="price"><?php echo number_format($fea->price, 0, '', '.'); ?></span>
                <?php endif; ?>
                <span style="font-size: 15px; font-weight: bold"><?php echo $fea->pricelist; ?></span>
              </div><!-- /.product-price -->

            </div><!-- /.product-info -->
            <div class="cart clearfix animate-effect">
              <div class="action">
                <ul class="list-unstyled">
                  <li class="add-cart-button btn-group">
                    <button class="btn btn-primary icon btn-cart" data-toggle="dropdown"
                    href="<?php echo Url::to(['/cart/addcart', 'id'=>$fea->id]) ?>" 
                    data-name="<?php echo $fea->name ?>"
                    data-img="<?php echo $fea->image ?>"
                    data-price="<?php echo number_format($price, 0, '', '.') ?>"
                    type="button">
                    <i class="fa fa-shopping-cart"></i>                                                 
                  </button>

                </li>

                <li class="lnk wishlist">
                  <a class="add-to-cart" href="<?php echo Url::to(['/cart/addcart', 'id'=>$fea->id]) ?>"  data-price="<?php echo number_format($price, 0, '', '.') ?>" data-img="<?php echo $fea->image ?>" data-name="<?php echo $fea->name ?>" title="Wishlist">
                   <i class="icon fa fa-heart"></i>
                 </a>
               </li>

               <li class="lnk">
                 <a class="add-to-cart add-compare"  data-name="<?php echo $fea->name ?>" href="<?php echo Url::to(['/compare/addcompare', 'id'=>$fea->id]) ?>" title="So sánh">
                  <i class="fa fa-signal" aria-hidden="true"></i>
                </a>
              </li>
            </ul>
          </div><!-- /.action -->
        </div><!-- /.cart -->
      </div><!-- /.product -->

    </div><!-- /.products -->
  </div><!-- /.item -->
<?php endforeach; ?>






</div><!-- /.home-owl-carousel -->
</section><!-- /.section -->
<!-- ============================================== FEATURED PRODUCTS : END ============================================== -->
<!-- ============================================== WIDE PRODUCTS ============================================== -->
<div class="wide-banners wow fadeInUp outer-bottom-xs">
  <div class="row">

    <div class="col-md-12">
      <div class="wide-banner cnt-strip">
        <div class="image">
          <img class="img-responsive" src="/advanced/uploads/images/advert/7.jpg" alt="">
        </div>  
        <div class="strip strip-text">
          <div class="strip-inner">
            <h2 class="text-right">Khuyến mãi<br>
              <span class="shopping-needs">Giảm 40% cho khách hàng vào ngày 2-9</span></h2>
            </div>  
          </div>
          <div class="new-label">
            <div class="text">NEW</div>
          </div><!-- /.new-label -->
        </div><!-- /.wide-banner -->
      </div><!-- /.col -->

    </div><!-- /.row -->
  </div><!-- /.wide-banners -->
  <!-- ============================================== WIDE PRODUCTS : END ============================================== -->
  <!-- ============================================== BEST SELLER ============================================== -->

  <div class="best-deal wow fadeInUp outer-bottom-xs">
    <h3 class="section-title">Sản phẩm bán chạy</h3>
    <div class="sidebar-widget-body outer-top-xs">
      <div class="owl-carousel best-seller custom-carousel owl-theme outer-top-xs">

        <div class="item">
          <div class="products best-product">
            <?php $i = 1; foreach ($bestseller as $key => $seller) : ?>
            <?php if ($i == 3){
              $i = 1;
              echo '</div></div><div class="item"><div class="products best-product">';
            } ?>


            <div class="product">
              <div class="product-micro">
                <div class="row product-micro-row">
                  <div class="col col-xs-5">
                    <div class="product-image">
                      <div class="image">
                        <a href="<?php echo Url::to(['/product/detail', 'slug'=>$seller->slug]) ?>"> 
                          <img src="<?php echo $seller->image ?>" alt="">
                        </a>                    
                      </div><!-- /.image -->



                    </div><!-- /.product-image -->
                  </div><!-- /.col -->
                  <div class="col2 col-xs-7">
                    <div class="product-info">
                      <h3 class="name"><a href="<?php echo Url::to(['/product/detail', 'slug'=>$seller->slug]) ?>"><?php echo $seller->name; ?></a></h3>
                      <div class="rating rateit-small"></div>
                      <div class="product-price">                                     
                        <span class="price"><?php echo number_format($seller->price, 0, '', '.'); ?></span>        
                        <span style="font-size: 12px; font-weight: bold"><?php echo $seller->pricelist; ?></span>
                      </div><!-- /.product-price -->

                    </div>
                  </div><!-- /.col -->
                </div><!-- /.product-micro-row -->
              </div><!-- /.product-micro -->
            </div>    
            <?php $i++; endforeach; ?>

          </div>
        </div>                                


      </div>
    </div><!-- /.sidebar-widget-body -->
  </div><!-- /.sidebar-widget -->
  <!-- ============================================== BEST SELLER : END ============================================== -->    

  <!-- ============================================== BLOG SLIDER ============================================== -->
  <section class="section latest-blog outer-bottom-vs wow fadeInUp">
    <h3 class="section-title">Các bài viết</h3>
    <div class="blog-slider-container outer-top-xs">
      <div class="owl-carousel blog-slider custom-carousel">
        <?php foreach ($blog as $key => $blog) : ?>
          <div class="item clearfix">
            <div class="blog-post">
              <div class="blog-post-image">
                <div class="image">
                  <a href="blog.html"><img src="<?php echo $blog->image ?>" alt=""></a>
                </div>
              </div><!-- /.blog-post-image -->


              <div class="blog-post-info text-left">
                <h3 class="name"><a href="<?php echo Url::to(['/blog/detail', 'slug'=>$blog->slug]) ?>"><?php echo $blog->title; ?></a></h3>  
                <span class="info">By Jone Doe &nbsp;|&nbsp; 21 March 2016 </span>
                <p class="text"><?php echo $blog->shorttitle; ?></p>
                <a href="<?php echo Url::to(['/blog/detail', 'slug'=>$blog->slug]) ?>" class="lnk btn btn-primary">Đọc tiếp</a>
              </div><!-- /.blog-post-info -->


            </div><!-- /.blog-post -->
          </div><!-- /.item -->
        <?php endforeach; ?>



        <!-- /.item -->






      </div><!-- /.owl-carousel -->
    </div><!-- /.blog-slider-container -->
  </section><!-- /.section -->
  <!-- ============================================== BLOG SLIDER : END ============================================== -->    

  <!-- ============================================== FEATURED PRODUCTS ============================================== -->

  <!-- ============================================== FEATURED PRODUCTS : END ============================================== -->

</div><!-- /.homebanner-holder -->
<!-- ============================================== CONTENT : END ============================================== -->
</div><!-- /.row -->
<!-- ============================================== BRANDS CAROUSEL ============================================== -->

<!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
</div><!-- /.container -->
</div><!-- /#top-banner-and-menu -->