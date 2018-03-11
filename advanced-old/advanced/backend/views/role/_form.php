<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\RoleSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="role-search-form">
	<?php $form = ActiveForm::begin(); ?>
	<div class="col-md-9">
<div class="card">
			<?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
	
			<?= $form->field($model, 'description')->textarea(['rows' => 6]) ?></div>

	</div>   
	<div class="col-md-3">
		<div class="card clearfix">
			<div class="form-group">
				<?= Html::a('<i class="fa fa-arrow-left" aria-hidden="true"></i> Quay về', ['index'], ['class' => 'btn btn-success w145 br0']) ?>
			</div>
			<div class="form-group">
				<?= Html::submitButton($model->isNewRecord ? '<i class="fa fa-plus-circle" aria-hidden="true"></i> Tạo mới' : '<i class="fa fa-pencil-square-o" aria-hidden="true"></i> Cập nhật', ['class' => $model->isNewRecord ? 'btn btn-success br0 w145' : 'btn btn-primary br0 w145']) ?>
			</div>

			<div class="form-group">
				<button type="reset" class="btn btn-warning br0 w145"> Hủy</button>
			</div>

		</div>

	</div>
	<?php ActiveForm::end(); ?>

</div>
