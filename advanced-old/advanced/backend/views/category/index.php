<?php

use yii\helpers\Html;
use yii\grid\GridView;
use backend\models\Category;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\CategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Danh mục';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-index">
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
                            'style'=>'width:5px; text-align:center'
                        ],
                        'contentOptions'=>[
                            'style'=>'width:5px; text-align:center'
                        ],
                    ],
                    'name',
                    'slug',
                    [
                    'attribute' => 'parent',
                    'content' => function ($model) {
                        if($model->parent == 0) {
                            return 'Chính nó';
                        } else {
                         $data = Category::find()->where(['id'=>$model->parent])->one();
                         if ($model->parent = $data->id) {
                             return $data->name;
                         }
                     }
                 },
                 'headerOptions'=>[
                 'style'=>'width:auto; text-align:center'
                 ],              
                 'contentOptions'=>[
                 'style'=>'width:auto; text-align:center'
                 ],
                 ],
                    // 'icon',
            // 'description',
            // 'status',
            // 'created_at',
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
