<?php 
namespace backend\helpers;
use backend\modules\qldmc\models\Batch;

class Query
{
	
	function batch()
	{
		$model = Batch::find()->all();
		return $model;
	}
}
?>