<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PriceListSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Price Lists';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="col-md-10">

    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title"><?= Html::encode($this->title) ?></h3>
        </div>
        <div class="panel-body">
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Tạo đơn vị giá', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            [
                'attribute' => 'status',
                'content' => function ($model) {                      
                    if ($model->status == 0) {
                        return 'Ẩn';
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
            [
                'attribute' => 'created_at',
                'value' => function ($model) {
                    return date('d-m-Y', $model->updated_at);
                },
                'headerOptions'=>[
                'style'=>'width:auto; text-align:center'
                ],
                'contentOptions'=>[
                'style'=>'width:auto; text-align:center'
                ],
            ],
            // 'updated_at',

            ['class' => 'yii\grid\ActionColumn',
                'header' => 'Hành động',
                'headerOptions'=>[
                    'style'=>'width:auto; text-align:center'
                ],              
                'contentOptions'=>[
                    'style'=>'width:auto; text-align:center'
                ],
            ],
        ],
    ]); ?>
        </div>
    </div>
</div>
