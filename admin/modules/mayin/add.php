<?php
require_once __DIR__. '/../../autoload/autoload.php';

if($_SESSION['admin_lv'] == 1)
{
    $_SESSION['error'] = "Bạn không có quyền thêm thông tin này!";
    redirectAdmin("mayin");
}

$category = $db->fetchsql("SELECT * FROM category WHERE level=3");

$data =
[
    "name" => postInput('name'),
    "slug" => to_slug(postInput("name")),
    "category_id" => postInput('category_id'),
    "price" => postInput('price'),
    "content" => postInput('content'),
    "number" => postInput('number'),
    "sale" => postInput('sale'),
];
$data2 =
[
    "LoaiMay" => postInput('LoaiMay'),
    "ChucNang" => postInput('ChucNang'),
    "CongSuat" => postInput('CongSuat'),
    "TocDoIn" => postInput('TocDoIn'),
    "TuoiTho" => postInput('TuoiTho'),
    "ChatLuong" => postInput('ChatLuong'),
    "LoaiMuc" => postInput('LoaiMuc'),
    "ThoiGian" => postInput('ThoiGian'),
    "CongKetNoi" => postInput('CongKetNoi'),
    "TrongLuong" => postInput('TrongLuong'),
];

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $error = [];
    if(postInput('name') == '')
    {
        $error['name'] = "Mời nhập đầy đủ tên sản phẩm.";
    }
    if(postInput('category_id') == '')
    {
        $error['category_id'] = "Mời chọn tên danh mục.";
    }
    if(postInput('price') == '')
    {
        $error['price'] = "Mời nhập giá sản phẩm.";
    }
    if(postInput('content') == '')
    {
        $error['content'] = "Mời nhập nội dung sản phẩm.";
    }
    if(postInput('number') == '')
    {
        $error['number'] = "Mời nhập số lượng sản phẩm.";
    }
    if( ! isset($_FILES['thundar']))
    {
        $error['thundar'] = "Mời chọn hình ảnh.";
    }

    //dang nhap thanh cong
    if(empty($error))
    {
        $file_name = $_FILES['thundar']['name'];
        $file_tmp = $_FILES['thundar']['tmp_name'];
        $file_type = $_FILES['thundar']['type'];
        $file_error = $_FILES['thundar']['error'];

        if($file_error == 0)
        {
            $part = ROOT . "product/";
            $data['thundar'] = $file_name;
        }

        $isset = $db->fetchOne("product","name = '".$data['name']."' ");
        if(count($isset) > 0)
        {
            $_SESSION['error'] = "Tên sản phẩm đã tồn tại!";
        }
        else
        {
            $id_insert = $db->insert("product",$data);
            if($id_insert > 0)
            {
                $data2['id'] = $id_insert;
                $id_insert2 = $db->insert("mayin",$data2);
                move_uploaded_file($file_tmp, $part.$file_name);
                $_SESSION['success'] = "Thêm mới thành công!";
                redirectAdmin("mayin");
            }
            else
            {
                $_SESSION['error'] = "Thêm mới thất bại!";
                redirectAdmin("mayin");
            }
        }
    }
}
?>

<?php require_once __DIR__. '/../../includes/header.php'; ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Thêm mới máy in</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item">
                    <a href="index.php">Bảng điều khiển</a>
                </li>
                <li class="breadcrumb-item active">Thêm mới máy in</li>
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
                        <label for="input2" class="col-sm-2 text-right">Danh mục máy in</label>
                        <div class="col-sm-8">
                            <select class="form-control" name="category_id">
                                <option value="">-Chọn danh mục sản phẩm-</option>
                                <?php foreach ($category as $item): ?>
                                    <option value="<?php echo $item['id'] ?>">
                                        <?php echo $item['name'] ?>
                                    </option>
                                <?php endforeach ?>
                            </select>
                            <?php if (isset($error['category_id'])): ?>
                                <p class="text-danger"> <?php echo $error['category_id']; ?> </p>
                            <?php endif ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="input1" class="col-sm-2 text-right">Tên sản phẩm</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="input1" 
                            name="name" value="<?php echo $data['name'] ?>">
                            <?php if (isset($error['name'])): ?>
                                <p class="text-danger"> <?php echo $error['name']; ?> </p>
                            <?php endif ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="input2" class="col-sm-2 text-right">Giá</label>
                        <div class="col-sm-8">
                            <input type="number" class="form-control" id="input2" 
                            name="price" value="<?php echo $data['price'] ?>">
                            <?php if (isset($error['price'])): ?>
                                <p class="text-danger"> <?php echo $error['price']; ?> </p>
                            <?php endif ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="input2" class="col-sm-2 text-right">Số lượng</label>
                        <div class="col-sm-8">
                            <input type="number" class="form-control" id="input2" 
                            name="number" value="<?php echo $data['number'] ?>">
                            <?php if (isset($error['number'])): ?>
                                <p class="text-danger"> <?php echo $error['number']; ?> </p>
                            <?php endif ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="input3" class="col-sm-2 text-right">Giảm giá</label>
                        <div class="col-sm-8">
                            <input type="number" class="form-control" id="input3" 
                            name="sale" placeholder="10%" value="0">
                        </div>

                        <label for="input4" class="col-sm-2 text-right">Hình ảnh</label>
                        <div class="col-sm-3">
                            <input type="file" class="form-control" id="input4" name="thundar">
                            <?php if (isset($error['thundar'])): ?>
                                <p class="text-danger"> <?php echo $error['thundar']; ?> </p>
                            <?php endif ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="input5" class="col-sm-2 text-right">Nội dung</label>
                        <div class="col-sm-8">
                            <textarea class="form-control" name="content" rows="4"></textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                    <label for="input2" class="col-sm-2 text-right">Loại máy</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="input2" 
                            name="LoaiMay" value="<?php echo $data2['LoaiMay'] ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                    <label for="input2" class="col-sm-2 text-right">Chức năng</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="input2" 
                            name="ChucNang" value="<?php echo $data2['ChucNang'] ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                    <label for="input2" class="col-sm-2 text-right">Công suất</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="input2" 
                            name="CongSuat" value="<?php echo $data2['CongSuat'] ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                    <label for="input2" class="col-sm-2 text-right">Tốc độ in</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="input2" 
                            name="TocDoIn" value="<?php echo $data2['TocDoIn'] ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                    <label for="input2" class="col-sm-2 text-right">Tuổi thọ</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="input2" 
                            name="TuoiTho" value="<?php echo $data2['TuoiTho'] ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                    <label for="input2" class="col-sm-2 text-right">Chất lượng</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="input2" 
                            name="ChatLuong" value="<?php echo $data2['ChatLuong'] ?>">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                    <label for="input2" class="col-sm-2 text-right">Loại mực</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="input2" 
                            name="LoaiMuc" value="<?php echo $data2['LoaiMuc'] ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                    <label for="input2" class="col-sm-2 text-right">Thời gian in</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="input2" 
                            name="ThoiGian" value="<?php echo $data2['ThoiGian'] ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                    <label for="input2" class="col-sm-2 text-right">Cổng kết nối</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="input2" 
                            name="CongKetNoi" value="<?php echo $data2['CongKetNoi'] ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                    <label for="input2" class="col-sm-2 text-right">Trọng Lượng</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="input2" 
                            name="TrongLuong" value="<?php echo $data2['CongKetNoi'] ?>">
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