<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\PriceList */

$this->title = 'Thêm đơn vị giá';
$this->params['breadcrumbs'][] = ['label' => 'Price Lists', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="price-list-create">

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
