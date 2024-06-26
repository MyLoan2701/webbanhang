<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Trang chủ</title>

        <link href="http://localhost/webbanhang/public/admin/css/styles.css" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>

    </head>
    <body>
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="index.php">Xin chào <span style="color: #007bff;"><?php echo $_SESSION['admin_name'] ?></span></a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#" style="margin-left: 10px;"><i class="fas fa-bars"></i></button
            ><!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i><?php echo $_SESSION['admin_name'] ?></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="#">Settings</a><a class="dropdown-item" href="#">Activity Log</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="http://localhost/webbanhang/admin/logout.php">Logout</a>
                    </div>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading"><a class="nav-link" href="<?php echo "http://localhost/webbanhang/" . "admin/" ?>">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Bảng điều khiển</a>
                            </div>
                            <a class="nav-link" href="<?php echo modules("category/") ?>"
                                ><div class="sb-nav-link-icon"><i class="fa fa-list"></i></div>
                                Danh sách thư mục</a>
                            <a class="nav-link" href="<?php echo modules("phone/") ?>"
                                ><div class="sb-nav-link-icon"><i class="fas fa-mobile"></i></div>
                                Điện thoại</a
                            >
                            <a class="nav-link" href="<?php echo modules("laptop/") ?>"
                                ><div class="sb-nav-link-icon"><i class="fa fa-laptop"></i></div>
                                Laptop</a
                            >
                            <a class="nav-link" href="<?php echo modules("accessories/") ?>"
                                ><div class="sb-nav-link-icon"><i class="fas fa-headphones"></i></div>
                                Phụ kiện</a
                            >
                            <a class="nav-link" href="<?php echo modules("manhinh/") ?>"
                                ><div class="sb-nav-link-icon"><i class="material-icons">&#xf108;</i></div>
                                Màn Hình</a
                            >
                            <a class="nav-link" href="<?php echo modules("mayin/") ?>"
                                ><div class="sb-nav-link-icon"><i class="material-icons">&#xe8ad;</i></div>
                                Máy in</a
                            >
                            <a class="nav-link" href="<?php echo modules("tablet/") ?>"
                                ><div class="sb-nav-link-icon"><i class="fa">&#xf10a;</i></div>
                                Tablet</a
                            >
                            <a class="nav-link" href="/webbanhang/admin/modules/admin/index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-user-alt"></i></div>
                                Admin</a
                            >
                            <a class="nav-link" href="<?php echo modules("user/") ?>"
                                ><div class="sb-nav-link-icon"><i class="fas fa-user-alt"></i></div>
                                Thành viên</a
                            >
                            <a class="nav-link" href="<?php echo modules("order/") ?>"
                                ><div class="sb-nav-link-icon"><i class="fa fa-shopping-basket"></i></div>
                                Đặt hàng</a
                            >
                            <a class="nav-link" href="<?php echo modules("thongke/") ?>"
                                ><div class="sb-nav-link-icon"><i class="fas">&#xf201;</i></div>
                                Thống kê</a
                            >
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Start Bootstrap
                    </div>
                </nav>
            </div>