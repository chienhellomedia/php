<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Supplier */

$this->title = 'Tạo nhà cung cấp mới';
$this->params['breadcrumbs'][] = ['label' => 'Nhà Cung cấp', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="supplier-create">

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
