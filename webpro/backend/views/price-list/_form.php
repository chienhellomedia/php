<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\PriceList */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="price-list-form">

	<?php $form = ActiveForm::begin(); ?>

	<div class="col-md-9">
		<?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

		<label for="" class="btn-block">Trạng thái</label>
		<label class="switch">
			<input type="checkbox" name="status" checked>
			<span class="slider round"></span>
		</label>

	</div>



	<div class="col-md-3">
		<div class="form-group">
			<?= Html::a('<i class="fa fa-reply" aria-hidden="true"></i> Quay lại', ['index'], ['class' => 'btn btn-info btn-sm btn-block']) ?>
		</div>
		<div class="form-group">
			<?= Html::submitButton($model->isNewRecord ? Yii::t('app', '<i class="fa fa-floppy-o" aria-hidden="true"></i> Lưu') : Yii::t('app', '<i class="fa fa-pencil-square-o" aria-hidden="true"></i> Cập nhật'), ['class' => $model->isNewRecord ? 'btn btn-success btn-sm btn-block' : 'btn btn-primary btn-sm btn-block']) ?>
		</div>

		<div class="form-group">
			<button type="reset" class="btn btn-warning btn-sm br0 btn-block"><i class="fa fa-ban" aria-hidden="true"></i> Hủy</button>
		</div>


	</div>

	<?php ActiveForm::end(); ?>

</div>
