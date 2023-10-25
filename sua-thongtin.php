<?php require_once __DIR__. '/autoload/autoload.php';

$data = $db->fetchID("users", $_SESSION['name_id']);

$data2 =
[
    "name" => postInput('name'),
    "address" => postInput("address"),
    "email" => postInput('email'),
    "phone" => postInput('phone'),
    "password" => postInput('password'),
    "gioitinh" => postInput('gioitinh'),
    "ngaysinh" => postInput('ngaysinh')
];

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $error = [];
    if(postInput('name') == '')
    {
        $error['name'] = "Mời nhập đầy đủ họ tên.";
    }
    if(postInput('address') == '')
    {
        $error['address'] = "Mời nhập địa chỉ.";
    }
    if(postInput('phone') == '')
    {
        $error['phone'] = "Mời nhập số điện thoại.";
    }
    if(postInput('password') == '')
    {
        $error['password'] = "Mời nhập mật khẩu.";
    }
    if(postInput('oldpassword') == '')
    {
        $error['oldpassword'] = "Mời nhập lại mật khẩu cũ.";
    }

    //dang nhap thanh cong
    if(empty($error))
    {
        $isset = $db->fetchOne("users","email = '".$data2['email']."' AND password = '".MD5(postInput('oldpassword'))."' ");
        if($isset > 0)
        {
            if($data2['password'] != MD5(postInput('oldpassword')))
            {
                $data2['password'] = MD5(postInput('password'));
            }
            $id_update = $db->update("users",$data2,array("email" => $data2['email']));
            if($id_update>0)
            {
                $_SESSION['success'] = "Sửa thông tin thành công!";
                header("location: thongtin.php");
            }
            else
            {
                $_SESSION['error'] = "Thông tin không đổi!";
                header("location: thongtin.php");
            }
        }
        else
        {
            $error['oldpassword'] = "Sai mật khẩu!";
        }
    }
}

?>

<?php require_once __DIR__. '/includes/header.php'; ?>
<div class="col-md-12 bor">
    <section class="box-main1">
        <div class="modal-dk">
            <div class="container-dangki" style="width: 100%">
                <div class="general modal1">
                    <div class="left modal1-2" style="width: 70%;">
                        <div class="header-modal1-2">
                            Sửa thông tin tài khoản
                        </div>
                        <hr>
                        <div class="left modal1-2 r1" style="width: 100%">
                            

                            <form accept="" method="POST" class="form-dangki">
                                <div class="form-group row muc" style="margin: 0 0 30px;">
                                    <label class="col-sm-4 text-right">Họ tên</label>
                                    <div class="col-sm-8">
                                        <input type="text"  class="form-control" name="name"
                                        value="<?php echo $data['name'] ?>">
                                    </div>
                                </div>

                                <div class="form-group row muc" style="margin: 0 0 30px;">
                                    <label class="col-sm-4 text-right">Email</label>
                                    <div class="col-sm-8">
                                        <input type="email"  class="form-control" name="email"
                                        value="<?php echo $data['email'] ?>">
                                    </div>
                                </div>

                                <div class="form-group row muc"  style="margin: 0 0 30px;">
                                    <label class="col-sm-4 text-right">Mật khẩu</label>
                                    <div class="col-sm-8">
                                        <input type="password"  class="form-control" name="password"
                                        value="<?php echo $data['password'] ?>">
                                    </div>
                                </div>

                                <div class="form-group row muc"  style="margin: 0 0 30px;">
                                    <label class="col-sm-4 text-right">Địa chỉ</label>
                                    <div class="col-sm-8">
                                        <input type="text"  class="form-control" name="address"
                                        value="<?php echo $data['address'] ?>">
                                    </div>
                                </div>

                                <div class="form-group row muc" style="margin: 0 0 30px;">
                                    <label class="col-sm-4 text-right">Giới tính</label>
                                    <div class="col-sm-8">
                                        <input type="text"  class="form-control" name="gioitinh"
                                        value="<?php if( $data['gioitinh'] == 1) : ?>Nữ<?php else: ?>Nam<?php endif; ?>">
                                    </div>
                                </div>

                                <div class="form-group row muc" style="margin: 0 0 30px;">
                                    <label class="col-sm-4 text-right">Địa chỉ</label>
                                    <div class="col-sm-8">
                                        <input type="date"  class="form-control" name="ngaysinh"
                                        value="<?php echo $data['ngaysinh'] ?>">
                                    </div>
                                </div>

                                <div class="form-group row muc" style="margin: 0 0 30px;">
                                    <label class="col-sm-4 text-right">Mật khẩu cũ</label>
                                    <div class="col-sm-8">
                                        <input type="password" class="form-control" name="oldpassword" value="">
                                        <?php if( isset($error['oldpassword'])) : ?>
                                            <br> <p class="text-danger"><?php echo $error['oldpassword']?></p>
                                        <?php endif ?>
                                    </div>
                                </div>

                                <div class="form-group row muc">
                                    <div class="col-sm-2 col-sm-offset-4 container-fluid">
                                        <button type="submit" class="btn btn-success">Lưu</button>
                                    </div>
                                    
                                </div>

                                <!--<div class="form-group row muc col-sm-offset-8"  style="margin: 0 0 30px;">
                                    <div class="container-fluid">
                                        
                                    </div>
                                </div>-->
                            </form>
                        </div>
                    </div>

                    <div class="right modal1-1" style="width: 30%;">
                        <img src="images/img/img8.png">
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>


<?php require_once __DIR__. '/includes/footer.php'; ?>