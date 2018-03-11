<?php 
namespace frontend\components;
use backend\models\Product;
use Yii;
/**
* 
*/
class Compare
{	
	
	public $comparestore;
	public function __construct()
	{
		$this->comparestore = Yii::$app->session['compare'];
		// var_dump($this->comparestore);	
	}

	public function addcompare($data)
	{
		$id = $data->id;
		$this->comparestore[$id] = $data;
		Yii::$app->session['compare'] = $this->comparestore;
		// var_dump(Yii::$app->session['compare']);
	}

	public function removecompare($id)
	{
		unset($this->comparestore[$id]);
		Yii::$app->session['compare'] = $this->comparestore;
	}

	
}
