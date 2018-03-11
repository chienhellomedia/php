<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Quyền và nhóm Quyền';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="role-search-index">
 <div class="card">
  <div class="panel panel-primary">
   <div class="panel-heading">
     <h3 class="panel-title"><?= Html::encode("Gán nhóm quyền") ?></h3>
   </div>
   <div class="panel-body">
     <div class="card">
       <p>
         <?= Html::a('Tạo nhóm quyền', ['role/create-role'], ['class' => 'btn btn-success']) ?>
       </p>
       <?= GridView::widget([
         'dataProvider' => $dataRole,
         'filterModel' => $search,
         'columns' => [
                     // ['class' => 'yii\grid\SerialColumn'],
         ['class' => 'yii\grid\CheckBoxColumn'],
         'name',
         'type',
         'description:ntext',
         'rule_name',
         'data',
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
        'header'=>'Hành động',
        ],
        ],
        ]); ?>
      </div>
    </div>
  </div>
</div>
</div>
<div class="permission-search-index">

  <div class="card">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <h3 class="panel-title"><?= Html::encode("Gán quyền cụ thể") ?></h3>
      </div>
      <div class="panel-body">

        <div class="card">
          <p>
            <?= Html::a('Tạo Quyền cụ thể', ['role/create-permission'], ['class' => 'btn btn-success']) ?>
          </p>
          <?= GridView::widget([
            'dataProvider' => $dataPermission,
            'filterModel' => $search,
            'columns' => [
                          // ['class' => 'yii\grid\SerialColumn'],
            ['class' => 'yii\grid\CheckBoxColumn'],
            'name',
            'type',
            'description:ntext',
            'rule_name',
            'data',
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
            'header'=>'Hành động',
            'template'=>'{update} {delete}',
            ],
            ],
            ]); ?>
          </div>
        </div>
      </div>
    </div>
  </div>

  <style type="text/css" media="screen">
    td > a:nth-child(2) {
      margin-left: 15px;
      margin-right: 15px;
      
    }
  </style>