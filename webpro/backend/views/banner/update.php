<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Banner */

$this->title = 'Chỉnh sửa Banner: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Banners', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Chỉnh sửa';
?>
<div class="banner-update">

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
