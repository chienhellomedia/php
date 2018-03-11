<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;

$this->title = 'Đăng nhập/Đăng ký';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">            
            </ul>
        </div><!-- /.breadcrumb-inner -->
    </div><!-- /.container -->
</div><!-- /.breadcrumb -->



<div class="body-content">
    <div class="container">
        <div class="sign-in-page">
            <div class="row">
                <!-- Sign-in -->            
                <div class="col-md-6 col-sm-6 sign-in">
                   <div class="panel panel-primary">
                      <div class="panel-heading">
                          <h3 class="panel-title">Đăng nhập</h3>
                      </div>
                      <div class="panel-body">
                        <p class="">Bạn vui lòng đăng nhập.</p>

                        <?php $form = ActiveForm::begin(['id' => 'login-form',
                            'action' => ['/site/login'],
                            'method' => 'post',
                            'options' => [
                                'class' => 'register-form outer-top-xs'
                            ]
                            ]); ?>
                            <div class="form-group">
                                <?= $form->field($model, 'username')->textInput(['autofocus' => true, 'class'=>'form-control unicase-form-control text-input'])->label('Đăng nhập <span>*</span>') ?>
                            </div>
                            <div class="form-group">
                             <?= $form->field($model, 'password')->passwordInput(['class' => 'form-control unicase-form-control text-input'])->label('Password <span>*</span>') ?>
                         </div>
                         <div class="radio outer-xs">
                            <label>
                                <?= $form->field($model, 'rememberMe')->checkbox()->label('Nhớ mât khẩu') ?>
                            </label>
                            <div style="color:#999;margin:1em 0; float: right">
                                Quên mật khẩu<?= Html::a(' Khôi phục', ['site/request-password-reset'], ['class'=>'forgot-password pull-right']) ?>.
                            </div>
                        </div>
                        <div class="form-group">
                            <?= Html::submitButton('Đăng nhập', ['class' => 'btn-upper btn btn-primary checkout-page-button', 'name' => 'login-button']) ?>
                        </div>
                        <?php ActiveForm::end(); ?>  
                    </div>
                </div>               
            </div>
            <!-- Sign-in -->

            <!-- create a new account -->
            <div class="col-md-6 col-sm-6 create-new-account">
             <div class="panel panel-primary">
                 <div class="panel-heading">
                     <h3 class="panel-title">Tạo mới</h3>
                 </div>
                 <div class="panel-body">
                     <p class="text title-tag-line">Tạo mới tài khoản của bạn.</p>
                     <a href="<?php echo Url::to(['site/signup']) ?>" class="btn btn-info br0">Đăng ký mới</a>
                 </div>
             </div>
         </div>

         <!-- create a new account -->       
     </div><!-- /.row -->
 </div><!-- /.sigin-in-->
 <!-- ============================================== BRANDS CAROUSEL ============================================== -->

 <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->   
</div><!-- /.container -->
</div><!-- /.body-content -->

