<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\OrderSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="order-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'cus_id') ?>

    <?= $form->field($model, 'fullname') ?>

    <?= $form->field($model, 'email') ?>

    <?= $form->field($model, 'mobile') ?>

    <?php // echo $form->field($model, 'addess') ?>

    <?php // echo $form->field($model, 'fullname_ship') ?>

    <?php // echo $form->field($model, 'email_ship') ?>

    <?php // echo $form->field($model, 'mobile_ship') ?>

    <?php // echo $form->field($model, 'addess_ship') ?>

    <?php // echo $form->field($model, 'request') ?>

    <?php // echo $form->field($model, 'total') ?>

    <?php // echo $form->field($model, 'payment_id') ?>

    <?php // echo $form->field($model, 'delivery_id') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
