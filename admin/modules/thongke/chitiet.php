<?php
require_once __DIR__. '/../../autoload/autoload.php';

$dem1 = $db->countTable("phone");
$dem2 = $db->countTable("laptop");
$dem3 = $db->countTable("accessories");
$dem4 = $db->countTable("tablet");
$dem5 = $db->countTable("manhinh");
$dem6 = $db->countTable("mayin");

$dem7 = $db->dem("product", "category_id", "category_id = 28");
$dem8 = $db->dem("product", "category_id", "category_id = 29");
$dem9 = $db->dem("product", "category_id", "category_id = 30");
$dem10 = $db->dem("product", "category_id", "category_id = 31");
$dem11 = $db->dem("product", "category_id", "category_id = 32");
$dem12 = $db->dem("product", "category_id", "category_id = 33");
$dem13 = $db->dem("product", "category_id", "category_id = 34");
$dem14 = $db->dem("product", "category_id", "category_id = 35");
$dem15 = $db->dem("product", "category_id", "category_id = 36");
$dem16 = $db->dem("product", "category_id", "category_id = 37");
$dem17 = $db->dem("product", "category_id", "category_id = 38");
$dem18 = $db->dem("product", "category_id", "category_id = 39");
$dem19 = $db->dem("product", "category_id", "category_id = 40");
$dem20 = $db->dem("product", "category_id", "category_id = 41");
$dem21 = $db->dem("product", "category_id", "category_id = 42");
$dem22 = $db->dem("product", "category_id", "category_id = 63");

$dem23 = $db->dem("product", "category_id", "category_id = 43");
$dem24 = $db->dem("product", "category_id", "category_id = 44");
$dem25 = $db->dem("product", "category_id", "category_id = 45");
$dem26 = $db->dem("product", "category_id", "category_id = 46");
$dem27 = $db->dem("product", "category_id", "category_id = 47");
$dem28 = $db->dem("product", "category_id", "category_id = 48");
$dem29 = $db->dem("product", "category_id", "category_id = 49");
$dem30 = $db->dem("product", "category_id", "category_id = 50");

$dem31 = $db->dem("product", "category_id", "category_id = 53");
$dem32 = $db->dem("product", "category_id", "category_id = 54");
$dem33 = $db->dem("product", "category_id", "category_id = 55");
$dem34 = $db->dem("product", "category_id", "category_id = 56");
$dem35 = $db->dem("product", "category_id", "category_id = 57");
$dem36 = $db->dem("product", "category_id", "category_id = 58");
$dem37 = $db->dem("product", "category_id", "category_id = 59");
$dem38 = $db->dem("product", "category_id", "category_id = 60");
$dem39 = $db->dem("product", "category_id", "category_id = 61");
$dem40 = $db->dem("product", "category_id", "category_id = 62");
$dem41 = $db->dem("product", "category_id", "category_id = 70");

$dem42 = $db->dem("product", "category_id", "category_id = 51");
$dem43 = $db->dem("product", "category_id", "category_id = 65");
$dem44 = $db->dem("product", "category_id", "category_id = 66");
$dem45 = $db->dem("product", "category_id", "category_id = 67");
$dem46 = $db->dem("product", "category_id", "category_id = 68");
$dem47 = $db->dem("product", "category_id", "category_id = 69");


$dem48 = $db->dem("product", "category_id", "category_id = 52");
$dem49 = $db->dem("product", "category_id", "category_id = 64");
$dem50 = $db->dem("product", "category_id", "category_id = 72");
$dem51 = $db->dem("product", "category_id", "category_id = 73");
?>

