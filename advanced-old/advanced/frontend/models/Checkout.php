<?php

namespace frontend\models;
use Yii;
use yii\base\Model;
use backend\models\Order;
use backend\models\Orderdetail;
use frontend\components\Cart;
/**
 * ContactForm is the model behind the contact form.
 */
class Checkout extends Model
{

    public $fullname;
    public $email;
    public $mobile;
    public $addess;
    public $fullname_ship;
    public $email_ship;
    public $mobile_ship;
    public $addess_ship;
    public $request;
    public $payment_id;
    public $delivery_id;
    public $total;



    /**
     * @inheritdoc
     */
    public function rules()
    {

        return [
        [['fullname', 'email', 'mobile', 'addess', 'fullname_ship', 'email_ship', 'mobile_ship', 'addess_ship'], 'string'],
        [['fullname', 'email', 'mobile', 'addess', 'fullname_ship', 'email_ship', 'mobile_ship', 'addess_ship'], 'required','message'=>'{attribute} không được để trống'],
        [['fullname', 'email', 'addess', 'fullname_ship', 'email_ship', 'addess_ship','request'], 'string'],
        [['email','email_ship'], 'email','message'=>'{attribute} Không đúng định dạng email'],
        [['mobile','mobile_ship','payment_id','delivery_id'], 'integer','message'=>'{attribute} Không được để trống.'],
        [['total'], 'number'],

        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
        'fullname' => 'Họ Tên người mua',
        'email' => 'Email người mua',
        'mobile' => 'Điện thoại người mua',
        'addess' => 'Địa chỉ người mua',
        'fullname_ship' => 'Họ Tên người nhận',
        'email_ship' => 'Email người nhận',
        'mobile_ship' => 'Điện thoại người nhận',
        'addess_ship' => 'Địa chỉ người nhận',
        'request' => 'Yêu cầu',
        'payment_id' => 'Phương thức thanh toán',
        'delivery_id' => 'Phương thức giao hàng',
        ];
    }
    // public function customer() 
    // {
    //     if (!$this->validate()) {
    //         return null;
    //     }
    //     $cus = new Customer;
    //     $cus->username = $this->email;        
    //     $cus->full_name = $this->full_name;        
    //     $cus->email = $this->email;
    //     $cus->phone = $this->phone;
    //     $cus->created_at = time();
    //     $cus->updated_at = time();
    //     $cus->status = 1;
    //     $cus->username = $this->email;
    //     $cus->setPassword('123456');
    //     $cus->generateAuthKey();

    //     // $cus->auth_key = 'username';
    //     // $cus->password_hash = 'username';

    //     return $cus->save() ? $cus : null;
    // }
    public function order()
    {
        if (!$this->validate()) {
            return null;
        }

        $order = new Order;
        if (isset(Yii::$app->user->identity->id)) {
            $order->cus_id = Yii::$app->user->identity->id;
        }else{
            $order->cus_id = "";
        }
        $order->fullname = $this->fullname;
        $order->email = $this->email;
        $order->mobile = $this->mobile;
        $order->addess = $this->addess;
        $order->fullname_ship = $this->fullname_ship;
        $order->email_ship = $this->email_ship;
        $order->mobile_ship = $this->mobile_ship;
        $order->addess_ship = $this->addess_ship;
        $order->request = $this->request;
        $order->total = $this->total;
        $order->payment_id = $this->payment_id;
        $order->delivery_id = $this->delivery_id;
        $order->status = 0;
        $order->created_at = time();
        // echo '<pre>';
        // var_dump($order);        
        return $order->save() ? $order : false;
    }

    public function orderdetail($order_id)
    {
        $date = date('Y-m-d');
        $flag = false;

        $cart = new Cart;
        $cartstore = $cart->cartstore;        
        $cost = $cart->getCost;

        if (!$this->validate()) {
            return null;
        }
        // var_dump($cartstore);die;
        foreach ($cartstore as $item) {
             // echo  $item->price;die;
            $orderIt = new Orderdetail;
            $orderIt->order_id = $order_id;
            $orderIt->product_id = $item->id;
            if ($date >= $item->startsale && $date <= $item->endsale && $item->pricesale != NULL) {
                $orderIt->price = $item->pricesale;
            } else {
                $orderIt->price = $item->price;                
            }

            $orderIt->quantity = $item->qtt;
            // $orderIt->size = $item->size_id;
            // $orderIt->color = $item->color_id;
            $orderIt->status = 0;
            $orderIt->created_at = time();

            if ($orderIt->save()) {
                $flag = true;
            }

            // var_dump($orderIt->getErrors()); die;
        }
        return $flag;
    }

    public function sendEmail($email,$id)
    {
        // $cus = Customer::findOne(['id'=>$id]);
        $order = Order::findOne(['id'=>$id]);
        $orderitem = Orderdetail::find()->where(['order_id'=>$order->id])->all();
        // var_dump($orderitem);
        return Yii::$app->mailer->compose(
            [
            'html' => 'order-html',

            ],
            ['order' => $order,'orderitem'=>$orderitem]
            )
        ->setTo([$this->email => $this->fullname])
        ->setFrom($email)
        ->setSubject('Đặt hàng thành công')
        ->send();
    }



}
