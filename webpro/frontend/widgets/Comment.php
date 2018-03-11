<?php 

namespace frontend\widgets;

use yii\base\Widget;
use yii\helpers\Html;
use backend\models\Comments;

class Comment extends Widget
{
  public $table;
  public $slug;
  public $cus_id;
  public $parent;

  public function init()
  {
    parent::init();
    if ($this->parent == null) {
      $this->parent = 0;
    }
  }

  public function run()
  {
   $model = new Comments();

   $data = Comments::find()
   ->where(['table'=>$this->table, 'id_comment'=>$this->slug, 'parent'=>0])
   ->orderBy(['id'=>SORT_DESC])->all(); 

   $count = Comments::find()
   ->where(['table'=>$this->table, 'id_comment'=>$this->slug, 'parent'=>0])
   ->count();

   $allcomment = Comments::find()
   ->where(['table'=>$this->table, 'id_comment'=>$this->slug,])
   ->count();
   

   return $this->render('Comment', [
     'model'=>$model,
     'table'=>$this->table, 
     'slug'=>$this->slug, 
     'cus_id'=>$this->cus_id,
     'parent'=>$this->parent,
     'data'=>$data,
     'count'=>$count,
     'allcomment'=>$allcomment,
   ]);
 }


}

?>