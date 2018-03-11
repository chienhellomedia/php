<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Customer */

$this->title = 'Sửa thông tin : ' . $model->username;
// $this->params['breadcrumbs'][] = ['label' => 'Customers', 'url' => ['index']];
// $this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
// $this->params['breadcrumbs'][] = 'Update';
?>
<div class="container" style="padding-top: 20px">

	<div class="panel panel-info">
		<div class="panel-heading">
			<h3 class="panel-title"><?= Html::encode($this->title) ?></h3>
		</div>
		<div class="panel-body">
			<div class="col-md-7">
				
				<?= $this->render('_form', [
					'model' => $model,
					]) ?>
				</div>
			</div>
		</div>

	</div>
