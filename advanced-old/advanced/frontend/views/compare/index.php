<?php 
date_default_timezone_set("Asia/Vientiane"); 
$date = date('Y-m-d');
?>
<?php if (!$compare): ?>
	<div class="container" style="padding-top: 20px">
		<div class="alert alert-warning">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<h4>Bạn chưa chọn Sản phẩm nào để so sánh.</h4>
		</div>
	</div>
<?php else : ?>

	<div class="body-content outer-top-xs">
		<div class="container">
			<div class="product-comparison">
				<div>
					<h1 class="page-title text-center heading-title">So sánh Sản phẩm</h1>
					<div class="table-responsive">
						<?php $i=1; foreach ($compare as $value): 						
						if ($i == 4) {
							$i = 1; echo '</div><div class="table-responsive">';
						}
						?>
						<div class="col-md-3">	
							<div class="product">
								<div class="product-image">
									<div class="image">
										<img src="<?php echo $value->image ?>" alt="" class="img-responsive imgheight">
									</div>
									<hr class="fix-hr">
									<h3 class="name"><?php echo $value->name ?></h3>
									<a class="lnk btn btn-primary btn-cart"
									data-img="<?php echo $value->image; ?>"
									data-name="<?php echo $value->name ?>"
									<?php if ($date >= $value->startsale && $date <= $value->endsale && $value->pricesale != NULL) : ?>
										data-price="<?php echo  number_format($value->pricesale, 0, '', '.'); ?>"              
									<?php else : ?>
										data-price="<?php echo number_format($value->price, 0, '', '.'); ?>"  
									<?php endif; ?>
									href="<?php echo yii\helpers\Url::to(['cart/addcart', 'id'=>$value->id]) ?>" title="Giỏ hàng">Thêm giỏ hàng</a>
								</div>
								<div class="product-price">
									<?php if ($date >= $value->startsale && $date <= $value->endsale && $value->pricesale != NULL) : $price = $value->pricesale; ?>
										<span class="price"> <?php echo number_format($value->pricesale, 0, '', '.') ?> </span>
										<span class="price-before-discount"><del><?php echo number_format($value->price, 0, '', '.') ?></del></span>
									<?php else : ?>
										<span class="price"><?php echo number_format($value->price, 0, '', '.') ?> </span>
									<?php endif; ?>
									<span style="font-size: 15px; font-weight: bold"><?php echo $value->pricelist; ?></span>
								</div>
								<hr class="fix-hr">
								<div class="text clearfix"><?php echo $value->desc ?></div>
								<p><?php if ($value->instock == 10) {
									echo '<span class="btn btn-success btn-sm br0">Còn hàng</span>';
								} else {
									echo '<span class="btn btn-danger btn-sm br0">Hết hàng</span>';
								}

								?></p>
								<a href="<?php echo yii\helpers\Url::to(['compare/remove', 'id'=>$value->id]) ?>" class="remove-icon remove-compare"><i class="fa fa-times" title="Xóa"></i> Xóa</a>
								<hr class="fix-hr">

							</div>
						</div>
						
					<?php endforeach ?>


				</div>
			</div>
		</div>
	</div>
</div>
<?php endif; ?>
<style type="text/css" media="screen">
	.fl {
		float: left;
		width: 20%;
		margin-left: 10px;
	}
	.fix-hr {
		margin-top: 0;
		margin-bottom: 0;
	}
	.name {
		font-size: 14px;
		font-family: 'Open Sans', sans-serif !important;
		text-align: center;
		color: #555;
	}
	.product {
		/* border: 1px solid; */
		padding: 20px;
		margin-bottom: 20px;
	}
	.image img {
		width: 100% !important;
	}
	.product-image a {
		display: table;
		margin: 0 auto;
	}
	.product-price {
		display: table;
		margin: 0 auto;
		padding-top: 10px;
		padding-bottom: 10px;
	}
	.price {		
		font-size: 16px;
		font-weight: 700;
		line-height: 30px;
		margin-right: 0px;
	}
	.product-comparison .compare-table tr td .product-price .price-before-discount {
		color: #D3D3D3;
		font-size: 14px;
		font-weight: 400;
		line-height: 30px;
		text-decoration: line-through;
	}
	.text {
		font-size: 14px;
		line-height: 22px;
		padding-top: 10px;
		height: 250px;
		padding-top: 10px;
		padding-bottom: 10px;
		margin-bottom: 20px;		
	}
	.text p {
		height: 250px;
		text-overflow: ellipsis;
		overflow: hidden;

	</style>