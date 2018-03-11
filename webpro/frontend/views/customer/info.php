<?php 
// var_dump($model); die;

 ?>
<div class="container" style="padding-top: 20px">
    <div class="panel panel-info">
        <div class="panel-heading">
            <h3 class="panel-title">Thông tin tài khoản</h3>
        </div>
        <div class="panel-body">
           <div class="col-md-6">
               <table class="table table-hover table-condensed">                   
                   <tbody>
                       
                       <tr>
                           <td>Họ tên</td>
                           <td><?php echo $model->fullname; ?></td>
                       </tr> 
                       <tr>
                           <td>Email</td>
                           <td><?php echo $model->email; ?></td>
                       </tr>
                       <tr>
                           <td>Số điện thoại</td>
                           <td><?php echo $model->phone; ?></td>
                       </tr>
                       
                   </tbody>
               </table>
           </div>
           <div class="col-md-2">
               <a class="btn btn-info br0" href="<?php echo yii\helpers\Url::to(['customer/update', 'id'=>$model->id]) ?>" title="Sửa thông tin">Sửa thông tin tài khoản</a>
               <br><br>
               <a class="btn btn-primary br0 btn-block" href="<?php echo yii\helpers\Url::to(['customer/change-password', 'id'=>$model->id]) ?>" title="Đổi mật khẩu">Đổi mật khẩu</a>
           </div>
        </div>
    </div>
</div>
<style type="text/css" media="screen">
    .table > tbody > tr > td {
        border: 2px solid #f3f3f3;
        padding: 15px;
    }
</style>