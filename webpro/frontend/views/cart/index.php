<?php 
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
// echo '<pre>';
// print_r($cost); die;

?>

<div class="body-content outer-top-xs">
	<div class="container">
		<div class="row ">
			<div class="shopping-cart">
				<?php if($cartstore):  ?>
					<div class="shopping-cart-table ">
						<div class="table-responsive">
							<table class="table">
								<thead>
									<tr>
										<th class="cart-romove item">Xóa</th>
										<th class="cart-description item">Hình ảnh</th>
										<th class="cart-product-name item">Tên sản phẩm</th>
										<th class="cart-edit item">sửa</th>
										<th class="cart-qty item">Số lượng</th>
										<th class="cart-sub-total item">Giá</th>
										<th class="cart-total last-item">Thành tiền</th>
									</tr>
								</thead><!-- /thead -->
								<tfoot>
									<tr>
										<td colspan="7">
											<div class="shopping-cart-btn">
												<span class="">
													<a href="javascript:void(0)" id="clearcart"
													data-href='<?php echo Url::to(['/cart/clear']) ?>'
													class="btn btn-upper br0 btn-danger outer-left-xs">Xóa toàn bộ giỏ hàng</a>
													<a href="<?php echo Url::to(['/site/index']); ?>" class="btn btn-upper btn-primary pull-right outer-right-xs br0">Tiếp tục mua hàng</a>
												</span>
											</div><!-- /.shopping-cart-btn -->
										</td>
									</tr>
								</tfoot>
								<tbody>
									<?php 
									foreach($cartstore as $key => $cart) :
										?>
										<tr>
											<td class="romove-item">
												<?php echo Html::a('<i class="fa fa-trash-o"></i>', ['javascript:void(0)'], 
													[
														'class'=>'icon delete-cart', 
														'title'=>"Xóa sản phẩm này trong giỏ hàng",	
														'data-name'=>$cart->name,
														'data-href'=> Url::to(['/cart/remove-cart','id'=>$cart->id]),								
													])
													?>
												</td>
												<td class="cart-image">
													<a class="entry-thumbnail" href="<?php echo Url::to(['/product/details', 'slug'=>$cart->slug]) ?>">
														<img src="<?= Yii::$app->params['homepath'].$cart['images']?>" alt="" />
													</a>
												</td>
												<td class="cart-product-name-info">
													<h4 class='cart-product-description'><a href="<?php echo Url::to(['/product/details', 'slug'=>$cart->slug]) ?>"><?= $cart['name'] ?></a></h4>
													<div class="row">
														<!-- <div class="col-sm-4">
															<div class="rating rateit-small"></div>
														</div> -->
														<div class="col-sm-8">
															<div class="reviews">
																<?= $cart['reviews'] ?> lượt xem
															</div>
														</div>
													</div><!-- /.row -->
												</td>
												<?php $form = ActiveForm::begin([
													'id' => 'update-cart-'.$cart['id'],
													'options' => ['class' => 'form-update-cart', 'data-id'=>$cart['id']],
													'action' => Url::to(['cart/update-cart']),
													]) ?>
													<td class="cart-product-edit">
														<?= Html::submitButton('<i class="fa fa-refresh fa-lg" aria-hidden="true"></i>', 
															['class'=>'product-edit', 'title'=>'Cập nhật giỏ hàng', 
															'style'=>'background: transparent;
															border: none;
															outline: none;']) ?>

														</td>
														<input type="hidden" name="id" value="<?php echo $cart['id'] ?>">
														<td class="cart-product-quantity">
															<div class="quant-input">
																<div class="arrows">
																	<div class="arrow plus gradient"><span class="ir"><i class="icon fa fa-sort-asc"></i></span></div>
																	<div class="arrow minus gradient"><span class="ir"><i class="icon fa fa-sort-desc"></i></span></div>
																</div>
																<input type="text" value="<?= $cart['qtt'] ?>" name="qtt" onkeypress="return isNumber(event)" min="1">
															</div>
														</td>
														<?php ActiveForm::end() ?>

														<td class="cart-product-sub-total"><span class="cart-sub-total-price"><?= number_format($cart['pricereal'], 0, '', '.').'/'. $cart['pricelist'] ?></span></td>
														<td class="cart-product-grand-total"><span class="cart-grand-total-price">
															<?= number_format($cart['qtt'] * $cart['pricereal'], 0, '', '.') ?> đ</span></td>
														</tr>
													<?php endforeach; ?>
												</tbody><!-- /tbody -->
											</table><!-- /table -->

										</div>
									</div><!-- /.shopping-cart-table -->				
									<div class="col-md-4 col-sm-12 estimate-ship-tax">

									</div><!-- /.estimate-ship-tax -->

									<div class="col-md-4 col-sm-12 estimate-ship-tax">
										<table class="table">
											<thead>
												<tr>
													<th>
														<span class="estimate-title">Mã giảm giá</span>
														<p>Nhập mã giảm giá nếu có..</p>
													</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>
														<div class="form-group">
															<input type="text" class="form-control unicase-form-control text-input" placeholder="Nhập..">
														</div>
														<div class="clearfix pull-right">
															<button type="submit" class="btn-upper btn btn-primary">Áp dụng mã</button>
														</div>
													</td>
												</tr>
											</tbody><!-- /tbody -->
										</table><!-- /table -->
									</div><!-- /.estimate-ship-tax -->

									<div class="col-md-4 col-sm-12 cart-shopping-total">
										<table class="table">
											<thead>
												<tr>
													<th>
														<div class="cart-sub-total">
															Tổng tiền<span class="inner-left-md"><?php echo number_format($cost, 0, '', '.') ?> Đ</span>
														</div>
									<!-- <div class="cart-grand-total">
										Grand Total<span class="inner-left-md">$600.00</span>
									</div> -->
									<span><i>(Chưa bao gồm phí vận chuyện)</i></span>
								</th>
							</tr>
						</thead><!-- /thead -->
						<tbody>
							<tr>
								<td>
									<div class="cart-checkout-btn pull-right">
										<a href="<?php echo Url::to(['/checkout/index']) ?>" class="btn btn-primary checkout-btn"><b>Thanh toán đơn hàng</b></a>
									</div>
								</td>
							</tr>
						</tbody><!-- /tbody -->
					</table><!-- /table -->
				</div><!-- /.cart-shopping-total -->		
			<?php else:  ?>
				<h4>Giỏ hàng giỗng...</h4>
			<?php endif; ?>
		</div><!-- /.shopping-cart -->
	</div> <!-- /.row -->
	<!-- ============================================== BRANDS CAROUSEL ============================================== -->

	<!-- ============================================== BRANDS CAROUSEL : END ============================================== -->	
</div><!-- /.container -->
</div><!-- /.body-content -->

<script type="text/javascript">
	function isNumber(evt) {
		evt = (evt) ? evt : window.event;
		var charCode = (evt.which) ? evt.which : evt.keyCode;
		if (charCode > 31 && (charCode < 48 || charCode > 57)) {
			return false;
		}
		return true;
	}
</script>