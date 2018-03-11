
<div class="sidebar-widget hot-deals wow fadeInUp outer-bottom-xs">
  <h3 class="section-title">Ưu đãi</h3>
  <div class="owl-carousel sidebar-carousel custom-carousel owl-theme outer-top-ss">
<?php 
use yii\helpers\Url;
$date = date('Y-m-d');

?>
    <?php foreach ($off as $key => $off) : ?>
      <div class="item">
        <div class="products">
          <div class="hot-deal-wrapper">
            <div class="image">
              <img src="<?php echo $off->image ?>" alt="<?php echo $off->name ?>">
            </div>
            <?php if ($off->saleoff): ?>              
              <div class="sale-offer-tag"><span><?php echo $off->saleoff ?>%<br>off</span></div>
            <?php endif ?>
              <!-- <div class="timing-wrapper">
                <div class="box-wrapper">
                  <div class="date box">
                    <span class="key">120</span>
                    <span class="value">DAYS</span>
                  </div>
                </div>

                <div class="box-wrapper">
                  <div class="hour box">
                    <span class="key">20</span>
                    <span class="value">HRS</span>
                  </div>
                </div>

                <div class="box-wrapper">
                  <div class="minutes box">
                    <span class="key">36</span>
                    <span class="value">MINS</span>
                  </div>
                </div>

                <div class="box-wrapper hidden-md">
                  <div class="seconds box">
                    <span class="key">60</span>
                    <span class="value">SEC</span>
                  </div>
                </div>
              </div> -->
            </div><!-- /.hot-deal-wrapper -->

            <div class="product-info text-left m-t-20">
              <h3 class="name"><a href="<?php echo Url::to(['/product/detail', 'slug'=>$off->slug]) ?>"><?php echo $off->name; ?></a></h3>
              <div class="rating rateit-small"></div>

              <div class="product-price">                

                <?php if ($date >= $off->startsale && $date <= $off->endsale && $off->pricesale != NULL) : $price = $off->pricesale; ?>
                  <span class="price"><?php echo number_format($off->pricesale, 0, '', '.'); ?></span>
                  <span class="price-before-discount"><?php echo number_format($off->price, 0, '', '.') ?></span>                      
                <?php else : $price = $off->price;?>
                  <span class="price"><?php echo number_format($off->price, 0, '', '.'); ?></span>
                <?php endif; ?>
                <span style="font-size: 15px; font-weight: bold"><?php echo $off->pricelist; ?></span>                 

              </div><!-- /.product-price -->

            </div><!-- /.product-info -->

            <div class="cart clearfix animate-effect">
              <div class="action">

                <div class="add-cart-button btn-group">
                  <button class="btn btn-primary icon btn-cart" data-toggle="dropdown" type="button"
                  href="<?php echo Url::to(['/cart/addcart', 'id'=>$off->id]) ?>" 
                  data-name="<?php echo $off->name ?>"
                  data-img="<?php echo $off->image ?>"
                  data-price="<?php echo number_format($price, 0, '', '.') ?>">
                  <i class="fa fa-shopping-cart"></i>                                                 
                </button>
                <button class="btn btn-primary cart-btn btn-cart" type="button"
                href="<?php echo Url::to(['/cart/addcart', 'id'=>$off->id]) ?>" 
                data-name="<?php echo $off->name ?>"
                data-img="<?php echo $off->image ?>"
                data-price="<?php echo number_format($price, 0, '', '.') ?>">Thêm giỏ hàng</button>

              </div>

            </div><!-- /.action -->
          </div><!-- /.cart -->
        </div>  
      </div>              
    <?php endforeach; ?>           


  </div><!-- /.sidebar-widget -->
</div>