<?php 
use frontend\widgets\Comment;
use frontend\widgets\SideMenu;
use frontend\widgets\Video;
use frontend\widgets\SpecialOffer;
use frontend\widgets\Blogtag;
use frontend\widgets\Facebook;
use frontend\widgets\Certi;
use frontend\component\Reviews;
$slug = Yii::$app->request->get('slug') ? Yii::$app->request->get('slug') : NULL;
$cus_id = isset(Yii::$app->user->id) ? Yii::$app->user->id : 0;
Reviews::Reviewscount('blog', $slug);
?>
<!-- ============================================== HEADER : END ============================================== -->

<div class="breadcrumb">
	<div class="container">
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
	<div class="container">
		<div class="row">
			<div class="blog-page">
				<div class="col-md-9">
					<div class="blog-post wow fadeInUp">
						<img class="img-responsive img-blog" src="<?php echo Yii::$app->params['homepath'].$data->image ?>" alt="">
						<h1><?php echo $data->title ?></h1>
						<span class="author"><?php echo $data->member->username ?></span>
						<span class="review"><?php echo $data->reviews ?> lượt xem</span>
						<span class="date-time"><?php echo date('m-d-Y H:i:s', strtotime($data->created_at)) ?></span>
						<div><?php echo $data->content ?></div>
						<div class="social-media">
							<span>Chia sẻ:</span>
							<a href="#"><i class="fa fa-facebook"></i></a>
							<a href="#"><i class="fa fa-twitter"></i></a>
							<a href="#"><i class="fa fa-linkedin"></i></a>
							<a href="#"><i class="fa fa-rss"></i></a>
							<a href="#" class="hidden-xs"><i class="fa fa-pinterest"></i></a>
						</div>
					</div>
					<div class="blog-post-author-details wow fadeInUp clearfix">
						
						<div class="col-sm-12"><?php echo Comment::widget(['table'=>'blog', 'slug'=>$slug, 'cus_id'=> $cus_id]); ?></div>

					</div>
					
				</div>
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
