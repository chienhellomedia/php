<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'QUẢN TRỊ WEB';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login clearfix">
  <div class="row">

    <h1 align="center"><?= Html::encode($this->title) ?></h1>

    <p>Điền thông tin để đăng nhập:</p>


    <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

    <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

    <?= $form->field($model, 'password')->passwordInput() ?>

    <?= $form->field($model, 'rememberMe')->checkbox() ?>

    <div class="form-group">
     <?= Html::submitButton('Đăng nhập', ['class' => 'btn btn-primary btn-block', 'name' => 'login-button']) ?>
   </div>

   <?php ActiveForm::end(); ?>

 </div>
</div>
