<?php 
namespace frontend\component;
use backend\models\Product;
use Yii;
/**
* 
*/
class Cart
{	
	public $cartstore;
	public $getCost = 0;

	public function __construct()
	{
		$this->cartstore = Yii::$app->session['cart'];
		$this->getCost = $this->getCost();
	}

	public function add($data, $quantity = 1, $price)
	{
		// var_dump($data->id);die;
		$id = $data->id;
		if (isset($this->cartstore[$id])) {
			if ($quantity <= 0 || !is_numeric($quantity)) {
				// $this->remove($id);
				$this->cartstore[$id]->qtt = $quantity;
			}else{				
				$this->cartstore[$id]->qtt += $quantity;				
			}
		} else {

			$this->cartstore[$id] = $data;
			$this->cartstore[$id]->qtt = $quantity;			
			$this->cartstore[$id]->pricereal = $price;			
		}

		Yii::$app->session['cart'] = $this->cartstore;
		// var_dump($this->cartstore);
	}

	public function remove($id)
	{
		unset($this->cartstore[$id]);
		Yii::$app->session['cart'] = $this->cartstore;
	}

	// public function apdate($id, $quantity)
	// {
	// 	$this->cartstore[$id]->qtt = $quantity;
	// 	Yii::$app->session['cart'] = $this->cartstore;
	// } 
	public function update($id,$quantity){
		// $cart_id = $id.'-'.$size.'-'.$color;
		// echo $id;
		if ($quantity > 0 && is_numeric($quantity)) {
			// echo $quantity;
			$this->cartstore[$id]->qtt = $quantity;
			Yii::$app->session['cart'] = $this->cartstore;
			// var_dump($quantity);
		}
		else{
			// $data = ['id'=>$id];
			$this->remove($id);	
		}
	}

	public function getCost()
	{
		if ($this->cartstore) {
			foreach ($this->cartstore as $item) {
					$this->getCost += $item->qtt * $item->pricereal;
			}
		}
		return $this->getCost;
	}
	public function getTotalItem()
	{
		$total = 0;
		if ($this->cartstore) {
			foreach ($this->cartstore as $item) {
				$total += $item->qtt;
			}
		}
		return $total;
	} 

	public function removeAll()
	{
		$this->cartstore = [];
		Yii::$app->session['cart'] = $this->cartstore;
	}
	
}
