<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

     <?= $form->field($model, 'status')->dropDownList([10=>'Kích hoạt', 0=>'Không kích hoạt']) ?>

    

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Lưu lại' : 'Chỉnh sửa', ['class' => $model->isNewRecord ? 'btn btn-success btn-sm br0' : 'btn btn-primary btn-sm br0']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
