<?php 

namespace frontend\widgets;

use yii\base\Widget;
use yii\helpers\Html;
use common\models\LoginCustomer;
use frontend\models\SignupCustomer;

class Modal extends Widget
{

	public function init()
	{
		parent::init();
	}

	public function run()
	{
		$login = new LoginCustomer();
		$signup = new SignupCustomer();
		return $this->render('Modal', [
			'login' => $login,
			'signup' => $signup,
		]);
	}
}

?>