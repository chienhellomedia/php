<?php

namespace backend\models;

use Yii;
use backend\models\Category;
use backend\models\Images;
use yii\data\Pagination;

/**
 * This is the model class for table "product".
 *
 * @property integer $id
 * @property string $name
 * @property string $slug
 * @property string $image
 * @property integer $cate_id
 * @property double $price
 * @property double $pricesale
 * @property string $pricelist
 * @property double $saleoff
 * @property string $startsale
 * @property string $endsale
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
    public $qtt;
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
      [['name', 'slug', 'image', 'cate_id', 'price', 'pricelist', 'desc', 'content', 'created_at', 'status', 'updated_at'], 'required'],
      [['cate_id', 'new', 'bestseller', 'featured', 'hotdeals', 'sepcialoffer', 'instock', 'status', 'created_at', 'updated_at'], 'integer'],
      [['price', 'pricesale', 'saleoff'], 'number'],
      [['startsale', 'endsale'], 'safe'],
      [['content', 'desc'], 'string'],
      [['name', 'slug', 'image', 'pricelist'], 'string', 'max' => 255],
      [['name'], 'unique'],
      [['slug'], 'unique'],
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
      'name' => 'Tên Sản phẩm',
      'slug' => 'Đường dẫn tĩnh',
      'image' => 'Hình ảnh',
      'cate_id' => 'Danh mục cha',
      'price' => 'Giá',
      'pricesale' => 'Giá giảm',
      'pricelist' => 'Đơn vị giá',
      'saleoff' => 'Phần trăm giảm giá (%)',
      'startsale' => 'Ngày bắt đầu (Năm/tháng/ngày)',
      'endsale' => 'ngày kết thúc (Năm/tháng/ngày)',
      'desc' => 'Mô tả ngắn cho sản phẩm',
      'content' => 'Nội dung',
      'new' => 'Sản phẩm mới',
      'bestseller' => 'Sản phẩm bán chạy',
      'featured' => 'Sản phẩm nổi bật',
      'hotdeals' => 'Ưu đãi',
      'sepcialoffer' => 'Sản phẩm đề xuất',
      'instock' => 'Còn hoặc hết hàng',
      'status' => 'Chọn Trạng thái',
      'created_at' => 'Ngày tạo',
      'updated_at' => 'Ngày cập nhật',
      ];
    }




    /*lấy tất cá sản phẩm có slug = $slug*/
    public function getAllProductBySlug ($id) {
      $pages = $this->getAllProductBySlugPage($id);
      return $data = Product::find()->where(['cate_id'=>$id, 'status'=>10])->offset($pages->offset)
      ->limit($pages->limit)->all();
    }
    public function getAllProductBySlugPage($id)
    {
      $data = Product::find()->where(['cate_id'=>$id, 'status'=>10])->all();
      $pages = new Pagination(['totalCount' => count($data), 'pageSize' => '9']);
      return $pages; 
    }
    /*lấy tất cá sản phẩm có slug = $slug*/
    // lấy ngỗng nhiên tất cả sản phẩm
    public function getAllProductRand () {
      $pages = $this->getAllProductRandpage();
      return $data = Product::find()->where(['status'=>10])->orderBy('rand()')->offset($pages->offset)
      ->limit($pages->limit)->all();
    } 
    public function getAllProductRandpage () {
     $data = Product::find()->where(['status'=>10])->orderBy('rand()')->all();
     return $pages = new Pagination(['totalCount' => count($data), 'pageSize' => '9']);

   }
    // lấy ngỗng nhiên tất cả sản phẩm

//tìm kiếm sản phẩm
   public function getAllProductSearch ($name) {
    $pages = $this->getAllProductBySlugPage($name);
    return $data = Product::find()->where(['status'=>10])->andWhere(['like', 'name', $name])->offset($pages->offset)
    ->limit($pages->limit)->all();
  }
  public function getAllProductSearchPage($name)
  {
    $data = Product::find()->where(['status'=>10])->andWhere(['like', 'name', $name])->all();
    $pages = new Pagination(['totalCount' => count($data), 'pageSize' => '9']);
    return $pages; 
  }
//tìm kiếm sản phẩm
  public function getOneProduct($id) {
   return $data = Product::find()->where(['id'=>$id, 'status'=>10])->one();
 }
 public function getOneProductBySlug($id) {
   return $data = Product::find()->where(['slug'=>$id, 'status'=>10])->one();
 }
 public function getProductRelation()
 {
  return $this->hasOne(Category::className(),['id'=>'cate_id']);
}
// loc theo gia
public function getAllProductByPrice($id, $pone, $ptwo) {
 $pages = $this->getAllProductByPricepage($id, $pone, $ptwo);
 return $data = Product::find()->where('cate_id = :id and price >= :one and price <= :two and status = 10',
  [':id' =>$id, ':one'=>$pone, ':two'=>$ptwo])->offset($pages->offset)
 ->limit($pages->limit)->all();
}

