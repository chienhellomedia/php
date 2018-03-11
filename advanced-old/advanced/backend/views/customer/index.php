<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\CustomerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Khách hàng';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="customer-index">

   <div class="card">
       <div class="panel panel-primary">
           <div class="panel-heading">
               <h3 class="panel-title"><?= Html::encode($this->title) ?></h3>
           </div>
           <div class="panel-body">
               <div class="card">
                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

                <p>
                    <?= Html::a('Create Customer', ['create'], ['class' => 'btn btn-success']) ?>
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
                            'style'=>'width:5px; text-align:center'
                        ],
                        'contentOptions'=>[
                            'style'=>'width:5px; text-align:center'
                        ],
                    ],
                    'username',
                    'fullname',
                // 'auth_key',
                // 'password_hash',
                // 'password_reset_token',
                    'email:email',
                    'phone',
                    // 'address',
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
                // 'updated_at',

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
