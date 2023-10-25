<?php
require_once __DIR__. '/../autoload/autoload.php';
$name = getInput('keywork');

if(getInput('keywork') != '')
{
    $name = to_slug($name);
    $item = $db->fetchOne('product',"slug LIKE '%".$name."%' ");
    if(isset($item) && count($item)>0)
    {
        $cate = $db->fetchOne('category',"id ='".$item['category_id']."'");
        if($cate['level'] == 0)
        {
            header("location:laptop.php?the=".$name);
        }
        else if($cate['level'] == 1)
        {
            header("location:phukien.php?the=".$name); 
        }
        else if($cate['level'] == 2)
        {
            header("location:dienthoai.php?the=".$name); 
        }
        else if($cate['level'] == 3)
        {
            header("location:mayin.php?the=".$name); 
        }
        else if($cate['level'] == 4)
        {
            header("location:tablet.php?the=".$name); 
        }
        else
        {
            header("location:maytinhdeban.php?the=".$name); 
        }
    }
    else
    {
        $_SESSION['error_s']="Không tìm thấy sản phẩm!";
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Web bán hàng online</title>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">

        <!--Responsive-->
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!--CSS-->
        <link rel="stylesheet" type="text/css" href="http://localhost/webbanhang/public/frontend/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="http://localhost/webbanhang/public/frontend/css/chitietsanpham.css">
        <link rel="stylesheet" type="text/css" href="http://localhost/webbanhang/public/frontend/css/bootstrap.min.css">

        <!--1-->
        <script src="http://localhost/webbanhang/public/frontend/js/jquery-3.2.1.min.js"></script>
        <script src="http://localhost/webbanhang/public/frontend/js/bootstrap.min.js"></script>
        <!--2-->
        <link rel="stylesheet" type="text/css" href="http://localhost/webbanhang/public/frontend/css/slick.css">
        <link rel="stylesheet" type="text/css" href="http://localhost/webbanhang/public/frontend/css/slick-theme.css">
        
        <!--3 SLIDE-->
        <link rel="stylesheet" type="text/css" href="http://localhost/webbanhang/public/frontend/css/style.css">

        <!-- owl carousel libraries -->
        <link rel="stylesheet" href="http://localhost/webbanhang/public/frontend/lib/owlcarousel/owl.carousel.min.css">
        <link rel="stylesheet" href="http://localhost/webbanhang/public/frontend/lib/owlcarousel/owl.theme.default.min.css">
        <script src="http://localhost/webbanhang/public/frontend/lib/owlcarousel/owl.carousel.min.js"></script>

        <!--4 Icon-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <!--5 Thanh toán-->
        <link rel="stylesheet" href="http://sandbox.vnpayment.vn/paymentv2/vpcpay.html?vnp_Amount=10000000&vnp_BankCode=NCB&vnp_Command=pay&vnp_CreateDate=20170829103111&vnp_CurrCode=VND&vnp_IpAddr=172.16.68.68&vnp_Locale=vn&vnp_Merchant=DEMO&vnp_OrderInfo=Nap+tien+cho+thue+bao+0123456789.+So+tien+100%2c000&vnp_OrderType=topup&vnp_ReturnUrl=http%3a%2f%2fsandbox.vnpayment.vn%2ftryitnow%2fHome%2fVnPayReturn&vnp_TmnCode=2QXUI4J4&vnp_TxnRef=23554&vnp_Version=2&vnp_SecureHashType=SHA256&vnp_SecureHash=e6ce09ae6695ad034f8b6e6aadf2726f">
        <link href="/vnpay_php/assets/jumbotron-narrow.css" rel="stylesheet">  
        <script src="/vnpay_php/assets/jquery-1.11.3.min.js"></script>
    </head>
    <body>

        <!--HEADER-->
        <header>
            <div class="wrap-main">
                <div id="header">
                    <div id="header-top">
                        <div class="container">
                            <div class="row clearfix">
                                <div class="header-main">

                                    <div class="col-md-1" id="logoindex" style="width: 65px; padding-top: 10px">
                                        <a class="logo" title="Logo MiuShop" href="index.php" aria-label="logo">
                                            <img src="images/img/img1.jpg" alt="logo-trang-chu" class="logo-img1"
                                            width="40px" height="40px">
                                        </a>
                                    </div>
                                    <div class="col-md-2" id="logoindex" style="width: 150px; padding-top: 5px; margin-left: -15px">
                                        <a class="logo" title="Logo MiuShop" href="index.php" aria-label="logo">
                                            <img src="images/img/img2.png" alt="Miu Shop" class="logo-img2"
                                            width="150px" height="55px">
                                        </a>
                                    </div>

                                    <div class="col-md-3">
                                        <form class="form-inline" id="search-site" action="">
                                            <div class="form-group form-search" style="margin-bottom: 5px; width: 100%">
                                                <input class="form-control" id="search-keyword" name="keywork"
                                                type="text" aria-label="Bạn tìm gì..." placeholder="Bạn tìm gì..."
                                                maxlength="100">
                                                <button class="btn btn-default" type="submit" aria-label="TÌm kiếm">
                                                    <i class="fa fa-search"></i>
                                                </button>
                                            </div>
                                            <?php if(isset($_SESSION['error_s'])) :?>
                                                <div style="color: red; margin-top: -15px">
                                                    <?php echo $_SESSION['error_s'];unset($_SESSION['error_s']); ?>
                                                </div>
                                            <?php endif; ?>
                                        </form>
                                    </div>

                                    <div class="col-md-2" style="padding-left: 0px;">
                                        <div class="myCart" id="giohang">
                                            <a href="giohang.php" title="Giỏ hàng">
                                                <i class="fa fa-shopping-basket"> Giỏ Hàng</i>
                                            </a>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6" style="width: 40%">
                                        <nav id="header-nav-top">
                                            <ul class="list-inline pull-right" id="headermenu">
                                                <?php if(isset($_SESSION['name_user'])): ?>
                                                    Xin chào <?php echo $_SESSION['name_user'] ?>
                                                    <li style="margin-left: 10px;">
                                                        <a href="#">
                                                            <i class="fa fa-user"></i> Tài khoản <i class="fa fa-caret-down"></i>
                                                        </a>
                                                        <ul id="header-submenu">
                                                            <li>
                                                                <a href="thongtin.php">
                                                                    <i class="fa fa-info"></i>
                                                                    Thông tin
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="giohang.php">
                                                                    <i class="fa fa-shopping-cart"></i>
                                                                    Giỏ hàng
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="thoat.php">
                                                                    <i class="fa fa-sign-out"></i>
                                                                    Thoát
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                <?php else: ?>
                                                    <li>
                                                        <div class="chung">
                                                            <a href="dangki.php">
                                                                <i class="fa fa-user"></i> Đăng kí
                                                            </a>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="chung">
                                                            <a href="dangnhap.php?path=<?php echo $_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'] ?>">
                                                                <i class="fa fa-unlock"></i> Đăng nhập
                                                            </a>
                                                        </div>
                                                    </li>
                                                <?php endif ?>
                                            </ul>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

    
    <!--END HEADER-->

    <!--MENU NAV-->
    <div id="menunav">
        <div class="container" id="wrap-nav">
            <nav class="wrap-nav-nav">
                <div class="container-fluid">
                    <div class="home pull-left">
                        <!--Menu main-->
                        <ul id="menu-main" class="nav navbar-nav">
                            <li class="active">
                                <a href="index.php" class="index" title="Trang chủ trang web">Trang chủ</a>
                            </li>
                            <li>
                                <a href="dienthoai.php" class="mobile" title="Điện thoại di động, smartphone">Điện thoại</a>
                            </li>
                            <li>
                                <a href="laptop.php?the=hot" class="laptop" title="Máy tính xách tay, Laptop">Laptop</a>
                            </li>
                            <li>
                                <a href="phukien.php" class="phukien" title="Phụ kiện đi kèm">Phụ kiện</a>
                            </li>
                            <li>
                                <a href="maytinhdeban.php" class="pc" title="PC, Máy In">PC, Máy in</a>
                            </li>
                            <li>
                                <a href="tablet.php" class="tablet" title="Máy tính để bàn, Tablet">Tablet</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            
        </div>
    </div>
    <!--END MENU NAV-->
    </header>

<div id="maincontent">
<div class="container">