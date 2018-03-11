<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\RoleSearch */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Quyền và nhóm Quyền', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->name]];
$this->params['breadcrumbs'][] = 'Sửa';
?>
<div class="role-search-update">
	<div class="row">
		<div class="col-md-8">
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
		</div>
	</div>
	<style type="text/css" media="screen">
		.panel-body {
			background: #e5e5e5;
		}
	</style>