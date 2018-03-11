<?php
use yii\helpers\Html;

?>
<div class="password-reset">
    <p>Hello <?= Html::encode($order->fullname_ship) ?>,</p>

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
                    <td><?php echo $item->pronames->price ?></td>
                    <td ><?php echo $item->quantity ?></td>
                    <td ><?php echo $item->quantity*$item->pronames->price; ?></td>
                    <!-- <td ><?php echo $order->shipping_method ?></td> -->
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>

        <h3>Thông tin khách hàng đặt:</h3>

        <strong>Tên khách hàng:</strong><span><?= Html::encode($cus->name) ?></span><br>
        <strong>Số điện thoại:</strong><span><?= Html::encode($cus->phone) ?></span><br>
        <strong>Địa chỉ:</strong><span><?= Html::encode($cus->address) ?></span><br>
        <strong>Email:</strong><span><?= Html::encode($cus->email) ?></span><br>

        <h3>Thông tin khách hàng nhận:</h3>

        <strong>Tên khách hàng:</strong><span><?= Html::encode($order->username_ship) ?></span><br>
        <strong>Số điện thoại:</strong><span><?= Html::encode($order->phone_ship) ?></span><br>
        <strong>Địa chỉ:</strong><span><?= Html::encode($order->address_ship) ?></span><br>
        <strong>Email:</strong><span><?= Html::encode($order->email_ship) ?></span><br>
</div>