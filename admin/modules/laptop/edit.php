<?php
require_once __DIR__. '/../../autoload/autoload.php';

if($_SESSION['admin_lv'] == 1)
{
    $_SESSION['error'] = "Bạn không có quyền thay đổi thông tin này!";
    redirectAdmin("laptop");
}

$category = $db->fetchsql("SELECT * FROM category WHERE level=0");

$id = intval(getInput('id'));

$EditProduct = $db->fetchID("product",$id);
$EditProduct2 = $db->fetchID("laptop",$id);

if( empty($EditProduct))
{
    $_SESSION['error'] = "Dữ liệu không tồn tại";
    redirectAdmin("product");
}

if($_SERVER["REQUEST_METHOD"] == "POST")
{
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
        "CPU" => postInput('CPU'),
        "OCung" => postInput('OCung'),
        "RAM" => postInput('RAM'),
        "ManHinh" => postInput('ManHinh'),
        "CardManHinh" => postInput('CardManHinh'),
        "CongKetNoi" => postInput('CongKetNoi'),
        "HDH" => postInput('HDH'),
        "ThietKe" => postInput('ThietKe'),
        "KichThuoc" => postInput('KichThuoc'),
        "WebCam" => postInput('WebCam'),
        "Pin" => postInput('Pin'),
        "TrongLuong" => postInput('TrongLuong'),
    ];

    $error = [];
    if(postInput('name') == '')
    {
        $error['name'] = "Mời nhập tên sản phẩm.";
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
        if(count($isset) > 0 && $EditProduct['name'] != $data['name'])
        {
            $_SESSION['error'] = "Tên sản phẩm đã tồn tại!";
        }
        else
        {
            $id_update = $db->update("product",$data,array("id" => $id));
            $id_update2 = $db->update("laptop",$data2,array("id" => $id));
            if($id_update > 0 || $id_update2 > 0)
            {
                move_uploaded_file($file_tmp, $part.$file_name);
                $_SESSION['success'] = "Cập nhật thành công!";
                redirectAdmin("laptop");
            }
            else
            {
                $_SESSION['error'] = "Dữ liệu không đổi!";
                redirectAdmin("laptop");
            }
        }
    }
}
?>

<?php require_once __DIR__. '/../../includes/header.php'; ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Cập nhật laptop</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item">
                    <a href="index.php">Bảng điều khiển</a>
                </li>
                <li class="breadcrumb-item active">Cập nhật laptop</li>
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
                        <label for="input2" class="col-sm-2 text-right">Danh mục laptop</label>
                        <div class="col-sm-8">
                            <select class="form-control" name="category_id">
                                <option value="">-Chọn danh mục sản phẩm-</option>
                                <?php foreach ($category as $item): ?>
                                    <option value="<?php echo $item['id'] ?>" 
                                    <?php echo $EditProduct['category_id'] == $item['id'] ? "selected = 'selected'" : "" ?>>
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
                            name="name" value="<?php echo $EditProduct['name'] ?>">
                            <?php if (isset($error['name'])): ?>
                                <p class="text-danger"> <?php echo $error['name']; ?> </p>
                            <?php endif ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="input2" class="col-sm-2 text-right">Giá</label>
                        <div class="col-sm-8">
                            <input type="number" class="form-control" id="input2" 
                            name="price" value="<?php echo $EditProduct['price'] ?>">
                            <?php if (isset($error['price'])): ?>
                                <p class="text-danger"> <?php echo $error['price']; ?> </p>
                            <?php endif ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="input2" class="col-sm-2 text-right">Số lượng</label>
                        <div class="col-sm-8">
                            <input type="number" class="form-control" id="input2" 
                            name="number" value="<?php echo $EditProduct['number'] ?>">
                            <?php if (isset($error['number'])): ?>
                                <p class="text-danger"> <?php echo $error['number']; ?> </p>
                            <?php endif ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="input3" class="col-sm-2 text-right">Giảm giá</label>
                        <div class="col-sm-8">
                            <input type="number" class="form-control" id="input3" 
                            name="sale" placeholder="10%" value="<?php echo $EditProduct['sale'] ?>">
                        </div>

                        <label for="input4" class="col-sm-2 text-right">Hình ảnh</label>
                        <div class="col-sm-3">
                            <input type="file" class="form-control" id="input4" name="thundar">
                            <img src="<?php echo uploads(); ?>product/<?php echo $EditProduct['thundar'] ?>" width="50px" height="50px">
                            <?php if (isset($error['thundar'])): ?>
                                <p class="text-danger"> <?php echo $error['thundar']; ?> </p>
                            <?php endif ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="input5" class="col-sm-2 text-right">Nội dung</label>
                        <div class="col-sm-8">
                            <textarea class="form-control" name="content" rows="4">
                                <?php echo $EditProduct['content'] ?>
                            </textarea>
                            <?php if (isset($error['content'])): ?>
                                <p class="text-danger"> <?php echo $error['content']; ?> </p>
                            <?php endif ?>
                        </div>
                    </div>

                    <div class="form-group row">
                    <label for="input2" class="col-sm-2 text-right">CPU</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="input2" 
                            name="CPU" value="<?php echo $EditProduct2['CPU'] ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                    <label for="input2" class="col-sm-2 text-right">RAM</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="input2" 
                            name="RAM" value="<?php echo $EditProduct2['RAM'] ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                    <label for="input2" class="col-sm-2 text-right">Ổ cứng</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="input2" 
                            name="OCung" value="<?php echo $EditProduct2['OCung'] ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                    <label for="input2" class="col-sm-2 text-right">Màn Hình</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="input2" 
                            name="ManHinh" value="<?php echo $EditProduct2['ManHinh'] ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                    <label for="input2" class="col-sm-2 text-right">Card màn hình</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="input2" 
                            name="CardManHinh" value="<?php echo $EditProduct2['CardManHinh'] ?>">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                    <label for="input2" class="col-sm-2 text-right">Cổng kết nối</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="input2" 
                            name="CongKetNoi" value="<?php echo $EditProduct2['CongKetNoi'] ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                    <label for="input2" class="col-sm-2 text-right">HDH</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="input2" 
                            name="HDH" value="<?php echo $EditProduct2['HDH'] ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                    <label for="input2" class="col-sm-2 text-right">Thiết kế</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="input2" 
                            name="ThietKe" value="<?php echo $EditProduct2['ThietKe'] ?>">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                    <label for="input2" class="col-sm-2 text-right">Kich thước</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="input2" 
                            name="KichThuoc" value="<?php echo $EditProduct2['KichThuoc'] ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                    <label for="input2" class="col-sm-2 text-right">Web Cam</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="input2" 
                            name="WebCam" value="<?php echo $EditProduct2['WebCam'] ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                    <label for="input2" class="col-sm-2 text-right">Pin</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="input2" 
                            name="Pin" value="<?php echo $EditProduct2['Pin'] ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                    <label for="input2" class="col-sm-2 text-right">Trọng lượng</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="input2" 
                            name="TrongLuong" value="<?php echo $EditProduct2['TrongLuong'] ?>">
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