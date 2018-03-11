<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Customer */

$this->title = 'Tạp mới khách hàng';
$this->params['breadcrumbs'][] = ['label' => 'Khách hàng', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="customer-create">

	
	<div class="card clearfix">
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
