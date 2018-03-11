<div class="container">
	<?php 
	foreach ($data as $value) :
	 ?>
	<img src="<?php echo Yii::$app->params['homepath'].$value->images ?>" alt="" style="width: 80%; margin: 0 auto; display: block">
	<?php endforeach; ?>
</div>