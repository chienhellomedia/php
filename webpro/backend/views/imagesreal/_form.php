<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Imagesreal */
/* @var $form yii\widgets\ActiveForm */
$small  = ($model->small !='') ? $model->small :'uploads/noimg.png';
$big  = ($model->big !='') ? $model->big :'uploads/noimg.png';
?>

<div class="imagesreal-form">

	<?php $form = ActiveForm::begin(); ?>


	<div class="col-sm-6"><label for="">Hình ảnh nhỏ</label>
		<?=
		Html::img($small, [
			'id' => 'img-real',
			'alt' => '',
			'class' => 'media-object tip-imgPreview imgreal',
			'data-holder-rendered' => 'true',
			'style'=>'cursor: pointer; width: 200px; height: 200px;'
		
		]);
		?>
		<?=
		Html::fileInput('imagesreal-small', '', [
			'id' => 'upload-real',
			'title' => 'Chọn ảnh bìa',
			'accept' => 'image/*',
			'data-value' => 'imagesreal-small',
			'data-path' => '',
			'data-crop' => 'img-real',
			'data-crop-width' => '200',
			'data-crop-height' => '266',
			'class' => 'tip-images select-real hidden',
			'data-validate' => '1',
			'data-size' => '200',
		])
		?>
		<?= $form->field($model, 'small')->hiddenInput(['id' => 'imagesreal-small'])->label(false);  ?></div>

	<div class="col-sm-6"><label for="">Hình ảnh lớn</label>
		<?=
		Html::img($big, [
			'id' => 'img-real-big',
			'alt' => '',
			'src'=>'',
			'class' => 'media-object tip-imgPreview imgrealbig',
			'data-holder-rendered' => 'true',
			'style'=>'cursor: pointer; width: 300px; height: 300px;'
		
		]);
		?>
		<?= $form->field($model, 'big')->hiddenInput(['maxlength' => true]) ?></div>
<!-- imagesreal-big -->
	<div class="form-group">
		<?= Html::submitButton($model->isNewRecord ? 'Thêm mới' : 'Chỉnh sửa', ['class' => $model->isNewRecord ? 'btn btn-success btn-sm br0' : 'btn btn-primary btn-sm br0']) ?>
	</div>

	<?php ActiveForm::end(); ?>

</div>

<?php 
$this->registerJs(<<<JS

    $('#img-real').click(function(){
		$('#upload-real').trigger('click');
    });

    $('#img-real-big').click(function(){
		$('#modal-imgreal').modal('show');
		$('#modal-imgreal').on('hide.bs.modal', function(e){
			var img = $('#imagesreal-big').val();
			$('.imgrealbig').attr('src', img);
		});
    });
JS
);