<?php 
use yii\helpers\Url;
use backend\models\Category; 
use backend\models\Product;
use frontend\widgets\Sidebarcategory;
$date = date('Y-m-d');
if (Yii::$app->request->get('slug')) {
  $slug = Yii::$app->request->get('slug');
} else {
  $slug = NULL;
}


?>


<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->
<div class="body-content outer-top-xs">
	<div class='container'>
		<div class='row'>
			<div class='col-md-3 sidebar'>
       <!-- ================================== TOP NAVIGATION ================================== -->
       <!-- ================================== TOP NAVIGATION : END ================================== -->	          
       <div class="sidebar-module-container">

        <div class="sidebar-filter">
         <!-- ============================================== SIDEBAR CATEGORY ============================================== -->
         <?php echo Sidebarcategory::Widget(); ?>
         <!-- ============================================== SIDEBAR CATEGORY : END ============================================== -->

         <!-- ============================================== PRICE SILDER============================================== -->
         <div class="sidebar-widget wow fadeInUp">
           <div class="widget-header">
            <h4 class="widget-title">Lọc theo giá</h4>
          </div>
          <div class="sidebar-widget-body m-t-10">
            <div class="price-range-holder">
             <span class="min-max">
               <span class="pull-left">5K</span>
               <span class="pull-right">500K</span>
             </span>
             <input type="text" id="amount" style="border:0; color:#666666; font-weight:bold;text-align:center;">

             <input type="text" class="price-slider" value="" >

           </div><!-- /.price-range-holder -->
           <a href="<?php echo Url::to(['product/filterprice']) ?>" data-geturl="<?php echo $slug; ?>" class="lnk btn btn-primary btn-filter-price">Lọc</a>
         </div><!-- /.sidebar-widget-body -->
       </div><!-- /.sidebar-widget -->
       <!-- ============================================== PRICE SILDER : END ============================================== -->
       <!-- ============================================== MANUFACTURES============================================== -->
       <div class="sidebar-widget wow fadeInUp">
         <div class="widget-header">
          <h4 class="widget-title">Manufactures</h4>
        </div>
        <div class="sidebar-widget-body">
          <ul class="list">
            <li><a href="#">Forever 18</a></li>
            <li><a href="#">Nike</a></li>
            <li><a href="#">Dolce & Gabbana</a></li>
            <li><a href="#">Alluare</a></li>
            <li><a href="#">Chanel</a></li>
            <li><a href="#">Other Brand</a></li>
          </ul>
          <!--<a href="#" class="lnk btn btn-primary">Show Now</a>-->
        </div><!-- /.sidebar-widget-body -->
      </div><!-- /.sidebar-widget -->
      <!-- ============================================== MANUFACTURES: END ============================================== -->
      <!-- ============================================== COLOR============================================== -->
      <div class="sidebar-widget wow fadeInUp">
       <div class="widget-header">
        <h4 class="widget-title">Colors</h4>
      </div>
      <div class="sidebar-widget-body">
        <ul class="list">
          <li><a href="#">Red</a></li>
          <li><a href="#">Blue</a></li>
          <li><a href="#">Yellow</a></li>
          <li><a href="#">Pink</a></li>
          <li><a href="#">Brown</a></li>
          <li><a href="#">Teal</a></li>
        </ul>
      </div><!-- /.sidebar-widget-body -->
    </div><!-- /.sidebar-widget -->
    <!-- ============================================== COLOR: END ============================================== -->
    <!-- ============================================== COMPARE============================================== -->
    <div class="sidebar-widget wow fadeInUp outer-top-vs">
      <h3 class="section-title">Compare products</h3>
      <div class="sidebar-widget-body">
        <div class="compare-report">
         <p>You have no <span>item(s)</span> to compare</p>
       </div><!-- /.compare-report -->
     </div><!-- /.sidebar-widget-body -->
   </div><!-- /.sidebar-widget -->
   <!-- ============================================== COMPARE: END ============================================== -->
   <!-- ============================================== PRODUCT TAGS ============================================== -->
   <div class="sidebar-widget product-tag wow fadeInUp outer-top-vs">
     <h3 class="section-title">Product tags</h3>
     <div class="sidebar-widget-body outer-top-xs">
      <div class="tag-list">					
       <a class="item" title="Phone" href="category.html">Phone</a>
       <a class="item active" title="Vest" href="category.html">Vest</a>
       <a class="item" title="Smartphone" href="category.html">Smartphone</a>
       <a class="item" title="Furniture" href="category.html">Furniture</a>
       <a class="item" title="T-shirt" href="category.html">T-shirt</a>
       <a class="item" title="Sweatpants" href="category.html">Sweatpants</a>
       <a class="item" title="Sneaker" href="category.html">Sneaker</a>
       <a class="item" title="Toys" href="category.html">Toys</a>
       <a class="item" title="Rose" href="category.html">Rose</a>
     </div><!-- /.tag-list -->
   </div><!-- /.sidebar-widget-body -->
 </div><!-- /.sidebar-widget -->
 <!-- ============================================== PRODUCT TAGS : END ============================================== -->		            	<!-- <!-- ============================================== Testimonials============================================== -->
 <div class="sidebar-widget  wow fadeInUp outer-top-vs ">
   <div id="advertisement" class="advertisement">
    <div class="item">
      <div class="avatar"><img src="assets/images/testimonials/member1.png" alt="Image"></div>
      <div class="testimonials"><em>"</em> Vtae sodales aliq uam morbi non sem lacus port mollis. Nunc condime tum metus eud molest sed consectetuer.<em>"</em></div>
      <div class="clients_author">John Doe	<span>Abc Company</span>	</div><!-- /.container-fluid -->
    </div><!-- /.item -->

    <div class="item">
      <div class="avatar"><img src="assets/images/testimonials/member3.png" alt="Image"></div>
      <div class="testimonials"><em>"</em>Vtae sodales aliq uam morbi non sem lacus port mollis. Nunc condime tum metus eud molest sed consectetuer.<em>"</em></div>
      <div class="clients_author">Stephen Doe	<span>Xperia Designs</span>	</div>    
    </div><!-- /.item -->

    <div class="item">
      <div class="avatar"><img src="assets/images/testimonials/member2.png" alt="Image"></div>
      <div class="testimonials"><em>"</em> Vtae sodales aliq uam morbi non sem lacus port mollis. Nunc condime tum metus eud molest sed consectetuer.<em>"</em></div>
      <div class="clients_author">Saraha Smith	<span>Datsun &amp; Co</span>	</div><!-- /.container-fluid -->
    </div><!-- /.item -->

  </div><!-- /.owl-carousel -->
