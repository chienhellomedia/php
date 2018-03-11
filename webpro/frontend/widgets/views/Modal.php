<?php 
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
?>
<div class="modal fade" id="modal-login">
    <div class="modal-dialog">
        <div class="modal-content br0">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><b>Đăng ký/Đăng nhập</b></h4>
            </div>
            <div class="modal-body">
                <div role="tabpanel">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active">
                            <a href="#home" aria-controls="home" role="tab" data-toggle="tab"><b>Đăng nhập</b></a>
                        </li>
                        <li role="presentation">
                            <a href="#tab" aria-controls="tab" role="tab" data-toggle="tab"><b>Đăng ký</b></a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="home">
                            <?php $form = ActiveForm::begin(['id' => 'login-form',
                                'action' =>['site/login']
                            ]); ?>

                            <?= $form->field($login, 'email')->textInput(['autofocus' => true]) ?>

                            <?= $form->field($login, 'password')->passwordInput() ?>

                            <?= $form->field($login, 'rememberMe')->checkbox() ?>

                            <div style="color:#999;margin:1em 0">
                                Quên mật khẩu <?= Html::a('Khôi phục', ['site/request-password-reset']) ?>.
                            </div>

                            <div class="form-group">
                                <?= Html::submitButton('<b>Đăng nhập</b>', ['class' => 'btn btn-primary btn-block', 'name' => 'login-button']) ?>
                            </div>

                            <?php ActiveForm::end(); ?>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="tab">
                            <?php $form = ActiveForm::begin(['id' => 'form-signup', 'action' =>['site/signup']]); ?>

                            <?= $form->field($signup, 'fullname')->textInput(['autofocus' => true]) ?>

                            <?= $form->field($signup, 'email') ?>

                            <?= $form->field($signup, 'phone')->textInput(['maxlength' => true]) ?>

                            <?= $form->field($signup, 'password')->passwordInput() ?>

                            <div class="form-group">
                                <?= Html::submitButton('Đăng ký', ['class' => 'btn btn-primary btn-block', 'name' => 'signup-button']) ?>
                            </div>

                            <?php ActiveForm::end(); ?>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>


<div class="modal fade" id="modal-id-cart">
    <div class="modal-dialog">
        <div class="modal-content br0">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Thêm sản phẩm vào giỏ hàng</h4>
            </div>
            <div class="modal-body clearfix" style="padding-top: 3px; padding-bottom: 3px">
                <div class="col-md-5">
                    <img src="" alt="" class="img-product-preview img-responsive" width="150">
                </div>
                <div class="col-md-7">
                    <h4><span>Tên Sản phẩm: </span><b class="product-show-name"></b></h4>
                    <h4><span>Giá: </span><span class="product-show-price"></span>-VNĐ/<span class="show-pricelist"></span></h4>
                    <h4>Đã thêm vào giỏ hàng của bạn!</h4>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default br0" data-dismiss="modal">Đóng</button>
                <a href="<?php echo Url::to(['/cart/index']) ?>" class="btn btn-primary br0"><b>Xem giỏ hàng</b></a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-id-delwishlist">
    <div class="modal-dialog">
        <div class="modal-content br0">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Xóa Yêu thích.</h4>
            </div>
            <div class="modal-body">
                <h4>Sản phẩm này sẽ xóa khỏi bảng Yêu thích ? </h4>               
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default br0" data-dismiss="modal">Hủy</button>
                <a class="btn btn-primary delete-wish-list br0" id="del-wl-value" href="">Đồng ý xóa</a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="delete-cart">
    <div class="modal-dialog">
        <div class="modal-content br0">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Xóa sản phẩm trong giỏ hàng</h4>
            </div>
            <div class="modal-body">
                <h4 style="text-align: center">Bạn có muốn xóa <b class="delname"></b> trong giỏ hàng ?</h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default br0" data-dismiss="modal">Không</button>
                <a href="" class="btn btn-danger btn-del-cart br0">Đồng ý xóa</a>
            </div>
        </div>
    </div>
</div>



<div class="modal fade" id="modal-delete-cart">
    <div class="modal-dialog">
        <div class="modal-content br0">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
               <h4 align="center">
                    Bạn có muốn xóa sản phẩm <b class="name-cart"></b> trong giỏ hàng ?
               </h4>
            </div>
            <div class="modal-footer">
                <button type="reset" class="btn btn-default br0" data-dismiss="modal">Hủy</button>
                <button type="button" class="btn btn-danger btn-del-cart br0" href="">Đông ý Xóa</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-clearallcart">
    <div class="modal-dialog">
        <div class="modal-content br0">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Xóa toàn bộ giỏ hàng</h4>
            </div>
            <div class="modal-body">
                <h4 style="text-align: center">Bạn có chắc xóa toàn bộ giỏ hàng ?</h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default br0" data-dismiss="modal">Không</button>
                <a class="btn btn-danger br0 clearallcart">Đồng ý xóa</a>
            </div>
        </div>
    </div>
</div>