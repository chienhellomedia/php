<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Category */

$this->title = 'Tạo mới danh mục';
$this->params['breadcrumbs'][] = ['label' => 'Danh mục', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-create">

		<div class="cards">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h3 class="panel-title"><?= Html::encode($this->title) ?></h3>
				</div>
				<div class="panel-body">
					<?= $this->render('_form', 
						[
							'model' => $model,
						]) ?>
					</div>
				</div>
			</div>
		</div>
	


	</div>

