<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Certificate */

$this->title = 'Sửa Giấy chứng nhận: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Giấy chứng nhận', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Sửa';
?>
<div class="certificate-update">

	<div class="col-md-8 row">
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

	</div>
