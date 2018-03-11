<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Category */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Danh mục sản phẩm', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-view">
    <div class="col-md-9 row">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title"><?= Html::encode($this->title) ?></h3>
            </div>
            <div class="panel-body">

                <p>
                    <?= Html::a('<i class="fa fa-reply" aria-hidden="true"></i> Quay lại', ['index'], ['class' => 'btn btn-info btn-sm br0']) ?>
                    <?= Html::a(Yii::t('app', '<i class="fa fa-pencil-square-o" aria-hidden="true"></i> Sửa'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary btn-sm br0']) ?>
                    <?= Html::a(Yii::t('app', '<i class="fa fa-trash-o" aria-hidden="true"></i> Xóa'), ['delete', 'id' => $model->id], [
                        'class' => 'btn btn-danger btn-sm br0',
                        'data' => [
                            'confirm' => Yii::t('app', 'bạn có chắc muốn xóa mục này ?'),
                            'method' => 'post',
                        ],
                        ]) ?>
                    </p>

                    <?= DetailView::widget([
                        'model' => $model,
                        'attributes' => [
                            'id',
                            'name',
                            'slug',
                            'parent',
                            'description',
                            'status',
                            'created_at',
                            'updated_at',
                        ],
                        ]) ?>
                    </div>
                </div>
            </div>
        </div>
