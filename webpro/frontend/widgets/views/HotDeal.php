 <?php 
 use frontend\Component\Functions;
 if ($data) :

  ?>
  <div class="sidebar-widget hot-deals wow fadeInUp outer-bottom-xs">
    <h3 class="section-title">Ưu đãi</h3>
    <div class="owl-carousel sidebar-carousel custom-carousel owl-theme outer-top-ss">
      <?php $n = 0; foreach ($data as $value) : ?>
      
      <div class="item">
        <div class="products">
          <div class="hot-deal-wrapper">
            <div class="image">
              <img src="<?= Yii::$app->params['homepath'] ?><?php echo $value['images'] ?>" alt="">
            </div>
            <div class="sale-offer-tag"><span><?php echo $value['saleoff'] ?>%<br>off</span></div>
            <div class="timing-wrapper">
              

              
            </div>
          </div>

          <!-- /.hot-deal-wrapper -->

          <div class="product-info text-left m-t-20">
            <h3 class="name"><a href="<?php echo yii\helpers\Url::to(['/product/detail', 'slug'=>$value['slug']]) ?>"><?php echo $value['name'] ?></a></h3>

            <div class="product-price"> 
              <?php echo Functions::CheckPrice ($value['startsale'], $value['endsale'], $value['pricesale'], $value['price']) ?>
            </div><!-- /.product-price -->

          </div><!-- /.product-info -->

          <div class="cart clearfix animate-effect">
            <div class="action">

              <div class="add-cart-button btn-group">
                <button class="btn btn-primary icon" data-toggle="dropdown" type="button">
                  <i class="fa fa-shopping-cart"></i>                                                 
                </button>
                <button class="btn btn-primary cart-btn" type="button">Add to cart</button>

              </div>

            </div><!-- /.action -->
          </div><!-- /.cart -->
        </div>  
      </div>  

<?php $n++; endforeach; ?>

</div><!-- /.sidebar-widget -->
</div>


<?php endif; ?>

<!--  <script>
        var countDownDate = new Date("<?php echo $value['endsale'] ?>").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

    // Get todays date and time
    var now = new Date().getTime();
    
    // Find the distance between now an the count down date
    var distance = countDownDate - now;
    
    // Time calculations for days, hours, minutes and seconds
    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
    // Output the result in an element with id="demo"
    document.getElementById("day-<?php echo $n ?>").innerHTML = days ;
    document.getElementById("hours-<?php echo $n ?>").innerHTML = hours ;
    document.getElementById("hours-<?php echo $n ?>").innerHTML = days ;
    document.getElementById("minutes-<?php echo $n ?>").innerHTML = minutes ;
    document.getElementById("seconds-<?php echo $n ?>").innerHTML = seconds ;
    
    // If the count down is over, write some text 
    // if (distance < 0) {
    //   clearInterval(x);
    //   document.getElementById("day-clock").innerHTML = "EXPIRED";
    // }
  }, 1000);
</script> -->