<?php require_once __DIR__. '/../../includes/header.php'; ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Thống kê sản phẩm</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item">
                    <a href="index.php">Bảng điều khiển</a>
                </li>
                <li class="breadcrumb-item active">Thống kê sản phẩm</li>
            </ol>

            <div class="card mb-4">
                <div class="clearfix"></div>
                <?php if(isset($_SESSION['success'])) :?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $_SESSION['success'];unset($_SESSION['success']); ?>
                    </div>
                <?php endif; ?>

                <?php if(isset($_SESSION['error'])) :?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $_SESSION['error'];unset($_SESSION['error']); ?>
                    </div>
                <?php endif; ?>

                <table class="table table-bordered dataTable" id="dataTable" 
                width="100%" cellspacing="0" role="grid" 
                aria-describedby="dataTable_info" style="width: 100%;">
                    <thead>
                        <tr role="row">

                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 20%;">Tên mục</th>

                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 15%;">Đơn vị</th>

                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 50%;">Thông tin</th>

                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 10%;">Chi tiết</th>
                            </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td>Điện thoại</td>
                            <td><?php echo $dem1 ." sản phẩm" ?></td>
                            <td>
                                <ul>
                                    <li>Iphone: <?php echo $dem7 ." sản phẩm" ?></li>
                                    <li>Samsung: <?php echo $dem9 ." sản phẩm" ?></li>
                                    <li>Oppo: <?php echo $dem10 ." sản phẩm" ?></li>
                                    <li>realme: <?php echo $dem13 ." sản phẩm" ?></li>
                                    <li>mobell: <?php echo $dem18 ." sản phẩm" ?></li>
                                    <li>vivo: <?php echo $dem12 ." sản phẩm" ?></li>
                                    <li>xiaomi: <?php echo $dem11 ." sản phẩm" ?></li>
                                    <li>oneplus: <?php echo $dem14 ." sản phẩm" ?></li>
                                    <li>nokia: <?php echo $dem16 ." sản phẩm" ?></li>
                                    <li>itel: <?php echo $dem19 ." sản phẩm" ?></li>
                                    <li>huawei: <?php echo $dem17 ." sản phẩm" ?></li>
                                    <li>masstel: <?php echo $dem20 ." sản phẩm" ?></li>
                                    <li>coolpad: <?php echo $dem22 ." sản phẩm" ?></li>
                                    <li>energizer: <?php echo $dem21 ." sản phẩm" ?></li>
                                    <li>blackberry: <?php echo $dem8 ." sản phẩm" ?></li>
                                    <li>vsmart: <?php echo $dem15 ." sản phẩm" ?></li>
                                    
                                </ul>
                            </td>
                            <td class="text-center">
                                <a class="btn btn-xs btn-info" href="<?php echo modules("phone") ?>">Đến</a>
                            </td>
                        </tr>
                        <tr>
                            <td>Laptop</td>
                            <td><?php echo $dem2 ." sản phẩm" ?></td>
                            <td>
                                 <ul>
                                    <li>Acer: <?php echo $dem23 ." sản phẩm" ?></li>
                                    <li>Asus: <?php echo $dem24 ." sản phẩm" ?></li>
                                    <li>Dell: <?php echo $dem25 ." sản phẩm" ?></li>
                                    <li>HP: <?php echo $dem26 ." sản phẩm" ?></li>
                                    <li>Macbook: <?php echo $dem27 ." sản phẩm" ?></li>
                                    <li>Lenovo: <?php echo $dem28 ." sản phẩm" ?></li>
                                    <li>LG: <?php echo $dem29 ." sản phẩm" ?></li>
                                    <li>MSI: <?php echo $dem30 ." sản phẩm" ?></li>
                                 </ul>
                            </td>
                            <td class="text-center">
                            <a class="btn btn-xs btn-info" href="<?php echo modules("laptop") ?>">Đến</a>
                            </td>
                        </tr>
                        <tr>
                            <td>Phụ kiện</td>
                            <td><?php echo $dem3 ." sản phẩm" ?></td>
                            <td>
                                 <ul>
                                    <li>Chuột: <?php echo $dem31 ." sản phẩm" ?></li>
                                    <li>Loa: <?php echo $dem32 ." sản phẩm" ?></li>
                                    <li>Miếng dán: <?php echo $dem33 ." sản phẩm" ?></li>
                                    <li>Miếng lót bàn phím: <?php echo $dem34 ." sản phẩm" ?></li>
                                    <li>Sạc dự phòng: <?php echo $dem35 ." sản phẩm" ?></li>
                                    <li>Phụ kiện Ipad: <?php echo $dem36 ." sản phẩm" ?></li>
                                    <li>Adapter sạc: <?php echo $dem37 ." sản phẩm" ?></li>
                                    <li>Dây sạc: <?php echo $dem38 ." sản phẩm" ?></li>
                                    <li>Tai nghe: <?php echo $dem39 ." sản phẩm" ?></li>
                                    <li>USB: <?php echo $dem40 ." sản phẩm" ?></li>
                                    <li>Thẻ nhớ: <?php echo $dem41 ." sản phẩm" ?></li>
                                 </ul>
                            </td>
                            <td class="text-center">
                                <a class="btn btn-xs btn-info" href="<?php echo modules("accessories") ?>">Đến</a>
                            </td>
                        </tr>
                        <tr>
                            <td>Tablet</td>
                            <td><?php echo $dem4 ." sản phẩm" ?></td>
                            <td>
                                <ul>
                                    <li>Ipad: <?php echo $dem42 ." sản phẩm" ?></li>
                                    <li>Samsung: <?php echo $dem43 ." sản phẩm" ?></li>
                                    <li>Mobell: <?php echo $dem44 ." sản phẩm" ?></li>
                                    <li>Huawei: <?php echo $dem45 ." sản phẩm" ?></li>
                                    <li>Masstel: <?php echo $dem46 ." sản phẩm" ?></li>
                                    <li>Lenovo: <?php echo $dem47 ." sản phẩm" ?></li>
                                </ul>
                            </td>
                            <td class="text-center">
                            <a class="btn btn-xs btn-info" href="<?php echo modules("tablet") ?>">Đến</a>
                            </td>
                        </tr>
                        <tr>
                            <td>Màn hình</td>
                            <td><?php echo $dem5 ." sản phẩm" ?></td>
                            <td></td>
                            <td class="text-center">
                                <a class="btn btn-xs btn-info" href="<?php echo modules("manhinh") ?>">Đến</a>
                            </td>
                        </tr>
                        <tr>
                            <td>Máy in</td>
                            <td><?php echo $dem5 ." sản phẩm" ?></td>
                            <td>
                                <ul>
                                    <li>Canon: <?php echo $dem48 ." sản phẩm" ?></li>
                                    <li>HP: <?php echo $dem49 ." sản phẩm" ?></li>
                                    <li>Brother: <?php echo $dem50 ." sản phẩm" ?></li>
                                    <li>Mực in: <?php echo $dem51 ." sản phẩm" ?></li>
                                </ul>
                            </td>
                            <td class="text-center">
                                <a class="btn btn-xs btn-info" href="<?php echo modules("mayin") ?>">Đến</a>
                            </td>
                        </tr>
                        
                    </tbody>
                </table>
            
            </div>
        </div>
    </main>
</div>
<?php require_once __DIR__. '/../../includes/footer.php';?>
