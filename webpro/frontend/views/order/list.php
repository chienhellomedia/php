<?php
/* @var $this yii\web\View */
?>
<?php if (!$model || $model == NULL) : ?>
	<div class="container" style="padding-top: 20px">
		<div class="alert alert-warning">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<strong>Bạn chưa có đơn hàng nào!...</strong>  <a href="<?php echo yii\helpers\Url::to(['/site/index']) ?>" title="Trang chủ" class="btn btn-info br0"><i class="fa fa-home" aria-hidden="true"></i> Quay lại trang chủ</a>
		</div>
	</div>
<?php else : ?>
	<div class="container" style="padding-top: 20px">
		<div class="row">
			<div class="panel panel-info">
				<div class="panel-heading">
					<h3 class="panel-title">Lịch sử đơn hàng</h3>
				</div>
				<div class="panel-body">
					<table class="table table-hover table-bordered">
						<thead>
							<tr>
								<th>STT</th>
								<th>Người mua</th>
								<th>Người nhận</th>
								<th>Tổng tiền</th>
								<th>Trạng thái</th>
								<th>Ngày giờ</th>
								<th>Xem chi tiết</th>
							</tr>
						</thead>
						<tbody>
							<?php $n =1; foreach ($model as $key => $value): ?>					
							<tr>
								<td><?php echo $n; ?></td>
								<td><?php echo $value->fullname; ?></td>
								<td><?php echo $value->fullname_ship; ?></td>
								<td><?php echo number_format($value->total, 0, '', '.'); ?>-VNĐ</td>
								<td><?php 
								switch ($value->status) {
								 	case 0:
								 		echo 'Đang chờ duyệt';
								 		break;
								 	
								 	case 1:
								 		echo 'Đang giao hàng';
								 		break;
								 	case 2:
								 		echo 'Đang thanh toán';
								 		break;
								 	case 3:
								 		echo 'Đơn hủy';
								 		break;								 	
								 	default:
								 		echo 'Đang chờ duyệt';
								 		break;
								 } 
								?></td>
								<td><?php echo date('d-m-Y H:i:sa', $value->created_at); ?></td>
								<td><a href="<?php echo yii\helpers\Url::to(['order/order-detail', 'id'=>$value->id]) ?>" title="Xem chi tiết" class='btn btn-info br0'>Xem chi tiết</a></td>
							</tr>
							<?php $n++; endforeach ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
<?php endif; ?>
<style type="text/css" media="screen">
	tr {
		border: 1px solid #ddd;
	}
	tr:hover {
		background: #d9edf7 !important;
	}
</style>
