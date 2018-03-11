<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\PriceList */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Đơn vị giá', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="col-md-8">

    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title"><?= Html::encode($this->title) ?></h3>
        </div>
        <div class="panel-body">

    <p>
        <?= Html::a('Sửa', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Xóa', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Bạn có chắc muốn xóa ?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
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
                    return date('d-m-Y', $model->created_at);
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
