<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\models\Checkout;
use backend\models\Customer;
use backend\models\Payment;
use backend\models\Delivery;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model frontend\models\Checkout */
/* @var $form ActiveForm */
if (Yii::$app->request->post()) {
  $total = (Yii::$app->request->post()['total']);
} else {
  $total = 0;
}
$model->total = $cost; //get from model Checkout


?>
<div class="container" style="padding-top: 20px">
 <div class="panel panel-info">
   <div class="panel-heading">
     <h3 class="panel-title">Thông tin đặt hàng</h3>
   </div>
   <div class="panel-body" style="padding: 30px">
    <p><span style="color: red">*</span>Bạn nên đăng nhập để thanh toán dễ dàng hơn.</p>
    <?php $form = ActiveForm::begin([
        // 'id' => 'login-form',
      'options' => ['class' => 'form-horizontal'],
      ]) ?>
      <?php if ($total == 0 ) : ?>
        <div class="alert alert-warning">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <h3>Bạn chưa thêm sản phẩm nào vào giỏ hàng!...</h3>  <a href="<?php echo yii\helpers\Url::to(['/site/index']) ?>" title="" class="btn btn-info br0"><i class="fa fa-home" aria-hidden="true"></i> Quay lại Trang chủ</a>
        </div>
        
      <?php else : ?>
        <div class="row">
        <div class="col-md-3">  
          <?php if (isset(Yii::$app->user->identity->id)): ?>
            
              <?= $form->field($model, 'fullname')->textInput(['value'=>Yii::$app->user->identity->fullname, 
              'class'=>'form-control unicase-form-control text-input']) ?>
              <?= $form->field($model, 'email')->textInput(['value'=>Yii::$app->user->identity->email,
              'class'=>'form-control unicase-form-control text-input']) ?>
              <?= $form->field($model, 'mobile')->textInput(['value'=>Yii::$app->user->identity->phone,
              'class'=>'form-control unicase-form-control text-input']) ?>
              <?= $form->field($model, 'addess')->textInput(['value'=>Yii::$app->user->identity->address,
              'class'=>'form-control unicase-form-control text-input']) ?>
           
          <?php else: ?>
            
             <?= $form->field($model, 'fullname')->textInput(['class'=>'form-control unicase-form-control text-input']) ?>
             <?= $form->field($model, 'email')->textInput(['class'=>'form-control unicase-form-control text-input']) ?>
             <?= $form->field($model, 'mobile')->textInput(['class'=>'form-control unicase-form-control text-input']) ?>
             <?= $form->field($model, 'addess')->textInput(['class'=>'form-control unicase-form-control text-input']) ?>
           
         <?php endif; ?>

       </div>
       <div class="col-md-1">
       </div>
       <div class="col-md-3">
        
          <?= $form->field($model, 'fullname_ship')->textInput(['class'=>'form-control unicase-form-control text-input']) ?>
          <?= $form->field($model, 'email_ship')->textInput(['class'=>'form-control unicase-form-control text-input']) ?>
          <?= $form->field($model, 'mobile_ship')->textInput(['class'=>'form-control unicase-form-control text-input']) ?>
          <?= $form->field($model, 'addess_ship')->textInput(['class'=>'form-control unicase-form-control text-input']) ?>
        
      </div>
      <div class="col-md-1">

      </div>
      <div class="col-md-3">
        
          <?= $form->field($model, 'payment_id')->dropDownList($pay, ['class' => 'form-control unicase-form-control text-input']) ?>
          <?= $form->field($model, 'delivery_id')->dropDownList($deli, ['class' => 'form-control unicase-form-control text-input']) ?>
          <?= $form->field($model, 'total')->hiddenInput(['value'=>$total, 'class'=>'form-control unicase-form-control text-input'])->label(false) ?>
       
      </div>
    </div>
     <div class="row">
        <div class="col-md-6">
        
           <input type="checkbox" name="check" id="check" onchange="changeItem(this.id)"><label for="check">&nbsp;Địa chỉ người mua cùng người nhận</label>
           <?= $form->field($model, 'request')->textarea(['class'=>'form-control unicase-form-control text-input']) ?>
       
       </div>
       <div class="col-md-6">
        
             <?= Html::submitButton('<i class="fa fa-cart-arrow-down" aria-hidden="true"></i> Thanh toán đơn hàng', ['class' => 'btn btn-primary btn-lg br0 submit-btn']) ?>
        
       </div>
     </div>
    <?php endif; ?>
    <?php ActiveForm::end() ?>

  </div>
</div>
</div>


<style type="text/css" media="screen">
  .submit-btn {
    float: left;
    padding: 15px;
    margin-left: 30%;
    font-size: 20px;
  }
  h3 {
    font-size: 20px;
    font-weight: bold;
    text-transform: uppercase;
  }
</style>
<script>
  function changeItem(){
    if ($('#check').prop('checked')) {
      $('#checkout-fullname_ship').val($('#checkout-fullname').val());
      $('#checkout-email_ship').val($('#checkout-email').val());
      $('#checkout-mobile_ship').val($('#checkout-mobile').val());
      $('#checkout-addess_ship').val($('#checkout-addess').val());
    }else{
      $('#checkout-user_ship').val('');
      $('#checkout-email_ship').val('');
      $('#checkout-mobile_ship').val('');
      $('#checkout-addess_ship').val('');
    }
  }

</script>