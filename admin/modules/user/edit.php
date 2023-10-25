<?php
require_once __DIR__. '/../../autoload/autoload.php';

if($_SESSION['admin_lv'] == 1 && $_SESSION['admin_id'] != getInput('id'))
{
    $_SESSION['error'] = "Bạn không có quyền thay đổi thông tin này!";
    redirectAdmin("user");
}

$id = intval(getInput('id'));
$Edituser = $db->fetchID("users",$id);
if( empty($Edituser))
{
    $_SESSION['error'] = "Dữ liệu không tồn tại";
    redirectAdmin("user");
}

$data =
[
    "name" => postInput('name'),
    "address" => postInput("address"),
    "phone" => postInput('phone'),
    "gioitinh" => postInput('gioitinh'),
    "ngaysinh" => postInput('ngaysinh'),
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

    //dang nhap thanh cong
    if(empty($error))
    {
        $id_update = $db->update("users",$data,array("id" => $id));
        if($id_update > 0)
        {
            $_SESSION['success'] = "Cập nhật thành công!";
            redirectAdmin("user");
        }
        else
        {
            $_SESSION['error'] = "Dữ liệu không đổi!";
            redirectAdmin("user");
        }
    }
}
?>

<?php require_once __DIR__. '/../../includes/header.php'; ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Sửa thông tin khách hàng</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item">
                    <a href="index.php">Bảng điều khiển</a>
                </li>
                <li class="breadcrumb-item active">Cập nhật người dùng</li>
            </ol>

            <div class="clearfix"></div>
            <?php if(isset($_SESSION['error'])) :?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $_SESSION['error'];unset($_SESSION['error']); ?>
                </div>
            <?php endif; ?>

            <div class="card mb-4">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="form-group row">
                        <label for="input1" class="col-sm-2 text-right">Họ và Tên</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="input1" name="name" 
                            placeholder="Nguyên Văn A" value="<?php echo $Edituser['name'] ?>">
                            <?php if (isset($error['name'])): ?>
                                <p class="text-danger"> <?php echo $error['name']; ?> </p>
                            <?php endif ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="input2" class="col-sm-2 text-right">Địa chỉ</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="input2" name="address" 
                            placeholder="5 Tôn Đức Thắng" value="<?php echo $Edituser['address'] ?>">
                            <?php if (isset($error['address'])): ?>
                                <p class="text-danger"> <?php echo $error['address']; ?> </p>
                            <?php endif ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="input3" class="col-sm-2 text-right">Số điện thoại</label>
                        <div class="col-sm-8">
                        <input type="tel" class="form-control" id="input3" name="phone" 
                        placeholder="0123456789" value="<?php echo $Edituser['phone'] ?>">
                            <?php if (isset($error['phone'])): ?>
                                <p class="text-danger"> <?php echo $error['phone']; ?> </p>
                            <?php endif ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="input1" class="col-sm-2 text-right">Giới tính</label>
                        <div class="col-sm-8">
                            <select class="form-control" name="gioitinh">
                        <option value="1" <?php echo isset($data['gioitinh']) && $Edituser['gioitinh'] == 1 ? "selected = 'selected'" : "" ?>>
                                Nữ
                            </option>
                            <option value="2" <?php echo isset($data['gioitinh']) && $Edituser['gioitinh'] == 2 ? "selected = 'selected'" : "" ?>>
                                Nam
                            </option>
                            <?php if (isset($error['gioitinh'])): ?>
                                <p class="text-danger"> <?php echo $error['gioitinh']; ?> </p>
                            <?php endif ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="input3" class="col-sm-2 text-right">Ngày sinh</label>
                        <div class="col-sm-8">
                        <input type="date" class="form-control" id="input1" name="ngaysinh" 
                        placeholder="dd/mm/yy" value="<?php echo $Edituser['ngaysinh'] ?>">
                            <?php if (isset($error['ngaysinh'])): ?>
                                <p class="text-danger"> <?php echo $error['ngaysinh']; ?> </p>
                            <?php endif ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-8 container-fluid">
                            <button type="submit" class="btn btn-success">Lưu</button>
                            <a href="edit2.php?id=<?php echo $Edituser['id'] ?>" class="btn btn-info"?>
                                Đổi mật khẩu
                            </a>
                        </div>
                    </div>
                </form>
                </div>
        </div>
    </main>
</div>
<?php require_once __DIR__. '/../../includes/footer.php'; ?>