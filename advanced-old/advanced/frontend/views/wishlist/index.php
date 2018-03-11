<?php 
use yii\helpers\Url;
use backend\models\Product;
$date = date('Y-m-d');
?>

<?php if (!isset(Yii::$app->user->identity->id)) : ?>
	<div class="container" style="padding-top: 20px">
		<div class="panel panel-info">
			<div class="panel-heading">
				<h3 class="panel-title">Sản phẩm yêu thích</h3>
			</div>
			<div class="panel-body">
				<div class="alert alert-danger">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<h3>Bạn phải đăng nhập để xem chức năng này!</h3> 
					<a href="<?php echo Url::to(['/site/login']) ?>" title="Đăng nhập/Đăng ký" class="btn btn-info br0">Đăng nhập / Đăng ký</a>
				</div>
			</div>
		</div>
	</div>
<?php else : ?>
	<div class="breadcrumb">
		<div class="container">
			<div class="breadcrumb-inner">				
			</div><!-- /.breadcrumb-inner -->
		</div><!-- /.container -->
	</div><!-- /.breadcrumb -->

	<div class="body-content">
		<div class="container">
			<div class="my-wishlist-page">
				<div class="row">
					<div class="col-md-12 my-wishlist">
						<div class="table-responsive">
							<table class="table">
								<thead>
									<tr>
										<th colspan="4" class="heading-title">Danh sách sản phẩm yêu thích</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($data as $value) :
									$product = new Product();
									$pro = $product->getOneProduct($value->product_id);	                       			
									?>
									<tr>
										<td class="col-md-2"><img src="<?php echo $pro->image; ?>" alt="<?php echo $pro->name; ?>"></td>
										<td class="col-md-7">
											<div class="product-name"><a href="<?php echo Url::to(['/product/detail', 'slug'=>$pro->slug]) ?>"><?php echo $pro->name; ?></a></div>
											<div class="rating">
												<i class="fa fa-star rate"></i>
												<i class="fa fa-star rate"></i>
												<i class="fa fa-star rate"></i>
												<i class="fa fa-star rate"></i>
												<i class="fa fa-star non-rate"></i>
												<span class="review">( 06 Lượt xem )</span>
											</div>

											<br>
											<?php if ($date >= $pro->startsale && $date <= $pro->endsale && $pro->pricesale != NULL) : ?>  <span class="price"><?php echo number_format($pro->pricesale, 0, '', '.') ?></span>
												<span class="price-before-discount"><del><?php echo number_format($pro->price, 0, '', '.') ?></del></span>
											<?php else : ?>
												<span class="price"><?php echo number_format($pro->price, 0, '', '.') ?></span>	
											<?php endif; ?>
											<span style="font-size: 15px; font-weight: bold">/<?php echo $pro->pricelist; ?></span>
										</div>
									</td>
									<td class="col-md-2">
										<a href="<?php echo Url::to(['/cart/addcart', 'id'=>$pro->id]) ?>" 
											data-name="<?php echo $pro->name ?>"
											<?php if ($date >= $pro->startsale && $date <= $pro->endsale && $pro->pricesale != NULL) : ?>
												data-price="<?php echo $pro->pricesale; ?>"              
											<?php else : ?>
												data-price="<?php echo $pro->price; ?>"  
											<?php endif; ?>
											data-img="<?php echo $pro->image; ?>"
											class="btn-upper btn btn-primary btn-cart">Thêm giỏ hàng</a>
										</td>
										<td class="col-md-1 close-btn">
											<a href="<?php echo Url::to(['/wishlist/delwishlist', 'id' => $value->product_id]) ?>" class="del-wishlist"><i class="fa fa-times"></i></a>
										</td>
									</tr>
								<?php endforeach; ?>
							</tbody>
						</table>
					</div>
				</div>			
			</div><!-- /.row -->
		</div><!-- /.sigin-in-->
		<!-- ============================================== BRANDS CAROUSEL ============================================== -->

		<!-- ============================================== BRANDS CAROUSEL : END ============================================== -->	</div><!-- /.container -->
	</div><!-- /.body-content -->
<?php endif; ?>
<style type="text/css" media="screen">
	td {
		padding: 2px !important;
	}
</style>

