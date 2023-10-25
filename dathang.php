<?php
require_once __DIR__. '/autoload/autoload.php';
if(!isset($_SESSION['name_id']))
{
    $_SESSION['error']="Vui lòng đăng nhập để đặt hàng.";
    header("location:dangnhap.php?path=".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']);
}
$user = $db->fetchID('users',$_SESSION['name_id']);

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $data =
    [
        "users_id" => $_SESSION['name_id'],
        "address" => postInput("address"),
        "name" => postInput('name'),
        "phone" => postInput('phone'),
        "other" => postInput('other'),
        "amount" => $_SESSION['amount']
    ];

    $error = [];
    if(postInput('name') == '')
    {
        $error['name'] = "Bạn chưa nhập tên người nhận.";
    }
    if(postInput('address') == '')
    {
        $error['address'] = "Bạn chưa nhập địa chỉ nhận.";
    }
    if(postInput('phone') == '')
    {
        $error['phone'] = "Bạn chưa nhập số điện thoại người nhận.";
    }
    if(empty($error))
    {
        $insert = $db->insert("transaction",$data);
        if($insert>0)
        {
            $_SESSION['success'] = "Đặt hàng thành công!";
            foreach ($_SESSION['cart'] as $item)
            {
                $data2 =
                [
                    'transaction_id' => $insert,
                    'product_id' => $item['id'],
                    'qty' => $item['qty'],
                    'price' => $item['price']
                ];
                $insert2 = $db->insert("orders",$data2);
            }
            unset($_SESSION['cart']);
            unset($_SESSION['amount']);
            header("location: thongbao.php");
        }
        else
        {
            $_SESSION['error'] = "Đặt hàng thất bại!";
        }

    }
}

?>

<?php require_once __DIR__. '/includes/header.php';?>

<div class="bar-top">
    <a href="index.php" class="buymore">
        < Mua thêm sản phẩm khác
    </a>
</div>

<div class="wrap-cart">
    <div class="header-modal1-2" style="margin-bottom: 10px; width:100%; margin-left: 0">
        Đặt hàng
    </div>
    <form id="formtest" novalidate="novalidate" action="" method="POST">
        <div class="form-group row">
            <label for="name" class="col-sm-2 text-right" style="margin-top: 10px; width:20%;"><b>Tên người nhận</b></label>
            <div class="col-sm-8" style="width: 75%">
                <input type="text" class="form-control-dathang" name="name" value="<?php echo $user['name'] ?>" required>
            </div>
        </div>
        <div class="form-group row">
            <label style="margin-top: 10px; width:20%;" for="sdt" class="col-sm-2 text-right"><b>Số điện thoại</b></label>
            <div class="col-sm-8" style="width: 75%">
                <input type="tel" class="form-control-dathang" name="phone" value="<?php echo $user['phone'] ?>" required>
            </div>
        </div>
        <div class="form-group row">
            <label style="margin-top: 10px; width:20%;" for="address" class="col-sm-2 text-right"><b>Địa chỉ nhận</b></label>
            <div class="col-sm-8" style="width: 75%">
                <input type="text" class="form-control-dathang" name="address" value="<?php echo $user['address'] ?>" required>
            </div>
        </div>
        <div class="form-group row">
            <label style="margin-top: 10px; width:20%;" for="yeucau" class="col-sm-2 text-right"><b>Yêu cầu khác</b></label>
            <div class="col-sm-8" style="width: 75%">
                <input type="text" class="form-control-dathang" name="yeucau" placeholder="Yêu cầu khác (không bắt buộc)"
                value="">
            </div>
        </div>
        <div class="form-group row">
            <label style="margin-top: 10px; width:20%;" for="thanhtoan" class="col-sm-2 text-right"><b>Tổng tiền thanh toán</b></label>
            <div class="col-sm-8" style="width: 75%">
                <input type="text" class="form-control-dathang" name="amount" value="<?php echo formatPrice($_SESSION['amount']) ?> đ">
            </div>
        </div>
        

        <div class="form-group row">
            <div class="col-sm-8 col-sm-ofset-2 container-fluid">
                <button type="submit" class="btn btn-success">Đặt Hàng</button>
                <a href="thanhtoan.php" class="btn btn-primary" 
                style="height: 40px;width: 20%;border-radius: 4px;margin-left: 10px;line-height: 25px;">Thanh Toán Online</a>
            </div>
        </div>
    </form>
</div>
<?php require_once __DIR__. '/includes/footer.php'; ?>