<?php

use yii\helpers\Html;
use yii\grid\GridView;
date_default_timezone_set("Asia/Vientiane");
/* @var $this yii\web\View */
/* @var $searchModel backend\models\OrderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Đơn hàng';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-index">
  <div class="card">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <h3 class="panel-title"><?= Html::encode($this->title) ?></h3>
      </div>
      <div class="panel-body">
        <div class="card">
          <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

          
          <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                // ['class' => 'yii\grid\SerialColumn'],
            ['class' => 'yii\grid\CheckBoxColumn'],

            [
            'attribute' => 'id',                
            'headerOptions'=>[
            'style'=>'width:5px; text-align:center'
            ],
            'contentOptions'=>[
            'style'=>'width:5px; text-align:center'
            ],
            ],
            // 'cus_id',
                'fullname',
            // 'email:email',
                'mobile',
            // 'addess',
            'fullname_ship',
            // 'email_ship:email',
            'mobile_ship',
            'addess_ship',
            // 'request',
            [
            'attribute' => 'total',
            'content' => function ($model) {                      
             return number_format($model->total, 0, '', '.').' VNĐ';
           },  
           'headerOptions'=>[
           'style'=>'width:auto; text-align:center'
           ],              
           'contentOptions'=>[
           'style'=>'width:auto; text-align:center'
           ],
           ],
            // 'payment_id',
            // 'delivery_id',
           [
           'attribute' => 'status',
           'content' => function ($model) {                      
            switch ($model->status) {
              case 0:
              return 'Đang chờ duyệt';
              break;                        
              case 1:
              return 'Đang giao hàng';
              break;
              case 2:
              return 'Đã thanh toán';
              break;
              case 3:
              return 'Hủy đơn hàng';
              break;
              default:
              return 'Đang chờ duyệt';
              break;
            }
          },  
          'headerOptions'=>[
          'style'=>'width:auto; text-align:center'
          ],              
          'contentOptions'=>[
          'style'=>'width:auto; text-align:center'
          ],
          ],
          [
          'attribute' => 'created_at',
          'value' => function ($model) {
            return date('d-m-Y H:m:sa', $model->created_at);
          },
          'headerOptions'=>[
          'style'=>'width:auto; text-align:center'
          ],
          'contentOptions'=>[
          'style'=>'width:auto; text-align:center'
          ],
          ],

          [
          'class' => 'yii\grid\ActionColumn',
          'template' => '{view}{delete}',
          'header' => 'Action',
          'contentOptions'=>[
          'style'=>'width:120px; text-align:center'
          ],
          'buttons'=>[
          'view'=>function($url, $model) {
            $url = str_replace('view','info', $url);
            return html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url, ['class'=>'btn btn-primary pull-left', 'title'=>'Chi tiết đơn hàng']);
          },

          'delete'=>function($url, $model) {
           return html::a('<span class="glyphicon glyphicon-trash"></span>', $url, 
             [
             'class'=>'btn btn-danger pull-right', 
             'data-confirm'=>'Bạn có muốn xóa đơn hàng có người nhận '.$model->fullname_ship.' ?',
             'data-method'=>'post',
             'title'=>'Xóa đơn hàng',
             
             ]);
         }
         ],
         ],
         ],
         ]); ?>
       </div>
     </div>
   </div>
 </div>
</div>
