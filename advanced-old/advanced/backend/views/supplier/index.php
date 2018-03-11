<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\SupplierSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Nhà Cung cấp';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="supplier-index">

    <div class="card">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title"><?= Html::encode($this->title) ?></h3>
            </div>
            <div class="panel-body">
                <div class="card">
                    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

                    <p>
                        <?= Html::a('<i class="fa fa-arrow-left" aria-hidden="true"></i> Quay lại', ['index'], ['class' => 'btn btn-info br0']) ?>
                    </p>
                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        'columns' => [
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
                        [
                        'attribute' => 'image',
                        'content' => function ($model) {                      
                            return '<img src="'.$model->image.'" alt="" width=100>';
                        },  
                        'headerOptions'=>[
                        'style'=>'width:auto; text-align:center'
                        ],              
                        'contentOptions'=>[
                        'style'=>'width:auto; text-align:center'
                        ],
                        ],
                        'name',
                        'company',
                        'speech',
                        'email:email',
                        'phone',
                        'address',
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
                        return date('d-m-Y', $model->created_at);
                    },
                    'headerOptions'=>[
                    'style'=>'width:auto; text-align:center'
                    ],
                    'contentOptions'=>[
                    'style'=>'width:auto; text-align:center'
                    ],
                    ],
                    [
                    'attribute' => 'updated_at',
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

                    ['class' => 'yii\grid\ActionColumn',
                    'header' => 'Hành động',
                    'headerOptions'=>[
                    'style'=>'width:150px; text-align:center'
                    ],
                    'contentOptions'=>[
                    'style'=>'width:150px; text-align:center'
                    ],
                    ],
                    ],
                    ]); ?>
                </div>
            </div>
        </div>
    </div>
</div>
