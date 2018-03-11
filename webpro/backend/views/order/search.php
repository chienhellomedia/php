<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use backend\models\Order;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\OrderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Đơn hàng';
$this->params['breadcrumbs'][] = $this->title;

?>

<div role="tabpanel" class="load-order">
  <!-- Nav tabs -->
  
 <div class="clearfix" style="margin-bottom: 10px;"><?php
      $form = ActiveForm::begin([
        'id' => 'form-search-order',
        'action'=> Url::to(['/order/search']),
        'options' => ['class' => 'form-inline pull-right'],
        ]) ?>
        <div class="form-group" >
         <label for="">Tìm tên đơn hàng&nbsp;</label>
         <input type="text" class="form-control br0" id="input-order" placeholder="nhập...">
       </div>         
       <button type="submit" class="btn btn-primary br0" style="padding: 6px 15px;">Tìm kiếm</button>
       <?php ActiveForm::end() ?></div>
  <!-- Tab panes -->
  

  <div class="panel panel-primary">
    <div class="panel-heading">
      <h3 class="panel-title">Đơn hàng</h3>
    </div>
    <div class="panel-body">

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
          <?php if($search):
          echo '<p>Kết quả tìm kiếm</p>';
           $n = 0;foreach ($search as $value):  $n++;           
          ?>            
          <tr>
           <td><?php echo $n; ?></td>
           <td><?php echo $value->fullname ?></td>
           <td><?php echo $value->mobile ?></td>
           <td><?php echo $value->fullname_ship ?></td>
           <td><?php echo $value->mobile_ship ?></td>
           <td><?php echo $value->total ?></td>
           <td><?php echo date('d-m-Y H:i:s', $value->created_at) ?></td>
           <td>
            <?php 
            switch ($value->status) {
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
           <?= html::a('<span class="glyphicon glyphicon-eye-open"></span> Xem', ['order/info', 'id' => $value->id], ['class'=>'btn btn-sm btn-primary br0', 'title'=>'Xem']) ?>
           <?= Html::a('<span class="glyphicon glyphicon-trash"></span> Xóa', ['order/delete', 'id' => $value->id], [
             'class' => 'btn btn-danger btn-sm br0 pull-right',
             'data' => [
              'confirm' => 'Bạn có muốnn xóa đơn hàng có người nhận '.$value->fullname_ship.' ?',
              'method' => 'post',
            ],
            ]) ?></td>
          </tr>
        <?php endforeach; else: ?>
        <p>Không có kết quả tìm kiếm nào...</p>
      <?php endif; ?>
      </tbody>
    </table>
  </div>
</div>
</div>
</div>
</div>
</div>
</div>