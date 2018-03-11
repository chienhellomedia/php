<?php 
use backend\models\Category;
use yii\helpers\Url;
 ?>
<div class="sidebar-widget wow fadeInUp">
            <h3 class="section-title">Cửa hàng</h3>
            <div class="widget-header">
              <h4 class="widget-title">Danh mục Sản phẩm</h4>
            </div>
            <div class="sidebar-widget-body">
              <div class="accordion">

              <?php foreach ($listcate as $key => $licate) :?>
                <div class="accordion-group">
                 <div class="accordion-heading">
                   <a href="#collapse-<?php echo $licate->id ?>" data-toggle="collapse" class="accordion-toggle collapsed">
                    <?php echo $licate->name; ?>
                  </a>
                </div><!-- /.accordion-heading -->
                <div class="accordion-body collapse" id="collapse-<?php echo $licate->id ?>" style="height: 0px;">
                 <div class="accordion-inner">
                   <ul>
                   <?php $datasub = new Category;
                        $datasub = $datasub->getAllCateRoot($licate->id);
                    ?>
                    <?php foreach ($datasub as $key => $sub) : ?>
                     <li><a href="<?php echo Url::to(['/product/index', 'slug'=>$sub->slug]) ?>"><?php echo $sub->name; ?></a></li>
                     <?php endforeach; ?>
                   </ul>
                 </div><!-- /.accordion-inner -->
               </div><!-- /.accordion-body -->
             </div><!-- /.accordion-group -->
            <?php endforeach; ?>
            
            

           


   

     </div><!-- /.accordion -->
   </div><!-- /.sidebar-widget-body -->
 </div><!-- /.sidebar-widget -->