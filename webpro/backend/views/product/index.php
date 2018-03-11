<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sản phẩm';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="product-index">

 <div class="panel panel-primary">
     <div class="panel-heading">
         <h3 class="panel-title"><?= Html::encode($this->title) ?></h3>
     </div>
     <div class="panel-body">
        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

        <p class="clearfix">
            <?= Html::a('<i class="fa fa-plus-circle" aria-hidden="true"></i> Thêm mới Sản phẩm', ['create'], ['class' => 'btn btn-success btn-sm pull-right br0']) ?>
        </p>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

            // 'id',
                'name',
            // 'slug',
                [
                    'attribute' => 'images',
                    'format' => 'html', 
                    'value' => function ($model) {                    
                       return '<img src="'.$model->images.'" alt="" width=60>';
                    },  
                    'headerOptions'=>[
                       'style'=>'width:auto; text-align:center'
                    ],              
                    'contentOptions'=>[
                       'style'=>'width:auto; text-align:center'
                    ],
                ],
                [
                   'attribute' => 'cate_id',
                   'value' => 'productRelation.name',  
                   'headerOptions'=>[
                       'style'=>'width:auto; text-align:center'
                    ],              
                   'contentOptions'=>[
                       'style'=>'width:auto; text-align:center'
                   ],
                ],
                [
                    'attribute' => 'price',
                    'headerOptions'=>[
                    'style'=>'width:auto; text-align:center'
                    ],
                    'contentOptions'=>[
                        'style'=>'width:auto; text-align:center'
                    ],
                    'content' => function($data)
                    {
                         return number_format($data->price, 0, '', '.') .' VNĐ';
                    },
                ],
            // 'pricesale',
            // 'pricelist',
            // 'saleoff',
            // 'startsale',
            // 'endsale',
            // 'desc:ntext',
            // 'content:ntext',
            // 'new',
            // 'bestseller',
            // 'featured',
            // 'hotdeal',
                [
                      'attribute' => 'instock',
                      'headerOptions'=>[
                    'style'=>'width:auto; text-align:center'
                    ],
                    'contentOptions'=>[
                        'style'=>'width:auto; text-align:center'
                    ],
                    'content' => function($data)
                    {
                        if ($data->instock == 10) {
                          return '<a href="#" title="Còn hàng"><i class="fa fa-check btn btn-xs btn-success" aria-hidden="true"></i></a>'; 
                        } else {
                          return '<a href="#" title="Hết hàng"><i class="fa fa-times btn btn-xs btn-danger" aria-hidden="true"></i></a>'; 
                        }
                     },
                ],
                [
                    'attribute' => 'status',
                    'headerOptions'=>[
                    'style'=>'width:auto; text-align:center'
                    ],
                    'contentOptions'=>[
                        'style'=>'width:auto; text-align:center'
                    ],
                    'content' => function($data)
                    {
                        if ($data->status == 10) {
                          return '<a href="#" title="Public"><i class="fa fa-check btn btn-xs btn-success" aria-hidden="true"></i></a>'; 
                        } else {
                          return '<a href="#" title="No public"><i class="fa fa-times btn btn-xs btn-danger" aria-hidden="true"></i></a>'; 
                        }
                     },
                ],
            // 'tagproduct',
            // 'reviews',
            // 'created_at',
            // 'updated_at',

                [
                    // 'class' => 'yii\grid\ActionColumn',

                    'header' => 'Hành động',
                    'format' => 'html', 
                    'headerOptions'=>[
                        'style'=>'width:100px; text-align:center'
                    ],
                    'contentOptions'=>[
                        'style'=>'width:100px; text-align:center'
                    ],
                    'content' => function($data)
                    {
                        return
                        '<div class="dropdown">
                          <button class="btn btn-primary btn-sm dropdown-toggle br0" type="button" data-toggle="dropdown">Tác vụ
                          <span class="caret"></span></button>
                          <ul class="dropdown-menu fix-dropdown-menu br0">
                            <li>'.Html::a('<i class="fa fa-eye" aria-hidden="true"></i> Xem', ['product/view', 'id'=>$data->id], ['class' => 'profile-link', 'title'=>'Xem']).'</li>
                            <li>'.Html::a('<i class="fa fa-pencil-square-o" aria-hidden="true"></i> Sửa', ['product/update', 'id'=>$data->id], ['class' => 'profile-link', 'title'=>'Sửa']).'</li>
                            <li>'.Html::a('<i class="fa fa-trash-o" aria-hidden="true"></i> Xóa', ['product/delete', 'id'=>$data->id], ['class' => 'profile-link', 'title'=>'Xóa', 'data-method'=>'POST', 'data-confirm'=>'bạn có chắc muốn xóa ?']).'</li>
                          </ul>
                        </div>';
                    }
                ],
            ],
            ]); ?>
        </div>
    </div>
</div>

