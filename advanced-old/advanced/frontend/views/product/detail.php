<?php 
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
$date = date('Y-m-d');
?>
<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->
<div class="body-content outer-top-xs">
	<div class='container'>
		<div class='row single-product'>
			<div class='col-md-3 sidebar'>
				<div class="sidebar-module-container">

					<!-- ============================================== HOT DEALS ============================================== -->
					<div class="sidebar-widget hot-deals wow fadeInUp outer-top-vs">
						<h3 class="section-title">hot deals</h3>
						<div class="owl-carousel sidebar-carousel custom-carousel owl-theme outer-top-xs">

							<div class="item">
								<div class="products">
									<div class="hot-deal-wrapper">
										<div class="image">
											<img src="assets/images/hot-deals/p5.jpg" alt="">
										</div>
										<div class="sale-offer-tag"><span>35%<br>off</span></div>
										<div class="timing-wrapper">
											<div class="box-wrapper">
												<div class="date box">
													<span class="key">120</span>
													<span class="value">Days</span>
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
										</div>
									</div><!-- /.hot-deal-wrapper -->

									<div class="product-info text-left m-t-20">
										<h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
										<div class="rating rateit-small"></div>

										<div class="product-price">	
											<span class="price">
												$600.00
											</span>

											<span class="price-before-discount">$800.00</span>					

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
							<div class="item">
								<div class="products">
									<div class="hot-deal-wrapper">
										<div class="image">
											<img src="assets/images/products/p6.jpg" alt="">
										</div>
										<div class="sale-offer-tag"><span>35%<br>off</span></div>
										<div class="timing-wrapper">
											<div class="box-wrapper">
												<div class="date box">
													<span class="key">120</span>
													<span class="value">Days</span>
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
										</div>
									</div><!-- /.hot-deal-wrapper -->

									<div class="product-info text-left m-t-20">
										<h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
										<div class="rating rateit-small"></div>

										<div class="product-price">	
											<span class="price">
												$600.00
											</span>

											<span class="price-before-discount">$800.00</span>					

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
							<div class="item">
								<div class="products">
									<div class="hot-deal-wrapper">
										<div class="image">
											<img src="assets/images/products/p7.jpg" alt="">
										</div>
										<div class="sale-offer-tag"><span>35%<br>off</span></div>
										<div class="timing-wrapper">
											<div class="box-wrapper">
												<div class="date box">
													<span class="key">120</span>
													<span class="value">Days</span>
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
										</div>
									</div><!-- /.hot-deal-wrapper -->

									<div class="product-info text-left m-t-20">
										<h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
										<div class="rating rateit-small"></div>

										<div class="product-price">	
											<span class="price">
												$600.00
											</span>

											<span class="price-before-discount">$800.00</span>					

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


						</div><!-- /.sidebar-widget -->
					</div>
<!-- ============================================== HOT DEALS: END ============================================== -->					<!-- ============================================== 

<!-- ============================================== NEWSLETTER ============================================== -->
<div class="sidebar-widget newsletter wow fadeInUp outer-bottom-small outer-top-vs">
	<h3 class="section-title">Newsletters</h3>
	<div class="sidebar-widget-body outer-top-xs">
		<p>Sign Up for Our Newsletter!</p>
		<form role="form">
			<div class="form-group">
				<label class="sr-only" for="exampleInputEmail1">Email address</label>
				<input type="email" class="form-control" id="exampleInputEmail1" placeholder="Subscribe to our newsletter">
			</div>
			<button class="btn btn-primary">Subscribe</button>
		</form>
		
	</div><!-- /.sidebar-widget-body -->
</div><!-- /.sidebar-widget -->
<!-- ============================================== NEWSLETTER: END ============================================== -->

<!-- ============================================== Testimonials============================================== -->
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



