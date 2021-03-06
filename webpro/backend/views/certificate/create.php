<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Certificate */

$this->title = 'Thêm mới Giấy chứng nhận';
$this->params['breadcrumbs'][] = ['label' => 'Giấy chứng nhận', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="certificate-create">

	<div class="col-md-6 row">
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
