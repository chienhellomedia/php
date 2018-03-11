<footer id="footer" class="footer color-bg" style="margin-top: 20px">


  <div class="footer-bottom">
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-3">
          <div class="module-heading">
            <h4 class="module-title">Liên hệ</h4>
          </div><!-- /.module-heading -->

          <div class="module-body">
            <ul class="toggle-footer" style="">
              <li class="media">
                <div class="pull-left">
                 <span class="icon fa-stack fa-lg">
                  <i class="fa fa-map-marker fa-stack-1x fa-inverse"></i>
                </span>
              </div>
              <div class="media-body">
                <p>Kiot 4a CT5, kđt Hồng Hà, Tứ Hiệp, TT, Hà Nội</p>
              </div>
            </li>

            <li class="media">
              <div class="pull-left">
               <span class="icon fa-stack fa-lg">
                <i class="fa fa-mobile fa-stack-1x fa-inverse"></i>
              </span>
            </div>
            <div class="media-body">
              <p>096 115 22 66</p>
            </div>
          </li>

          <li class="media">
            <div class="pull-left">
             <span class="icon fa-stack fa-lg">
              <i class="fa fa-envelope fa-stack-1x fa-inverse"></i>
            </span>
          </div>
          <div class="media-body">
            <span><a href="#">nongtraithucphamhnh@gmail.com</a></span>
          </div>
        </li>

      </ul>
    </div><!-- /.module-body -->
  </div><!-- /.col -->

  <div class="col-xs-12 col-sm-6 col-md-9">
   <div id="map" style="width:100%;min-height:230px"></div>
   <script>
    function myMap() {
      var mapCanvas = document.getElementById("map");
      var myCenter = new google.maps.LatLng(20.948682,105.853152); 
      var mapOptions = {center: myCenter, zoom: 14};
      var map = new google.maps.Map(mapCanvas,mapOptions);
      var marker = new google.maps.Marker({
        position: myCenter,
        animation: google.maps.Animation.DROP
      });
      marker.setMap(map);
    }
  </script>

  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDjhzHgRSw_l9pbnct0Dzyiww4TwJKu65A&callback=myMap"></script>


</div><!-- /.col -->


</div>
</div>
</div>

<div class="copyright-bar">
  <div class="container">
    <div class="col-xs-12 col-sm-6 no-padding social">
      <ul class="link">
        <li class="fb pull-left"><a target="_blank" rel="nofollow" href="#" title="Facebook"></a></li>
        <li class="tw pull-left"><a target="_blank" rel="nofollow" href="#" title="Twitter"></a></li>
        <li class="googleplus pull-left"><a target="_blank" rel="nofollow" href="#" title="GooglePlus"></a></li>
        <li class="rss pull-left"><a target="_blank" rel="nofollow" href="#" title="RSS"></a></li>
        <li class="pintrest pull-left"><a target="_blank" rel="nofollow" href="#" title="PInterest"></a></li>
        <li class="linkedin pull-left"><a target="_blank" rel="nofollow" href="#" title="Linkedin"></a></li>
        <li class="youtube pull-left"><a target="_blank" rel="nofollow" href="#" title="Youtube"></a></li>
      </ul>
    </div>
    <div class="col-xs-12 col-sm-6 no-padding">
      <div class="clearfix payment-methods">
        <ul>
          <li><img src="assets/images/payments/1.png" alt=""></li>
          <li><img src="assets/images/payments/2.png" alt=""></li>
          <li><img src="assets/images/payments/3.png" alt=""></li>
          <li><img src="assets/images/payments/4.png" alt=""></li>
          <li><img src="assets/images/payments/5.png" alt=""></li>
        </ul>
      </div><!-- /.payment-methods -->
    </div>
  </div>
</div>
</footer>