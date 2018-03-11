<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Imagesreal */

$this->title = 'Chỉnh sửa Hình ảnh: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Hình ảnh thực tế', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Sửa';
?>
<div class="imagesreal-update">

   <div class="panel panel-default">
   	<div class="panel-heading">
   		<h3 class="panel-title"><?= Html::encode($this->title) ?></h3>
   	</div>
   	<div class="panel-body">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
   	</div>
   </div>

</div>
