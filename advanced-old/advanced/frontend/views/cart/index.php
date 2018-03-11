<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
// echo '<pre>';
// print_r($cartstore);
// echo '</pre>'; die;
$date = date('Y-m-d');
$total = 0;
?>	
<div class="container" style="padding-top: 20px">
	<div class="cart-items">
		<div class="panel panel-info">
			<div class="panel-heading">
				<h3 class="panel-title"><b>Giỏ hàng của bạn</b></h3>
			</div>
			<div class="panel-body" style="padding: 0">
				<?php if($cartstore) : ?>
					<div class="shopping-cart">
						<div class="shopping-cart-table ">
							<div class="table-responsive">
								<table class="table">
									<thead>
										<tr>
											<th class="cart-romove item">Xóa</th>
											<th class="cart-description item">Hình ảnh</th>
											<th class="cart-product-name item">Tên sản phẩm</th>
											<th class="cart-edit item">cập nhật</th>
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
														<?php echo html::a('Tiếp tục mua hàng', ['/site/index'], ['class'=>'btn btn-upper btn-primary outer-left-xs pull-right br0']) ?>
														<?php echo html::a('Xóa giỏ hàng', ['/cart/clear'], ['class'=>'btn btn-upper btn-danger pull-left outer-right-xs br0', 'id' => 'clearcart']) ?>
													</span>
												</div><!-- /.shopping-cart-btn -->
											</td>
										</tr>
									</tfoot>
									<tbody>
										<?php $n = 1; foreach ($cartstore as $ky => $value) : 
										?>						
										<tr>
											<td class="romove-item">
												<?php echo Html::a('<i class="fa fa-trash-o"></i>', ['/cart/remove-cart','id'=>$value->id], 
													[
														'class'=>'icon delete-cart', 
														'title'=>"Xóa sản phẩm này trong giỏ hàng",	
														'data-name'=>$value->name,								
														]) ?>
													</td>
													<td class="cart-image">
														<a class="entry-thumbnail" href="<?php echo Url::to(['product/detail', 'slug'=>$value->slug]) ?>">
															<img src="<?php echo $value->image; ?>" alt="" width=50>
														</a>
													</td>
													<td class="cart-product-name-info">
														<h4 class='cart-product-description'><a href="<?php echo Url::to(['product/detail', 'slug'=>$value->slug]) ?>"><?php echo $value->name ?></a></h4>
														<div class="row">
															<div class="col-sm-4">
																<div class="rating rateit-small"></div>
															</div>
															<div class="col-sm-8">
																<div class="reviews">
																	(06 Reviews)
																</div>
															</div>
														</div><!-- /.row -->													
													</td>

													<?php $form = ActiveForm::begin([
														'id' => 'form-cart-'.$value->id,
														'options' => ['class' => 'form-inline pull-left form-update-cart', ],
														'action' => Url::to(['cart/update-cart'])
														]) ?>
														<td class="cart-product-edit">
															<?= Html::submitButton('<i class="fa fa-refresh fa-lg" aria-hidden="true"></i>', 
															['class'=>'product-edit update-cart', 'data'=>['id' => $ky,], 'title'=>'Cập nhật giỏ hàng']) ?>
														</td>
														<td class="cart-product-quantity">
															<div class="quant-input" id="qtt-<?php echo $ky ?>">						
																<input type="hidden" name="id" value="<?php echo $value->id; ?>" >
																<input type="number" name="qtt" value="<?php echo $value->qtt; ?>" onkeypress="return isNumber(event)" min="1">
																<span id="input-qtt-<?php echo $value->id ?>"></span>
															</div>
														</td>
														<?php ActiveForm::end() ?>

														<td class="cart-product-sub-total">
															<?php if ($date >= $value->startsale && $date <= $value->endsale && $value->pricesale != NULL) : $price = $value->pricesale; ?>
																<span class="cart-sub-total-price"><?php echo number_format($value->pricesale, 0, '', '.'); ?></span>													
															<?php else : $price = $value->price; ?>
																<span class="price"><?php echo number_format($value->price, 0, '', '.'); ?></span>
															<?php endif; ?>

														</td>
														<td class="cart-product-grand-total">
															<span class="cart-grand-total-price"><?php echo number_format($value->qtt*$price, 0, '', '.'); ?>&nbsp;VNĐ</span>
														</td>
													</tr>
													<?php $total +=  $value->qtt*$price; ?>
													<?php $n++; endforeach; ?>
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
															<input type="text" class="form-control unicase-form-control text-input" placeholder="You Coupon..">
														</div>
														<div class="clearfix pull-right">
															<button type="submit" class="btn-upper btn btn-primary">Áp dụng</button>
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
															Thành tiền<span class="inner-left-md">&nbsp;<?php echo number_format($total, 0, '', '.'); ?> &nbsp; VNĐ</span>
														</div>													
													<!-- <div class="cart-grand-total">
														Tổng tiền<span class="inner-left-md">&nbsp;<?php echo number_format($cost, 0, '', '.'); ?> &nbsp; VNĐ</span>
													</div> -->
												</th>
											</tr>
										</thead><!-- /thead -->
										<tbody>
											<tr>
												<td>
													<div class="cart-checkout-btn pull-right">
														
														<?php $form = ActiveForm::begin(['action'=>['/checkout/index']]); ?>
														<input type="hidden" name="total" value="<?php echo $total ?>">
														<div class="form-group">
															<?= Html::submitButton('Đặt hàng', ['class'=>'btn btn-primary checkout-btn']) ?>
														</div>
														<?php ActiveForm::end(); ?>
														<!-- <span class="">Checkout with multiples address!</span> -->
													</div>
												</td>
											</tr>
										</tbody><!-- /tbody -->
									</table><!-- /table -->
								</div><!-- /.cart-shopping-total -->
								<b><i>(Lưu ý chưa bao gồm phí vận chuyển)</i></b>


							<?php else : ?>
								<div class="alert alert-warning empty-cart">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
									<h3><strong>Giỏ hàng của bạn rỗng!</strong> Quay lại trang chủ ...<?php echo html::a('<i class="fa fa-home" aria-hidden="true"></i> Quay lại Trang chủ', ['/site/index'], ['class'=> 'btn btn-info br0']) ?></h3>

								</div>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
		</div>


		<style type="text/css" media="screen">
		.product-edit {
			background: transparent;
			border: none;
			outline: none;
		}
		.table {
			border: 2px solid #f3f3f3;
			padding: 15px;
		}
		td {
			padding: 0px !important;
		}
		tr {
			border: 2px solid #f3f3f3;
		}
	</style>

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
