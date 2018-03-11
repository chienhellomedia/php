<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Customer */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="customer-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fullname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>
  
    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>
   

   

    <div class="form-group">
        <?= Html::submitButton('<i class="fa fa-pencil-square-o" aria-hidden="true"></i> Sửa', ['class' => 'btn btn-primary br0']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<style type="text/css" media="screen">
    .form-control {
        border-radius: 0px;
    }
</style>
