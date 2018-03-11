<?php 
use backend\models\Product;
?>
<div class="order-index">
  <div class="panel panel-primary">
    <div class="panel-heading">
      <h3 class="panel-title">Đơn hàng<?php echo $this->title; ?></h3>
    </div>
    <div class="panel-body">
   <!--   <table>
       <tr>
        
           <td width="50%">
            <h3>Thông tin đặt hàng</h3>
            <p>Tên tài khoản: <?php echo $model->fullname ?></p>
            <p>Địa chỉ: <?php echo $model->mobile ?></p>
            <p>Điện thoại: <?php echo $model->addess ?></p>
            <p>Email: <?php echo $model->email ?></p>
            </td>


          <td width="50%">
           <h3>Thông tin mua hàng</h3>
           <p>Tên tài khoản: <?php echo $model->fullname_ship ?></p>
           <p>Địa chỉ: <?php echo $model->mobile_ship ?></p>
           <p>Điện thoại: <?php echo $model->addess_ship ?></p>
           <p>Email: <?php echo $model->email_ship ?></p>
         </td>
      </tr>
    </table> -->
    <h3 style="text-align: center">CỬA HÀNG THỰC PHẨM HNH</h3>
    <div class="clearfix">
        <div class="col-xs-1"></div>
      <div class="col-xs-5" style="padding-left: 10px;">
        <h4>Thông tin đặt hàng</h4>
        <p>Người mua: <?php echo $model->fullname ?></p>
        <p>Địa chỉ: <?php echo $model->mobile ?></p>
        <p>Điện thoại: <?php echo $model->addess ?></p>
      </div>
      <div class="col-xs-5">
        <h4>Thông tin mua hàng</h4>
        <p>Người nhận: <?php echo $model->fullname_ship ?></p>
        <p>Địa chỉ: <?php echo $model->mobile_ship ?></p>
        <p>Điện thoại: <?php echo $model->addess_ship ?></p>
      </div>
    </div>



    <div class="row">
      <div class="col-md-12">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>STT</th>
              <th>Tên sản phẩm</th>
              <th>Giá</th>
              <th>Số lượng</th>
            </tr>
          </thead>
          <tbody>
            <?php   $stt = 1; 
            foreach ($orderdetail as $key) :
              $product = new Product();
              $product = $product->getOneProduct($key->product_id)
              ?>
              <tr>
               <td ><?php echo $stt ?></td>
               <td ><?php echo $product->name ?></td>
               <td ><?php echo $key->price ?></td>
               <td ><?php echo $key->quantity ?></td>
             </tr>
             <?php $stt++; endforeach; ?>
             <tr>
               <td colspan="3">Tổng tiền</td>
               <td><?php echo number_format($model->total, 0, '', '.'); ?> Đ</td>
             </tr>
           </tbody>
         </table>
         <p style="margin-top: 20px"><i>Cảm ơn quý khách đã mua sản phẩm của chúng tôi.</i></p>
         <p style="text-align: right"><i class="pull-right" style="text-align: center">Ngày <?php echo date('d-m-Y') ?></i></p>
       </div>
    </div>
   </div>
 </div>
</div>
