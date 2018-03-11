<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "customer".
 *
 * @property integer $id
 * @property string $username
 * @property string $fullname
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property string $phone
 * @property string $address
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 */
class Customer extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $password;
    public $username;
    public static function tableName()
    {
        return 'customer';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
        [['username', 'fullname', 'password', 'email', 'phone', 'address', 'created_at', 'updated_at'], 'required'],
        [['status', 'created_at', 'updated_at'], 'integer'],
        [['username', 'fullname', 'password_hash', 'password_reset_token', 'email', 'address'], 'string', 'max' => 255],
        [['auth_key'], 'string', 'max' => 32],
        [['phone'], 'string', 'max' => 11],
        [['username'], 'unique'],
        [['email'], 'unique'],
        [['phone'], 'unique'],
        [['password_reset_token'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
        'id' => 'ID',
        'username' => 'Username',
        'fullname' => 'Fullname',
        'auth_key' => 'Auth Key',
        'password_hash' => 'Password Hash',
        'password_reset_token' => 'Password Reset Token',
        'email' => 'Email',
        'phone' => 'Phone',
        'address' => 'Address',
        'status' => 'Status',
        'created_at' => 'Created At',
        'updated_at' => 'Updated At',
        ];
    }

    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    public function getAsssigns(){
        // get với mảng trả về nhiều giá trị
        return $this->hasMany(AuthAssignment::className(),['user_id'=>'id']);
    }

    
}
