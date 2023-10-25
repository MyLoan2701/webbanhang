<?php
require_once __DIR__. '/../../autoload/autoload.php';

$category = $db->fetchAll("category");
/*
if(isset($_GET['page']))
{
    $p = $_GET['page'];
    if($p == 0) $p = 1;
}
else
{
    $p = 1;
}

$sql = "SELECT category.* FROM category";
$category = $db->fetchAll("category",$sql,$total,$p,10,true);

if(isset($category['category']))
{
    $sotrang = $category['page'];
    unset($category['page']);
}
if($sotrang < $p) $p = $sotrang;
*/
?>

<?php require_once __DIR__. '/../../includes/header.php'; ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Danh sách danh mục
                <a href="add.php" class="btn btn-success">Thêm mới</a>
            </h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item">
                    <a href="index.php">Bảng điều khiển</a>
                </li>
                <li class="breadcrumb-item active">Danh mục</li>
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
                            <th class="sorting_asc" tabindex="0" aria-controls="dataTable" 
                            rowspan="1" colspan="1" aria-sort="ascending" 
                            aria-label="Name: activate to sort column descending" 
                            style="width: 8%;">STT</th>

                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 20%;">Tên Dang Mục</th>

                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 15%;">Slug</th>

                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 12%;">Hình Ảnh</th>

                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 20%;">Thời gian tạo</th>

                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 20%;">Nút</th>
                            </tr>
                    </thead>

                    <tbody>
                        <?php $stt = 1;foreach ($category as $item): ?>
                            <tr>
                                <td><?php echo $stt ?></td>
                                <td><?php echo $item['name'] ?></td>
                                <td><?php echo $item['slug'] ?></td>
                                <td>
                                    <img src="<?php echo uploads() ?>category/<?php echo $item['images'] ?>" 
                                    width="80px" height="80px">
                                </td>

                                <td><?php echo $item['created_at'] ?></td>

                                <td>
                                    <a class="btn btn-xs btn-info" href="edit.php?id=<?php echo $item['id'] ?>">
                                        <i class="fa fa-edit"></i>Sửa
                                    </a>
                                    <a class="btn btn-xs btn-danger" href="delete.php?id=<?php echo $item['id'] ?>">
                                        <i class="fa fa-times"></i>Xóa
                                    </a>
                                </td>
                            </tr>
                        <?php $stt++; endforeach ?>
                    </tbody>
                </table>

                <!--
                <nav aria-label="Page navgation">
                    <ul class="pagination pullright">
                        <li class="page-item">
                            <a class="page-link" href="?page=<?php echo --$p ?>">Trước</a>
                        </li>
                        
                        <?php for($i = 1; $i <= $sotrang; $i++) : ?>
                            <?php
                            if(isset($_GET['page']))
                            {
                                $p = $_GET['page'];
                                if($p == 0) $p = 1;
                            }
                            else
                            {
                                $p = 1;
                            }
                            if($sotrang < $p) $p = $sotrang;
                            ?>

                        <li class="page-item <?php echo ($i == $p) ? 'active' : '' ?>">
                            <a class="page-link" href="?page=<?php echo $i; ?>">
                                <?php echo $i; ?>
                            </a>
                        </li>
                        <?php endfor; ?>

                        <li class="page-item">
                            <a class="page-link" href="?page=<?php echo ++$p ?>">Sau</a>
                        </li>
                    </ul>
                </nav>
                        -->
            </div>
        </div>
    </main>
</div>
<?php require_once __DIR__. '/../../includes/footer.php';?>
