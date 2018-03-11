<?php
use yii\helpers\Html;
use backend\models\Orderdetail;
// echo '<pre>';
// print_r($orderitem); die;
?>
<div class="password-reset">
    <p>Hello <?= Html::encode($order->fullname_ship) ?></p>

    <h3>Thông tin đơn hàng</h3>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>STT</th>
                <th>Tên sản phẩm</th>
                <th>Giá</th>
                <th>Số Lượng</th>
                <th>Thành tiền</th>
                <!-- <th>Phương thức thanh toán</th> -->
            </tr>
        </thead>
        <tbody>
            <?php $stt=0; foreach ($orderitem as $item): $stt++; ?>

            <tr>
                <td><?php echo $stt; ?></td>
                <td><?php echo $item->pronames->name; ?></td>
                <td><?php echo number_format($item->price, 0, '', '.'); ?></td>
                <td ><?php echo $item->quantity ?></td>
                <td ><?php echo $item->quantity*$item->price; ?></td>

                <!-- <td ><?php //echo $order->shipping_method ?></td> -->
            </tr>
        <?php endforeach ?>
    </tbody>
</table>

<h3>Thông tin khách hàng đặt:</h3>

<strong>Tên khách hàng:</strong><span><?= Html::encode($order->fullname) ?></span><br>
<strong>Số điện thoại:</strong><span><?= Html::encode($order->mobile) ?></span><br>
<strong>Địa chỉ:</strong><span><?= Html::encode($order->addess) ?></span><br>
<strong>Email:</strong><span><?= Html::encode($order->email) ?></span><br>

<h3>Thông tin khách hàng nhận:</h3>

<strong>Tên khách hàng:</strong><span><?= Html::encode($order->fullname_ship) ?></span><br>
<strong>Số điện thoại:</strong><span><?= Html::encode($order->mobile_ship) ?></span><br>
<strong>Địa chỉ:</strong><span><?= Html::encode($order->addess_ship) ?></span><br>
<strong>Email:</strong><span><?= Html::encode($order->email_ship) ?></span><br>
</div>