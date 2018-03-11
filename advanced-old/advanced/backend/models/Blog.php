<?php

namespace backend\models;

use Yii;
use yii\data\Pagination;
/**
 * This is the model class for table "blog".
 *
 * @property integer $id
 * @property string $title
 * @property string $image
 * @property string $shorttitle
 * @property string $content
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 */
class Blog extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'blog';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
       return [
       [['title', 'slug', 'image', 'shorttitle', 'content', 'created_at', 'updated_at'], 'required'],
       [['shorttitle', 'content'], 'string'],
       [['status', 'created_at', 'updated_at'], 'integer'],
       [['title', 'slug', 'image'], 'string', 'max' => 255],
       ];
   }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
        'id' => 'ID',
        'title' => 'Tiêu đề',
        'slug' => 'Tiêu đề không dấu',
        'image' => 'Hình ảnh',
        'shorttitle' => 'Mô tả ngắn',
        'content' => 'Nội dung',
        'status' => 'Trạng thái',
        'created_at' => 'Ngày tạo',
        'updated_at' => 'Ngày cập nhật',
        ];
    }



    public function getAllBlog()
    {
        $pages = $this->getAllBlogpage();
        $data = Blog::find()->where(['status'=>10])->offset($pages->offset)
        ->limit($pages->limit)->all();
        return $data;
    }
    public function getAllBlogpage()
    {
        $data = Blog::find()->where(['status'=>10])->all();
        $pages = new Pagination(['totalCount' => count($data), 'pageSize' => '3']);
        return $pages; 
    }

//tìm kiếm bài viết
    public function getAllBlogSearch($name)
    {
        $pages = $this->getAllBlogSearchPage($name);
        $data = Blog::find()->where(['status'=>10])->andWhere(['like', 'title', $name])->offset($pages->offset)
        ->limit($pages->limit)->all();
        return $data;
    }
    public function getAllBlogSearchPage($name)
    {
        $data = Blog::find()->where(['status'=>10])->andWhere(['like', 'title', $name])->all();
        $pages = new Pagination(['totalCount' => count($data), 'pageSize' => '3']);
        return $pages; 
    }
//tìm kiếm bài viết

    public function getBlogrecent()
    {
        $data = Blog::find()->where(['status'=>10])->orderBy(['id'=>SORT_DESC])->limit(2)->all();
        return $data;
    }
    public function getDetail($id)
    {
        $data = Blog::find()->where(['status'=>10, 'slug'=>$id])->one();
        return $data;
    }
}
