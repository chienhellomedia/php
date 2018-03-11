<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Customer */

$this->title = 'Sửa thông tin khách hàng: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Khách hàng', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="customer-update">

	<div class="card">
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
