   <?php 
   use backend\models\Category;
   use yii\helpers\Url;
   ?>
   <div class="side-menu animate-dropdown outer-bottom-xs">
    <div class="head"><i class="icon fa fa-align-justify fa-fw"></i> Danh mục sản phẩm</div>        
    <nav class="yamm megamenu-horizontal" role="navigation">
      <ul class="nav">

        <?php 
        if ($data['cate']) :
          foreach ($data['cate'] as $key => $cate) :
           ?>
           <li class="dropdown menu-item">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon fa fa-envira"></i><?php echo $cate->name ?></a>
            <ul class="dropdown-menu mega-menu">
              <li class="yamm-content">
                <div class="row">
                  <div class="col-sm-12 col-md-12">
                    <ul class="links list-unstyled">  

                      <?php 
                      $cateson = new Category();
                      $cateson = $cateson->getAllCateRoot($cate->id);
                      foreach ($cateson as $key => $son) : ?>
                      <li><a href="<?php echo Url::to(['/product/index', 'slug'=>$son->slug]) ?>"><?php echo $son->name ?></a></li>
                    <?php endforeach;  ?>
                  </ul>
                </div><!-- /.col -->



              </div><!-- /.row -->
            </li><!-- /.yamm-content -->                    
          </ul><!-- /.dropdown-menu -->           
        </li><!-- /.menu-item -->

      <?php endforeach; endif; ?>








    </ul><!-- /.nav -->
  </nav><!-- /.megamenu-horizontal -->
      </div><!-- /.side-menu -->