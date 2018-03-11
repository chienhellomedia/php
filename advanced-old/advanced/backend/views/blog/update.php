<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Blog */

$this->title = 'Sửa bài viết: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Bài viết', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Sửa';
?>
<div class="blog-update">

   <div class="panel panel-primary">
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
