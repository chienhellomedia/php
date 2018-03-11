<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
 <section class="material-half-bg">
      <div class="cover"></div>
    </section>
    <section class="login-content">
      <div class="logo">
        <h1>Vali</h1>
      </div>
      <div class="login-box">
         <?php $form = ActiveForm::begin([
            'options' => [
                'class' => 'login-form',
            ]
         ]); ?>
          <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>ĐĂNG NHẬP</h3>
          <div class="form-group">
           <?= $form->field($model, 'username')->textInput(['autofocus' => true])->label('USERNAME') ?>
          </div>
          <div class="form-group">
            <?= $form->field($model, 'password')->passwordInput()->label('PASSWORD') ?>
          </div>
          <div class="form-group">
            <div class="utility">
              <div class="animated-checkbox">
                   <?= $form->field($model, 'rememberMe')->checkbox() ?>               
              </div>
              <p class="semibold-text mb-0"><a data-toggle="flip">Forgot Password ?</a></p>
            </div>
          </div>
          <div class="form-group btn-container">
            <?= Html::submitButton('<i class="fa fa-sign-in fa-lg fa-fw"></i> Login', ['class' => 'btn btn-primary btn-block', 'name' => 'login-button']) ?>
          </div>
        <?php ActiveForm::end(); ?>

         <?php $form = ActiveForm::begin([
            'options' => [
                'class' => 'forget-form',
            ]
         ]); ?>
          <h3 class="login-head"><i class="fa fa-lg fa-fw fa-lock"></i>Forgot Password ?</h3>
          <div class="form-group">
            <label class="control-label">EMAIL</label>
            <input class="form-control" type="text" placeholder="Email">
          </div>
          <div class="form-group btn-container">
            <button class="btn btn-primary btn-block"><i class="fa fa-unlock fa-lg fa-fw"></i>RESET</button>
          </div>
          <div class="form-group mt-20">
            <p class="semibold-text mb-0"><a data-toggle="flip"><i class="fa fa-angle-left fa-fw"></i> Back to Login</a></p>
          </div>
        <?php ActiveForm::end(); ?>
      </div>
    </section>