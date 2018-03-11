<?php

namespace backend\models;

use Yii;
use yii\imagine\Image;

/**
 * This is the model class for table "imagesreal".
 *
 * @property integer $id
 * @property string $small
 * @property string $big
 */
class Imagesreal extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'imagesreal';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // [['small', 'big'], 'required'],
            // [['small', 'big'], 'string', 'max' => 255],
            [['small', 'big'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'small' => 'Hình ảnh nhỏ',
            'big' => 'Hình ảnh lớn',
        ];
    }
    public function saveData($model, $post) {
        /* @var $model app\modules\app90phut\models\News */
        if ($model->small != null && $model->small != "") {
            $string_img = $post["Imagesreal"]["small"];

            $filename = $this->uploadBase64("uploads/images/", $string_img, 200, 266);
            if ($filename) {
                $model->small = $filename;
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
        return $base64Img;
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

    public function getAllimgreal() {
        return $data = Imagesreal::find()->all();
    }
}
