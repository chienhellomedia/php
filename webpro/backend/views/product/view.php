<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Product */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Sản phẩm', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-view">

   <div class="panel panel-primary">
       <div class="panel-heading">
           <h3 class="panel-title"><?= Html::encode($this->title) ?></h3>
       </div>
       <div class="panel-body">

          <p>
            <?= Html::a('<i class="fa fa-reply" aria-hidden="true"></i> Quay lại', ['index'], ['class' => 'btn btn-info btn-sm br0']) ?>
            <?= Html::a('<i class="fa fa-pencil-square-o" aria-hidden="true"></i> Sửa', ['update', 'id' => $model->id], ['class' => 'btn btn-primary btn-sm br0']) ?>
            <?= Html::a('<i class="fa fa-trash-o" aria-hidden="true"></i> Xóa', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger btn-sm br0',
                'data' => [
                    'confirm' => Yii::t('app', 'bạn có chắc muốn xóa mục này ?'),
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
                    'images',
                    'cate_id',
                    'price',
                    'pricesale',
                    'pricelist',
                    'saleoff',
                    'startsale',
                    'endsale',
                    'desc:ntext',
                    'content:ntext',
                     'hotdeal',
                    'new',
                    'bestseller',
                    'featured',
                    'instock',
                    'status',
                    'tagproduct',
                    'reviews',
                    'created_at',
                    'updated_at',
                ],
                ]) ?>
            </div>
        </div>

    </div>
