<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Imagesreal */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Hình ảnh thực tế', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="imagesreal-view">

    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title"><?= Html::encode($this->title) ?></h3>
        </div>
        <div class="panel-body">
            <p>
                <?= Html::a('Chỉnh sửa', ['update', 'id' => $model->id], ['class' => 'btn btn-primary btn-sm br0']) ?>
                <?= Html::a('Xóa', ['delete', 'id' => $model->id], [
                    'class' => 'btn btn-danger btn-sm br0',
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
                        'small',
                        'big',
                    ],
                    ]) ?>
                </div>
            </div>

        </div>
