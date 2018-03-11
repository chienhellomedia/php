<?php

/* @var $this yii\web\View */
use backend\models\Category;
use backend\models\Blog;
use frontend\widgets\BannerWidget;
use frontend\widgets\Video;
use frontend\widgets\HotDeal;
use frontend\widgets\SideMenu;
use frontend\widgets\Facebook;
use frontend\widgets\Certi;
use frontend\widgets\Blogtag;
use frontend\widgets\SpecialOffer;
use frontend\component\Functions;
use yii\helpers\Url;

$this->title = 'Trang chủ';
?>
<div class="body-content outer-top-xs" id="top-banner-and-menu">
  <div class="container">
    <div class="row">
      <!-- ============================================== SIDEBAR ============================================== -->  
      <div class="col-xs-12 col-sm-12 col-md-3 sidebar">

        <?php echo SideMenu::widget(); ?>

        <?php echo Video::widget(); ?>

        <?php echo SpecialOffer::widget(); ?>
        
        <?php echo Blogtag::widget(); ?>
      
        <?php echo Facebook::widget(); ?>
       
        <?php echo Certi::widget() ?>

     


      </div><!-- /.sidemenu-holder -->
      <!-- ============================================== SIDEBAR : END ============================================== -->

      <!-- ============================================== CONTENT ============================================== -->
      <div class="col-xs-12 col-sm-12 col-md-9 homebanner-holder">
        <!-- ========================================== SECTION – HERO ========================================= -->

        <?php echo BannerWidget::widget(); ?>
        <!-- ============================================== INFO BOXES : END ============================================== -->
        <!-- ============================================== SCROLL TABS ============================================== -->
        <div id="product-tabs-slider" class="scroll-tabs outer-top-vs wow fadeInUp">
          <div class="more-info-tab clearfix ">
           <h3 class="new-product-title pull-left">Sản phẩm mới</h3>
           <!--  -->
         </div>

         <div class="tab-content outer-top-xs">
          <div class="tab-pane in active" id="all">           
            <div class="product-slider">
              <div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">

                <?php foreach ($data['newproduct'] as $newproduct): ?>

                  <div class="item item-carousel">
                    <div class="products">
                      <div class="product">       
                        <div class="product-image">
                          <div class="image">
                            <a href="<?php echo Url::to(['/product/details', 'slug'=>$newproduct->slug]) ?>"><img  src="<?= Yii::$app->params['homepath'].$newproduct->images ?>" alt=""></a>
                          </div><!-- /.image -->          

                          <?php Functions::CheckSale($newproduct->startsale, $newproduct->endsale, $newproduct->saleoff) ?>                                
                        </div><!-- /.product-image -->


                        <div class="product-info text-left">
                          <h3 class="name"><a href="<?php echo Url::to(['/product/details', 'slug'=>$newproduct->slug]) ?>"><?php echo $newproduct->name ?></a></h3>
                          <div class="description"></div>

                          <div class="product-price"> 
                            <?php Functions::CheckPrice($newproduct->startsale, $newproduct->endsale, $newproduct->pricesale, $newproduct->price); ?>
                       <!--  <span class="price">
                        $450.99             </span>
                        <span class="price-before-discount">$ 800</span>
                        <--> 
                        <span style="font-size: 15px; font-weight: bold">/<?php echo $newproduct->pricelist ?></span>
                      </div><!-- /.product-price -->

                    </div><!-- /.product-info -->
                    <div class="cart clearfix animate-effect">
                      <div class="action">
                        <ul class="list-unstyled">
                          <li class="add-cart-button btn-group">
                            <button data-toggle="tooltip" 
                            class="btn btn-primary icon btn-cart" 
                            data-pirce="<?php echo Functions::price($newproduct->startsale, $newproduct->endsale, $newproduct->pricesale, $newproduct->price); ?>"
                            href="<?php echo Url::to(['/cart/addcart', 'id'=>$newproduct->id]) ?>"
                            data-img="<?php echo yii::$app->params['homepath'].$newproduct->images ?>"
                            data-name="<?php echo $newproduct->name ?>"
                            data-pricelist="<?php echo $newproduct->pricelist ?>"
                            type="button" title="Thêm giỏ hàng">
                            <i class="fa fa-shopping-cart"></i>                                                 
                          </button>
                          <!-- <button class="btn btn-primary cart-btn" type="button">Thêm giỏ hàng</button> -->
                        </li>

                        <li class="lnk wishlist">
                          <a data-toggle="tooltip" class="add-to-wishlist" data-name="<?php echo $newproduct->name; ?>" data-img="<?php echo $newproduct->images ?>" data-id="wishlist-<?php echo $newproduct->id ?>" href="<?php echo Url::to(['/wishlist/addwishlist', 'id'=>$newproduct->id]) ?>" 
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
          <?php endforeach ?>

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
          <img class="img-responsive" src="<?= Yii::$app->params['homepath'] ?>uploads/images/banners/01.jpg" alt="">
        </div>

      </div><!-- /.wide-banner -->
    </div><!-- /.col -->
    <div class="col-md-5 col-sm-5">
      <div class="wide-banner cnt-strip">
        <div class="image" style="background: #ffffff">
          <img class="img-responsive" src="<?= Yii::$app->params['homepath'] ?>uploads/images/banners/home1-images-banner1-2.png" alt="">
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
    <?php if($data['featured']):
    foreach ($data['featured'] as $featured) :
     ?>
     <div class="item item-carousel">
      <div class="products">

        <div class="product">       
          <div class="product-image">
            <div class="image">
              <a href="<?php echo Url::to(['/product/details', 'slug'=>$featured['slug']]) ?>"><img  src="<?= Yii::$app->params['homepath'] ?><?php echo $featured['images'] ?>" alt=""></a>
            </div><!-- /.image -->          

            <?php Functions::CheckSale($featured['startsale'], $featured['endsale'], $featured['saleoff']) ?>      
          </div><!-- /.product-image -->


          <div class="product-info text-left">
            <h3 class="name"><a href="<?php echo Url::to(['/product/details', 'slug'=>$featured['slug']]) ?>"><?php echo $featured['name'] ?></a></h3>
            <div class="description"></div>

            <div class="product-price"> 
             <?php Functions::CheckPrice($featured['startsale'], $featured['endsale'], $featured['pricesale'], $featured['price']) ?>
             <span style="font-size: 15px; font-weight: bold">/<?php echo $featured['pricelist'] ?></span>
           </div><!-- /.product-price -->

         </div><!-- /.product-info -->
         <div class="cart clearfix animate-effect">
          <div class="action">
            <ul class="list-unstyled">
              <li class="add-cart-button btn-group">
                <button class="btn btn-primary icon btn-cart" 
                data-toggle="tooltip" 
                data-pirce="<?php echo Functions::price($featured['startsale'], $featured['endsale'], $featured['pricesale'], $featured['price']); ?>"
                href="<?php echo Url::to(['/cart/addcart', 'id'=>$featured['id']]) ?>"
                data-img="<?php echo yii::$app->params['homepath'].$featured['images'] ?>"
                data-name="<?php echo $featured['name'] ?>"
                data-pricelist="<?php echo $featured['pricelist'] ?>"
                data-toggle="dropdown" type="button" title="Thêm giỏ hàng">
                <i class="fa fa-shopping-cart"></i>                                                 
              </button>
              <!-- <button class="btn btn-primary cart-btn" type="button">Add to cart</button> -->

            </li>

            <li class="lnk wishlist">
              <a data-toggle="tooltip" 
              data-toggle="tooltip" class="add-to-wishlist"  data-name="<?php echo $featured['name']; ?>" data-img="<?php echo $featured['images'] ?>" data-id="wishlist-<?php echo $featured['id'] ?>" href="<?php echo Url::to(['/wishlist/addwishlist', 'id'=>$featured['id']]) ?>" 
              data-count="<?= isset(Yii::$app->user->identity->id) ? Yii::$app->user->identity->id : NULL ?>"
              title="Yêu thích"
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
<?php endforeach; endif ?>
</div><!-- /.home-owl-carousel -->
</section><!-- /.section -->

  <div class="best-deal wow fadeInUp outer-bottom-xs">
    <h3 class="section-title">Sản phẩm bán chạy</h3>
    <div class="sidebar-widget-body outer-top-xs">
      <div class="owl-carousel best-seller custom-carousel owl-theme outer-top-xs">
        <div class="item">
          <div class="products best-product">
           <?php 
           $i = 1; foreach ($data['bestseller']  as $key => $seller) : ?>
           <?php if ($i == 3) {
             $i = 1;
             echo '</div></div>';
             echo '<div class="item"><div class="products best-product">';
           } 
           ?>
           <div class="product">
            <div class="product-micro">
              <div class="row product-micro-row">
                <div class="col col-xs-5">
                  <div class="product-image">
                    <div class="image">
                      <a href="<?php echo Url::to(['/product/details', 'slug'=>$seller['slug']]) ?>">
                        <img src="<?= Yii::$app->params['homepath'] ?><?php echo $seller['images'] ?>" alt="">
                      </a>                    
                    </div><!-- /.image -->



                  </div><!-- /.product-image -->
                </div><!-- /.col -->
                <div class="col2 col-xs-7">
                  <div class="product-info">
                    <br>
                    <h3 class="name"><a href="<?php echo Url::to(['/product/details', 'slug'=>$seller['slug']]) ?>"><?php echo $seller['name'] ?></a></h3>
                    <div class="product-price"> 
                      <?php Functions::CheckPrice($seller['startsale'], $seller['endsale'], $seller['pricesale'], $seller['price']); ?>
                      <span style="font-size: 15px; font-weight: bold">/<?php echo $seller['pricelist'] ?></span>
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
  <h3 class="section-title">Tin tức mới nhất</h3>
  <div class="blog-slider-container outer-top-xs">
    <div class="owl-carousel blog-slider custom-carousel">
      <?php foreach ($data['blog'] as $blog) : ?>
        <div class="item">
          <div class="blog-post">
            <div class="blog-post-image">
              <div class="image">
                <a href="<?php echo Url::to(['/blog/detail', 'slug'=>$blog->slug]) ?>"><img src="<?= Yii::$app->params['homepath'] ?><?php echo $blog->image; ?>" alt=""></a>
              </div>
            </div><!-- /.blog-post-image -->


            <div class="blog-post-info text-left">
              <h3 class="name"><a href="<?php echo Url::to(['/blog/detail', 'slug'=>$blog->slug]) ?>"><?php echo $blog->title ?></a></h3>  
              <span class="info"><?php echo $blog->member->username ?> &nbsp;|&nbsp; <?php echo date('d-m-Y H:i:s', strtotime($blog->created_at)) ?> </span>
              <p class="text">
                <?php $content = new Blog();
                echo $content->catchuoi($blog->content, 100) ?></p>
                <a href="<?php echo Url::to(['/blog/detail', 'slug'=>$blog->slug]) ?>" class="lnk btn btn-primary">Xem tiếp</a>
              </div><!-- /.blog-post-info -->


            </div><!-- /.blog-post -->
          </div><!-- /.item -->
        <?php endforeach; ?>



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
