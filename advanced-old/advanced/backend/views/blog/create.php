<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Blog */

$this->title = 'Tạo bài viết mới';
$this->params['breadcrumbs'][] = ['label' => 'Blogs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="blog-create">

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
