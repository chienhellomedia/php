<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\PriceList */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="price-list-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->dropDownList([10 =>'Kích hoạt', 0 => 'Không kích hoạt'], ['prompt'=>'Chọn trạng thái']) ?>

    

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Tạo mới' : 'Sửa', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
