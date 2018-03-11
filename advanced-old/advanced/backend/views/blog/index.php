<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\BlogSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Bài viết';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="blog-index">

    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title"><?= Html::encode($this->title) ?></h3>
        </div>
        <div class="panel-body">
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Tạo bài viết', ['create'], ['class' => 'btn btn-success br0']) ?>
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
            'title',
            'slug',
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
            'shorttitle:ntext',
            // 'content:ntext',
            // 'status',
            // 'created_at',
            // 'updated_at',

            ['class' => 'yii\grid\ActionColumn',
                'header' => 'Hành động',
                'headerOptions'=>[
                'style'=>'width:100px; text-align:center'
                ],
                'contentOptions'=>[
                'style'=>'width:100px; text-align:center'
                ],
            ],
        ],
    ]); ?>
        </div>
    </div>
</div>