public function getAllProductByPricepage($id, $pone, $ptwo) {
 $data = Product::find()->where('cate_id = :id and price >= :one and price <= :two and status = 10',
  [':id' =>$id, ':one'=>$pone, ':two'=>$ptwo])->all();
 return $pages = new Pagination(['totalCount' => count($data), 'pageSize' => '9']);
}
// loc theo gia

public function getOneProductPriceAll($pone, $ptwo) {
 return $data = Product::find()->where('price >= :one and price <= :two and status = 10',
  [':one'=>$pone, ':two'=>$ptwo])->all();
}

// loc theo gia thap nhât
public function getProLowestPrice($id) {
 $pages = $this->getProLowestPricepage($id);
 return $data = Product::find()->where(['cate_id'=>$id, 'status'=>10])->orderBy(['price'=>SORT_ASC])->offset($pages->offset)
 ->limit($pages->limit)->all();
}
public function getProLowestPricepage($id) {
  $data = Product::find()->where(['cate_id'=>$id, 'status'=>10])->orderBy(['price'=>SORT_ASC])->all();
  return $pages = new Pagination(['totalCount' => count($data), 'pageSize' => '9']);
}
// loc theo gia thap nhât


public function getProLowestPriceNo() {
 return $data = Product::find()->where(['status'=>10])->orderBy(['price'=>SORT_ASC])->all();
} 
// loc theo gia cao nhat
public function getProHightestPrice($id) {
 $pages = $this->getProHightestPricepage($id);
 return $data = Product::find()->where(['cate_id'=>$id, 'status'=>10])->orderBy(['price'=>SORT_DESC])->offset($pages->offset)
 ->limit($pages->limit)->all();
}
public function getProHightestPricepage($id) {
  $data = Product::find()->where(['cate_id'=>$id, 'status'=>10])->orderBy(['price'=>SORT_DESC])->all();
  return $pages = new Pagination(['totalCount' => count($data), 'pageSize' => '9']);
}
// loc theo gia cao nhat

public function getProHightestPriceNo() {
 return $data = Product::find()->where(['status'=>10])->orderBy(['price'=>SORT_DESC])->all();
}
// loc theo thu tu
public function getProNameSort($id) {
   $pages = $this->getProNameSortpage($id);
 return $data = Product::find()->where(['cate_id'=>$id, 'status'=>10])->orderBy(['name'=>SORT_ASC])->offset($pages->offset)
 ->limit($pages->limit)->all();
}
public function getProNameSortpage($id) {
  $data = Product::find()->where(['cate_id'=>$id, 'status'=>10])->orderBy(['name'=>SORT_ASC])->all();
 return $pages = new Pagination(['totalCount' => count($data), 'pageSize' => '9']);
}
// loc theo thu tu

public function getProNameSortNo() {
 return $data = Product::find()->where(['status'=>10])->orderBy(['name'=>SORT_ASC])->all();
}

    // /OFF/
public function getProOff() {
 return $data = Product::find()->where(['hotdeals'=>10, 'status'=>10])->all();
}
public function getProNew() {
 return $data = Product::find()->where(['new'=>10, 'status'=>10])->all();
}
public function getProFeatured() {
 return $data = Product::find()->where(['featured'=>10, 'status'=>10])->all();
}
public function getProSeller() {
 return $data = Product::find()->where(['bestseller'=>10, 'status'=>10])->all();
}
public function getProSepcialoffer() {
 return $data = Product::find()->where(['sepcialoffer'=>10, 'status'=>10])->all();
}

    //goi anh chi tiet
public function getImgs() {
  return $this->hasMany(Images::className(), ['product_id'=>'id']);
}

function stripUnicode($str){
  if(!$str) return false;
  $unicode = array(
   'a'=>'á|à|ả|ã|ạ|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ',
   'A'=>'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ằ|Ẳ|Ẵ|Ặ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
   'd'=>'đ',
   'D'=>'Đ',
   'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
   'E'=>'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
   'i'=>'í|ì|ỉ|ĩ|ị',   
   'I'=>'Í|Ì|Ỉ|Ĩ|Ị',
   'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
   'O'=>'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
   'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
   'U'=>'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
   'y'=>'ý|ỳ|ỷ|ỹ|ỵ',
   'Y'=>'Ý|Ỳ|Ỷ|Ỹ|Ỵ'
   );
  foreach($unicode as $khongdau=>$codau) {
    $arr=explode("|",$codau);
    $str = str_replace($arr,$khongdau,$str);
  }
  return $str;
}

function changeTitle($str)
{
  $str=trim($str);
  if ($str=="") return "";
  $str =str_replace('"','',$str);
  $str =str_replace("'",'',$str);
  $str = stripUnicode($str);
  $str = mb_convert_case($str,MB_CASE_TITLE,'utf-8');

        // MB_CASE_UPPER / MB_CASE_TITLE / MB_CASE_LOWER
  $str = str_replace(' ','-',$str);
  return $str;
}



}
