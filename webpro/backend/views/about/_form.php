<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\About */
/* @var $form yii\widgets\ActiveForm */
$avatar = $model->images ? $model->images : 'uploads/noimg.png';
?>

<div class="about-form">

	<?php $form = ActiveForm::begin(); ?>

	<a href="" class="select-story" style="display: block;"><img src="<?php echo Yii::$app->params['homepath'].$avatar ?>" alt="" style="display: block; margin: 0 auto; width: 500px;"></a>

	<?= $form->field($model, 'images')->hiddenInput(['maxlength' => true]) ?>
	
	<?= $form->field($model, 'order')->textInput() ?>
	
	<div class="form-group">
		<?= Html::submitButton($model->isNewRecord ? 'Tạo mới' : 'Chỉnh sửa', ['class' => $model->isNewRecord ? 'btn btn-success br0' : 'btn btn-primary br0']) ?>
	</div>

	<?php ActiveForm::end(); ?>

</div>

<!-- about-images -->