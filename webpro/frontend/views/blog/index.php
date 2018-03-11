<?php 
use yii\helpers\Url;
use backend\models\Blog;
use yii\widgets\LinkPager;
use yii\widgets\Pjax;
use frontend\widgets\SideMenu;
use frontend\widgets\Video;
use frontend\widgets\SpecialOffer;
use frontend\widgets\Blogtag;
use frontend\widgets\Facebook;
use frontend\widgets\Certi;
?>

<!-- ============================================== HEADER : END ============================================== -->
<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
	<div class="container">
		<div class="row">
			<div class="blog-page">
				<?php Pjax::begin(); ?>
				<div class="col-md-9">
					<?php if($data['all']):
					foreach ($data['all'] as $all):
						?>
						<div class="blog-post  wow fadeInUp">
							<a href="<?php echo Url::to(['/blog/detail', 'slug'=>$all->slug]) ?>"><img class="img-responsive img-blog" src="<?php echo Yii::$app->params['homepath'].$all->image ?>" alt="" ></a>
							<h1><a href="<?php echo Url::to(['/blog/detail', 'slug'=>$all->slug]) ?>"><?php echo $all->title ?></a></h1>
							<span class="author"><?php echo $all->member->username ?></span>
							<span class="review"><?php echo $all->reviews ?> lượt xem</span>
							<span class="date-time"><?php echo date('m-d-Y H:i:s', strtotime($all->created_at)) ?></span>
							<div><?php 
							 // $all->content 
							$content = new Blog();
							echo $content->catchuoi($all->content, 380);
							?></div>
							<a href="<?php echo Url::to(['/blog/detail', 'slug'=>$all->slug]) ?>" class="btn btn-upper btn-primary read-more">Đọc tiếp</a>
						</div>
					<?php endforeach; endif; ?>


					<div class="clearfix blog-pagination filters-container  wow fadeInUp" style="padding:0px; background:none; box-shadow:none; margin-top:15px; border:none">
						
						<div class="text-right">
							<div class="pagination-container">
								<?php echo LinkPager::widget([
									'pagination' => $data['page'],
									'prevPageLabel' => '<i class="fa fa-angle-left"></i>',
									'nextPageLabel' => '<i class="fa fa-angle-right"></i>',
									'maxButtonCount' => 3,
									'options' => [
										'class' => 'list-inline list-unstyled',
									],
									]); ?>
								</div><!-- /.pagination-container -->    </div><!-- /.text-right -->

							</div><!-- /.filters-container -->			
						</div>
						<?php Pjax::end(); ?>
						<div class="col-md-3 sidebar">

							<div class="sidebar-module-container">
								<?php echo SideMenu::widget(); ?>

								<?php echo Video::widget(); ?>

								<?php echo SpecialOffer::widget(); ?>

								<?php echo Blogtag::widget(); ?>

								<?php echo Facebook::widget(); ?>

								<?php echo Certi::widget() ?>


							</div>
						</div>
					</div>
				</div>
				
			</div>
		</div>
		
