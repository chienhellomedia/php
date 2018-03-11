<?php

namespace backend\models;

use Yii;
use backend\models\Customer;

/**
 * This is the model class for table "comments".
 *
 * @property integer $id
 * @property string $table
 * @property string $id_comment
 * @property integer $parent
 * @property string $content
 * @property integer $cus_id
 * @property integer $readcomment
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 */
class Comments extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'comments';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['content'], 'required', 'message'=>'Không được để trống'],
            [['parent', 'cus_id', 'readcomment', 'status'], 'integer'],
            [['content'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['table'], 'string', 'max' => 32],
            [['id_comment'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'table' => 'Table',
            'id_comment' => 'Id Comment',
            'parent' => 'Parent',
            'content' => 'Nội dung',
            'cus_id' => 'Cus ID',
            'readcomment' => 'Readcomment',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
    public function getComment () {
        return $this->hasMany(Customer::className(),['id'=>'cus_id']);
    }

    public function getChildComment ($parent) {
       return $data = Comments::find()
       ->where(['parent'=>$parent])
       ->orderBy(['id'=>SORT_DESC])->all();
   } 
   public function getChildCount ($parent) {
       return $data = Comments::find()
       ->where(['parent'=>$parent])
       ->count();
   }

   public function getParentcomment($table, $slug, $page) {
    return $data = comments::find()->where(['table'=>$table, 'id_comment'=>$slug,'parent'=>0])
            ->OrderBy(['id'=>SORT_DESC])
            ->limit(3)->offset($page)->all();
   }
}
