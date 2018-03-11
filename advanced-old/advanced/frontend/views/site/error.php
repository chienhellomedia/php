<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = $name;
?>
<div class="body-content outer-top-bd">
    <div class="container">
        <div class="x-page inner-bottom-sm">
            <div class="row">
                <div class="col-md-12 x-text text-center">
                    <h1>404</h1>
                    <p>Xin lỗi trang bạn tìm kiếm không tồn tại. </p>
                    <!-- <form role="form" class="outer-top-vs outer-bottom-xs">
                        <input placeholder="Search" autocomplete="off">
                        <button class="  btn-default le-button">Go</button>
                    </form> -->
                    <a href="<?php echo yii\helpers\Url::to(['/site/index']) ?>" class="btn btn-info"><i class="fa fa-home"></i> Quay lại Trang chủ</a>
                </div>
            </div><!-- /.row -->
        </div><!-- /.sigin-in-->
    </div><!-- /.container -->
</div><!-- /.body-content -->