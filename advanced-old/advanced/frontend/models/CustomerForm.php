<?php
namespace frontend\models;

use yii\base\Model;
use common\models\Customer;

/**
 * Signup form
 */
class CustomerForm extends Model
{
    public $username;
    public $email;
    public $fullname;
    public $phone;
    public $address;
    public $password;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required', 'message' => '{attribute} không được để trống.'],
            ['username', 'unique', 'targetClass' => '\common\models\Customer', 'message' => 'Tên Username đã tồn tại.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required', 'message' => '{attribute} không được để trống.'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\Customer', 'message' => 'Email đã tồn tại.'],
            ['phone', 'trim'],
            ['phone', 'required', 'message' => '{attribute} không được để trống.'],
            ['phone', 'integer'],
            ['phone', 'string', 'min' => 10, 'max' => 11],
            ['phone', 'unique', 'targetClass' => '\common\models\Customer', 'message' => 'Số điện thoại đã tồn tại.'],

            ['fullname', 'trim'],
            ['fullname', 'required', 'message' => '{attribute} không được để trống.'],
            ['fullname', 'string', 'max' => 255],
           

            ['address', 'trim'],
            ['address', 'required', 'message' => '{attribute} không được để trống.'],
            ['address', 'string', 'max' => 255],
            


            ['password', 'required', 'message' => '{attribute} không được để trống.'],
            ['password', 'string', 'min' => 6],
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }
        
        $user = new Customer();
        $user->username = $this->username;
        // var_dump($user->username);
        $user->fullname = $this->fullname;
        $user->email = $this->email;
        $user->phone = $this->phone;
        $user->address = $this->address;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        
        return $user->save() ? $user : null;
    }
}