</div>
</div><!-- /.sidebar -->
<div class='col-md-9'>
	<div class="detail-block">
		<div class="row  wow fadeInUp">

			<div class="col-xs-12 col-sm-6 col-md-5 gallery-holder">
				<div class="product-item-holder size-big single-product-gallery small-gallery">

					<div id="owl-single-product">
						
						<div class="single-product-gallery-item" id="slide<?php echo $detail->id ?>">
							<a data-lightbox="image-<?php echo $detail->id ?>" data-title="Gallery" href="<?php echo $detail->image ?>">
								<img class="img-responsive" alt="" src="<?php echo $detail->image ?>" data-echo="<?php echo $detail->image ?>" />
							</a>
						</div><!-- /.single-product-gallery-item -->	
						
						

					</div><!-- /.single-product-slider -->


					<div class="single-product-gallery-thumbs gallery-thumbs">

						<div id="owl-single-product-thumbnails">

							<div class="item">
								<a class="horizontal-thumb active" data-target="#owl-single-product" data-slide="<?php echo $detail->id ?>" href="#slide<?php echo $detail->id ?>">
									<img class="img-responsive" width="85" alt="" src="<?php echo $detail->image ?>" data-echo="<?php echo $detail->image ?>" />
								</a>
							</div>					

						</div><!-- /#owl-single-product-thumbnails -->



					</div><!-- /.gallery-thumbs -->

				</div><!-- /.single-product-gallery -->
			</div><!-- /.gallery-holder -->        			
			<div class='col-sm-6 col-md-7 product-info-block'>
				<div class="product-info">
					<h1 class="name"><?php echo $detail->name; ?></h1>

					<div class="rating-reviews m-t-20">
						<div class="row">
							<div class="col-sm-3">
								<div class="rating rateit-small"></div>
							</div>
							<div class="col-sm-8">
								<div class="reviews">
									<a href="#" class="lnk">(13 Reviews)</a>
								</div>
							</div>
						</div><!-- /.row -->		
					</div><!-- /.rating-reviews -->

					<div class="stock-container info-container m-t-10">
						<div class="row">
							<div class="col-sm-2">
								<div class="stock-box">
									<span class="label">Trạng thái :</span>
								</div>	
							</div>
							<div class="col-sm-9">
								<div class="stock-box">
									<span class="value">
										<?php switch ($detail->instock) {
											case 0:
											echo "Hết hàng";
											break;										
											default:
											echo "Còn hàng";
											break;
										} ?>										
									</span>
								</div>	
							</div>
						</div><!-- /.row -->	
					</div><!-- /.stock-container -->

					<div class="description-container m-t-20">
						<?php echo $detail->content; ?>
					</div><!-- /.description-container -->

					<div class="price-container info-container m-t-20">
						<div class="row">


							<div class="col-sm-6">
								<div class="price-box">						
									<?php if ($date >= $detail->startsale && $date <= $detail->endsale && $detail->pricesale != NULL) : $price = $detail->pricesale; ?>
										<span class="price"><?php echo number_format($detail->pricesale, 0, '', '.'); ?></span>
										<span class="price-strike"><?php echo number_format($detail->price, 0, '', '.'); ?></span>													
									<?php else : $price = $detail->price; ?>
										<span class="price"><?php echo number_format($detail->price, 0, '', '.'); ?></span>
									<?php endif; ?>
									<span style="font-size: 30px; font-weight: bold"><?php echo $detail->pricelist; ?></span>
								</div>
							</div>

							<div class="col-sm-6">
								<div class="favorite-button m-t-10">
									<a class="btn btn-primary add-to-wishlist" data-name="<?php echo $detail->name ?>" data-img="<?php echo $detail->image ?>" data-toggle="tooltip" data-placement="right" title="Yêu thích" href="<?php echo Url::to(['/wishlist/addwishlist', 'id'=>$detail->id]) ?>">
										<i class="fa fa-heart"></i>
									</a>
									<a class="btn btn-primary" data-toggle="tooltip" data-placement="right" title="Add to Compare" href="#">
										<i class="fa fa-signal"></i>
									</a>
									
								</div>
							</div>

						</div><!-- /.row -->
					</div><!-- /.price-container -->

					<div class="quantity-container info-container">
						<div class="row">
							<?php $form = ActiveForm::begin([
								'options' => ['class' => 'form-horizontal addcartfrom'],
								'action' => Url::to(['cart/addcart']),
								]) ?>
								<div class="col-sm-2">
									<span class="label">Qty :</span>
								</div>

								<div class="col-sm-2">
									<div class="cart-quantity">
										<div class="quant-input">
											<div class="arrows">
												<div class="arrow plus gradient"><span class="ir"><i class="icon fa fa-sort-asc"></i></span></div>
												<div class="arrow minus gradient"><span class="ir"><i class="icon fa fa-sort-desc"></i></span></div>
											</div>
											<input type="number" name="qtt" value="1" onkeypress="return isNumber(event)">
										</div>
									</div>
								</div>

								<div class="col-sm-7">
									<button class="btn btn-primary add-cart-from"

									<?php if ($date >= $detail->startsale && $date <= $detail->endsale && $detail->pricesale != NULL) : ?>
										data-price="<?php echo number_format($detail->pricesale, 0, '', '.') ?>"              
									<?php else : ?>
										data-price="<?php echo number_format($detail->price, 0, '', '.') ?>"  
									<?php endif; ?>


									data-name="<?php echo $detail->name ?>" 
									data-img="<?php echo $detail->image ?>" 
									data-id="<?php echo $detail->id ?>">
									<i class="fa fa-shopping-cart inner-right-vs"></i>Thêm giỏ hàng</button>
								</div>

								<?php ActiveForm::end() ?>
							</div><!-- /.row -->
						</div><!-- /.quantity-container -->






					</div><!-- /.product-info -->
				</div><!-- /.col-sm-7 -->
			</div><!-- /.row -->
		</div>

		<div class="product-tabs inner-bottom-xs  wow fadeInUp">
			<div class="row">
				<div class="col-sm-3">
					<ul id="product-tabs" class="nav nav-tabs nav-tab-cell">
						<li class="active"><a data-toggle="tab" href="#description">DESCRIPTION</a></li>
						<li><a data-toggle="tab" href="#review">REVIEW</a></li>
						<li><a data-toggle="tab" href="#tags">TAGS</a></li>
					</ul><!-- /.nav-tabs #product-tabs -->
				</div>
				<div class="col-sm-9">

					<div class="tab-content">

						<div id="description" class="tab-pane in active">
							<div class="product-tab">
								<p class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.<br><br> Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
							</div>	
						</div><!-- /.tab-pane -->

						<div id="review" class="tab-pane">
							<div class="product-tab">

								<div class="fb-comments" data-href="https://www.facebook.com/hn.quynh.5?hc_ref=ARTdQjDcgUhlvaUnhPcVWseJknKpQb_PrMGXxUF03aCWQUE6Bh_7qYh8tva1Pd1kkZU" data-numposts="5"></div>									

							</div><!-- /.product-tab -->
						</div><!-- /.tab-pane -->

						<div id="tags" class="tab-pane">
							<div class="product-tag">

								<h4 class="title">Product Tags</h4>
								<form role="form" class="form-inline form-cnt">
									<div class="form-container">

										<div class="form-group">
											<label for="exampleInputTag">Add Your Tags: </label>
											<input type="email" id="exampleInputTag" class="form-control txt">


										</div>

										<button class="btn btn-upper btn-primary" type="submit">ADD TAGS</button>
									</div><!-- /.form-container -->
								</form><!-- /.form-cnt -->

								<form role="form" class="form-inline form-cnt">
									<div class="form-group">
										<label>&nbsp;</label>
										<span class="text col-md-offset-3">Use spaces to separate tags. Use single quotes (') for phrases.</span>
									</div>
								</form><!-- /.form-cnt -->

							</div><!-- /.product-tab -->
						</div><!-- /.tab-pane -->

					</div><!-- /.tab-content -->
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.product-tabs -->

		<!-- ============================================== UPSELL PRODUCTS ============================================== -->
		<section class="section featured-product wow fadeInUp">
			<h3 class="section-title">upsell products</h3>
			<div class="owl-carousel home-owl-carousel upsell-product custom-carousel owl-theme outer-top-xs">

				<div class="item item-carousel">
					<div class="products">

						<div class="product">		
							<div class="product-image">
								<div class="image">
									<a href="detail.html"><img  src="assets/images/products/p1.jpg" alt=""></a>
								</div><!-- /.image -->			

								<div class="tag sale"><span>sale</span></div>            		   
							</div><!-- /.product-image -->


							<div class="product-info text-left">
								<h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
								<div class="rating rateit-small"></div>
								<div class="description"></div>

								<div class="product-price">	
									<span class="price">
										$650.99				</span>
										<span class="price-before-discount">$ 800</span>

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
							</div><!-- /.product -->

						</div><!-- /.products -->
					</div><!-- /.item -->

					<div class="item item-carousel">
						<div class="products">

							<div class="product">		
								<div class="product-image">
									<div class="image">
										<a href="detail.html"><img  src="assets/images/products/p2.jpg" alt=""></a>
									</div><!-- /.image -->			

									<div class="tag sale"><span>sale</span></div>            		   
								</div><!-- /.product-image -->


								<div class="product-info text-left">
									<h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
									<div class="rating rateit-small"></div>
									<div class="description"></div>

									<div class="product-price">	
										<span class="price">
											$650.99				</span>
											<span class="price-before-discount">$ 800</span>

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
								</div><!-- /.product -->

							</div><!-- /.products -->
						</div><!-- /.item -->

						<div class="item item-carousel">
							<div class="products">

								<div class="product">		
									<div class="product-image">
										<div class="image">
											<a href="detail.html"><img  src="assets/images/products/p3.jpg" alt=""></a>
										</div><!-- /.image -->			

										<div class="tag hot"><span>hot</span></div>		   
									</div><!-- /.product-image -->


									<div class="product-info text-left">
										<h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
										<div class="rating rateit-small"></div>
										<div class="description"></div>

										<div class="product-price">	
											<span class="price">
												$650.99				</span>
												<span class="price-before-discount">$ 800</span>

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
									</div><!-- /.product -->

								</div><!-- /.products -->
							</div><!-- /.item -->

							<div class="item item-carousel">
								<div class="products">

									<div class="product">		
										<div class="product-image">
											<div class="image">
												<a href="detail.html"><img  src="assets/images/products/p4.jpg" alt=""></a>
											</div><!-- /.image -->			

											<div class="tag new"><span>new</span></div>                        		   
										</div><!-- /.product-image -->


										<div class="product-info text-left">
											<h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
											<div class="rating rateit-small"></div>
											<div class="description"></div>

											<div class="product-price">	
												<span class="price">
													$650.99				</span>
													<span class="price-before-discount">$ 800</span>

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
										</div><!-- /.product -->

									</div><!-- /.products -->
								</div><!-- /.item -->

								<div class="item item-carousel">
									<div class="products">

										<div class="product">		
											<div class="product-image">
												<div class="image">
													<a href="detail.html"><img  src="assets/images/blank.gif" data-echo="assets/images/products/p5.jpg" alt=""></a>
												</div><!-- /.image -->			

												<div class="tag hot"><span>hot</span></div>		   
											</div><!-- /.product-image -->


											<div class="product-info text-left">
												<h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
												<div class="rating rateit-small"></div>
												<div class="description"></div>

												<div class="product-price">	
													<span class="price">
														$650.99				</span>
														<span class="price-before-discount">$ 800</span>

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
											</div><!-- /.product -->

										</div><!-- /.products -->
									</div><!-- /.item -->

									<div class="item item-carousel">
										<div class="products">

											<div class="product">		
												<div class="product-image">
													<div class="image">
														<a href="detail.html"><img  src="assets/images/blank.gif" data-echo="assets/images/products/p6.jpg" alt=""></a>
													</div><!-- /.image -->			

													<div class="tag new"><span>new</span></div>                        		   
												</div><!-- /.product-image -->


												<div class="product-info text-left">
													<h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
													<div class="rating rateit-small"></div>
													<div class="description"></div>

													<div class="product-price">	
														<span class="price">
															$650.99				</span>
															<span class="price-before-discount">$ 800</span>

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
												</div><!-- /.product -->

											</div><!-- /.products -->
										</div><!-- /.item -->
									</div><!-- /.home-owl-carousel -->
								</section><!-- /.section -->
								<!-- ============================================== UPSELL PRODUCTS : END ============================================== -->

							</div><!-- /.col -->
							<div class="clearfix"></div>
						</div><!-- /.row -->
						<!-- ============================================== BRANDS CAROUSEL ============================================== -->
						<div id="brands-carousel" class="logo-slider wow fadeInUp">

							<div class="logo-slider-inner">	
								<div id="brand-slider" class="owl-carousel brand-slider custom-carousel owl-theme">
									<div class="item m-t-15">
										<a href="#" class="image">
											<img data-echo="assets/images/brands/brand1.png" src="assets/images/blank.gif" alt="">
										</a>	
									</div><!--/.item-->

									<div class="item m-t-10">
										<a href="#" class="image">
											<img data-echo="assets/images/brands/brand2.png" src="assets/images/blank.gif" alt="">
										</a>	
									</div><!--/.item-->

									<div class="item">
										<a href="#" class="image">
											<img data-echo="assets/images/brands/brand3.png" src="assets/images/blank.gif" alt="">
										</a>	
									</div><!--/.item-->

									<div class="item">
										<a href="#" class="image">
											<img data-echo="assets/images/brands/brand4.png" src="assets/images/blank.gif" alt="">
										</a>	
									</div><!--/.item-->

									<div class="item">
										<a href="#" class="image">
											<img data-echo="assets/images/brands/brand5.png" src="assets/images/blank.gif" alt="">
										</a>	
									</div><!--/.item-->

									<div class="item">
										<a href="#" class="image">
											<img data-echo="assets/images/brands/brand6.png" src="assets/images/blank.gif" alt="">
										</a>	
									</div><!--/.item-->

									<div class="item">
										<a href="#" class="image">
											<img data-echo="assets/images/brands/brand2.png" src="assets/images/blank.gif" alt="">
										</a>	
									</div><!--/.item-->

									<div class="item">
										<a href="#" class="image">
											<img data-echo="assets/images/brands/brand4.png" src="assets/images/blank.gif" alt="">
										</a>	
									</div><!--/.item-->

									<div class="item">
										<a href="#" class="image">
											<img data-echo="assets/images/brands/brand1.png" src="assets/images/blank.gif" alt="">
										</a>	
									</div><!--/.item-->

									<div class="item">
										<a href="#" class="image">
											<img data-echo="assets/images/brands/brand5.png" src="assets/images/blank.gif" alt="">
										</a>	
									</div><!--/.item-->
								</div><!-- /.owl-carousel #logo-slider -->
							</div><!-- /.logo-slider-inner -->

						</div><!-- /.logo-slider -->
						<!-- ============================================== BRANDS CAROUSEL : END ============================================== -->	</div><!-- /.container -->
</div><!-- /.body-content -->