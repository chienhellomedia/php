<?php 
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
$date = date("Y-m-d");
?>
<div class="col-xs-12 col-sm-12 col-md-2 animate-dropdown top-cart-row">
	<!-- ============================================================= SHOPPING CART DROPDOWN ============================================================= -->

	<div class="dropdown dropdown-cart">
		<a href="#" class="dropdown-toggle lnk-cart" data-toggle="dropdown">

			<div class="items-cart-inner">
				<div class="basket">
					<i class="glyphicon glyphicon-shopping-cart"></i>
				</div>
				<div class="basket-item-count"><span class="count"><?php if ($totalItem != 0) echo $totalItem; else  echo 0; ?></span></div>
				<div class="total-price-basket">
					<span class="lbl">-</span>
					<span class="total-price">
						<span class="value"><?php if($cost) echo number_format($cost, 0, ',', '.'); else echo 0; ?>-Đ</span>
					</span>
				</div>
			</div>


		</a>
		<ul class="dropdown-menu">
			<li>
				<div class="cart-item product-summary">
					
					<?php if($cartstore) : foreach ($cartstore as $cart): ?>
						<div class="row">
							<div class="col-xs-4">
								<div class="image">
									<a href="<?php echo Url::to(['/product/detail', 'id'=>$cart->id]) ?>"><img src="<?php echo $cart->image; ?>" alt=""></a>
								</div>
							</div>
							<div class="col-xs-7">

								<h3 class="name"><a href="<?php echo Url::to(['/product/detail', 'id'=>$cart->id]) ?>"><?php echo $cart->name; ?></a></h3>
								<div class="price">
									<?php if ($date >= $cart->startsale && $date <= $cart->endsale && $cart->pricesale != NULL): ?>
										<?php echo number_format($cart->pricesale, 0, ',', '.'); ?>
									<?php else: ?>
										<?php echo number_format($cart->price, 0, ',', '.'); ?>
									<?php endif ?>

								</div>
							</div>
							<div class="col-xs-1 action">
								<a href="<?php echo Url::to(['/cart/remove-cart', 'id'=>$cart->id]) ?>" class="delete-cart", data-name="<?php echo $cart->name ?>"><i class="fa fa-trash"></i></a>
							</div>								
						</div>
					<?php endforeach; endif; ?>

				</div><!-- /.cart-item -->
				<div class="clearfix"></div>
				<hr>

				<div class="clearfix cart-total">
					<div class="pull-right">

						<span class="text">Thành tiền :</span><span class='price'><?php echo number_format($cost, 0, ',', '.') ?></span>

					</div>
					<div class="clearfix"></div>

					<?php $form = ActiveForm::begin(['action'=>['/checkout/index']]); ?>
					<input type="hidden" name="total" value="<?php echo $cost ?>">
					<div class="form-group">
						<?= Html::submitButton('Đặt hàng', ['class'=>'btn btn-upper btn-primary btn-block m-t-20 checkout-btn', 'style'=>'background: #66ad44; font-size: 13px; padding: 6px 14px;']) ?>
					</div>
					<?php ActiveForm::end(); ?>
				</div><!-- /.cart-total-->


			</li>
		</ul><!-- /.dropdown-menu-->
	</div><!-- /.dropdown-cart -->

	<!-- ============================================================= SHOPPING CART DROPDOWN : END============================================================= -->				
</div><!-- /.top-cart-row -->
