<?php 
use yii\helpers\BaseHtml;
use yii\helpers\Html;
use backend\models\Category;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

$cateson= new Category();

// echo '<pre>';
// print_r($data); die;
?>
<header class="header-style-1">

	<!-- ============================================== TOP MENU ============================================== -->
	<div class="top-bar animate-dropdown">
		<div class="container">
			<div class="header-top-inner">
				<div class="cnt-account">
					<ul class="list-unstyled">
						<li><a href="<?= Url::to(['/wishlist/index']) ?>"><i class="icon fa fa-heart"></i>Yêu thích</a></li>
						<li><a href="<?= Url::to(['/cart/index']) ?>"><i class="icon fa fa-shopping-cart"></i>Giỏ hàng</a></li>
						<li><a href="<?= Url::to(['/checkout/index']) ?>"><i class="icon fa fa-check"></i>Thanh toán</a></li>
						<?php 
						if(isset(Yii::$app->user->identity->id)) { ?>
						<li>
							<?php echo Html::a('<i class="icon fa fa-lock"></i>Thoát (' . Yii::$app->user->identity->email . ')',['/site/logout'], ['data-method'=>'post']) ?>
						</li>
						<?php } else { ?>
						<li><a href="#" class="btn-login"><i class="icon fa fa-lock"></i>Đăng nhập/Đăng ký</a></li>
						<?php } ?>
					</ul>
				</div><!-- /.cnt-account -->

				<div class="cnt-block">
					<ul class="list-unstyled list-inline">
						<?php 
						if (isset(Yii::$app->user->identity->id)) { ?>
						<li class="dropdown dropdown-small">
							<a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown"><span class="value"><i class="icon fa fa-user"></i> Tài khoản </span><b class="caret"></b></a>
							<ul class="dropdown-menu">
								<!-- <li><a href="#">Thông tin tài khoản</a></li>
									<li><a href="#">Lịch sử đơn hàng</a></li> -->

									<li><a href="<?php echo Url::to(['customer/info', 'id'=>Yii::$app->user->identity->id]) ?>">Thông tin tài khoản</a></li>
									<li><a href="<?php echo Url::to(['/order/list', 'cus_id'=>Yii::$app->user->identity->id]) ?>">Lịch sử đơn hàng.</a></li>

								</ul>
							</li>
							<?php }  ?>
						</ul><!-- /.list-unstyled -->
					</div><!-- /.cnt-cart -->
					<div class="clearfix"></div>
				</div><!-- /.header-top-inner -->
			</div><!-- /.container -->
		</div><!-- /.header-top -->
		<!-- ============================================== TOP MENU : END ============================================== -->
		<div class="main-header">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-3 logo-holder">
						<!-- ============================================================= LOGO ============================================================= -->
						<div class="logo">
							<?= Html::a('<img src="'.Yii::$app->params['homepath'].'/uploads/images/logo/logo-HNH.png" alt="logo">', ['/']) ?>

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

										<select name="option" class="categories-filter animate-dropdown" style="padding: 11px 6px">
											<option>Tìm kiếm theo</option>
											<option value="product" name="select-option">Sản phẩm</option>
											<option value="news" name="select-option">Tin tức</option>
										</select>

										<input class="search-field" placeholder="Tìm..." name="key" />

										<?= Html::submitButton('', ['class' => 'search-button search-main']) ?>  

									</div>
									<?php ActiveForm::end(); ?>
								</div><!-- /.search-area -->
								<!-- ============================================================= SEARCH AREA : END ============================================================= -->				</div><!-- /.top-search-holder -->

								<div class="col-xs-12 col-sm-12 col-md-2 animate-dropdown top-cart-row">
									<!-- ============================================================= SHOPPING CART DROPDOWN ============================================================= -->

									<div class="dropdown dropdown-cart">
										<a href="#" class="dropdown-toggle lnk-cart" data-toggle="dropdown">
											<div class="items-cart-inner">
												<div class="basket">
													<i class="glyphicon glyphicon-shopping-cart"></i>
												</div>
												<div class="basket-item-count"><span class="count"><?php echo $data['totalItem'] ?></span></div>
												<div class="total-price-basket">
													<span class="lbl"> - </span>
													<span class="total-price">
														<span class="sign"><?php echo number_format($data['cost'], 0, '', '.') ?></span><span class="value">&nbsp;Đ</span>
													</span>
												</div>


											</div>
										</a>
										<ul class="dropdown-menu">
											<li>
												<div class="cart-item product-summary">
													<?php if($data['cartstore']) : foreach ($data['cartstore'] as $cart) : ?>

														<div class="row">
															<div class="col-xs-4">
																<div class="image">
																	<a href="<?php echo Url::to(['/product/details', 'slug'=>$cart->slug]); ?>"><img src="<?= Yii::$app->params['homepath'].$cart->images ?>" alt=""></a>
																</div>
															</div>
															<div class="col-xs-7">

																<h3 class="name"><a href="<?php echo Url::to(['/product/details', 'slug'=>$cart->slug]); ?>"><?php echo $cart->name ?></a></h3>
																<div class="price"><?php echo $cart->pricereal ?>/<?php echo $cart->pricelist ?></div>
															</div>
															<div class="col-xs-1 action">
																<a href="javascript:void(0)" class="delete-cart" data-name="<?php echo $cart->name ?>" data-href="<?php echo Url::to(['/cart/remove-cart','id'=>$cart->id]) ?>"><i class="fa fa-trash"></i></a>
															</div>
														</div>
														<hr>
													<?php endforeach; endif;?>
												</div><!-- /.cart-item -->
												<div class="clearfix"></div>

												<div class="clearfix cart-total">
													<div class="pull-right">

														<span class="text">Tổng tiền :</span><span class='price'><?php echo $data['cost'] ?> &nbsp;Đ</span>

													</div>
													<div class="clearfix"></div>

													<a href="<?= Url::to(['/checkout/index']) ?>" class="btn btn-upper btn-primary btn-block m-t-20">Đặt hàng</a>	
												</div><!-- /.cart-total-->


											</li>
										</ul><!-- /.dropdown-menu-->
									</div><!-- /.dropdown-cart -->

									<!-- ============================================================= SHOPPING CART DROPDOWN : END============================================================= -->				</div><!-- /.top-cart-row -->
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
													<li class="menu-active active">
														<a href="<?php echo Url::to(['/']) ?>">Trang chủ</a>

													</li>
													<li class="dropdown yamm mega-menu">
														<a href="home.html" data-hover="dropdown" class="dropdown-toggle" data-toggle="dropdown">Sản phẩm</a>
														<ul class="dropdown-menu container">
															<li>
																<div class="yamm-content ">
																	<div class="row">
																		<?php 
																		if ($data['cate']) :
																			foreach ($data['cate'] as $key => $cate) :
																				?>
																				<div class="col-xs-12 col-sm-6 col-md-2 col-menu">
																					<h2 class="title"><?php echo $cate->name ?></h2>
																					<ul class="links">
																						<?php 
																						$cateson = $cateson->getAllCateRoot($cate->id);
																						foreach ($cateson as $key => $cateson) :
																							?>
																							<li><a href="<?php echo Url::to(['/product/index', 'slug'=>$cateson->slug]) ?>"><?php echo $cateson->name; ?></a></li>
																						<?php endforeach; ?>
																					</ul>
																				</div><!-- /.col -->

																			<?php endforeach;
																			endif; ?>

																			<div class="col-xs-12 col-sm-6 col-md-4 col-menu banner-image" style="padding-bottom: 15px;">
																				<img class="img-responsive" src="<?php echo Yii::$app->params['homepath'] ?>/uploads/images/banners/top-menu-banner.jpg" alt="top-banner">


																			</div><!-- /.yamm-content -->					
																		</div>
																	</div>

																</li>
															</ul>
														</li>
														<li class=" menu-active">
															<a href="<?php echo Url::to(['/story/index']) ?>" >Câu chuyện HNH</a>
														</li>
														<li class=" menu-active">
															<a href="<?php echo Url::to(['/imagesreal/index']) ?>">Thư viện ảnh</a>
														</li>
														<li class=" menu-active">
															<a href="<?php echo Url::to(['/site/contact']) ?>" >Liên hệ</a>
														</li>
														<li class="menu-active">
															<a href="<?php echo Url::to(['/blog/index']) ?>" >Tin tức</a>	
														</li>



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