<?php 
use yii\helpers\Url;
 ?>
<div class="modal fade" id="modal-id-wishlist">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Sản phẩm yêu thích</h4>
            </div>
            <div class="modal-body clearfix" style="padding: 0">
                <div class="col-md-5">
                    <img src="" alt="" class="img-responsive" id="img-show-wishlist" width="60%">
                </div>
                <div class="col-md-7" style="padding:20px">
                    <h4>Sản phẩm: <b id='name-wishlist'></b></h4>
                    <h5>Đã thêm vào danh sách yêu thích.</h5>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default br0" data-dismiss="modal">Đóng</button>
                <a class="btn btn-primary br0" href="<?php echo UrL::to(['/wishlist/index']) ?>">Xem danh sách</a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-id-delwishlist">
    <div class="modal-dialog">
        <div class="modal-content">
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


<div class="modal fade" id="modal-id-cart">
    <div class="modal-dialog">
        <div class="modal-content">
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
                    <h4><span>Giá: </span><span class="product-show-price"></span>-VNĐ</h4>
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




<div class="modal fade" id="modal-id-delcart">
    <div class="modal-dialog">
        <div class="modal-content">
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

<div class="modal fade" id="modal-clearallcart">
    <div class="modal-dialog">
        <div class="modal-content">
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


<div class="modal fade" id="modal-id-compare">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">So sánh Sản phẩm</h4>
            </div>
            <div class="modal-body clearfix">
                <h4>bạn vừa thêm Sản phẩm <strong class="name-compare"></strong> vào trong mục so sánh Sản phẩm.</h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default br0 btnsm" data-dismiss="modal">Đóng</button>
                <a href="<?php echo Url::to(['/compare/index']) ?>" class="btn btn-primary btn-sm br0">Xem</a>
            </div>
        </div>
    </div>
</div>