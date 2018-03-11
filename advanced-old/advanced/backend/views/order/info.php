<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use backend\models\Product;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Order */


$this->title = 'Thông tin chi tiết đơn hàng';
$this->params['breadcrumbs'][] = ['label' => 'Đơn hàng', 'url' => ['index']];
// $this->params['breadcrumbs'][] = $this->title;
// 
?>

<div class="order-view">
	<div class="card">
		<div class="panel panel-info">
			<div class="panel-heading">
				<h3 class="panel-title"><?= Html::encode($this->title) ?></h3>
			</div>
			<div class="panel-body">
				<div class="card">
					<div class="row">
						<div class="col-md-2 btn btn-success" style="margin-right: 10px">
							<?php echo Html::a('<i class="fa fa-reply" aria-hidden="true"></i> Quay về',['order/index'],['style'=>'color:#fff']) ?>					
						</div>
						<div class="col-md-2 btn btn-primary">
							<?php echo Html::a('<i class="fa fa-print" aria-hidden="true"></i> In đơn hàng',['order/pdf','id'=>$model->id],['target'=>'_blank','style'=>'color:#fff']) ?>

						</div>

						<div class="col-md-4">
							<?php $form = ActiveForm::begin() ?>
							<?= $form->field($model, 'status')->dropDownList([
								0 => 'Đang chờ duyệt',
								1 => 'Đang giao hàng',
								2 => 'Đã thanh toán',
								3 => 'Khách trả hàng'
								],
								[
								'prompt'=>'Chọn trạng thái đơn hàng'
								])->label(false) ?>

							</div>
							<div class="col-md-2">
								<?php echo Html::submitButton('<i class="fa fa-clone" aria-hidden="true"></i> Lưu', ['class' => 'btn btn-primary btn-sm  btn-block']); ?>
								<?php ActiveForm::end(); ?>
							</div>
						</div>

						<div class="row">
							<div class="col-md-1"></div>
							<div class="col-md-5">
								<table class="table table-hover table-bordered">					
									<tbody>
										<tr>
											<td>Người mua</td>
											<td><?php echo $model->fullname; ?></td>
										</tr>
										<tr>
											<td>Phone</td>
											<td><?php echo $model->mobile; ?></td>								
										</tr>
										<tr>
											<td>Email</td>
											<td><?php echo $model->email; ?></td>
										</tr>
										<tr>
											<td>Address</td>
											<td><?php echo $model->addess; ?></td>
										</tr>
									</tbody>
								</table>
							</div>
							<div class="col-md-5">
								<table class="table table-hover table-bordered">					
									<tbody>
										<tr>
											<td>Người nhận</td>
											<td><?php echo $model->fullname_ship; ?></td>
										</tr>
										<tr>
											<td>Phone nhận</td>
											<td><?php echo $model->mobile_ship; ?></td>								
										</tr>
										<tr>
											<td>Email nhận</td>
											<td><?php echo $model->email_ship; ?></td>
										</tr>
										<tr>
											<td>Address nhận</td>
											<td><?php echo $model->addess_ship; ?></td>
										</tr>
									</tbody>
								</table>
							</div>
							<div class="col-md-1"></div>
						</div>
						<div class="row">
							<div class="col-md-1"></div>
							<div class="col-md-10">
								<table class="table table-hover table-bordered">							
									<tbody>
										<tr>
											<td>Tổng tiền</td>
											<td><?php echo $model->total; ?></td>
										</tr>
										<tr>
											<td>Yêu cầu</td>
											<td><?php echo $model->request; ?></td>
										</tr>
										<tr>
											<td>Hình thức thanh toán</td>
											<td><?php echo $model->payment_id; ?></td>
										</tr>
										<tr>
											<td>Hình thức giao hàng</td>
											<td><?php echo $model->delivery_id; ?></td>
										</tr>
										<tr>
											<td>Ngày mua</td>
											<td><?php echo $model->created_at; ?></td>
										</tr>
									</tbody>
								</table>
							</div>
							<div class="col-md-1"></div>
						</div>





						<div>
							<table class="table table-bordered table-hover table-condensed">
								<thead>
									<tr>
										<th>STT</th>
										<th>Name</th>
										<th>Image</th>											
										<th>Price</th>
										<th>Quantity</th>
									</tr>
								</thead>
								<tbody>
									<?php $n = 1; foreach ($orderdetail as $value) : 
									$product = new Product();
									$product = $product->getOneProduct($value->product_id)
									?>

									<tr>
										<td><?php echo $n ?></td>
										<td><?php echo $product->name ?></td>
										<td><img src="<?php echo $product->image ?>" alt="" width='100'></td>

										<td><?php echo $value->price ?></td>
										<td><?php echo $value->quantity ?></td>
									</tr>
									<?php $n++; endforeach; ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>