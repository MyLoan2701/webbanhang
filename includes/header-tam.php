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
            header("location:product.php?the=".$name);
        }
        else
        {
            header("location:phukien.php?the=".$name); 
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

        <style>
            header
{
    height: 120px;
    position: relative;
    top: 0;
    z-index: 3;
    overflow: hidden;
}
#header
{
    background-color: black;
    height: 60px;
    padding-top: 4px;
}
.wrap-main, .header-top 
{
    background: #000;
    max-height: 60px;
}
.header-top, .container-header, #header-main
{
    max-height: 60px;
    width: 100%;
}
#header-main
{
    padding: 0px 0px;
}
.col-md-1 
{
     float: left;
     display: block;
     padding: 6px;
     max-height: 60px;
     width: 145px;
     overflow: visible !important;
}
.col-md-1 .logo
{
    float: left;
    display: block;
    -webkit-font-smoothing: antialiased;
    display: block;
    position: absolute;
}
.logo-img1 
{
    height: 40px;
    width: 40px;
    border: 0.5px solid white;
    border-radius: 50%;
}
.logo-img2 
{
    padding-left: 10px;
    padding-top: 5px;
    height: 40px;
    width: 80px;
    margin-left: 40px;
}

.col-md-2
{
    width: 25%;
    display: flex;
    position: relative;
    float: left;
    margin-top: 6px;
    padding-left: 0;
    max-height: 60px;
}
#search-site 
{
    height: 40px;
    position: relative;
    padding: 0px;
    width: 300px;
}
#header-main .form-search
{
    width: 100%;
    display: flex;
    position: relative;
    border: 0px solid #a8a8a8;
    height: 38px;
    border-radius: 4px;
}

#header-main .form-control, button
{
    font-size: 14px;
    border: 0px solid #a8a8a8;
    outline: none;
    border-radius: 0px;
    box-shadow: none;
}
.form-control
{
    margin: 0;
    padding-left: 10px;
    padding-right: 10px;
    line-height: 1.15;
    height: 38px;
    display: inline-block;
    width: 80%;
    vertical-align: middle;
}

#header-main .btn
{
    cursor: pointer;
    font-size: 14px;
    font-weight: 400;
    border: none;
    outline: none;
    box-shadow: none;
    line-height: 25px;
    background: #ccc;
    height: 38px;
    width: 20%;
    float: right;
    border-radius: 0;
    position: relative;
    overflow: visible;
}

#header-main .btn:hover i 
{
    color: yellow;
}

.col-md-3
{
    min-width: 120px;
    padding-left: 0;
}
#giohang
{
    border: 1px solid #ccc;
    width: 100px;
    float: left;
    margin-top: 6px;
    height: 38px;
    text-align: center;
    padding-top: 10px;
}
#giohang:hover
{
    background: red;
}
#giohang i
{
    font-size: 16px;
    color: white;
}
/* ===Button thu=== */
#header-nav-top ul li button
{
    background-color: #ffffff00;
    
    padding: 0 5px;
    margin: 0;
    border: 1px solid #ccc;
    cursor: pointer;
    width: 120px;
    height: 38px;
}
#header-nav-top ul li button:hover 
{
    background-color: #bb264d;
}
#header-nav-top .list-inline .nut01, #header-nav-top .list-inline .nut02
{
    width: auto;
}


#shareicon-menu
{
    background: black;
}
#shareicon
{
    overflow: hidden;
    float: right;
}
#shareicon ul li 
{
    float: left;
    list-style: none;
}
#shareicon ul li i
{
    font-size: 30px;
}
.fa-facebook, .fa-twitter, .fa-google-plus
{
    font-size: 25px;
    color: white;
    padding-top: 5px;
    margin: 6px 10px;
}
.fa-facebook:hover
{
    color: #3B5998;
}
.fa-twitter:hover
{
    color:  #55ACEE;
}
.fa-google-plus:hover{
    color: red;
}

.col-md-5-1{
    background: black;
    float: right;
    max-height: 50px;
    overflow: hidden;
}
#header-nav-top ul li {
    float: left;
    list-style: none;
    margin-left: 10px;
}
#header-nav-top ul li i
{
    font-size: 20px;
    padding-right: 5px;
    padding-top: 6px;
    color: white;
}

#header-submenu
{
    display: none;
    position: absolute;
    border: 1px solid #e3e3e3;
    width: 50%;
    margin-left: -6px;
    z-index: 999999999;
    background: white;
}
#header-submenu li:hover
{
    background-color: #ea3a3c;
    color: white;
}
#header-submenu li:hover a 
{
    color: white;
}
#header-nav-top #header-menu
{
    position: relative;
}
#header-menu li{
    margin-top: 5px;
    margin-right: 5px;
}
#header-menu > li:hover > a,#header-menu > li:hover > a > i 
{
    color:blanchedalmond;
}

