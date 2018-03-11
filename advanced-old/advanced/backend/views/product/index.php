<?php

use yii\helpers\Html;
use yii\grid\GridView;
use backend\models\Category;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sản phẩm';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">
    <div class="card">
     <div class="panel panel-primary">
         <div class="panel-heading">
             <h3 class="panel-title"><?= Html::encode($this->title) ?></h3>
         </div>
         <div class="panel-body">
             <div class="card">
                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

                <p>
                    <?= Html::a('<i class="fa fa-plus" aria-hidden="true"></i> Tạo mới', ['create'], ['class' => 'btn btn-success br0']) ?>
                </p>
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'columns' => [
            // ['class' => 'yii\grid\SerialColumn'],
                    ['class' => 'yii\grid\CheckBoxColumn'],

                    [
                    'attribute' => 'id',                  
                    'headerOptions'=>[
                    'style'=>'width:10px; text-align:center'
                    ],              
                    'contentOptions'=>[
                    'style'=>'width:10px; text-align:center'
                    ],
                    ],
                    [
                    'attribute' => 'name',                  
                    'headerOptions'=>[
                    'style'=>'width:auto; text-align:center'
                    ],              
                    'contentOptions'=>[
                    'style'=>'width:auto; text-align:center'
                    ],
                    ],
            // 'slug',
                    [
                    'attribute' => 'image',
                    'content' => function ($model) {                    
                     return '<img src="'.$model->image.'" alt="" width=60>';

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
                 'content' => function ($model) {                    
                     return number_format($model->price, 0, '', '.') .' VNĐ';

                 },  
                 'headerOptions'=>[
                 'style'=>'width:auto; text-align:center'
                 ],              
                 'contentOptions'=>[
                 'style'=>'width:auto; text-align:center'
                 ],
                 ],
            // 'pricesale',
            // 'pricelist',
            // 'saleoff',
            // 'startsale',
            // 'endsale',
            // 'content:ntext',
            // 'new',
            // 'bestseller',
            // 'featured',
            // 'hotdeals',
            // 'sepcialoffer',
            // // 'instock',
                 [
                 'attribute' => 'status',
                 'content' => function ($model) {                    
                     if ($model->status == 0) {
                         return 'Ấn';
                     } else {
                        return 'Hiện';
                    }
                },  
                'headerOptions'=>[
                'style'=>'width:auto; text-align:center'
                ],              
                'contentOptions'=>[
                'style'=>'width:auto; text-align:center'
                ],
                ],
            // [
            //     'attribute' => 'created_at',
            //     'value' => function ($model) {
            //         return date('d-m-Y', $model->updated_at);
            //     },
            //     'headerOptions'=>[
            //     'style'=>'width:auto; text-align:center'
            //     ],
            //     'contentOptions'=>[
            //     'style'=>'width:auto; text-align:center'
            //     ],
            //     ],
            // 'updated_at',


                [
                'class' => 'yii\grid\ActionColumn',
                'header' => 'Hành động',
                'headerOptions'=>[
                'style'=>'width:150px; text-align:center'
                ],
                'contentOptions'=>[
                'style'=>'width:150px; text-align:center'
                ],
                'buttons'=>[                
                'view'=>function($url, $model) {
                   return html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url, ['class'=>'btn btn-sm btn-primary br0', 'title'=>'Xem']);
               },
               'update'=>function($url, $model) {
                   return html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, ['class'=>'btn btn-sm btn-success br0', 'title'=>'Sửa']);
               },
               'delete'=>function($url, $model) {
                   return html::a('<span class="glyphicon glyphicon-trash"></span>', $url, 
                       [
                       'class'=>'btn btn-sm btn-danger br0', 
                       'data-confirm'=>'bạn có muốn '.$model->name.' ?',                       
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
</div>