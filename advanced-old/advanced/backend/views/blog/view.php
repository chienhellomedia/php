<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Blog */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Bài viết', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="blog-view">

   <div class="panel panel-primary">
       <div class="panel-heading">
           <h3 class="panel-title"><?= Html::encode($this->title) ?></h3>
       </div>
       <div class="panel-body">

    <p>
        <?= Html::a('<i class="fa fa-arrow-left" aria-hidden="true"></i> Quay lại', ['index'], ['class' => 'btn btn-info']) ?>
        <?= Html::a('Sửa bài viết', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Xóa bài viết', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Bạn có muốn xóa bài viết không?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
               'slug',
            'image',
            'shorttitle:ntext',
            'content:ntext',
            'status',
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
