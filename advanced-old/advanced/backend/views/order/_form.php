<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Order */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="order-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'cus_id')->textInput() ?>

    <?= $form->field($model, 'fullname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mobile')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'addess')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fullname_ship')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email_ship')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mobile_ship')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'addess_ship')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'request')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'total')->textInput() ?>

    <?= $form->field($model, 'payment_id')->textInput() ?>

    <?= $form->field($model, 'delivery_id')->textInput() ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
