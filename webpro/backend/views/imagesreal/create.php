<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Imagesreal */

$this->title = 'Thêm mới hình ảnh';
$this->params['breadcrumbs'][] = ['label' => 'Hình ảnh thực tế', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="imagesreal-create">

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
