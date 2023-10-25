<?php
require_once __DIR__. '/autoload/autoload.php';

$user = $db->fetchID('users',$_SESSION['name_id']);

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $data =
    [
        "order_id" =>$_SESSION['name_id'],
        "name" => postInput('name'),
        "note" => postInput('note'),
        "vnp_response_code" => postInput('vnp_response_code'),
        "code_vnpay" => postInput('code_vnpay'),
        "code_bank" => postInput('code_bank'),
        "thanh_vien" => $user['name'],
        "money" => $_SESSION['amount']
    ];

    $error = [];
    if(postInput('name') == '')
    {
        $error['name'] = "Bạn chưa nhập tên chủ thẻ.";
    }
    if(empty($error))
    {
        $insert = $db->insert("thanhtoan",$data);
        if($insert>0)
        {
            $_SESSION['success'] = "thanh toán thành công!";
        }
        else
        {
            $_SESSION['error'] = "thanh toán thất bại!";
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
    <div class="header-modal1-2" style="margin-bottom: 10px; width:100%; margin-left: 0;">
        Thanh toán
    </div>
    <form id="create_form formtest" novalidate="novalidate" action="/vnpay_php/vnpay_create_payment.php" method="POST">
        <div class="form-group row">
            <label for="name" class="col-sm-2 text-right" style="margin-top: 10px; width:20%;"><b>Tên chủ thẻ</b></label>
            <div class="col-sm-8" style="width: 75%">
                <input type="text" class="form-control-dathang" name="name" value="<?php echo $user['name'] ?>" required>
            </div>
        </div>
        <div class="form-group row">
            <label style="margin-top: 10px; width:20%;" for="language" class="col-sm-2 text-right"><b>Loại hàng hóa</b></label>
            <div class="col-sm-8" style="width: 75%">
                <select name="order_type" id="order_type" class="form-control">
                    <option value="billpayment">Thanh toán hóa đơn</option>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label style="margin-top: 10px; width:20%;" for="code_vnpay" class="col-sm-2 text-right"><b>Mã hóa đơn</b></label>
            <div class="col-sm-8" style="width: 75%">
                <input class="form-control" id="code_vnpay" name="code_vnpay" type="text" value="<?php echo date("YmdHis") ?>"/>
            </div>
        </div>
        <div class="form-group row">
            <label style="margin-top: 10px; width:20%;" for="note" class="col-sm-2 text-right"><b>Nội dung thanh toán</b></label>
            <div class="col-sm-8" style="width: 75%; height: 80px">
                <textarea class="form-control" cols="20" id="note" name="note" rows="2">Noi dung thanh toan</textarea>
            </div>
        </div>
        <div class="form-group row">
            <label style="margin-top: 10px; width:20%;" for="code_bank" class="col-sm-2 text-right"><b>Ngân hàng</b></label>
            <div class="col-sm-8" style="width: 75%;">
                <select name="code_bank" id="code_bank" class="form-control">
                    <option value="">Không chọn</option>
                    <option value="NCB"> Ngan hang NCB</option>
                    <option value="AGRIBANK"> Ngan hang Agribank</option>
                    <option value="SCB"> Ngan hang SCB</option>
                    <option value="SACOMBANK">Ngan hang SacomBank</option>
                    <option value="EXIMBANK"> Ngan hang EximBank</option>
                    <option value="MSBANK"> Ngan hang MSBANK</option>
                    <option value="NAMABANK"> Ngan hang NamABank</option>
                    <option value="VNMART"> Vi dien tu VnMart</option>
                    <option value="VIETINBANK">Ngan hang Vietinbank</option>
                    <option value="VIETCOMBANK"> Ngan hang VCB</option>
                    <option value="HDBANK">Ngan hang HDBank</option>
                    <option value="DONGABANK"> Ngan hang Dong A</option>
                    <option value="TPBANK"> Ngân hàng TPBank</option>
                    <option value="OJB"> Ngân hàng OceanBank</option>
                    <option value="BIDV"> Ngân hàng BIDV</option>
                    <option value="TECHCOMBANK"> Ngân hàng Techcombank</option>
                    <option value="VPBANK"> Ngan hang VPBank</option>
                    <option value="MBBANK"> Ngan hang MBBank</option>
                    <option value="ACB"> Ngan hang ACB</option>
                    <option value="OCB"> Ngan hang OCB</option>
                    <option value="IVB"> Ngan hang IVB</option>
                    <option value="VISA"> Thanh toan qua VISA/MASTER</option>
                </select>
            </div>
        </div>
        
        <div class="form-group row">
            <label style="margin-top: 10px; width:20%;" for="thanhtoan" class="col-sm-2 text-right"><b>Số tiền</b></label>
            <div class="col-sm-8" style="width: 75%">
                <input type="text" class="form-control-dathang" name="money" value="<?php echo formatPrice($_SESSION['amount']) ?> đ">
            </div>
        </div>
        

        <div class="form-group row">
            <div class="col-sm-8 col-sm-ofset-2 container-fluid">
                <button type="submit" class="btn btn-success">Thanh toán</button>
                
            </div>
        </div>
    </form>
</div>

<link href="https://sandbox.vnpayment.vn/paymentv2/lib/vnpay/vnpay.css" rel="stylesheet"/>
    <script src="https://sandbox.vnpayment.vn/paymentv2/lib/vnpay/vnpay.js"></script>
    <script type="text/javascript">
        $("#btnPopup").click(function () {
            var postData = $("#create_form").serialize();
            var submitUrl = $("#create_form").attr("action");
            $.ajax({
                type: "POST",
                url: submitUrl,
                data: postData,
                dataType: 'JSON',
                success: function (x) {
                    if (x.code === '00') {
                        if (window.vnpay) {
                            vnpay.open({width: 768, height: 600, url: x.data});
                        } else {
                            location.href = x.data;
                        }
                        return false;
                    } else {
                        alert(x.Message);
                    }
                }
            });
            return false;
        });
    </script>
<?php require_once __DIR__. '/includes/footer.php'; ?>