</div>

<!-- ============================================== Testimonials: END ============================================== -->



</div><!-- /.sidebar-filter -->
</div><!-- /.sidebar-module-container -->
</div><!-- /.sidebar -->
<div class='col-md-9'>
 <!-- ========================================== SECTION – HERO ========================================= -->

 <div id="category" class="category-carousel hidden-xs">
  <div class="item">	
   <div class="image">
    <img src="assets/images/banners/cat-banner-1.jpg" alt="" class="img-responsive">
  </div>
  <div class="container-fluid">
    <div class="caption vertical-top text-left">
     <div class="big-text">
      Big Sale
    </div>

    <div class="excerpt hidden-sm hidden-md">
      Save up to 49% off
    </div>
    <div class="excerpt-normal hidden-sm hidden-md">
      Lorem ipsum dolor sit amet, consectetur adipiscing elit
    </div>

  </div><!-- /.caption -->
</div><!-- /.container-fluid -->
</div>
</div>




<!-- ========================================= SECTION – HERO : END ========================================= -->
<div class="clearfix filters-container m-t-10">
	<div class="row">
		<div class="col col-sm-6 col-md-2">
			<div class="filter-tabs">
				<ul id="filter-tabs" class="nav nav-tabs nav-tab-box nav-tab-fa-icon">
					<li class="active">
						<a data-toggle="tab" href="#grid-container"><i class="icon fa fa-th-large"></i>Grid</a>
					</li>
					<li><a data-toggle="tab" href="#list-container"><i class="icon fa fa-th-list"></i>List</a></li>
				</ul>
			</div><!-- /.filter-tabs -->
		</div><!-- /.col -->
		<div class="col col-sm-12 col-md-6" style="padding: 0">
			<div class="col col-sm-3 col-md-6 no-padding" style="padding: 0">
				<div class="lbl-cnt">
					<span class="lbl">Sắp xếp</span>
					<div class="fld inline">
						<div class="dropdown dropdown-small dropdown-med dropdown-white inline">
						<!-- 	<button data-toggle="dropdown" type="button" class="btn dropdown-toggle">
								Vị trí <span class="caret"></span>
							</button>


              <ul role="menu" class="dropdown-menu changefilter">

                <li role="presentation"><a href="#">Giá:Thấp nhất</a></li>
                <li role="presentation"><a href="#">Giá:Cao nhất</a></li>
                <li role="presentation"><a href="#">Tên sản phẩm:A đến Z</a></li>
              </ul> -->
              <select name="" class="changefilter">
                <option class="btn dropdown-toggle">Vị trí <span class="caret"></span></option>
                <option name="select" value="pricelowest" data-href="<?php echo Url::to(['/product/profilter']) ?>">Giá:Thấp nhất</a></option>
                <option name="select" value="pricehighest" data-href="<?php echo Url::to(['/product/profilter']) ?>">Giá:Cao nhất</a></option>
                <option name="select" value="productname" data-href="<?php echo Url::to(['/product/profilter']) ?>">Tên sản phẩm:A đến Z</a></option>
                <input type="hidden" name="slughidden" value="<?php echo $slug; ?>">
              </select>
            </div>
          </div><!-- /.fld -->

        </div><!-- /.lbl-cnt -->
      </div><!-- /.col -->
      <div class="col col-sm-3 col-md-6 no-padding">
        <div class="lbl-cnt">
         <span class="lbl">Trang</span>
         <div class="fld inline">
          <div class="dropdown dropdown-small dropdown-med dropdown-white inline">
           <button data-toggle="dropdown" type="button" class="btn dropdown-toggle">
            1 <span class="caret"></span>
          </button>

          <ul role="menu" class="dropdown-menu">
            <li role="presentation"><a href="#">1</a></li>
            <li role="presentation"><a href="#">2</a></li>
            <li role="presentation"><a href="#">3</a></li>
            <li role="presentation"><a href="#">4</a></li>
            <li role="presentation"><a href="#">5</a></li>
            <li role="presentation"><a href="#">6</a></li>
            <li role="presentation"><a href="#">7</a></li>
            <li role="presentation"><a href="#">8</a></li>
            <li role="presentation"><a href="#">9</a></li>
            <li role="presentation"><a href="#">10</a></li>
          </ul>
        </div>
      </div><!-- /.fld -->
    </div><!-- /.lbl-cnt -->
  </div><!-- /.col -->
