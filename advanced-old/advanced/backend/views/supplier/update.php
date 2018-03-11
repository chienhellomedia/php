<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Supplier */

$this->title = 'Sửa nhà Cung cấp: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Nhà Cung cấp', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="supplier-update">
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
