<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\About */

$this->title = 'Thêm mới Câu chuyện';
$this->params['breadcrumbs'][] = ['label' => 'Câu chuyện HNH', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="about-create">

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
