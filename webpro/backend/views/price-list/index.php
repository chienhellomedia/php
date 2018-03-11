<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PriceListSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Đơn vị giá';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="price-list-index">

    <div class="col-md-9 row">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title"><?= Html::encode($this->title) ?></h3>
            </div>
            <div class="panel-body">
               <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

               <p class="clearfix">
                 <?= Html::a('<i class="fa fa-plus-circle" aria-hidden="true"></i> Thêm đơn vị giá', ['create'], ['class' => 'btn btn-success btn-sm pull-right']) ?>
             </p>
             <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    // 'id',
                    [
                        'attribute' => 'name',
                        'headerOptions'=>[
                            'style'=>'width:auto; text-align:center'
                        ],
                        'contentOptions'=>[
                            'style'=>'width:auto; text-align:center'
                        ],
                    ],
                    [
                        'attribute' => 'status',
                        'format' => 'html', 
                        'headerOptions'=>[
                            'style'=>'width:200px; text-align:center'
                        ],
                        'contentOptions'=>[
                            'style'=>'width:200px; text-align:center'
                        ],
                        'value' => function($data)
                        {
                            if ($data->status == 10) {
                                return '<a href="#" title="Trạng thái"><i class="fa fa-check btn btn-xs btn-success btn" aria-hidden="true"></i></a>'; 
                            } else {
                                return '<a href="#" title="Trạng thái"><i class="fa fa-times btn btn-xs btn-danger" aria-hidden="true"></i></a>'; 
                            }
                        },
                    ],
                    // 'created_at',
                    // 'updated_at',

                    
                    [
                        'class' => 'yii\grid\ActionColumn',
                        'header' => 'Hành động',
                        'template' => "{update}{delete}",
                        'headerOptions'=>[
                            'style'=>'width:200px; text-align:center'
                        ],
                        'contentOptions'=>[
                            'style'=>'width:200px; text-align:center'
                        ],
                        'buttons'=>[                
                            'view'=>function($url, $model) {
                             return html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url, ['class'=>'btn br0', 'title'=>'Xem']);
                         },
                         'update'=>function($url, $model) {
                             return html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, ['class'=>'btn br0', 'title'=>'Sửa']);
                         },
                         'delete'=>function($url, $model) {
                             return html::a('<span class="glyphicon glyphicon-trash"></span>', $url, 
                                 [
                                     'class'=>'btn br0', 
                                     'data-confirm'=>'bạn có chắc muốn xóa ?',                       
                                     'data-method'=>'post',
                                     'title'=>'Xóa',
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
