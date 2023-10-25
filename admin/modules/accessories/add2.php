<?php

require_once __DIR__. '/../../autoload/autoload.php';
$id_ac = getInput('id_cate');
$accessories = $db->fetchID("category",$id_ac);
$data =
[
    "id" => getInput('id'),
    "performance" => postInput('performance'),
    "capacity" => postInput('capacity'),
    "input" => postInput('input'),
    "output" => postInput('output'),
    "slot" => postInput('slot'),
    "longs" => postInput('longs'),
    "speed" => postInput('speed'),
    "rs" => postInput('rs'),
    "ws" => postInput('ws'),
    "compatible" => postInput('compatible'),
    "core" => postInput('core'),
    "extensions" => postInput('extensions'),
    "size" => postInput('size'),
    "weight" => postInput('weight'),
    "made" => postInput('made'),
    "connected" => postInput('connected'),
    "speaker" => postInput('speaker'),
    "dpi" => postInput('dpi'),
    "feature" => postInput('feature'),
    "usedtime" => postInput('usedtime'),
    "other" => postInput('other'),
];

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    //dang nhap thanh cong
    $id_insert = $db->insert("accessories", $data);
    if($id_insert > 0)
    {
        $_SESSION['success'] = "Thêm mới thành công!";
        redirectAdmin("accessories");
    }
    else
    {
        $_SESSION['error'] = "Thêm mới thất bại!";
        redirectAdmin("accessories");
    }
}
?>

