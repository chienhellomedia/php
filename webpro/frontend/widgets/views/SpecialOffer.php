<?php 
use yii\helpers\Url;
?>
<div class="sidebar-widget outer-bottom-small wow fadeInUp">
  <h3 class="section-title">Trái cây tươi</h3>
  <div class="sidebar-widget-body outer-top-xs">
    <div class="owl-carousel sidebar-carousel special-offer custom-carousel owl-theme outer-top-xs">


      <div class="item">
        <div class="products special-product">
          <?php $i=0; foreach ($offer as $key => $value) : 
          if($key % 3 == 0) {
            echo 
            '</div>
            </div>';
            echo 
            '<div class="item">
            <div class="products special-product">';
          }
          ?>
          <div class="product">
            <div class="product-micro">
              <div class="row product-micro-row">
                <div class="col col-xs-5">
                  <div class="product-image">
                    <div class="image">
                      <a href="<?php echo Url::to(['/product/detail', 'slug'=>$value->slug]) ?>">
                        <img src="<?php echo Yii::$app->params['homepath'].$value->images; ?>" alt="">
                      </a>                    
                    </div><!-- /.image -->



                  </div><!-- /.product-image -->
                </div><!-- /.col -->
                <div class="col col-xs-7">
                  <div class="product-info">
                    <br>
                    <h3 class="name"><a href="<?php echo Url::to(['/product/detail', 'slug'=>$value->slug]) ?>"><?php echo $value->name ?></a></h3>
                    <div class="product-price"> 
                      <span class="price"><?php echo number_format($value->price, 0, '', '.'); ?></span>
                      <span style="font-size: 12px; font-weight: bold"><?php echo $value->pricelist; ?></span>
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