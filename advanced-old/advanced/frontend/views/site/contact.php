<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Contact';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="body-content">
    <div class="container" style="margin-top: 20px;">
        <div class="contact-page">
            <div class="row">

                <div class="col-md-12 contact-map outer-bottom-vs">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3886.0080692193424!2d80.29172299999996!3d13.098675000000002!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a526f446a1c3187%3A0x298011b0b0d14d47!2sTransvelo!5e0!3m2!1sen!2sin!4v1412844527190" width="600" height="450"  style="border:0"></iframe>
                </div>
                <div class="col-md-9 contact-form">
                    <div class="col-md-12 contact-title">
                        <h3>Liên hệ với chúng tôi</h3>
                    </div>
                    <div class="col-md-4 ">
                       <?php $form = ActiveForm::begin(['options' => ['class' => 'register-form']]); ?>
                       <div class="form-group">
                        <?= $form->field($model, 'name')->textInput(['autofocus' => true, 'class'=>'form-control unicase-form-control text-input'])->label('Tên bạn <span>*</span>', ['class'=>'info-title']) ?>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">                        
                        <?= $form->field($model, 'email')->textInput(['autofocus' => true, 'type'=>'email', 'class'=>'form-control unicase-form-control text-input'])->label('Email <span>*</span>', ['class'=>'info-title']) ?>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                    <?= $form->field($model, 'subject')->textInput(['autofocus' => true, 'class'=>'form-control unicase-form-control text-input'])->label('Tiêu đề <span>*</span>', ['class'=>'info-title']) ?>
                    </div>

                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <?= $form->field($model, 'body')->textarea(['rows' => 3, 'class'=>'form-control unicase-form-control'])->label('Nội dung <span>*</span>', ['class'=>'info-title']) ?>
                    </div>
                </div>
                <div class="col-md-7"> 
                  <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                   'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
                   ]) ?>                     
               </div>
               <div class="col-md-12 outer-bottom-small m-t-20">
                <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Gửi thông tin liên hệ</button>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
        <div class="col-md-3 contact-info">
            <div class="contact-title">
                <h4>Thông tin</h4>
            </div>
            <div class="clearfix address">
                <span class="contact-i"><i class="fa fa-map-marker"></i></span>
                <span class="contact-span">ThemesGround, 789 Main rd, Anytown, CA 12345 USA</span>
            </div>
            <div class="clearfix phone-no">
                <span class="contact-i"><i class="fa fa-mobile"></i></span>
                <span class="contact-span">+(888) 123-4567<br>+(888) 456-7890</span>
            </div>
            <div class="clearfix email">
                <span class="contact-i"><i class="fa fa-envelope"></i></span>
                <span class="contact-span"><a href="#">flipmart@themesground.com</a></span>
            </div>
        </div>      
    </div><!-- /.contact-page -->
</div><!-- /.row -->

</div><!-- /.container -->
</div>
<style type="text/css" media="screen">
    .info-title {
     font-size: 16px !important;
     font-weight: bold !important;
     color: #333 !important;
 }
</style>