<?php

namespace backend\models;
use backend\models\AuthAssignment;

use Yii;

/**
 * This is the model class for table "member".
 *
 * @property integer $id
 * @property string $username
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
class Member extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $password;
    public $asssigns;
    public $permission;
    public $permission_assined;
    public static function tableName()
    {
        return 'member';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
        [['username', 'password','fullname', 'email', 'phone', 'address', 'created_at', 'updated_at'], 'required'],
        [['status', 'created_at', 'updated_at'], 'integer'],
        [['username','fullname', 'password_hash', 'password_reset_token', 'email', 'phone', 'address'], 'string', 'max' => 255],
        [['auth_key'], 'string', 'max' => 32],
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
        'fullname' => 'Họ tên',
        'auth_key' => 'Auth Key',
        'password_hash' => 'Password Hash',
        'password_reset_token' => 'Password Reset Token',
        'email' => 'Email',
        'phone' => 'Phone',
        'address' => 'Address',
        'status' => 'Trạng thái',
        'created_at' => 'Ngày tạo',
        'updated_at' => 'Ngày sửa',
        ];
    }

    public function getAsssignss(){
        // get với mảng trả về nhiều giá trị
        return $this->hasMany(AuthAssignment::className(),['user_id'=>'id']);
    }

    public function add_per($data){
        $flag = false;
        foreach ($data as $per_name) {
            $old_per = AuthAssignment::findone(['item_name'=>$per_name,'user_id'=>$this->id]);

            $model  = new AuthAssignment;
            $model->user_id = $this->id;
            $model->item_name = $per_name;
            // echo $per_name; die;
            $model->created_at = time();
            if(!$old_per){
                // var_dump($model->item_name);die;
                $model->save();
                $flag = true;
            }else{
                $flag = false;
            }            
        }

        return $flag;
    }


    public function remove_per($data){
        foreach ($data as $per_name) {
            $old_per = AuthAssignment::findone(['item_name'=>$per_name,'user_id'=>$this->id]);
            var_dump($old_per);
            if ($old_per) {
              $old_per->delete();
          }
      }
  }


  public function beforeDelete(){

    $assign = AuthAssignment::find()->where(['user_id'=>$this->id])->all();
    if($assign){
       foreach($assign as $ass){
        $ass->delete();
    }
}       
return parent::beforeDelete();
}

}
