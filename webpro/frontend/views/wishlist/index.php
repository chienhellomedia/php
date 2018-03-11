<?php 
use backend\models\Product;
use backend\models\Wishlist;
use frontend\component\Functions;
use yii\helpers\Url;
// foreach ($data as $value) {
// 	echo "<pre>";
// 	print_r($value->wishlistRelation[0]->name);
// }
// foreach ($arr as $val) {
// 	echo "<pre>";
// 	print_r($val);
// }

?>
<div class="body-content">
	<div class="container">
		<div class="my-wishlist-page">
			<div class="row">
				<div class="col-md-12 my-wishlist">
					<div class="table-responsive">
						<table class="table">
							<?php if($data ) : ?>
								<thead>
									<tr>
										<th colspan="4" class="heading-title">Sản phẩm yêu thích</th>
									</tr>
								</thead>
								<tbody>
									<?php  foreach ($data as $value) : ?>
										<tr>
											<td class="col-md-2"><img src="<?= Yii::$app->params['homepath']. $value->wishlistRelation[0]->images ?>" alt="<?= $value->wishlistRelation[0]->name ?>"></td>
											<td class="col-md-7">
												<div class="product-name"><a href="<?php echo Url::to(['/product/detail', 'slug'=>$value->wishlistRelation[0]->slug]) ?>"><?= $value->wishlistRelation[0]->name ?></a></div>
												<div class="rating">
													<span class="review"><?= $value->wishlistRelation[0]->reviews ?> lượt xem</span>
												</div>
												<div class="">
													<?= Functions::CheckPrice($value->wishlistRelation[0]->startsale, $value->wishlistRelation[0]->endsale, $value->wishlistRelation[0]->pricesale, $value->wishlistRelation[0]->price) ?>
													<span style="font-size: 15px; font-weight: bold">/<?php echo $value->wishlistRelation[0]->pricelist ?></span>
												</div>

											</td>
											<td class="col-md-2">
												<button class="btn btn-upper btn-primary icon btn-cart" 
												data-toggle="tooltip" 
												data-pirce="<?php echo Functions::price($value->wishlistRelation[0]->startsale, $value->wishlistRelation[0]->endsale, $value->wishlistRelation[0]->pricesale, $value->wishlistRelation[0]->price); ?>"
												href="<?php echo Url::to(['/cart/addcart', 'id'=>$value->wishlistRelation[0]->id]) ?>"
												data-img="<?php echo yii::$app->params['homepath'].$value->wishlistRelation[0]->images ?>"
												data-name="<?php echo $value->wishlistRelation[0]->name ?>"
												data-pricelist="<?php echo $value->wishlistRelation[0]->pricelist ?>"
												data-toggle="dropdown" type="button" title="Thêm giỏ hàng">
												<i class="fa fa-shopping-cart"></i> Thêm giỏ hàng                                                
											</button>
										</td>
										<td class="col-md-1 close-btn">
											<a href="<?php echo Url::to(['/wishlist/delwishlist', 'id'=>$value->wishlistRelation[0]->id]) ?>" class="del-wishlist" data-toggle="tooltip" title="Xóa"><i class="fa fa-times"></i></a>
										</td>
									</tr>
								<?php endforeach;  ?>
							</tbody>
						<?php else: ?>
							<h4>Bạn chưa chọn sản phẩm nào</h4>
						<?php endif; ?>
					</table>
				</div>
			</div>		
		</div><!-- /.row -->

	</div><!-- /.sigin-in-->
</div>
</div>