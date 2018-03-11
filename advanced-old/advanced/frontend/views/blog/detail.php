<?php 
use frontend\widgets\Sidebarcategory;
use frontend\widgets\Blogtag;
$host = 'http://'.$_SERVER['HTTP_HOST'];
$homeUrl = yii::$app->urlManager->baseUrl;
$homeurl = $host.$homeUrl;
?>
<?php 
?>
<div class="body-content" style="margin-top: 20px">
	<div class="container">
		<div class="row">
			<div class="blog-page">
				<div class="col-md-9">
					<div class="blog-post wow fadeInUp">
						<img class="img-responsive" src="<?php echo $blogdetail->image ?>" alt="">
						<h1><?php echo $blogdetail->title; ?></h1>
					<!-- 	<span class="author">John Doe</span>
						<span class="review">7 Comments</span> -->
						<span class="date-time"><?php echo date('d-m-Y', $blogdetail->created_at) ?></span>
						<p><?php echo $blogdetail->content; ?></p>
						<div class="social-media">
							<span>Chia sẻ bài viết:</span>
							<a href="#"><i class="fa fa-facebook"></i></a>
		<!-- <a href="#"><i class="fa fa-twitter"></i></a>
		<a href="#"><i class="fa fa-linkedin"></i></a>
		<a href="#"><i class="fa fa-rss"></i></a> -->
		<!-- <a href="#" class="hidden-xs"><i class="fa fa-pinterest"></i></a> -->
	</div>
</div>
<!-- <div class="blog-post-author-details wow fadeInUp">
	<div class="row">
		<div class="col-md-2">
			<img src="assets/images/testimonials/member3.png" alt="Responsive image" class="img-circle img-responsive">
		</div>
		<div class="col-md-10"> -->
			<!-- <h4>John Doe</h4> -->
			<!-- <div class="btn-group author-social-network pull-right"> -->
			<!-- <span>Xem chúng tôi trên</span> -->
			<!-- <button type="button" class="dropdown-toggle" data-toggle="dropdown"> -->
			<!-- <i class="twitter-icon fa fa-twitter"></i> -->
			<!-- <span class="caret"></span> -->
			  <!--   </button>
			    <ul class="dropdown-menu" role="menu">
			    	<li><a href="#"><i class="icon fa fa-facebook"></i>Facebook</a></li> -->
			    	<!-- <li><a href="#"><i class="icon fa fa-linkedin"></i>Linkedin</a></li>
			    	<li><a href="#"><i class="icon fa fa-pinterest"></i>Pinterst</a></li>
			    	<li><a href="#"><i class="icon fa fa-rss"></i>RSS</a></li> -->
			    	<!-- </ul> -->
			    	<!-- </div> -->
			<!-- <span class="author-job">Web Designer</span>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>
		</div>
	</div>
</div> -->
<div class="blog-review wow fadeInUp">
	<div class="row">
		
	</div>
</div>				
<div class="blog-write-comment outer-bottom-xs outer-top-xs">
	<h3>Ý kiến của bạn về bài viết này.</h3>
	<div class="fb-comments" data-href="<?php echo $homeurl ?>/blog/detail?id=<?php echo $blogdetail->id; ?>" data-width="100%" data-numposts="5"></div>
</div>
</div>
<div class="col-md-3 sidebar">



	<div class="sidebar-module-container">
		<div class="search-area outer-bottom-small">
			<form>
				<div class="control-group">
					<input placeholder="Type to search" class="search-field">
					<a href="#" class="search-button"></a>   
				</div>
			</form>
		</div>		

		<div class="home-banner outer-top-n outer-bottom-xs">
			<img src="<?php echo $homeurl ?>/uploads/images/advert/home1-images-banner1-2.png" alt="Image" class="img-responsive" style="background-color: #fff">
		</div>
		<!-- ==============================================CATEGORY============================================== -->
		<?php echo Sidebarcategory::Widget() ?>
		<hr>
		<!-- ============================================== CATEGORY : END ============================================== -->		
		<?php echo Blogtag::Widget(); ?>
		<!-- ============================================== PRODUCT TAGS ============================================== -->
		<div class="sidebar-widget product-tag wow fadeInUp">
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
		<!-- ============================================== PRODUCT TAGS : END ============================================== -->					</div>
	</div>
</div>
</div>
</div>
</div>