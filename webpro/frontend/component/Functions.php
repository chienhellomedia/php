<?php 
/**
 * summary
 */
namespace frontend\component;
use backend\models\Product;

class Functions
{
    /**
     * summary
     */
    public function __construct()
    {
    	// $date = date('Y-m-d');
    }
    public function CheckPrice ($startsale, $endsale, $pricesale, $price)
    {
      $date = date('Y-m-d');
      if ($date >= $startsale && $date <= $endsale && $pricesale != NULL) :
        echo '<span class="price">'.number_format($pricesale, 0, '', '.') .'</span>
        <span class="price-before-discount">'.number_format($price, 0, '', '.').'</span>';
      else :
        echo '<span class="price">'.number_format($price, 0, '', '.') .'</span>';
      endif;
    }

    public function CheckSale ($startsale, $endsale, $saleoff) {
     $date = date('Y-m-d');
     if ($date >= $startsale && $date <= $endsale && $saleoff != NULL) :
      echo '<div class="tag sale">';
      echo '<span>-'.$saleoff.'%</span>';
      echo '</div>';
    endif;
  }

  public function CheckHotDeal($startsale, $endsale,$saleoff) {
    $date = date('Y-m-d');
    if ($date >= $startsale && $date <= $endsale && $saleoff != NULL) :
      echo '<div class="sale-offer-tag"><span>'.$saleoff.'%<br>off</span></div>';
    endif;
  }

  public function catchuoi($chuoi,$gioihan){ 

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

   public function price ($startsale, $endsale, $pricesale, $price) {
     $date = date('Y-m-d');
     if ($date >= $startsale && $date <= $endsale && $pricesale != NULL) :
      return $pricesale;
      else : return $price;
      endif;
    }

    
}