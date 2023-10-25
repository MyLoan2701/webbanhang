<?php require_once __DIR__. '/autoload/autoload.php';

$data = $db->fetchID("users",$_SESSION['name_id']);

?>

<?php require_once __DIR__. '/includes/header.php'; ?>
<div class="col-md-12 bor">
    <section class="box-main1">
        <div class="modal-dk">
            <div class="container-dangki" style="width: 100%">
                <div class="general modal1">
                    <div class="left modal1-2" style="width: 70%;">
                        <div class="header-modal1-2">
                            Thông tin tài khoản
                        </div>
                        <hr>
                        <div class="left modal1-2 r1" style="width: 100%">
                            <?php if(isset($_SESSION['success'])) :?>
                                <div class="alert alert-success" role="alert">
                                    <?php echo $_SESSION['success']; unset($_SESSION['success']); ?>
                                </div>
                            <?php endif; ?>

                            <?php if(isset($_SESSION['error'])) :?>
                                <div class="alert alert-success" role="alert">
                                    <?php echo $_SESSION['error']; unset($_SESSION['error']); ?>
                                </div>
                            <?php endif; ?>

                            <form accept="" method="POST" class="form-dangki">
                                <div class="form-group row muc" style="margin: 0 0 30px;">
                                    <label class="col-sm-4 text-right">Họ tên</label>
                                    <div class="col-sm-8">
                                        <input type="text" readonly="" class="form-control" name="name"
                                        value="<?php echo $data['name'] ?>">
                                    </div>
                                </div>

                                <div class="form-group row muc" style="margin: 0 0 30px;">
                                    <label class="col-sm-4 text-right">Email</label>
                                    <div class="col-sm-8">
                                        <input type="email" readonly="" class="form-control" name="email"
                                        value="<?php echo $data['email'] ?>">
                                    </div>
                                </div>

                                <div class="form-group row muc"  style="margin: 0 0 30px;">
                                    <label class="col-sm-4 text-right">Mật khẩu</label>
                                    <div class="col-sm-8">
                                        <input type="password" readonly="" class="form-control" name="password"
                                        value="<?php echo $data['password'] ?>">
                                    </div>
                                </div>

                                <div class="form-group row muc"  style="margin: 0 0 30px;">
                                    <label class="col-sm-4 text-right">Địa chỉ</label>
                                    <div class="col-sm-8">
                                        <input type="text" readonly="" class="form-control" name="address"
                                        value="<?php echo $data['address'] ?>">
                                    </div>
                                </div>

                                <div class="form-group row muc" style="margin: 0 0 30px;">
                                    <label class="col-sm-4 text-right">Giới tính</label>
                                    <div class="col-sm-8">
                                        <input type="text" readonly="" class="form-control" name="gioitinh"
                                        value="<?php if( $data['gioitinh'] == 1) : ?>Nữ<?php else: ?>Nam<?php endif; ?>">
                                    </div>
                                </div>

                                <div class="form-group row muc" style="margin: 0 0 30px;">
                                    <label class="col-sm-4 text-right">Địa chỉ</label>
                                    <div class="col-sm-8">
                                        <input type="date" readonly="" class="form-control" name="ngaysinh"
                                        value="<?php echo $data['ngaysinh'] ?>">
                                    </div>
                                </div>

                                <div class="form-group row muc">
                                    <div class="col-sm-2 col-sm-offset-4 container-fluid">
                                        <a href="sua-thongtin.php" class="btn btn-info">Chỉnh sửa</a>
                                    </div>
                                    <div class="col-sm-6 container-fluid">
                                        <a href="ls-muahang.php" class="btn btn-info">Lịch sử mua hàng</a>
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