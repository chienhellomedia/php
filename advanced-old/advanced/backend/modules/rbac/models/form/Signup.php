<?php
namespace backend\modules\rbac\models\form;

use Yii;
use backend\modules\rbac\models\User;
use yii\base\Model;

/**
 * Signup form
 */
class Signup extends Model
{
    public $username;
    public $email;
    public $password;
    public $confirm_password;
    public $khoa;
    public $display_name;
    public $type;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'filter', 'filter' => 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => 'backend\modules\rbac\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'unique', 'targetClass' => 'backend\modules\rbac\models\User', 'message' => 'This email address has already been taken.'],

            ['password', 'required'],
            ['confirm_password', 'required'],
            ['password', 'string', 'min' => 6],
            ['confirm_password', 'compare','compareAttribute'=>'password'],
            ['khoa', 'trim'],
            ['display_name', 'required'],
            ['type', 'required'],


        ];
    }
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'username' => Yii::t('app', 'Mã cán bộ'),
            'email' => Yii::t('app', 'Email'),
            'password' => Yii::t('app', 'Mật khẩu'),
            'confirm_password' => Yii::t('app', 'Nhập lại mật khẩu'),
            'khoa' => Yii::t('app', 'Tên khoa'),
            'display_name' => Yii::t('app', 'Họ và tên'),
            'type' => Yii::t('app', 'Chức vụ'),
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if ($this->validate()) {
            $user = new User();
            $user->username = $this->username;
            $user->email = $this->email;
            $user->display_name = $this->display_name;
            $user->khoa = $this->khoa;
            $user->type = $this->type;
            $user->setPassword($this->password);
            $user->generateAuthKey();
            if ($user->save()) {
                return $user;
            }
        }

        return null;
    }
}
