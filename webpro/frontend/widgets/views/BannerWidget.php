<div id="hero">
  <div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-sm">
    <?php foreach ($data as $key => $value) : ?>
    <div class="item" style="background-image: url(<?= Yii::$app->params['homepath'].$value->images ?>">
      <div class="container-fluid">
        <div class="caption bg-color vertical-center text-left">
          <div class="slider-header fadeInDown-1"><?php echo $value->desc_1 ?></div>
          <div class="big-text fadeInDown-1">
            <?php echo $value->desc_2 ?>
          </div>

          <div class="excerpt fadeInDown-2 hidden-xs">

            <span><?php echo $value->desc_3 ?></span>

          </div>
          <div class="button-holder fadeInDown-3">
            <?php if($value->link != NULL) : ?>
            <a href="<?php echo $value->link ?>" class="btn-lg btn btn-uppercase btn-primary shop-now-button">Shop Now</a>
          <?php endif; ?>
          </div>
        </div><!-- /.caption -->
      </div><!-- /.container-fluid -->
    </div><!-- /.item -->
<?php endforeach; ?>



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
              <h4 class="info-box-heading green">Đổi trả</h4>
            </div>
          </div>  
          <h6 class="text">Trong vòng 1 tuần</h6>
        </div>
      </div><!-- .col -->

      <div class="hidden-md col-sm-4 col-lg-4">
        <div class="info-box">
          <div class="row">

            <div class="col-xs-12">
              <h4 class="info-box-heading green">Miễn phí giao hàng</h4>
            </div>
          </div>
          <h6 class="text">Hóa đơn trên 200k</h6>   
        </div>
      </div><!-- .col -->

      <div class="col-md-6 col-sm-4 col-lg-4">
        <div class="info-box">
          <div class="row">

            <div class="col-xs-12">
              <h4 class="info-box-heading green">Khách hàng vip</h4>
            </div>
          </div>
          <h6 class="text">Giảm 5% tổng sản phẩm</h6>    
        </div>
      </div><!-- .col -->
    </div><!-- /.row -->
  </div><!-- /.info-boxes-inner -->

    </div><!-- /.info-boxes -->