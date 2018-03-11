<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Product */

$this->title = 'Tạo sản phẩm';
$this->params['breadcrumbs'][] = ['label' => 'Sản phẩm', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-create">

	<div class="card">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title"><?= Html::encode($this->title) ?></h3>
			</div>
			<div class="panel-body">
				<?= $this->render('_form', [
					'model' => $model,
					'pricelist' => $pricelist,
					'cate' => $cate,
					]) ?>
				</div>
			</div>
	</div>

	</div>
