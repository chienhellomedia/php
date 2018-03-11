<?php 
use backend\models\Category;
use backend\models\customer;
use yii\helpers\Url;
use yii\helpers\Html;
use frontend\widgets\CartdropDown;
use yii\widgets\ActiveForm;
$baseUrl = yii::$app->urlManager->baseUrl;
$baseUrl = str_replace('frontend/web', '', $baseUrl);
?>


<header class="header-style-1">

	<!-- ============================================== TOP MENU ============================================== -->
	<div class="top-bar animate-dropdown">
		<div class="container">
			<div class="header-top-inner">
				<div class="cnt-account">
					<ul class="list-unstyled">
						<li><a href="<?php echo Url::to(['/wishlist/index']) ?>"><i class="icon fa fa-heart"></i>Yêu thích</a></li>
						<li><a href="<?php echo Url::to(['/compare/index']) ?>"><i></i>So sánh Sản phẩm</a></li>
						<li><a href="<?php echo Url::to(['/cart/index']) ?>"><i class="icon fa fa-shopping-cart fix-fa-cart"></i>Giỏ hàng</a></li>
						<!-- <li><a href="<?php //echo Url::to(['/checkout/index']) ?>"><i class="icon fa fa-check"></i>Thanh toán</a></li> -->
						<?php if (isset(Yii::$app->user->identity->id)): ?>

							<li><a href="<?php echo Url::to(['/site/logout']) ?>" data-method="post">
								<i class="icon fa fa-lock"></i>Thoát (<?php 
									$data = Customer::find()->select(['username'])->where(['id' => Yii::$app->user->identity->id])->one();
									echo $data->username;
									?>)</a></li>
								<?php else : ?>
									<li><a href="<?php echo Url::to(['/site/login']) ?>"><i class="icon fa fa-lock"></i>Đăng nhập/Đăng ký</a></li>
								<?php endif ?>
							</ul>
						</div><!-- /.cnt-account -->

						<?php if (isset(Yii::$app->user->identity->id)) : ?>
							<div class="cnt-block">
								<ul class="list-unstyled list-inline">
									<li class="dropdown dropdown-small">
										<a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown"><i class="icon fa fa-user"></i> Tài khoản <b class="caret"></b></a>
										<ul class="dropdown-menu">
											<li><a href="<?php echo Url::to(['customer/info', 'id'=>Yii::$app->user->identity->id]) ?>">Thông tin tài khoản</a></li>
											<li><a href="<?php echo Url::to(['/order/list', 'cus_id'=>Yii::$app->user->identity->id]) ?>">Lịch sử đơn hàng.</a></li>
										</ul>
									</li>
								</ul><!-- /.list-unstyled -->
							</div><!-- /.cnt-cart -->
						<?php endif; ?>
						<div class="clearfix"></div>
					</div><!-- /.header-top-inner -->
				</div><!-- /.container -->
			</div><!-- /.header-top -->
			<!-- ============================================== TOP MENU : END ============================================== -->
			<?php $base = Yii::$app->UrlManager->BaseUrl;
			$base = str_replace('/frontend/web', '', $base);
			?>
			<div class="main-header">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-3 logo-holder">
							<!-- ============================================================= LOGO ============================================================= -->
							<div class="logo">
								<a href="<?php echo Url::to(['/site/index']) ?>">							
									<img src="<?php echo Yii::$app->homeUrl ?>uploads/images/logo/logo.png" alt="">
								</a>
							</div><!-- /.logo -->
							<!-- ============================================================= LOGO : END ============================================================= -->				</div><!-- /.logo-holder -->

							<div class="col-xs-12 col-sm-12 col-md-7 top-search-holder">
								<!-- /.contact-row -->
								<!-- ============================================================= SEARCH AREA ============================================================= -->
								<div class="search-area">
									<?php $form = ActiveForm::begin([
										'id' => 'form-main-search',
										'method' => 'GET',
										'action'=> ['/search/index'],
										]); ?>

										<div class="control-group">
											<select name="option" class="categories-filter animate-dropdown">
												<option>Tìm kiếm theo</option>
												<option value="product" name="select-option">Sản phẩm</option>
												<option value="news" name="select-option">Tin tức</option>
											</select>
											<input type="search" name="key" class="search-field" placeholder="Nhập vào kết quả cần tìm kiếm..." />
											<?= Html::submitButton('', ['class' => 'search-button search-main']) ?>
										</div>

										<?php ActiveForm::end(); ?>
									</div><!-- /.search-area -->
									<!-- ============================================================= SEARCH AREA : END ============================================================= -->				</div><!-- /.top-search-holder -->

									<?php echo CartdropDown::Widget(); ?>
								</div><!-- /.row -->
							</div><!-- /.container -->

						</div><!-- /.main-header -->

						<!-- ============================================== NAVBAR ============================================== -->
						<div class="header-nav animate-dropdown">
							<div class="container">
								<div class="yamm navbar navbar-default" role="navigation">
									<div class="navbar-header">
										<button data-target="#mc-horizontal-menu-collapse" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
											<span class="sr-only">Toggle navigation</span>
											<span class="icon-bar"></span>
											<span class="icon-bar"></span>
											<span class="icon-bar"></span>
										</button>
									</div>
									<div class="nav-bg-class">
										<div class="navbar-collapse collapse" id="mc-horizontal-menu-collapse">
											<div class="nav-outer">
												<ul class="nav navbar-nav">
													<li class="active dropdown yamm-fw">
														<a href="<?php echo Url::to(['/site/index']) ?>" >Trang chủ</a>
													</li>

													<li class="dropdown yamm mega-menu">
														<a href="#" data-hover="dropdown" class="dropdown-toggle" data-toggle="dropdown">Sản phẩm</a>
														<ul class="dropdown-menu container">
															<li>
																<div class="yamm-content ">
																	<div class="row">
																		<?php if ($parent) :
																		foreach ($parent as $key => $par) :
																			?>
																			<div class="col-xs-12 col-sm-6 col-md-2 col-menu">
																				<h2 class="title"><?php echo $par->name; ?></h2>
																				<ul class="links">
																					<?php 
																					$parentsub = new Category();
																					$parentsub = $parentsub->getAllCateRoot($par->id);
																					foreach ($parentsub as $key => $parsub) : ?>
																					<li><a href="<?php echo Url::to(['/product/index', 'slug' => $parsub->slug]) ?>"><?php echo $parsub->name; ?></a></li>
																				<?php endforeach; ?>

																			</ul>
																		</div><!-- /.col -->									
																	<?php endforeach; endif; ?>																
																	<div class="col-xs-12 col-sm-6 col-md-4 col-menu banner-image">
																		<img class="img-responsive" src="/advanced/uploads/images/blog/blogshow.png" alt="">
																	</div><!-- /.yamm-content -->					
																</div>
															</div>
														</li>
													</ul>
												</li>						

												<li class="">
													<a href="<?php echo Url::to(['/site/about']) ?>" >Giới thiệu</a>	
												</li>
												<li class="">
													<a href="<?php echo Url::to(['/site/contact']) ?>" >Liên hệ</a>	
												</li>
												<li class="">
													<a href="<?php echo Url::to(['/blog/index']) ?>" >Bài viết</a>	
												</li>	

												<li class="dropdown">
													<a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown">Pages</a>
													<ul class="dropdown-menu pages">
														<li>
															<div class="yamm-content">
																<div class="row">

																	<div class="col-xs-12 col-menu">
																		<ul class="links">
																			<li><a href="<?php echo Url::to(['/site/index']) ?>">Trang chủ</a></li>
																			<li><a href="<?php echo Url::to(['/product/index']) ?>">Sản phẩm</a></li>
																			<li><a href="detail.html">Detail</a></li>
																			<li><a href="shopping-cart.html">Shopping Cart Summary</a></li>
																			<li><a href="checkout.html">Checkout</a></li>
																			<li><a href="blog.html">Blog</a></li>
																			<li><a href="blog-details.html">Blog Detail</a></li>
																			<li><a href="contact.html">Contact</a></li>
																			<li><a href="<?php echo Url::to(['/site/index']) ?>">Đăng ký / Đăng nhập</a></li>
																			<li><a href="<?php echo Url::to(['wishlist/index']) ?>">Yêu thích</a></li>
																			<li><a href="terms-conditions.html">Terms and Condition</a></li>
																			<li><a href="track-orders.html">Track Orders</a></li>
																			<li><a href="product-comparison.html">Product-Comparison</a></li>
																			<li><a href="faq.html">FAQ</a></li>
																			<li><a href="404.html">404</a></li>

																		</ul>
																	</div>



																</div>
															</div>
														</li>



													</ul>
												</li>
												<!-- <li class="dropdown  navbar-right special-menu">
													<a href="#">Todays offer</a>
												</li> -->


											</ul><!-- /.navbar-nav -->
											<div class="clearfix"></div>				
										</div><!-- /.nav-outer -->
									</div><!-- /.navbar-collapse -->


								</div><!-- /.nav-bg-class -->
							</div><!-- /.navbar-default -->
						</div><!-- /.container-class -->

					</div><!-- /.header-nav -->
					<!-- ============================================== NAVBAR : END ============================================== -->

				</header>