<?php require_once __DIR__. '/../../includes/header.php'; ?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">THêm thông tin <?php echo $accessories["name"] ?></h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item">
                    <a href="index.html">Bảng Điều Khiển</a>
                </li>
                <li class="breadcrumb-item">Phụ kiện</li>
            </ol>

            <div class="clearfix"></div>
            <?php if(isset($_SESSION['error'])) :?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $_SESSION['error'];unset($_SESSION['error']); ?>
                </div>
            <?php endif; ?>

            <div class="card mb-4">
                <form action="" method="POST" enctype="multipart/form-data">
                    <?php if($accessories['slug'] == "sac-du-phong"): ?>
                        <div class="form-group row">
                            <label for="input1" class="col-sm-3 text-right">Hiệu Suất</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="input1" name="performance" 
                                value="<?php echo $data['performance'] ?>">
                            </div>
                        </div>
                    <?php endif; ?>

                    <?php if ($accessories['slug'] == "sac-du-phong" || $accessories['slug'] == "the-nho" || $accessories['slug'] == "usb"): ?>
                        <div class="form-group row">
                            <label for="input1" class="col-sm-3 text-right">Dung Lượng</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="input1" name="capacity" 
                                value="<?php echo $data['capacity'] ?>">
                            </div>
                        </div>
                    <?php endif; ?>

                    <?php if($accessories['slug'] == "sac-du-phong"): ?>
                        <div class="form-group row">
                            <label for="input1" class="col-sm-3 text-right">Đầu Vào</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="input1" name="input" 
                                value="<?php echo $data['input'] ?>">
                            </div>
                        </div>
                    <?php endif; ?>

                    <?php if ($accessories['slug'] == "sac-du-phong" || $accessories['slug'] == "adapter-sac" || $accessories['slug'] == "day-sac"): ?>
                        <div class="form-group row">
                            <label for="input1" class="col-sm-3 text-right">Đầu Ra</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="input1" name="output" 
                                value="<?php echo $data['output'] ?>">
                            </div>
                        </div>
                    <?php endif; ?>

                    <?php if($accessories['slug'] == "sac-du-phong"): ?>
                        <div class="form-group row">
                            <label for="input1" class="col-sm-3 text-right">Lõi</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="input1" name="core" 
                                value="<?php echo $data['core'] ?>">
                            </div>
                        </div>
                    <?php endif; ?>

                    <?php if($accessories['slug'] == "sac-du-phong" || $accessories['slug'] == "adapter-sac" || $accessories['slug'] == "loa"): ?>
                        <div class="form-group row">
                            <label for="input1" class="col-sm-3 text-right">Tiện ích</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="input1" name="extensions" 
                                value="<?php echo $data['extensions'] ?>">
                            </div>
                        </div>
                    <?php endif; ?>

                    <?php if($accessories['slug'] == "sac-du-phong" || $accessories['slug'] == "chuot" || $accessories['slug'] == "pk-ipad" || $accessories['slug'] == "ban-phim"): ?>
                        <div class="form-group row">
                            <label for="input1" class="col-sm-3 text-right">Trọng lượng</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="input1" name="weight" 
                                value="<?php echo $data['weight'] ?>">
                            </div>
                        </div>
                    <?php endif; ?>

                    <?php if($accessories['slug'] == "tai-nghe" || $accessories['slug'] == "loa"): ?>
                        <div class="form-group row">
                            <label for="input1" class="col-sm-3 text-right">Đầu cắm/Cổng</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="input1" name="slot" 
                                value="<?php echo $data['slot'] ?>">
                            </div>
                        </div>
                    <?php endif; ?>

                    <?php if($accessories['slug'] == "loa"): ?>
                        <div class="form-group row">
                            <label for="input1" class="col-sm-3 text-right">Kết nối khác</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="input1" name="other" 
                                value="<?php echo $data['other'] ?>">
                            </div>
                        </div>
                    <?php endif; ?>

                    <?php if($accessories['slug'] == "ban-phim"): ?>
                        <div class="form-group row">
                            <label for="input1" class="col-sm-3 text-right">Đèn Led</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="input1" name="extensions" 
                                value="<?php echo $data['extensions'] ?>">
                            </div>
                        </div>
                    <?php endif; ?>

                    <?php if($accessories['slug'] == "tai-nghe"): ?>
                        <div class="form-group row">
                            <label for="input1" class="col-sm-3 text-right">Kết nối cùng lúc</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="input1" name="connected" 
                                value="<?php echo $data['connected'] ?>">
                            </div>
                        </div>
                    <?php endif; ?>

                    <?php if($accessories['slug'] == "ban-phim"): ?>
                        <div class="form-group row">
                            <label for="input1" class="col-sm-3 text-right">Cách kết nối</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="input1" name="connected" 
                                value="<?php echo $data['connected'] ?>">
                            </div>
                        </div>
                    <?php endif; ?>

                    <?php if($accessories['slug'] == "day-sac" || $accessories['slug'] == "tai-nghe"): ?>
                        <div class="form-group row">
                            <label for="input1" class="col-sm-3 text-right">Độ dài dây</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="input1" name="longs" 
                                value="<?php echo $data['longs'] ?>">
                            </div>
                        </div>
                    <?php endif; ?>

                    <?php if($accessories['slug'] == "the-nho" || $accessories['slug'] == "usb"): ?>
                        <div class="form-group row">
                            <label for="input1" class="col-sm-3 text-right">Tốc độ chuẩn</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="input1" name="speed" 
                                value="<?php echo $data['speed'] ?>">
                            </div>
                        </div>
                    <?php endif; ?>

                    <?php if($accessories['slug'] == "the-nho" || $accessories['slug'] == "usb"): ?>
                        <div class="form-group row">
                            <label for="input1" class="col-sm-3 text-right">Tốc độ đọc</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="input1" name="rs" 
                                value="<?php echo $data['rs'] ?>">
                            </div>
                        </div>
                    <?php endif; ?>
                    
                    <?php if($accessories['slug'] == "the-nho" || $accessories['slug'] == "usb"): ?>
                        <div class="form-group row">
                            <label for="input1" class="col-sm-3 text-right">Tốc độ ghi</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="input1" name="ws" 
                                value="<?php echo $data['ws'] ?>">
                            </div>
                        </div>
                    <?php endif; ?>

                    <?php if($accessories['slug'] == "tai-nghe" || $accessories['slug'] == "loa" || $accessories['slug'] == "chuot" || $accessories['slug'] == "pk-ipad" || $accessories['slug'] == "ban-phim"): ?>
                        <div class="form-group row">
                            <label for="input1" class="col-sm-3 text-right">Tương thích</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="input1" name="compatible" 
                                value="<?php echo $data['compatible'] ?>">
                            </div>
                        </div>
                    <?php endif; ?>

                    <?php if($accessories['slug'] == "loa"): ?>
                        <div class="form-group row">
                            <label for="input1" class="col-sm-3 text-right">Loại loa</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="input1" name="speaker" 
                                value="<?php echo $data['speaker'] ?>">
                            </div>
                        </div>
                    <?php endif; ?>

                    <?php if($accessories['slug'] == "loa" || $accessories['slug'] == "usb"|| $accessories['slug'] == "pk-ipad" || $accessories['slug'] == "sac-du-phong" || $accessories['slug'] == "ban-phim"): ?>
                        <div class="form-group row">
                            <label for="input1" class="col-sm-3 text-right">Kích thước</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="input1" name="size" 
                                value="<?php echo $data['size'] ?>">
                            </div>
                        </div>
                    <?php endif; ?>

                    <?php if ($accessories['slug'] == "loa"): ?>
                        <div class="form-group row">
                            <label for="input1" class="col-sm-3 text-right">Tổng công suất</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="input1" name="capacity" 
                                value="<?php echo $data['capacity'] ?>">
                            </div>
                        </div>
                    <?php endif; ?>

                    <?php if ($accessories['slug'] == "chuot"): ?>
                        <div class="form-group row">
                            <label for="input1" class="col-sm-3 text-right">Độ phân giải</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="input1" name="dpi" 
                                value="<?php echo $data['dpi'] ?>">
                            </div>
                        </div>
                    <?php endif; ?>

                    <?php if ($accessories['slug'] == "chuot" || $accessories['slug'] == "ban-phim"): ?>
                        <div class="form-group row">
                            <label for="input1" class="col-sm-3 text-right">Độ dài dây/Khoảng cách kết nối</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="input1" name="longs" 
                                value="<?php echo $data['longs'] ?>">
                            </div>
                        </div>
                    <?php endif; ?>

                    <?php if ($accessories['slug'] == "pk-ipad"): ?>
                        <div class="form-group row">
                            <label for="input1" class="col-sm-3 text-right">Tính năng</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="input1" name="feature" 
                                value="<?php echo $data['feature'] ?>">
                            </div>
                        </div>
                    <?php endif; ?>

                    <?php if ($accessories['slug'] == "pk-ipad" || $accessories['slug'] == "tai-nghe" || $accessories['slug'] == "loa" || $accessories['slug'] == "sac-du-phong"): ?>
                        <div class="form-group row">
                            <label for="input1" class="col-sm-3 text-right">Thời gian sử dụng</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="input1" name="usedtime" 
                                value="<?php echo $data['usedtime'] ?>">
                            </div>
                        </div>
                    <?php endif; ?>

                    <div class="form-group row">
                        <label for="input1" class="col-sm-3 text-right">Sản xuất</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="input1" name="made"
                            value="<?php echo $data['made'] ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-6 container-fluid">
                            <button type="submit" class="btn btn-success">Lưu</button>
                        </div>
                    </div>
                    
                </form>
            </div>
        </div>
    </main>
</div>
<?php require_once __DIR__. '/../../includes/footer.php'; ?>