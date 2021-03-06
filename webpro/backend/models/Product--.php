<?php

namespace backend\models;

use Yii;
use yii\imagine\Image;

/**
php composer.phar require sadovojav/yii2-image-thumbnail "dev-master"
 * This is the model class for table "product".
 *
 * @property integer $id
 * @property string $name
 * @property string $image
 * @property double $price
 * @property string $content
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // [['name', 'image', 'price', 'content', 'created_at', 'updated_at'], 'required'],
            [['price'], 'number'],
            [['content'], 'string'],
            [['status', 'created_at', 'updated_at'], 'integer'],
            [['name', 'images'], 'string', 'max' => 255],
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
            'images' => 'Images',
            'price' => 'Price',
            'content' => 'Content',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
    /**
     * @inheritdoc
     */
    public function saveData($model, $post) {
        /* @var $model app\modules\app90phut\models\News */
            
        if ($model->images != null && $model->images != "") {
            $string_img = $post["Product"]["images"];
            // print_r($string_img);
            // $postcat = $post["News"]["cat_id"];
            // $cat = Category::findOne(['id'=>$postcat]);
            
            // $cat1 = Category::findOne(['id'=>$cat->parent]);

            $filename = $this->uploadBase64("uploads/images/", $string_img, 460, 300);
            if ($filename) {

                $model->images = $filename;
        
            }
          
        }
          return 0;
    }

    public function uploadBase64($path, $base64Img, $width, $height) {
        $strSplit = explode("}}}", $base64Img);
        if (count($strSplit) == 2) {
            $fileNameAll = $strSplit[0];
            
            $extFile = substr($fileNameAll, strrpos($fileNameAll, '.') + 1);
            $fileName = str_replace("." . $extFile, "", $fileNameAll) . time() . rand(0, 10) . "." . $extFile;
            
            $strBase64Img = explode("base64,", $strSplit[1]);
            $base64Decode = base64_decode($strBase64Img[1]);

            
          
            $this->mkdir(upload_path.'/'.$path . '/');
            $path = $path . date("Y/m");
            
            $path = upload_path.'/'.$path .'/';

            $filegetimg = explode(".",$fileName);
            
             $fileName = $this->makeAlias($filegetimg[0]);

             $fileName = $fileName.'.'.$filegetimg[1];

            file_put_contents($path  . $fileName, $base64Decode);
           
            $file = $path . "/" . $fileName;

             if ($width < 99999) {
                Image::thumbnail($file, $width, $height)->save($file, ['quality' => 100]);
            }
            return "uploads/images/".date("Y/m").'/'.$fileName;

        } else
            return false;
    }

      public function mkdir($path) {

        if (!is_dir($path . date("Y"))) {
            mkdir($path . date("Y"), 0777, true);
        }

        if (!is_dir($path . date("Y/m"))) {
            mkdir($path . date("Y/m"), 0777, true);
        }
    }
    public function makeAlias($str, $lowerCase = true) {
        $search = array(
            '#(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)#',
            '#(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)#',
            '#(ì|í|ị|ỉ|ĩ)#',
            '#(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)#',
            '#(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)#',
            '#(ỳ|ý|ỵ|ỷ|ỹ)#',
            '#(đ)#',
            '#(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)#',
            '#(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)#',
            '#(Ì|Í|Ị|Ỉ|Ĩ)#',
            '#(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)#',
            '#(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)#',
            '#(Ỳ|Ý|Ỵ|Ỷ|Ỹ)#',
            '#(Đ)#',
            "/[^a-zA-Z0-9\-\_]/",
        );
        $replace = array(
            'a',
            'e',
            'i',
            'o',
            'u',
            'y',
            'd',
            'A',
            'E',
            'I',
            'O',
            'U',
            'Y',
            'D',
            '-',
        );
        $str = preg_replace($search, $replace, $str);
        $str = preg_replace('/(-)+/', '-', $str);
        $str = preg_replace('/^-+|-+$/', '', $str);
        if ($lowerCase)
            $str = strtolower($str);
        return $str;
    }
    
    
    function catchuoi($chuoi,$gioihan){ 

        if(strlen($chuoi)<=$gioihan) 
        { 
            return $chuoi; 
        } 
        else{ 
            $new_txt =substr($chuoi,0,$gioihan); 
            $new_txt =substr($chuoi,0,strrpos($new_txt," ")); 

            return $new_txt.'...' ; 
        }
    }
}