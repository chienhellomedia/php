<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\Product;

/* @var $this yii\web\View */
/* @var $model backend\models\Product */
/* @var $form yii\widgets\ActiveForm */

$avatar = $model->images ? $model->images : 'uploads/noimg.png';
$addimg = $model->images_detail ? $model->images_detail : 'uploads/iconavatar.PNG';
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
                  <input type="checkbox" name="hotdeal" value="10" <?= $model->hotdeal==10 ? 'checked' : ''?>>
                  <span class="slider round"></span>
              </label>
          </div>
          <div class="col-md-2">
            <label for="" class="btn-block">Sản phẩm mới</label>
            <label class="switch">
              <input type="checkbox" name="new"  value="10" <?= $model->new==10 ? 'checked' : ''?>>
              <span class="slider round"></span>
          </label>
      </div>

      <div class="col-md-2">
         <label for="" class="btn-block">Sp bán chạy</label>
         <label class="switch">
            <input type="checkbox" name="bestseller"  value="10"  <?= $model->bestseller==10 ? 'checked' : ''?>>
            <span class="slider round"></span>
        </label>
    </div>

    <div class="col-md-2">
       <label for="" class="btn-block">Sp nổi bật</label>
       <label class="switch">
          <input type="checkbox" name="featured" value="10" <?= $model->featured==10 ? 'checked' : ''?>>
          <span class="slider round"></span>
      </label>
  </div>

  <div class="col-md-2">
   <label for="" class="btn-block">Còn/hết Sp</label>
   <label class="switch">
      <input type="checkbox" name="instock" value="10" <?= $model->instock==10 ? 'checked' : ''?> />
      <span class="slider round"></span>
  </label>
</div>

<div class="col-md-2">
  <label for="" class="btn-block">Trạng thái</label>
  <label class="switch">
     <input type="checkbox" name="status" value="10"  <?= $model->status==10 ? 'checked' : ''?> />
     <span class="slider round"></span>
 </label>
</div>

</div>
<?= $form->field($model, 'desc')->textarea(['rows' => 6]) ?>

<?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>
<?= $form->field($model, 'tagproduct')->textInput(['maxlength' => true]) ?></div>



<div class="col-md-3" style="padding-left: 35px; padding-right: 35px; background: #f1f1f178">
   <div class="form-group">
      <?= Html::a('<i class="fa fa-reply" aria-hidden="true"></i> Quay lại', ['index'], ['class' => 'btn btn-info btn-sm btn-block br0']) ?>
      <?= Html::submitButton($model->isNewRecord ? '<i class="fa fa-floppy-o" aria-hidden="true"></i> Lưu' : '<i class="fa fa-pencil-square-o" aria-hidden="true"></i> Sửa', ['class' => $model->isNewRecord ? 'btn btn-success btn-sm btn-block br0' : 'btn btn-primary btn-sm btn-block br0']) ?>
      <button type="reset" class="btn btn-danger btn-block br0"><i class="fa fa-ban" aria-hidden="true"></i> Hủy</button>
  </div>

  <div class="form-group">
      <div class="select-img-product">
         <img id="img-logo" name="img" 
         class="media-object tip-imgPreview img-responsive"
         src="<?= \Yii::$app->params['homepath'].'/'?><?= $avatar ?>" 
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
         <input type="hidden" value="<?= $avatar ?>" id="LogoImage" class="form-control" name="Product[images]">
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
            <?php $n; foreach ($data['details'] as $key => $details) : ?>
                
            <div class="r row-img-<?= $key ?>">
               <input type="hidden" name="images_detail[]" id="img-<?= $key ?>" class="form-control isset-img"  value="<?= $details->image ?>">
               <img src="<?= Yii::$app->params['homepath'].$details->image ?>" id="show-img-<?= $key ?>" alt="" class="img-responsive">
               <a href="#" id="img-<?= $key ?>" title="Chọn hình ảnh" class="btn btn-sm select-img" data-id="<?= $key ?>">
                  <i class="fa fa-picture-o"></i>
              </a>
              <a href="#" id="img-<?= $key ?>" title="Xóa hình ảnh" class="btn btn-sm remove-image" data-id="<?= $key ?>">
                  <i class="fa fa-trash-o "></i>
              </a>
          </div>
          <?php $n = $key;  endforeach; ?>
          <?php $n = $n+1; ?>
          <div class="r row-<?= $n ?>">
           <input type="hidden" name="images_detail[]" id="img-<?= $n ?>" class="form-control isset-img"  value="">
               <img src="<?= $addimg ?>" id="show-img-<?= $n ?>" alt="" class="img-responsive">
               <a href="#" id="img-<?= $n ?>" title="Chọn hình ảnh" class="btn btn-sm select-img" data-id="<?= $n ?>">
                <i class="fa fa-picture-o"></i>
                </a>
                <a href="#" id="img-<?= $n ?>" title="Xóa hình ảnh" class="btn btn-sm remove-image" data-id="<?= $n ?>">
                    <i class="fa fa-trash-o "></i>
                </a>
            </div>
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
         <img src="<?= $addimg ?>" id="show-img-0" alt="" class="img-responsive">
         <a href="#" id="img-0" title="Chọn hình ảnh" class="btn btn-sm select-img" data-id="0">
            <i class="fa fa-picture-o"></i>
        </a>
        <a href="#" id="img-0" title="Xóa hình ảnh" class="btn btn-sm remove-image" data-id="0">
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
