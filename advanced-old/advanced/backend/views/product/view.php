<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use backend\models\Category;

/* @var $this yii\web\View */
/* @var $model backend\models\Product */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Sản Phẩm', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-view">
    <div class="card">
       <div class="panel panel-primary">
           <div class="panel-heading">
               <h3 class="panel-title"><?= Html::encode($this->title) ?></h3>
           </div>
           <div class="panel-body">
            <div class="card">
                <p>
                 <?= Html::a('<i class="fa fa-arrow-left" aria-hidden="true"></i> Quay lại', ['index'], ['class' => 'btn btn-info br0']) ?>  
                    <?= Html::a('<i class="fa fa-pencil-square-o" aria-hidden="true"></i> Sửa', ['update', 'id' => $model->id], ['class' => 'btn btn-primary br0']) ?>
                    <?= Html::a('<span class="glyphicon glyphicon-trash"></span> Xóa', ['delete', 'id' => $model->id], [
                        'class' => 'btn btn-danger br0',
                        'data' => [
                        'confirm' => 'bạn có muốn xóa '.$model->name.' ?',
                        'method' => 'post',
                        ],
                        ]) ?>
                    </p>

                    <?= DetailView::widget([
                        'model' => $model,
                        'attributes' => [
                        'id',
                        'name',
                        'slug',
                        [
                        'attribute' => 'image',
                        'content' => function($model){
                         return '<img src="'.$model->image.'" alt="">';
                     },                  
                     ],

                     [
                     'attribute' => 'cate_id',
                     'value' => function($model){
                        $data = Category::find()->where(['id'=>$model->cate_id])->one();
                        if ($model->cate_id = $data->id) {
                           return $data->name;
                       }
                   },                  
                   ],
                   [
                   'attribute' => 'price',
                   'content' => function ($model) {                    
                    return number_format($model->price, 0, '', '.') .' VNĐ';
                },  
                ],
                [
                'attribute' => 'pricesale',
                'content' => function ($model) {                    
                    return number_format($model->pricesale, 0, '', '.') .' VNĐ';
                },  
                ],
                'pricelist',
                'saleoff',
                'startsale',
                'endsale',
                'desc',
                'content:ntext',
                'new',
                'bestseller',
                'featured',
                'hotdeals',
                'sepcialoffer',
                'instock',
                [
                'attribute' => 'status',
                'value' => function ($model) {                    
                 if ($model->status == 0) {
                     return 'Ấn';
                 } else {
                    return 'Hiện';
                }
            },  

            ],
            [
            'attribute' => 'created_at',
            'value' => function ($model) {
                return date('d-m-Y', $model->updated_at);
            },                    
            ],

            [
            'attribute' => 'updated_at',
            'value' => function ($model) {
                return date('d-m-Y', $model->updated_at);
            },

            ],
            ],
            ]) ?>
        </div>
    </div>
</div>
</div>
</div>
