<?php
/* @var $this yii\web\View */
use yii\helpers\Url;
$baseUrl =  str_replace('/backend/web', '', Yii::$app->getUrlManager()->getBaseUrl());
// echo Yii::$app->getUrlManager()->getBaseUrl();
//   echo $_SERVER['PHP_SELF'];
//  echo $baseUrl ;
?>
<div class="card">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h3 class="panel-title">Quản lý File Manager</h3>
		</div>
		<div class="panel-body">
			<iframe src="<?php echo $baseUrl ?>/file/dialog.php?akey=MUFRYlNHa2xEcxQlHBAcH0YwDhcfM101eHglMmcuJj9Wd2gFCxMYLw" width="100%" height="650px" style="border: none;"></iframe>
		</div>
	</div>
</div>
