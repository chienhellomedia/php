<div class="container" style="padding-top: 20px">
	<div class="panel panel-info">
		<div class="panel-heading clearfix">
			<h3 class="panel-title"><div class="pull-left">Chi tiết đơn hàng</div><a href="<?php echo yii\helpers\Url::to(['order/list']) ?>"  class="pull-right btn btn-primary btn-sm br0" title=""><i class="fa fa-arrow-left" aria-hidden="true"></i> Quay lại</a></h3>
			
		</div>
		<div class="panel-body">
			<table class="table table-hover">
				<thead>
					<tr>
						<th>STT</th>
						<th>Tên Sản phẩm</th>
						<th>Hình ảnh</th>
						<th>Số lượng</th>
						<th>Giá</th>
						<th>Thành tiền</th>
					</tr>
				</thead>
				<tbody>
					<?php $n = 1; foreach ($model as $key => $value) : ?>
					<tr>
						<td><?php echo $n; ?></td>
						<td><?php echo $value->pronames->name; ?></td>
						<td><img src="<?php echo $value->pronames->image; ?>" alt="" width=100></td>
						<td><?php echo $value->quantity; ?></td>
						<td><?php echo number_format($value->price, 0, '', '.'); ?>-VNĐ</td>
						<td><?php echo number_format($value->price*$value->quantity, 0, '', '.'); ?>-VNĐ</td>
					</tr>
					<?php $n++; endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<style type="text/css" media="screen">
	tr td {
		padding: 2px !important;
		text-align: center;
	}
	th {
		text-align: center;
	}
	tr {
		border: 1px solid #ddd;
	}
	tr:hover {
		background: #d9edf7 !important;
	}
</style>