#header-menu li:hover  #header-submenu
{
    display: block;
}

        </style>
    </head>
    <body>

        <!--HEADER-->
        <header>
        <div class="wrap-main">
            <div id="header" class="container">
                <div class="header-top">
                    <div class="container-header">
                        <div id="header-main">
                            <div class="col-md-1">
                                <a class="logo" title="Logo trang web" href="index.php" aria-label="logo">
                                    <img src="images/img/img1.jpg" alt="logo-trang-chu" class="logo-img1">
                                </a>
                                <a class="logo" title="Logo trang web" href="index.php" aria-label="logo">
                                    <img src="images/img/img2.png" alt="Miu Shop" class="logo-img2">
                                </a>
                            </div>
                    
                            <div class="col-md-2">
                                <form id="search-site" action="timkiem.php" method="GET" autocomplete="off">
                                    <div class="form-search">
                                        <input class="form-control" id="search-keyword" name="keywork" type="text"
                                        aria-label="Bạn tìm gì..." placeholder="Bạn tìm gì..." 
                                        autocomplete="off" onkeyup="SuggestSearch(event,this, 0);" 
                                        maxlength="100">
                                        <button class="btn" type="submit" aria-label="Tìm kiếm">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </div>
                                    <?php
                                    if(isset($_SESSION['error_s']))
                                    :?>
                                    <div style="color: red;">
                                        <?php echo $_SESSION['error-s']; unset($_SESSION['error_s']); ?>
                                    </div>
                                    <?php endif ; ?>
                                </form>
                            </div>
                        </div>

                        <div id="shareicon-menu">
                    
                        <div class="col-md-3">
                            <div class="myCart" id="giohang">
                                <a href="giohang.php">
                                    <i class="fa fa-shopping-basket"> Giỏ Hàng</i>
                                </a>
                            </div>
                        </div>
                    
                        
                            <div class="col-md-4-1" id="shareicon">
                                <ul>
                                    <li>
                                        <a href="">
                                            <i class="fa fa-facebook"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="">
                                            <i class="fa fa-twitter"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="">
                                            <i class="fa fa-google-plus"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                    
                            <div class="col-md-5-1">
                                <nav id="header-nav-top">
                                    <ul class="list-inline pull-right" id="header-menu">
                                        <?php
                                        if(isset($_SESSION['name_user']))
                                        : ?>Xin chào<?php
                                        echo $_SESSION['name_user']
                                        ?>
                                        <li>
                                            <a href="">
                                                <i class="fa fa-user"></i>Tài Khoản<i class="fa fa-caret-down"></i>
                                            </a>

                                            <ul id="header-submenu">
                                                <li>
                                                    <a href="thongtin.php">
                                                        <i class="fa fa-info"></i>Thông Tin
                                                    </a>
                                                </li>
                                                <li>
                                                    <i class="fa fa-shopping-cart"></i>Giỏ Hàng
                                                </a>
                                            </li>
                                            <li>
                                                <a href="dangxuat.php">
                                                    <i class="fa fa-sign-out"></i>Thoát
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <?php else:?>
                                
                                    <li>
                                    <button onclick="document.getElementById('id01').style.display='block'" 
                                        class="nut01"><i class="fa fa-user">  Đăng Kí</i></button>
                                        <?php require_once __DIR__. '/dangki.php'; ?>
                                        <!--<a href="dangki.php">
                                            <i class="fa fa-user"> Đăng Kí</i>
                                        </a>-->
                                    </li>
                                    <li>
                                        <button onclick="document.getElementById('id02').style.display='block'"
                                        class="nut02"><i class="fa fa-unlock"> Đăng Nhập</i></button>
                                        <?php require_once __DIR__. '/dangnhap.php'; ?>
                                        
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
    
    <!--END HEADER-->

    <!--MENU NAV-->
    <div id="menunav">
        <div class="container" id="wrap-nav">
            <nav class="wrap-nav-nav">
                <div class="home pull-left">
                    <!--Menu main-->
                    <ul id="menu-main">
                        <li>
                        <a href="index.php" class="index" title="Trang chủ trang web">Home</a>
                        </li>
                        <li>
                        <a href="dienthoai.php" class="mobile" title="Điện thoại di động, smartphone">Mobie</a>
                        </li>
                        <li>
                        <a href="laptop.php?the=hot" class="laptop" title="Máy tính xách tay, Laptop">Laptop</a>
                        </li>
                        <li>
                        <a href="phukien.php" class="phukien" title="Phụ kiện đi kèm">Accessories</a>
                        </li>
                        <li>
                        <a href="maytinhdeban.php" class="pc" title="PC, Máy In">PC, Printer</a>
                        </li>
                        <li>
                        <a href="maytinhbang.php" class="tablet" title="Máy tính để bàn, Tablet">Tablet</a>
                        </li>
                    </ul>
                </div>
            </nav>
            
        </div>
    </div>
    <!--END MENU NAV-->
    </header>

<div id="maincontent">
<div class="container">