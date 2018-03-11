<?php 

namespace frontend\widgets;

use yii\base\Widget;
use yii\helpers\Html;
use backend\models\Banner;
use backend\models\Category;

class SideMenu extends Widget
{

	public function init()
	{
		parent::init();
	}

	public function run()
	{
		$cate = new Category();
		$data['cate'] = $cate->getAllCateRoot();
		return $this->render('SideMenu', ['data'=>$data]);
	}
}

?>