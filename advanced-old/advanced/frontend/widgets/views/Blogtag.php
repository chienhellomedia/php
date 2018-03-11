<?php 
use yii\helpers\Url;
?>
<div class="sidebar-widget outer-bottom-xs wow fadeInUp">
	<h3 class="section-title">Chuyên mục Bài viết</h3>
	<ul class="nav nav-tabs">
		<li class="active"><a href="#popular" data-toggle="tab">bài viết mới nhất</a></li>
		<!-- <li><a href="#recent" data-toggle="tab">recent post</a></li> -->
	</ul>
	<div class="tab-content" style="padding-left:0">

		<div class="tab-pane active m-t-20" id="popular">
			<?php foreach ($blog as $val) : ?>		
				<div class="blog-post inner-bottom-30">
					<img class="img-responsive" src="<?php echo $val->image ?>" alt="">
					<h4><a href="<?php echo Url::to(['/blog/detail', 'id'=>$val->id]) ?>"><?php echo $val->title ?></a></h4>
					<span class="review"></span>
					<span class="date-time"><?php echo date('d-m-Y', $val->created_at) ?></span>
					<!-- <p><?php //echo $val->shorttitle ?></p> -->
				</div>
				<hr>
			<?php endforeach ?>
		</div>

								<!-- <div class="tab-pane m-t-20" id="recent">
									<div class="blog-post inner-bottom-30" >
										<img class="img-responsive" src="assets/images/blog-post/blog_big_03.jpg" alt="">
										<h4><a href="blog-details.html">Simple Blog Post</a></h4>
										<span class="review">6 Comments</span>
										<span class="date-time">5/06/16</span>
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>

									</div>
									<div class="blog-post">
										<img class="img-responsive" src="assets/images/blog-post/blog_big_01.jpg" alt="">
										<h4><a href="blog-details.html">Simple Blog Post</a></h4>
										<span class="review">6 Comments</span>
										<span class="date-time">10/07/16</span>
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>

									</div>
								</div> -->
							</div>
						</div>