</div><!-- /.col -->
<div class="col col-sm-6 col-md-4 text-right">
 <div class="pagination-container">
   <ul class="list-inline list-unstyled">
    <li class="prev"><a href="#"><i class="fa fa-angle-left"></i></a></li>
    <li><a href="#">1</a></li>	
    <li class="active"><a href="#">2</a></li>	
    <li><a href="#">3</a></li>	
    <li><a href="#">4</a></li>	
    <li class="next"><a href="#"><i class="fa fa-angle-right"></i></a></li>
  </ul><!-- /.list-inline -->
</div><!-- /.pagination-container -->		</div><!-- /.col -->
</div><!-- /.row -->
</div>
<div class="search-result-container ">
 <div id="myTabContent" class="tab-content category-list">
  <div class="tab-pane active " id="grid-container">
   <div class="category-product">
    <div class="row">									

      <?php if ($profilter): 
      foreach ($profilter as $key => $val) :
        ?>

      
      <div class="col-sm-6 col-md-4 wow fadeInUp">
        <div class="products">

          <div class="product">   
            <div class="product-image">
              <div class="image">

                <a href="<?php echo Url::to(['/product/detail', 'slug'=>$val->slug]) ?>"><img  src="<?php echo $val->image; ?>" alt="" class="imgheight"></a>
              </div><!-- /.image -->      

              <div class="tag sale"><span>sale</span></div>                  
            </div><!-- /.product-image -->


            <div class="product-info text-left">
              <h3 class="name"><a href="<?php echo Url::to(['/product/detail', 'slug'=>$val->slug]) ?>"><?php echo $val->name; ?></a></h3>
              <div class="rating rateit-small"></div>
              <div class="description"></div>

              <div class="product-price"> 
               <?php if ($val->startsale == '' && $val->endsale == '' ) : ?>  
                <span class="price"><?php echo number_format($val->price, 0, '', '.'); ?></span>
              <?php else : ?>
               <?php if ($date < $val->startsale) {
                echo '<span class="price">'.number_format($val->price, 0, '', '.').'</span>';
              } else if ($date > $val->endsale) {
               echo '<span class="price">'.number_format($val->price, 0, '', '.').'</span>';
             } else if ($date >= $val->startsale && $date <= $val->endsale) {
              if ($val->pricesale != NULL) {
               echo '<span class="price">'.number_format($val->pricesale, 0, '', '.').'</span>';
               echo '<span class="price-before-discount">'.number_format($val->price, 0, '', '.').'</span>';
             } else {
              echo '<span class="price">'.number_format($val->price, 0, '', '.').'</span>';
            }

          }
          ?>
        <?php endif; ?>
        <span style="font-size: 15px; font-weight: bold">/<?php echo $val->pricelist; ?></span>
      </div><!-- /.product-price -->

    </div><!-- /.product-info -->
    <div class="cart clearfix animate-effect">
      <div class="action">
        <ul class="list-unstyled">
          <li class="add-cart-button btn-group">
            <button class="btn btn-primary icon" data-toggle="dropdown" type="button">
              <i class="fa fa-shopping-cart"></i>                         
            </button>
            <button class="btn btn-primary cart-btn" type="button">Add to cart</button>

          </li>

          <li class="lnk wishlist">
            <a class="add-to-wishlist" href="<?php echo Url::to(['/wishlist/addwishlist', 'id' =>$val->id]) ?>" title="Yêu thích" data-id="wishlist-<?php echo $val->id; ?>" data-img="<?php echo $val->image; ?>" data-name="<?php echo $val->name; ?>">
             <i class="icon fa fa-heart"></i>
           </a>
         </li>

         <li class="lnk">
          <a class="add-to-cart" href="detail.html" title="Compare">
            <i class="fa fa-signal"></i>
          </a>
        </li>
      </ul>
    </div><!-- /.action -->
  </div><!-- /.cart -->
