<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use backend\models\Order;
date_default_timezone_set("Asia/Vientiane");
/* @var $this yii\web\View */
/* @var $searchModel backend\models\OrderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Đơn hàng';
$this->params['breadcrumbs'][] = $this->title;

?>

<div role="tabpanel">
  <!-- Nav tabs -->
  <div class="card clearfix " style="margin-bottom: 0">
   <div class="col-md-7">
    <ul class="nav nav-tabs" role="tablist">
     <?php $i = 0; foreach ($data as $model): 
     $i++;
     if ($i == 1) {
       $active = 'active';
    } else {
       $active = '';
    }
    ?>
    <li role="presentation" class="<?php echo $active ?>">
       <a href="#home-<?php echo $model->status ?>" class="order-tabs" aria-controls="home" role="tab" data-toggle="tab" data-url="<?php echo Url::to(['/order/index']) ?>">
         <?php 
         switch ($model->status) {
           case 0:
           echo 'Đang chờ';
           break;
           case 1:
           echo 'Đang Giao hàng';
           break;
           case 2:
           echo 'Đã thanh toán';
           break;
           case 3:
           echo 'Khách hủy';
           break;
        }
        ?>
     </a>
  </li>
  
<?php endforeach ?>
</ul>
</div>

<div class="col-md-5 pull-right">
 <form action="" method="POST" role="form" class="form-inline pull-right">
  
  <div class="form-group" >
   <label for="">Tìm tên &nbsp;</label>
   <input type="search" class="form-control" id="" placeholder="nhập...">
</div>         
<button type="submit" class="btn btn-primary br0" style="padding: 8px 15px;">Tìm kiếm</button>
</form>
</div>
</div>

<!-- Tab panes -->
<div class="tab-content">
 <?php $i = 0; foreach ($data as $model): 
 $i++;
 if ($i == 1) {
  $active = 'active';
} else {
  $active = '';
}
?>
<div role="tabpanel" class="tab-pane <?php echo $active ?>" id="home-<?php echo $model->status ?>">  
  <?php
  $status = $model->status;
  $datastatus = Order::find()->where(['status'=>$status])->all();
  ?>   
  <div class="card">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <h3 class="panel-title"> <?php 
        switch ($model->status) {
         case 0:
         echo 'Đang chờ';
         break;
         case 1:
         echo 'Đang Giao hàng';
         break;
         case 2:
         echo 'Đã thanh toán';
         break;
         case 3:
         echo 'Khách hủy';
         break;
      }
      ?></h3>
   </div>
   <div class="panel-body">


     <div class="card">
       <table class="table table-hover table-bordered">
        <thead>
          <tr>
            <th>STT</th>
            <th>Người mua</th>
            <th>SĐT mua</th>
            <th>Người nhận</th>
            <th>SĐT nhận</th>
            <th>Tổng tiền</th>
            <th>Ngày mua</th>
            <th>Trạng thái</th>
            <th>Hành động</th>
         </tr>
      </thead>
      <tbody>
         <?php $n = 0;foreach ($datastatus as $value):  $n++;           
         ?>            
         <tr>
           <td><?php echo $n; ?></td>
           <td><?php echo $value->fullname ?></td>
           <td><?php echo $value->mobile ?></td>
           <td><?php echo $value->fullname_ship ?></td>
           <td><?php echo $value->mobile_ship ?></td>
           <td><?php echo $value->total ?></td>
           <td><?php echo date('d-m-Y h:m:sa', $model->created_at) ?></td>
           <td>
            <?php 
            switch ($model->status) {
              case 0:
              echo 'Đang chờ';
              break;
              case 1:
              echo 'Đang Giao hàng';
              break;
              case 2:
              echo 'Đã thanh toán';
              break;
              case 3:
              echo 'Khách hủy';
              break;
           }
           ?>
        </td>
        <td style="width: 170px">
           <?= html::a('<span class="glyphicon glyphicon-eye-open"></span> Xem', ['order/info', 'id' => $model->id], ['class'=>'btn btn-sm btn-primary br0', 'title'=>'Xem']) ?>
           <?= Html::a('<span class="glyphicon glyphicon-trash"></span> Xóa', ['order/delete', 'id' => $model->id], [
             'class' => 'btn btn-danger btn-sm br0 pull-right',
             'data' => [
              'confirm' => 'Bạn có muốnn xóa đơn hàng có người nhận '.$model->fullname_ship.' ?',
              'method' => 'post',
           ],
           ]) ?></td>
        </tr>
     <?php endforeach ?>
  </tbody>
</table>
</div>
</div>
</div>
</div>
</div>
<?php endforeach ?>
</div>
</div>