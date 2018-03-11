<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Certificate */
/* @var $form yii\widgets\ActiveForm */
$avatar = $model->images ? $model->images : 'uploads/noimg.png';
?>

<div class="certificate-form">

	<?php $form = ActiveForm::begin(); ?>

	<?= $form->field($model, 'images')->hiddenInput(['maxlength' => true]) ?>

	<a href="#" class="select-certificate" style="margin-bottom: 20px; display: block"><img src="<?php echo Yii::$app->params['homepath'].$avatar ?>" alt="chọn ảnh" width='300px'></a>

	<div class="form-group">
		<?= Html::submitButton($model->isNewRecord ? 'Tạo mới' : 'Sửa', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	</div>

	<?php ActiveForm::end(); ?>

</div>
