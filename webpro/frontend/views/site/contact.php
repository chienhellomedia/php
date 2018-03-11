<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
use frontend\widgets\Map;
$this->title = 'Liên hệ';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="body-content">
    <div class="container" style="margin-top: 20px;">
        <div class="contact-page">
            <div class="row">

              <!--   <div class="col-md-12 contact-map outer-bottom-vs">
                    <div id="mapContact" width="100%" height="500px"></div>
                </div> -->
                <div class="col-md-8 contact-form">
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
            <div class="col-md-4 contact-info">
                <div class="contact-title">
                    <h4>Thông tin</h4>
                </div>
                <div class="clearfix address">
                    <span class="contact-i"><i class="fa fa-map-marker"></i></span>
                    <span class="contact-span">Kiot 4a CT5, kđt Hồng Hà, Tứ Hiệp, TT, Hà Nội</span>
                </div>
                <div class="clearfix phone-no">
                    <span class="contact-i"><i class="fa fa-mobile"></i></span>
                    <span class="contact-span">
                    096 115 22 66</span>
                </div>
                <div class="clearfix email">
                    <span class="contact-i"><i class="fa fa-envelope"></i></span>
                    <span class="contact-span"><a href="#">nongtraithucphamhnh@gmail.com</a></span>
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