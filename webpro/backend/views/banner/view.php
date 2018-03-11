<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Banner */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Banners', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="banner-view">


    <div class="panel panel-primary">
     <div class="panel-heading">
         <h3 class="panel-title"><?= Html::encode($this->title) ?></h3>
     </div>
     <div class="panel-body">
        <p>
            <?= Html::a('Chỉnh sửa', ['update', 'id' => $model->id], ['class' => 'btn btn-primary br0']) ?>
            <?= Html::a('Xóa', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger br0',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
                ]) ?>
            </p>

            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'id',
                    'images',
                    'desc_1',
                    'desc_2',
                    'desc_3',
                    'link',
                    'status',
                    'created_at',
                    'updated_at',
                ],
                ]) ?>
            </div>
        </div>

    </div>
