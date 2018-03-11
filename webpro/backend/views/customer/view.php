<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Customer */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Khách hàng', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="customer-view">

 <div class="panel panel-default">
     <div class="panel-heading">
         <h3 class="panel-title"><?= Html::encode($this->title) ?></h3>
     </div>
     <div class="panel-body">
        <h1></h1>

        <p>
            <?= Html::a('Chỉnh sửa', ['update', 'id' => $model->id], ['class' => 'btn btn-primary br0 bt-sm']) ?>
            <?= Html::a('Xóa', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger br0 bt-sm',
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
                    'fullname',
                    'auth_key',
                    'password_hash',
                    'password_reset_token',
                    'email:email',
                    'phone',
                    'status',
                    'created_at',
                    'updated_at',
                ],
                ]) ?>
            </div>
        </div>

    </div>
