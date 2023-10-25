<?php 
require_once __DIR__. '/../../autoload/autoload.php';

if($_SESSION['admin_lv'] == 1)
{
    $_SESSION['error'] = "Bạn không có quyền thêm thông tin này!";
    redirectAdmin("admin");
}

$data =
[
    "name" => postInput('name'),
    "address" => postInput("address"),
    "email" => postInput('email'),
    "phone" => postInput('phone'),
    "password" => postInput('password'),
    "level" => postInput('level')

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
    if(postInput('email') == '')
    {
        $error['email'] = "Mời nhập email.";
    }
    if(postInput('phone') == '')
    {
        $error['phone'] = "Mời nhập số điện thoại.";
    }
    if(postInput('password') == '')
    {
        $error['password'] = "Mời nhập mật khẩu.";
    }
    if(postInput('password') != postInput('re_password'))
    {
        $error['password'] = "Mật khẩu không khớp!";
    }
    else
    {
        $data['password'] = MD5(postInput('password'));
    }

    //dang nhap thanh cong
    if(empty($error))
    {
        $isset = $db->fetchOne("admin","email = '".$data['email']."' ");
        if(count($isset) > 0)
        {
            $_SESSION['error'] = "Tài khoản đã đã tồn tại!";
        }
        else
        {
            $id_insert = $db->insert("admin",$data);
            if($id_insert > 0)
            {
                $_SESSION['success'] = "Thêm mới thành công!";
                redirectAdmin("admin");
            }
            else
            {
                $_SESSION['error'] = "Thêm mới thất bại!";
                redirectAdmin("admin");
            }
        }
    }
}
?>

<?php require_once __DIR__. '/../../includes/header.php'; ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Thêm mới admin</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item">
                    <a href="index.php">Bảng điều khiển</a>
                </li>
                <li class="breadcrumb-item active">Admin</li>
            </ol>

            <div class="clearfix"></div>
            <?php if(isset($_SESSION['error'])) :?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $_SESSION['error'];unset($_SESSION['error']); ?>
                </div>
            <?php endif; ?>

            <div class="card mb-4">
                <br>
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="form-group row">
                        <label for="input1" class="col-sm-2 text-right">Họ và Tên</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="input1" name="name" 
                            placeholder="Nguyễn Văn A" value="<?php echo $data['name'] ?>">
                            <?php if (isset($error['name'])): ?>
                                <p class="text-danger"> <?php echo $error['name']; ?> </p>
                            <?php endif ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="input2" class="col-sm-2 text-right">Địa chỉ</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="input2" name="address" 
                            placeholder="5 Tôn Đức Thắng" value="<?php echo $data['address'] ?>">
                            <?php if (isset($error['address'])): ?>
                                <p class="text-danger"> <?php echo $error['address']; ?> </p>
                            <?php endif ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="input1" class="col-sm-2 text-right">Email</label>
                        <div class="col-sm-8">
                            <input type="email" class="form-control" id="input2" name="email" 
                            placeholder="email@gmai.com" value="<?php echo $data['email'] ?>">
                            <?php if (isset($error['email'])): ?>
                                <p class="text-danger"> <?php echo $error['email']; ?> </p>
                            <?php endif ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="input1" class="col-sm-2 text-right">Số Điện Thoại</label>
                        <div class="col-sm-8">
                            <input type="tel" class="form-control" id="input3" name="phone" 
                            placeholder="0123456789" value="<?php echo $data['phone'] ?>">
                            <?php if (isset($error['phone'])): ?>
                                <p class="text-danger"> <?php echo $error['phone']; ?> </p>
                            <?php endif ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="input2" class="col-sm-2 text-right">Mật Khẩu</label>
                        <div class="col-sm-8">
                            <input type="password" class="form-control" id="input2" name="password" 
                            placeholder="*****" value="<?php echo $data['password'] ?>">
                            <?php if (isset($error['password'])): ?>
                                <p class="text-danger"> <?php echo $error['password']; ?> </p>
                            <?php endif ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="input2" class="col-sm-2 text-right">Nhập Lại Mật Khẩu</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="input2" name="re_password" 
                            placeholder="*****" required>
                            <?php if (isset($error['re_password'])): ?>
                                <p class="text-danger"> <?php echo $error['re_password']; ?> </p>
                            <?php endif ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="input2" class="col-sm-2 text-right">Cấp Bậc</label>
                        <div class="col-sm-8">
                        <select class="form-control" name="level">
                            <option value="1" <?php echo isset($data['level']) && $data['level'] == 1 ? "selected = 'selected'" : "" ?>>
                                CTV
                            </option>
                            <option value="2" <?php echo isset($data['level']) && $data['level'] == 2 ? "selected = 'selected'" : "" ?>>
                                Admin
                            </option>

                        </select>
                            <?php if (isset($error['re_password'])): ?>
                                <p class="text-danger"> <?php echo $error['re_password']; ?> </p>
                            <?php endif ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-8 container-fluid">
                            <button type="submit" class="btn btn-success">Lưu</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>
</div>
<?php require_once __DIR__. '/../../includes/footer.php'; ?>