<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\Product;

/* @var $this yii\web\View */
/* @var $model backend\models\Product */
/* @var $form yii\widgets\ActiveForm */

$avatar = $model->images ? $model->images : 'uploads/noimg.png';
$new = $model->new == 10 ? 'checked' :  '';
$hotdeal = $model->hotdeal == 10 ? 'checked' :  '';
$bestseller = $model->bestseller == 10 ? 'checked' :  '';
$featured = $model->featured == 10 ? 'checked' :  '';
$instock = $model->instock == 10 ? 'checked' :  '';
$status = $model->status == 10 ? 'checked' :  '';
?>

<div class="product-form">

  <?php $form = ActiveForm::begin(); ?>

  <div class="col-md-9" >
    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cate_id')->dropDownList($data['cate'], ['prompt'=>'--Chọn danh mục cha--']) ?>

    <di class="row">
      <div class="col-md-2"><?= $form->field($model, 'price')->textInput() ?></div>

      <div class="col-md-2"><?= $form->field($model, 'pricelist')->dropDownList($data['pricelist']) ?></div>

      <div class="col-md-2"><?= $form->field($model, 'saleoff')->textInput() ?></div>

      <div class="col-md-2"><?= $form->field($model, 'pricesale')->textInput() ?></div>

      <div class="col-md-2">
        <?= $form->field($model, 'startsale')->widget(\yii\jui\DatePicker::classname(), [
          'dateFormat' => 'yyyy-MM-dd',
          'options'=>['class'=>'form-control'],
          ]) ?>
        </div>
        <div class="col-md-2">
          <?= $form->field($model, 'endsale')->widget(\yii\jui\DatePicker::classname(), [
            'dateFormat' => 'yyyy-MM-dd',
            'options'=>['class'=>'form-control'],
            ]) ?>

          </div>
        </di>

        <div class="form-group clearfix">
         <div class="col-md-2">
           <label for="" class="btn-block">Sp Ưu đãi</label>
           <label class="switch">
             <?php if($hotdeal != ''): ?>
               <input type="checkbox" name="Product['hotdeal']" <?php echo $hotdeal ?>>
             <?php else : ?>
               <input type="checkbox" name="Product['hotdeal']" >
             <?php endif;?>
             <span class="slider round"></span>
           </label>
         </div>
         <div class="col-md-2">
          <label for="" class="btn-block">Sản phẩm mới</label>
          <label class="switch">
            <?php if($new != ''): ?>
              <input type="checkbox" name="Product['new']" <?php echo $new ?>>
            <?php else: ?>
              <input type="checkbox" name="Product['new']" >
            <?php endif; ?>
            <span class="slider round"></span>
          </label>
        </div>

        <div class="col-md-2">
         <label for="" class="btn-block">Sp bán chạy</label>
         <label class="switch">
           <?php if($bestseller != ''): ?>
            <input type="checkbox" name="Product['bestseller']" <?php echo $bestseller ?>>
          <?php else: ?>
            <input type="checkbox" name="Product['bestseller']" >
          <?php endif; ?>
          <span class="slider round"></span>
        </label>
      </div>

      <div class="col-md-2">
        <label for="" class="btn-block">Sp nổi bật</label>
        <label class="switch">
          <?php if($featured != ''): ?>
           <input type="checkbox" name="Product['featured']" <?php echo $featured ?>>
         <?php else: ?>
           <input type="checkbox" name="Product['featured']">
         <?php endif ?>
         <span class="slider round"></span>
       </label>
     </div>

     <div class="col-md-2">
      <label for="" class="btn-block">Còn/hết Sp</label>
      <label class="switch">
        <?php if($instock != ''): ?>
         <input type="checkbox" name="Product['instock']" <?php echo $instock ?>>
       <?php else : ?>
         <input type="checkbox" name="Product['instock']" checked />
       <?php endif ?>
       <span class="slider round"></span>
     </label>
   </div>

   <div class="col-md-2">
    <label for="" class="btn-block">Trạng thái</label>
    <label class="switch">
      <?php if($status != ''): ?>
       <input type="checkbox" name="Product['status']" <?php echo $status ?> />
     <?php else: ?>
       <input type="checkbox" name="Product['status']" checked />
     <?php endif ?>
     <span class="slider round"></span>
   </label>
 </div>

</div>
<?= $form->field($model, 'desc')->textarea(['rows' => 6]) ?>

