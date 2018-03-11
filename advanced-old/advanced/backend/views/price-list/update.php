<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\PriceList */

$this->title = 'Sửa đơn vị giá: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Đơn vị giá', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Sửa';
?>
<div class="col-md-8">

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
