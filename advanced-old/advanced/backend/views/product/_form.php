<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model backend\models\Product */
/* @var $form yii\widgets\ActiveForm */
use backend\models\Product;
$change = new Product;

?>

<div class="product-form">

  <?php $form = ActiveForm::begin(); ?>

  <div class="row">
    <div class="col-md-9">
      <div class="card">

       <div class="row">
         <div class="col-md-6"><?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?> </div>  
         <div class="col-md-6"><?= $form->field($model, 'slug')->textInput(['maxlength' => true]) ?></div>
       </div>

       <!-- Thêm nhiều ảnh -->


       <!-- Thêm nhiều ảnh -->

       <?= $form->field($model, 'cate_id')->dropDownList($cate, ['prompt' => 'chọn danh mục cha']) ?>

       <div class="row">
         <div class="col-md-6"><?= $form->field($model, 'price')->textInput() ?> </div>      
         <div class="col-md-6"><?= $form->field($model, 'pricelist')->dropDownList($pricelist, ['prompt' => 'chọn Đơn vị giá']) ?></div>
       </div>

       <div class="row">
        <div class="col-md-6"> <?= $form->field($model, 'saleoff')->textInput() ?> </div>        
        <div class="col-md-6"><?= $form->field($model, 'pricesale')->textInput() ?></div>         
      </div>

      <div class="row">
        <div class="col-md-6"><?= $form->field($model, 'startsale')->textInput() ?> </div>       
        <div class="col-md-6"> <?= $form->field($model, 'endsale')->textInput() ?></div>          
      </div>

      <div style="border: 1px solid #e5e5e5; padding: 5px; margin-bottom: 10px">
        <h4>Chọn hình thức cho sản phẩm</h4>
        <div class="row"> 
          <div class="col-md-2"><?= $form->field($model, 'new')->dropDownList([ 0 => 'Không', 10 => 'Có']) ?> </div>   
           <div class="col-md-2"><?= $form->field($model, 'featured')->dropDownList([ 0 => 'Không', 10 => 'Có']) ?> </div>    
          <div class="col-md-2"> <?= $form->field($model, 'bestseller')->dropDownList([ 0 => 'Không', 10 => 'Có']) ?></div>
          <div class="col-md-2"><?= $form->field($model, 'hotdeals')->dropDownList([ 0 => 'Không', 10 => 'Có']) ?></div>
          <div class="col-md-2"><?= $form->field($model, 'sepcialoffer')->dropDownList([ 0 => 'Không', 10 => 'Có']) ?></div>
          <div class="col-md-2"><?= $form->field($model, 'instock')->dropDownList([ 10 => 'Còn hàng', 0 => 'Hết hàng']) ?></div>
        </div>
      </div>     

      <?= $form->field($model, 'desc')->textarea(['maxlength' => true]) ?>
      <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>
    </div>
  </div>



  <div class="col-md-3">
    <div class="card" style="margin-bottom: 5px">
      <div class="form-group">
       <?= Html::a('<i class="fa fa-arrow-left" aria-hidden="true"></i> Quay lại', ['index'], ['class' => 'btn btn-info br0 w100']) ?>
     </div>
     <div class="form-group">
       <?= Html::submitButton($model->isNewRecord ? '<i class="fa fa-save" aria-hidden="true"></i> Lưu' : '<i class="fa fa-pencil-square-o" aria-hidden="true"></i> Lưu', ['class' => $model->isNewRecord ? 'btn btn-success br0 w100' : 'btn btn-primary br0 w100']) ?>
     </div>
     <div class="form-group">
      <button type="reset" class="btn btn-warning br0 w100">Hủy</button>
    </div>
  </div>

  <div class="card" style="padding: 5px 20px 5px 20px; margin: 5px 0px">
    <?= $form->field($model, 'status')->dropDownList([ 10 => 'Kích hoạt', 0 => 'Không kích hoạt']) ?>
  </div>

  <div class="card">
    <?php if (!$model->image) : ?>
      <a href="#" id="add_img" title="Chọn hình ảnh" class="btn btn-info btn-sm btn-block" > <i class="fa fa-plus-square" aria-hidden="true" disabled="disabled"></i>Chọn nhiều ảnh</a>
    <?php endif; ?>
    <div id="entry_img">
     <input type="hidden" name="img" id="image" class="form-control" >
     <div class="r row-0">

       <input type="hidden" name="image[]" id="img-0" class="form-control"  value="<?php echo $model->image ?>">
       <img src="<?php echo $model->image ?>" id="show-img-0" class="img-responsive">
       <a href="#" id="img-0" title="Chọn hình ảnh" class="btn btn-info btn-sm select-img" data-id=""><i class="fa fa-picture-o"></i> Chọn ảnh</a>
       <a href="#" id="img-0" title="Xóa hình ảnh" class="btn btn-danger btn-sm remove-image" ><i class="fa fa-trash-o "></i> Xóa ảnh</a>

     </div>

   </div>
   <?php
   $n = 1;
   if($model->imgs):
    foreach($model->imgs as $images): 
      if($images->image): ?>

    <div id="entry_img">
      <div class="r row-img-<?php echo $n; ?>">

       <input type="hidden" name="image[]" id="img-<?php echo $n; ?>" class="form-control" value="<?php echo $images->image ?>" >
       <img src="<?php echo $images->image ?>" id="show-img-<?php echo $n; ?>" class="img-responsive">

       <a href="#" id="img-<?php echo $n; ?>" title="Chọn hình ảnh" class="btn btn-info btn-sm select-img" data-id=""><i class="fa fa-picture-o"></i>Chọn ảnh</a>
       <a href="#" id="img-<?php echo $n; ?>" title="Xóa hình ảnh" class="btn btn-danger btn-sm remove-image" ><i class="fa fa-trash-o "></i> Xóa ảnh</a>

     </div>

   </div>

   <?php
   $n++; 
   endif;
   endforeach;
   endif; 
   ?>
 </div>
</div>
</div>

<?php ActiveForm::end(); ?>

</div>
