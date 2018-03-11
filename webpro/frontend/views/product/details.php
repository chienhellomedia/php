<?php 
use frontend\widgets\Comment;
use frontend\component\Functions;
use yii\helpers\Url;
use frontend\widgets\SideMenu;
use frontend\widgets\Video;
use frontend\widgets\Facebook;
use frontend\widgets\Blogtag;
use frontend\widgets\Certi;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\component\Reviews;


$slug = Yii::$app->request->get('slug') ? Yii::$app->request->get('slug') : NULL;
$cus_id = isset(Yii::$app->user->id) ? Yii::$app->user->id : 0; 
Reviews::Reviewscount('product', $slug);


?>

<!-- ============================================== HEADER : END ============================================== -->
<style type="text/css" media="screen">

</style>
<div class="spin-load"></div>
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
					<?php echo SideMenu::Widget(); ?>	
					<?php echo Video::widget(); ?>
					<?php echo Blogtag::widget(); ?>
					<?php echo Facebook::widget(); ?>
					<?php echo Certi::Widget() ?>


				</div>
			</div><!-- /.sidebar -->
			<div class='col-md-9'>
				
				<div class="detail-block">
					<div class="row  wow fadeInUp">

						<div class="col-xs-12 col-sm-6 col-md-5 gallery-holder">
							<div class="product-item-holder size-big single-product-gallery small-gallery">

								<div id="owl-single-product">
									<?php foreach ($images as $key => $value) : ?>
									<div class="single-product-gallery-item" id="slide<?php echo $key+1 ?>">
										<a data-lightbox="image-1" data-title="Gallery" href="<?php echo Yii::$app->params['homepath'] ?><?php echo$value->image ?>">
											<img class="img-responsive" alt="" src="<?php echo Yii::$app->params['homepath'] ?><?php echo $value->image ?>" data-echo="<?php echo Yii::$app->params['homepath'] ?><?php echo $value->image ?>" />
										</a>
									</div><!-- /.single-product-gallery-item -->
									<?php endforeach; ?>
							


								</div><!-- /.single-product-slider -->


								<div class="single-product-gallery-thumbs gallery-thumbs">

									<div id="owl-single-product-thumbnails">
										<?php foreach ($images as $key => $value) : ?>
										<div class="item">
											<a class="horizontal-thumb active" data-target="#owl-single-product" data-slide="<?php echo $key+1 ?>" href="#slide<?php echo $key+1 ?>">
												<img class="img-responsive" width="85" alt="" src="<?php echo Yii::$app->params['homepath'] ?><?php echo $value->image ?>" data-echo="<?php echo Yii::$app->params['homepath'] ?><?php echo $value->image ?>" />
											</a>
										</div>
										<?php endforeach; ?>
									
									
									
									</div><!-- /#owl-single-product-thumbnails -->



								</div><!-- /.gallery-thumbs -->

							</div><!-- /.single-product-gallery -->
						</div><!-- /.gallery-holder -->        			
						<div class='col-sm-6 col-md-7 product-info-block'>
							<div class="product-info">
								<h1 class="name"><?php echo $detail->name ?></h1>

								<div class="rating-reviews m-t-20">
									<div class="row">
							<!-- <div class="col-sm-3">
								<div class="rating rateit-small"></div>
							</div> -->
							<div class="col-sm-8">
								<div class="reviews">
									<a href="#" class="lnk">Số lượt xem <?php echo $detail->reviews ?></a>
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
									<span class="value"><?php if ($detail->instock == 10) {
										echo 'Còn hàng';
									} else echo 'Hết hàng' ?></span>
								</div>	
							</div>
						</div><!-- /.row -->	
					</div><!-- /.stock-container -->

					<div class="description-container m-t-20">
						<?php echo $detail->desc ?>
					</div><!-- /.description-container -->

					<div class="price-container info-container m-t-20">
						<div class="row">


							<div class="col-sm-6">
								<div class="price-box">
									<?php Functions::CheckPrice($detail->startsale, $detail->endsale, $detail->pricesale, $detail->price); ?>

									<span style="font-size: 15px; font-weight: bold">/<?php echo $detail->pricelist ?></span>
								</div>
							</div>

							<div class="col-sm-6">
								<div class="favorite-button m-t-10">
									<a data-toggle="tooltip" class=" btn btn-primary add-to-wishlist" data-name="<?php echo $detail->name; ?>" data-img="<?php echo $detail->images ?>" data-id="wishlist-<?php echo $detail->id ?>" href="<?php echo Url::to(['/wishlist/addwishlist', 'id'=>$detail->id]) ?>" 
										data-count="<?= isset(Yii::$app->user->identity->id) ? Yii::$app->user->identity->id : NULL ?>"
										title="Yêu thích">
										<i class="icon fa fa-heart"></i>
									</a>
									

								</div>
							</div>

						</div><!-- /.row -->
					</div><!-- /.price-container -->

					<?php $form = ActiveForm::begin([
						'id' => 'cart-form',
						'action'=> Url::to(['/cart/addformcart']),
						'options' => ['class' => 'form-horizontal addcart-form'],
						]) ?>
						<div class="quantity-container info-container">
							<div class="row">
								<input type="hidden" name="id" class="formid" value="<?php echo $detail->id ?>">
								<input type="hidden" name="price" class="formprice" value="<?php echo Functions::price($detail->startsale, $detail->endsale, $detail->pricesale, $detail->price) ?>">

								<div class="col-sm-2">
									<span class="label">Số lượng :</span>
								</div>
								
								<div class="col-sm-2">
									<div class="cart-quantity">
										<div class="quant-input">
											<div class="arrows">
												<div class="arrow plus gradient"><span class="ir"><i class="icon fa fa-sort-asc"></i></span></div>
												<div class="arrow minus gradient"><span class="ir"><i class="icon fa fa-sort-desc"></i></span></div>
											</div>
											<input type="text" value="1"  name='qtt'>
										</div>
									</div>
								</div>

								<div class="col-sm-7">
									<button class="btn btn-primary"><i class="fa fa-shopping-cart inner-right-vs"></i> Thêm giỏ hàng</button>
								</div>


							</div><!-- /.row -->
						</div><!-- /.quantity-container -->

						<?php ActiveForm::end() ?>

					</div><!-- /.product-info -->
				</div><!-- /.col-sm-7 -->
			</div><!-- /.row -->
		</div>



		<div class="product-tabs inner-bottom-xs  wow fadeInUp">
			<div class="row">
				<div class="col-sm-6">
					<ul id="product-tabs" class="nav nav-tabs nav-tab-cell">
						<li class="active" style="width: 45%; display: inline-block;"><a data-toggle="tab" href="#review">Bình luận</a></li>
						<li style="width: 45%; display: inline-block;"><a data-toggle="tab" href="#description">Mô tả</a></li>

					</ul><!-- /.nav-tabs #product-tabs -->
				</div>
				<div class="col-sm-12">

					<div class="tab-content">

						<div id="review" class="tab-pane in active">
							<div class="product-tab">

								<?php echo Comment::widget(['table'=>'product', 'slug'=>$slug, 'cus_id'=> $cus_id]); ?>
								
							</div>	
						</div><!-- /.tab-pane -->

						<div id="description" class="tab-pane">
							<div class="product-tab">

								<div class="product-reviews">
									<p class="text"><?php echo $detail->content ?></p>


								</div><!-- /.product-reviews -->




							</div><!-- /.product-tab -->
						</div><!-- /.tab-pane -->


					</div><!-- /.tab-content -->
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.product-tabs -->
		

		<!-- ============================================== UPSELL PRODUCTS ============================================== -->
		<section class="section featured-product wow fadeInUp">
			<h3 class="section-title">Sản phẩm khác</h3>
			<div class="owl-carousel home-owl-carousel upsell-product custom-carousel owl-theme outer-top-xs">
				<?php foreach ($other as $other) : ?>
					<div class="item item-carousel">
						<div class="products">

							<div class="product">		
								<div class="product-image">
									<div class="image">
										<a href="<?php echo Url::to(['/product/details', 'slug'=>$other->slug]) ?>"><img  src="<?php echo Yii::$app->params['homepath'] ?><?php echo $other->images ?>" alt=""></a>
									</div><!-- /.image -->			

									<?php echo Functions::CheckSale($other->startsale, $other->endsale, $other->saleoff) ?>           		   
								</div><!-- /.product-image -->


								<div class="product-info text-left">
									<h3 class="name"><a href="<?php echo Url::to(['/product/details', 'slug'=>$other->slug]) ?>"><?php echo $other->name ?></a></h3>
									<!-- <div class="rating rateit-small"></div> -->
									<!-- <div class="description"></div> -->

									<div class="product-price">	
										<?php echo Functions::CheckPrice($other->startsale, $other->endsale, $other->pricesale, $other->price) ?> 
										<span style="font-size: 15px; font-weight: bold">/<?php echo $detail->pricelist ?></span>
									</div><!-- /.product-price -->

								</div><!-- /.product-info -->
								<div class="cart clearfix animate-effect">
									<div class="action">
										<ul class="list-unstyled">
											<li class="add-cart-button btn-group">
												<button data-toggle="tooltip" 
												class="btn btn-primary icon btn-cart" 
												data-pirce="<?php echo Functions::price($other->startsale, $other->endsale, $other->pricesale, $other->price); ?>"
												href="<?php echo Url::to(['/cart/addcart', 'id'=>$other->id]) ?>"
												data-img="<?php echo yii::$app->params['homepath'].$other->images ?>"
												data-name="<?php echo $other->name ?>"
												data-pricelist="<?php echo $other->pricelist ?>"
												type="button" title="Thêm giỏ hàng">
												<i class="fa fa-shopping-cart"></i>                                                 
											</button>
											<!-- <button class="btn btn-primary cart-btn" type="button">Thêm giỏ hàng</button> -->
										</li>

										<li class="lnk wishlist">
											<a data-toggle="tooltip" class="add-to-wishlist" data-name="<?php echo $other->name; ?>" data-img="<?php echo $other->images ?>" data-id="wishlist-<?php echo $other->id ?>" href="<?php echo Url::to(['/wishlist/addwishlist', 'id'=>$other->id]) ?>" 
												data-count="<?= isset(Yii::$app->user->identity->id) ? Yii::$app->user->identity->id : NULL ?>"
												title="Yêu thích">
												<i class="icon fa fa-heart"></i>
											</a>
										</li>

										
									</ul>
								</div><!-- /.action -->
							</div><!-- /.cart -->
						</div><!-- /.product -->

					</div><!-- /.products -->
				</div><!-- /.item -->
			<?php endforeach; ?>

		</div><!-- /.home-owl-carousel -->
	</section><!-- /.section -->
	<!-- ============================================== UPSELL PRODUCTS : END ============================================== -->

</div><!-- /.col -->
<div class="clearfix"></div>
</div><!-- /.row -->
<!-- ============================================== BRANDS CAROUSEL ============================================== -->

<!-- ============================================== BRANDS CAROUSEL : END ============================================== -->	</div><!-- /.container -->
</div><!-- /.body-content -->

<!-- ============================================================= FOOTER ============================================================= -->

