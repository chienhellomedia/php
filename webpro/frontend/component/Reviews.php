<?php 
namespace frontend\component;
use yii\web\Session;
use backend\models\Comments;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use Yii;
/**
* 
*/
class Reviews 
{
	
	function __construct()
	{
		// 
	}
	public static function Reviewscount ($table, $slug)
	{
		$session = Yii::$app->session;
		$session['time'] = time();
		// var_dump($session['time']);
		if (!empty($slug)) {
			if (!isset($session['blog']) || $session['blog'] != $slug) {

				$connection = Yii::$app->db;
				$command = $connection
				->createCommand('UPDATE '.$table.' SET reviews = reviews + 1 WHERE slug="'.$slug.'"');
				$command->execute();

				$session['blog'] = $slug;
		// print_r($session); die;
				if (time() - $session['time'] >= 3600) {
					unset($session['blog']);
			// $session->destroy();
				}
			}
		}
	}
}