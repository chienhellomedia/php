<?php 
use yii\helpers\Url;
use backend\models\Blog;
?>
<div class="sidebar-widget outer-bottom-xs wow fadeInUp">
	<h3 class="section-title">Tin tức gần đây</h3>
	
	<div class="tab-content" style="padding-left:0">
		<div class="tab-pane active m-t-20" id="recent">
			<div class="blog-post inner-bottom-30" >
				<img class="img-responsive" src="<?= Yii::$app->params['homepath'].$blog->image ?>" alt="">
				<h4><a href="<?= Url::to(['/blog/detail', 'slug' => $blog->slug]) ?>"><?= $blog->title ?></a></h4>
				<span class="review"><i class="fa fa-comments" aria-hidden="true"></i> <?php echo $blog->reviews ?> lượt xem</span>&nbsp;-&nbsp;
				<span class="date-time"><?= date('d-m-Y H:i:s', strtotime($blog->created_at)) ?></span>
				<div class="text-ellipsis"><?php
				$content = new Blog(); 
				echo $content->catchuoi($blog->content, 100);
				 ?></div>

			</div>
		</div>
	</div>
</div>