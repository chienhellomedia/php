<?php

namespace backend\models;

use Yii;
use yii\imagine\Image;
use backend\models\Category;
use backend\models\Wishlist;
use yii\db\Query;
use yii\data\Pagination;
/**
 * This is the model class for table "product".
 *
 * @property integer $id
 * @property string $name
 * @property string $slug
 * @property string $images
 * @property integer $cate_id
 * @property double $price
 * @property double $pricesale
 * @property string $pricelist
 * @property double $saleoff
 * @property string $startsale
 * @property string $endsale
 * @property string $desc
 * @property string $content
 * @property integer $new
 * @property integer $bestseller
 * @property integer $featured
 * @property integer $instock
 * @property integer $status
 * @property string $tagproduct
 * @property integer $reviews
 * @property integer $created_at
 * @property integer $updated_at
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $images_detail;
    public $img_detail;
    public $qtt;
    public $pricereal;
    
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
            [['name', 'images', 'cate_id', 'price', 'pricelist', 'desc', 'content'], 'required'],
            [['cate_id', 'new', 'bestseller', 'featured', 'instock', 'status', 'reviews', 'created_at', 'updated_at', 'hotdeal'], 'integer'],
            [['price', 'pricesale', 'saleoff'], 'number'],
            [['startsale', 'endsale'], 'safe'],
            [['desc', 'content'], 'string'],
            [['name', 'slug', 'images', 'pricelist', 'tagproduct'], 'string', 'max' => 255],
            [['name'], 'unique'],
            [['slug'], 'unique'],
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
            'images' => 'Hình ảnh',
            'cate_id' => 'Danh mục cha',
            'price' => 'Giá',
            'saleoff' => '% giảm giá',
            'pricesale' => 'Giá giảm',
            'pricelist' => 'Đơn vị giá',
            'startsale' => 'Startsale',
            'endsale' => 'Endsale',
            'desc' => 'Mô tả',
            'content' => 'Nội dung',
            'new' => 'Sp mới',
            'bestseller' => 'Sp bán chạy',
            'featured' => 'Sp nổi bật',
            'instock' => 'Còn/hết Sp',
            'tagproduct' => 'Tag sản phẩm',
            'reviews' => 'Lượt xem',
            'hotdeal' => 'Ưu đãi',
            'status' => 'Trạng thái',
            'created_at' => 'Ngày tạo',
            'updated_at' => 'Ngày cập nhật',
        ];
    }
    public function saveData($model, $post) {
        /* @var $model app\modules\app90phut\models\News */
        if ($model->images != null && $model->images != "") {
            $string_img = $post["Product"]["images"];
            $filename = $this->uploadBase64("uploads/images/products/", $string_img, 300, 327);

            if ($filename) {
                return $filename;
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
            $path = $path . date("Y");
            
            $path = upload_path.'/'.$path .'/';

            $filegetimg = explode(".",$fileName);
            
            $fileName = $this->makeAlias($filegetimg[0]);

            $fileName = $fileName.'.'.$filegetimg[1];

            file_put_contents($path  . $fileName, $base64Decode);

            $file = $path . "/" . $fileName;

            if ($width < 99999) {
                Image::thumbnail($file, $width, $height)->save($file, ['quality' => 100]);
            }
            return "uploads/images/products/".date("Y").'/'.$fileName;

        } else
        return false;
    }

    public function mkdir($path) {

        if (!is_dir($path . date("Y"))) {
            mkdir($path . date("Y"), 0777, true);
        }

        // if (!is_dir($path . date("Y/m"))) {
        //     mkdir($path . date("Y/m"), 0777, true);
        // }
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

    public function getProductRelation ()
    {
      return $this->hasOne(Category::className(),['id'=>'cate_id']);
      }

    public function getAllNewProduct () {
        return Product::find()->where(['status'=>10, 'instock'=>10, 'new'=>10])->all();
    }

    Public function getAllProductHotDeal () {
        $rows = (new Query())
        ->select('*')
        ->from('Product')
        ->where(['status'=>10, 'instock'=>10, 'hotdeal'=>10])->andWhere(['>', 'saleoff', 0])
        ->all();
        return $rows;
    }

    public function getAllProductFeatured () {
       $rows = (new Query())
       ->select('*')
       ->from('Product')
       ->where(['status'=>10, 'instock'=>10, 'featured'=>10])
       ->all();
       return $rows;
    }
    public function getAllProductSeller () {
       $rows = (new Query())
       ->select('*')
       ->from('Product')
       ->where(['status'=>10, 'instock'=>10, 'bestseller'=>10])
       ->all();
       return $rows;
    }

    public function getOneProduct($id) {
        return $data = Product::find()->where(['id'=>$id, 'status'=>10, 'instock'=>10])->one();
    }

    public function getAllProductBySlug ($id) {
      $pages = $this->getAllProductBySlugPage($id);
      return $data = Product::find()->where(['cate_id'=>$id, 'status'=>10, 'instock'=>10])->offset($pages->offset)
      ->limit($pages->limit)->all();
    }
    public function getAllProductBySlugPage($id)
    {
      $data = Product::find()->where(['cate_id'=>$id, 'status'=>10, 'instock'=>10])->all();
      $pages = new Pagination(['totalCount' => count($data), 'defaultPageSize' => '9']);
      return $pages; 
    }

    public function getOneProductBySlug($id) {
       return $data = Product::find()->where(['slug'=>$id, 'status'=>10, 'instock'=>10])->one();
    }

    public function getAllProductdetailRand () {
      return $data = Product::find()->where(['status'=>10, 'instock'=>10])->orderBy('rand()')->limit(10)->all();
    } 

    public function getProSepcialoffer() {
       return $data = Product::find()->where(['cate_id'=>9, 'status'=>10])->orwhere(['cate_id'=>8])->all();
    }
    public function getAllProductByPrice($id, $pone, $ptwo) {
     $pages = $this->getAllProductByPricepage($id, $pone, $ptwo);
     return $data = Product::find()->where(['cate_id'=>$id, 'status'=>10, 'instock'=>10])->andWhere(['>=', 'price', $pone])->andWhere(['<=', 'price', $ptwo])->offset($pages->offset)
     ->limit($pages->limit)->all();
    }
   

    public function getAllProductByPricepage($id, $pone, $ptwo) {
     $data = Product::find()->where(['cate_id'=>$id, 'status'=>10, 'instock'=>10])->andWhere(['>=', 'price', $pone])->andWhere(['<=', 'price', $ptwo])->all();
     return $pages = new Pagination(['totalCount' => count($data), 'defaultPageSize' => '9']);
    }

    public function getAllProductSearch ($name) {
    $pages = $this->getAllProductBySlugPage($name);
    return $data = Product::find()->where(['status'=>10, 'instock'=>10])->andWhere(['like', 'name', $name])->offset($pages->offset)
    ->limit($pages->limit)->all();
  }
  public function getAllProductSearchPage($name)
  {
    $data = Product::find()->where(['status'=>10, 'instock'=>10])->andWhere(['like', 'name', $name])->all();
    $pages = new Pagination(['totalCount' => count($data), 'defaultPageSize' => '9']);
    return $pages; 
  }


}
