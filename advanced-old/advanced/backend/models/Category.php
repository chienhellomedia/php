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
 * @property string $icon
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
            [['name', 'slug','status', 'description', 'created_at', 'updated_at'], 'required'],
            [['parent', 'status', 'created_at', 'updated_at'], 'integer'],
            [['name', 'slug', 'icon', 'description'], 'string', 'max' => 255],
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
            'name' => 'Name',
            'slug' => 'Slug',
            'parent' => 'Parent',
            'icon' => 'Icon',
            'description' => 'Description',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
    /*try vấn đệ quy*/
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

    /*lấy ra tất cả danh mục có parent = 0*/
    public function getAllCateRoot($parent = 0) {
        $data = Category::find()->where(['status'=>10, 'parent'=>$parent])->all();
        return $data;
    }
    
}
