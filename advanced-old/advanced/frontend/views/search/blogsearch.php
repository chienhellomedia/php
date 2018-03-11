<?php 
use frontend\widgets\Blogtag;
use frontend\widgets\Sidebarcategory;
use yii\helpers\Url;
use yii\widgets\LinkPager;
use yii\widgets\Pjax;
use yii\data\Pagination;
use yii\widgets\ActiveForm;

?>
<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->
<?php Pjax::begin(); ?>
<div class="body-content">
	<div class="container">
		<div class="row">
			<div class="blog-page">
				<div class="col-md-9">
					<?php foreach ($blog as $key => $value): ?>						

						<div class="blog-post  wow fadeInUp" style="margin-bottom: 20px;">
							<a href="<?php echo Url::to(['/blog/detail', 'slug' => $value->slug]) ?>"><img class="img-responsive blog-img-fix" src="<?php echo $value->image; ?>" alt="<?php echo $value->title ?>"></a>
							<h1><a href="<?php echo Url::to(['/blog/detail', 'slug' => $value->slug]) ?>"><?php echo $value->title ?></a></h1>
							<span class="author">John Doe</span>
							<span class="review">6 Comments</span>
							<span class="date-time">14/06/2016 10.00AM</span>
							<p><?php echo date('d-m-Y', $value->created_at); ?></p>
							<a href="<?php echo Url::to(['/blog/detail', 'slug' => $value->slug]) ?>" class="btn btn-upper btn-primary read-more">Đọc tiếp</a>
						</div>

					<?php endforeach ?>

					<div class="clearfix blog-pagination filters-container  wow fadeInUp" style="padding:0px; background:none; box-shadow:none; margin-top:15px; border:none">
						
						<div class="text-right">
							<div class="pagination-container">
								

								<?php
								echo LinkPager::widget([
									'pagination' => $pages,
                   // 'firstPageLabel' => '<<',
                   // 'lastPageLabel' => '>>',
									'prevPageLabel' => '<i class="fa fa-angle-left"></i>',
									'nextPageLabel' => '<i class="fa fa-angle-right"></i>',
									'maxButtonCount' => 3,
									'options' => [
									'class' => 'list-inline list-unstyled',
									],

									]); ?>
								</div><!-- /.pagination-container -->   
							</div><!-- /.text-right -->

						</div><!-- /.filters-container -->			
					</div>
					<div class="col-md-3 sidebar">



						<div class="sidebar-module-container">
							<div class="search-area outer-bottom-small">
								
								<form>
									<div class="control-group">
										<input placeholder="Type to search" class="search-field">
										<a href="#" class="search-button"></a>   
									</div>
								</form>

							</div>		

							<!-- ==============================================CATEGORY============================================== -->
							<?php echo Sidebarcategory::Widget(); ?>

							<hr>
							<!-- ============================================== CATEGORY : END ============================================== -->					
							<?php echo Blogtag::Widget(); ?>
							<!-- ============================================== PRODUCT TAGS ============================================== -->
							<div class="sidebar-widget product-tag wow fadeInUp">
								<h3 class="section-title">Product tags</h3>
								<div class="sidebar-widget-body outer-top-xs">
									<div class="tag-list">					
										<a class="item" title="Phone" href="category.html">Phone</a>
										<a class="item active" title="Vest" href="category.html">Vest</a>
										<a class="item" title="Smartphone" href="category.html">Smartphone</a>
										<a class="item" title="Furniture" href="category.html">Furniture</a>
										<a class="item" title="T-shirt" href="category.html">T-shirt</a>
										<a class="item" title="Sweatpants" href="category.html">Sweatpants</a>
										<a class="item" title="Sneaker" href="category.html">Sneaker</a>
										<a class="item" title="Toys" href="category.html">Toys</a>
										<a class="item" title="Rose" href="category.html">Rose</a>
									</div><!-- /.tag-list -->
								</div><!-- /.sidebar-widget-body -->
							</div><!-- /.sidebar-widget -->
							<!-- ============================================== PRODUCT TAGS : END ============================================== -->					</div>
						</div>
					</div>
				</div>

				<!-- ============================================== BRANDS CAROUSEL : END ============================================== -->	
			</div>
		</div>
		<?php Pjax::end(); ?>