<?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>
<?= $form->field($model, 'tagproduct')->textInput(['maxlength' => true]) ?></div>



<div class="col-md-3" style="padding-left: 35px; padding-right: 35px; background: #f1f1f1;">
  <div class="form-group">
    <?= Html::a('<i class="fa fa-reply" aria-hidden="true"></i> Quay lại', ['index'], ['class' => 'btn btn-info btn-sm btn-block']) ?>
    <?= Html::submitButton($model->isNewRecord ? '<i class="fa fa-floppy-o" aria-hidden="true"></i> Lưu' : '<i class="fa fa-pencil-square-o" aria-hidden="true"></i> Sửa', ['class' => $model->isNewRecord ? 'btn btn-success btn-sm btn-block' : 'btn btn-primary btn-sm btn-block']) ?>
    <button type="reset" class="btn btn-danger btn-block"><i class="fa fa-ban" aria-hidden="true"></i> Hủy</button>
  </div>

  <div class="form-group">
    <div class="select-img-product">
      <img id="img-logo" name="img" 
      class="media-object tip-imgPreview img-responsive"
      src="<?php echo \Yii::$app->params['homepath'].'/'?><?php echo $avatar ?>" 
      data-holder-rendered="true" width="100%">  
    </div>

    <input type="file" 
    id="upload-logo" class="tip-images trigger-product hide"
    name="LogoImage" value="" 
    title="Chọn ảnh bìa" 
    accept="image/*" data-value="LogoImage" 
    data-path="" data-crop="img-logo"
    data-crop-width="300" data-crop-height="327" 
    data-validate="1" data-size="300">

    <div class="form-group field-LogoImage required">
      <input type="hidden" value="<?php echo $avatar ?>" id="LogoImage" class="form-control" name="Product[images]">
    </div>

    <!-- chon nhieu anh -->
    <!-- update anh chi tiet -->
    <?php if(isset($data['details'])) : ?>
      <div id="flip" class="btn btn-block">
        Ảnh chi tiết
        <i class="fa fa-chevron-down" aria-hidden="true"></i> 
      </div>
      <div id="entry_img" class="clearfix" style="display: block;">
        <input type="hidden" name="img_detail" id="images-detail" class="form-control" >
        <?php $n = 1; foreach ($data['details'] as $key => $details) : ?>

        <div class="r row-<?php echo $key ?>">
          <input type="hidden" name="images_detail[]" id="img-<?php echo $key ?>" class="form-control isset-img"  value="<?php echo $details->image ?>">
          <img src="<?php echo Yii::$app->params['homepath'].$details->image ?>" id="show-img-<?php echo $key ?>" alt="" class="img-responsive">
          <h5>Ảnh chi tiết <?php echo $n ?></h5>
          <a href="#" id="img-<?php echo $key ?>" title="Chọn hình ảnh" class="btn btn-sm select-img" data-id="<?php echo $key ?>">
            <i class="fa fa-picture-o"></i>
          </a>
          <a href="#" id="img-<?php echo $key ?>" title="Xóa hình ảnh" class="btn btn-sm remove-image" data-id="<?php echo $key ?>">
            <i class="fa fa-trash-o "></i>
          </a>
        </div>
        <?php $n++; endforeach; ?>
      </div>
      <!-- update anh chi tiet -->

    <?php else : ?>
      <div id="flip" class="btn btn-block">
        Ảnh chi tiết
        <i class="fa fa-chevron-down" aria-hidden="true"></i> 
        <i class="fa fa-chevron-up" aria-hidden="true"></i>
      </div>
      <div id="entry_img" class="clearfix">
        <input type="hidden" name="img_detail" id="images-detail" class="form-control" >
        <div class="r row-0">
          <input type="hidden" name="images_detail[]" id="img-0" class="form-control isset-img"  value="">
          <img src="" id="show-img-0" alt="" class="img-responsive">
          <h5>Ảnh chi tiết 1</h5>
          <a href="#" id="img-0" title="Chọn hình ảnh" class="btn btn-sm select-img" data-id="0">
            <i class="fa fa-picture-o"></i>
          </a>
          <a href="#" id="img-0" title="Xóa hình ảnh" class="btn btn-smremove-image" data-id="0">
            <i class="fa fa-trash-o "></i>
          </a>
        </div>
      </div>
    <?php endif; ?>


  </div>
  <!-- chon nhieu anh -->
</div>
</div>

<?php ActiveForm::end(); ?>

</div>
