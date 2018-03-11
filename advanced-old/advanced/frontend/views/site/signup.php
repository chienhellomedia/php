<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
$this->title = 'Đăng ký';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container" style="margin-top: 20px">    

    <div class="row">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title"><?= Html::encode($this->title) ?></h3>
            </div>
            <div class="panel-body">
             <div class="col-md-6 col-sm-6 create-new-account">
                <p class="text title-tag-line">Tạo mới tài khoản của bạn.</p>
                <?php $form = ActiveForm::begin(['id' => 'form-signup',
                    'action' => ['/site/signup'],
                    'method' => 'post',
                    'options' => [
                        'class' => 'register-form outer-top-xs',
                    ]
                    ]); ?>
                      <div class="form-group">                            
                            <?= $form->field($model, 'username')->textInput(['autofocus' => true, 'class'=>'form-control unicase-form-control text-input'])->label('Username <span>*</span>') ?>
                        </div>
                        <div class="form-group">
                            <?= $form->field($model, 'fullname')->textInput(['autofocus' => true, 'class'=>'form-control unicase-form-control text-input'])->label('Họ và tên <span>*</span>') ?>
                        </div>
                        <div class="form-group">                            
                            <?= $form->field($model, 'phone')->textInput(['autofocus' => true, 'class'=>'form-control unicase-form-control text-input'])->label('Số điện thoại <span>*</span>') ?>
                        </div>
                        <div class="form-group">
                            <?= $form->field($model, 'email')->textInput(['autofocus' => true, 'class'=>'form-control unicase-form-control text-input'])->label('Địa chỉ Email <span>*</span>') ?>
                        </div>
                        <div class="form-group">
                            <?= $form->field($model, 'address')->textInput(['class'=>'form-control unicase-form-control text-input'])->label('Địa chỉ <span>*</span>') ?>
                        </div> 
                        <div class="form-group">
                            <?= $form->field($model, 'password')->passwordInput(['class'=>'form-control unicase-form-control text-input']) ?>
                        </div>
                        <div class="form-group">
                            <?= Html::submitButton('Đăng ký', ['class' => 'btn-upper btn btn-primary checkout-page-button', 'name' => 'signup-button']) ?>
                        </div>
                        <?php ActiveForm::end(); ?>
                    </div>
                    <div class="col-md-6">
                        <p>                            
                            Bằng cách tạo tài khoản với cửa hàng của chúng tôi, bạn sẽ có thể di chuyển qua quá trình thanh toán nhanh hơn, lưu trữ nhiều địa chỉ giao hàng, xem và theo dõi các đơn đặt hàng trong tài khoản của bạn và hơn thế nữa.
                        </p>
                        <p>
                           <a href="<?php echo Url::to(['site']) ?>" class="btn btn-success br0"><i class="fa fa-home" aria-hidden="true"></i> Quay lại trang chủ</a>
                       </p>
                       <p>
                           <a href="<?php echo Url::to(['site']) ?>" class="btn btn-primary br0"><i class="fa fa-sign-in" aria-hidden="true"></i> Đăng nhập</a>
                       </p>
                   </div>
               </div>
           </div> 
       </div>
   </div>
