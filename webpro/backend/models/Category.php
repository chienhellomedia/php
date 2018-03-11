<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "category".
 *
 * @property integer $id
 * @property string $name
 * @property string $slug
 * @property integer $parent
 * @property string $description
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'slug', 'description', 'created_at', 'updated_at'], 'required'],
            [['parent', 'status', 'created_at', 'updated_at'], 'integer'],
            [['name', 'slug', 'description'], 'string', 'max' => 255],
            [['name'], 'unique'],
            [['slug'], 'unique'],
            [['description'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Tên',
            'slug' => 'Slug',
            'parent' => 'Danh mục cha',
            'description' => 'Description',
            'status' => 'Trạng thái',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public $data;
    public function getCategoryParent($parent = 0, $level = '')
    {
        $result = Category::find()->where(['parent'=>$parent])->all();
        $level .='--| ';
        foreach ($result as $value) {
         if($parent == 0) {
            $level = '';
        }
        $this->data[$value->id] = $level.$value->name;
        $this->getCategoryParent($value->id, $level);
    }
    return $this->data;    
}

    /*
    lấy ra tất cả danh mục có parent = 0
    */
    public function getAllCateRoot($parent = 0) {
        $data = Category::find()->where(['status'=>10, 'parent'=>$parent])->all();
        return $data;
    }

    public function getNamParent(){
        $model = Category::find()->where(["id" => 'parent'])->one();
        if(!empty($model)){
            return $model->name;
        }

        return null;
    }

}