</div><!-- /.product -->

</div><!-- /.products -->
</div><!-- /.item -->

<?php endforeach; endif ?>




















</div><!-- /.row -->
</div><!-- /.category-product -->

</div><!-- /.tab-pane -->

<div class="tab-pane "  id="list-container">
 <div class="category-product">


  <div class="category-product-inner wow fadeInUp">
   <div class="products">				
     <div class="product-list product">
       <div class="row product-list-row">
        <div class="col col-sm-4 col-lg-4">
         <div class="product-image">
          <div class="image">
           <img src="assets/images/products/p3.jpg" alt="">
         </div>
       </div><!-- /.product-image -->
     </div><!-- /.col -->
     <div class="col col-sm-8 col-lg-8">
       <div class="product-info">
        <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
        <div class="rating rateit-small"></div>
        <div class="product-price">	
         <span class="price">
          $450.99					</span>
          <span class="price-before-discount">$ 800</span>

        </div><!-- /.product-price -->
        <div class="description m-t-10">Suspendisse posuere arcu diam, id accumsan eros pharetra ac. Nulla enim risus, facilisis bibendum gravida eget, lacinia id purus. Suspendisse posuere arcu diam, id accumsan eros pharetra ac. Nulla enim risus, facilisis bibendum gravida eget.</div>
        <div class="cart clearfix animate-effect">
         <div class="action">
          <ul class="list-unstyled">
           <li class="add-cart-button btn-group">
            <button class="btn btn-primary icon" data-toggle="dropdown" type="button">
             <i class="fa fa-shopping-cart"></i>													
           </button>
           <button class="btn btn-primary cart-btn" type="button">Add to cart</button>

         </li>

         <li class="lnk wishlist">
          <a class="add-to-cart" href="detail.html" title="Wishlist">
            <i class="icon fa fa-heart"></i>
          </a>
        </li>

        <li class="lnk">
          <a class="add-to-cart" href="detail.html" title="Compare">
            <i class="fa fa-signal"></i>
          </a>
        </li>
      </ul>
    </div><!-- /.action -->
  </div><!-- /.cart -->

</div><!-- /.product-info -->	
</div><!-- /.col -->
</div><!-- /.product-list-row -->
<div class="tag new"><span>new</span></div>        </div><!-- /.product-list -->
</div><!-- /.products -->
</div><!-- /.category-product-inner -->





</div><!-- /.category-product -->
</div><!-- /.tab-pane #list-container -->
</div><!-- /.tab-content -->
<div class="clearfix filters-container">

 <div class="text-right">
   <div class="pagination-container">
     <ul class="list-inline list-unstyled">
      <li class="prev"><a href="#"><i class="fa fa-angle-left"></i></a></li>
      <li><a href="#">1</a></li>	
      <li class="active"><a href="#">2</a></li>	
      <li><a href="#">3</a></li>	
      <li><a href="#">4</a></li>	
      <li class="next"><a href="#"><i class="fa fa-angle-right"></i></a></li>
    </ul><!-- /.list-inline -->
  </div><!-- /.pagination-container -->						    </div><!-- /.text-right -->

</div><!-- /.filters-container -->

</div><!-- /.search-result-container -->

</div><!-- /.col -->
</div><!-- /.row -->
<!-- ============================================== BRANDS CAROUSEL ============================================== -->

<!-- ============================================== BRANDS CAROUSEL : END ============================================== -->	</div><!-- /.container -->

</div><!-- /.body-content -->