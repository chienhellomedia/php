<?php 
 ?>
<div class="container" style="margin-top: 20px;">
		<div class="panel panel-info">
			<div class="panel-heading">
				<h3 class="panel-title">Hình ảnh thực tế</h3>
			</div>
			<div class="panel-body">
				<ul class="gallery clearfix">
					<?php foreach ($data as $value): ?>
					<li style="float:left !important; margin: 10px; display: block; width: 23% !important">
						<a href="<?php echo Yii::$app->params['homepath'].$value->big ?>" rel="prettyPhoto[gallery2]" title="">
							<img src="<?php echo Yii::$app->params['homepath'].$value->small ?>" alt="" style="display: block; width: 100%; height: 200px;"/>
						</a>
					</li>
					<?php endforeach ?>
					
				</ul>
			</div>
		</div>
</div>