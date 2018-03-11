<?php
namespace frontend\models;

use yii\base\Model;
use common\models\Customer;

/**
 * Signup form
 */
class SignupCustomer extends Model
{
    public $fullname;
    public $phone;
    public $email;
    public $password;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [

            ['email', 'trim'],
            ['email', 'required', 'message' => 'không được trống.'],
            ['email', 'email', 'message' => 'nhập đúng định dạng email.'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\Customer', 'message' => 'Email đã tồn tại.'],

            ['password', 'required', 'message' => 'không được trống.'],
            ['password', 'string', 'min' => 6, 'message' => 'Ít nhất 6 ký tự.'],

            ['fullname', 'required', 'message' => 'Họ tên không được trống.'],
            ['fullname', 'trim'],
            ['fullname', 'string', 'max' => 255],

            ['phone', 'trim'],
            ['phone', 'required', 'message' => 'không được trống.'],
            ['phone', 'integer', 'message' => 'nhập đúng số điện thoại'],
            ['phone', 'string', 'min' => 10, 'max'=>11, 'message' => 'nhập đúng số điện thoại'],
            ['phone', 'unique', 'targetClass' => '\common\models\Customer', 'message' => 'Số điện thoại đã tồn tại.'],
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
        $user->fullname = $this->fullname;
        $user->email = $this->email;
        $user->phone = $this->phone;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        
        return $user->save() ? $user : null;
    }
}
