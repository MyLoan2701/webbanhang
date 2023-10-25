<?php
require_once __DIR__. '/autoload/autoload.php';
$category = $db->fetchAll("category");
?>

<?php require_once __DIR__. '/includes/header.php'; ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container_fluid">
            <h1 class="mt-4">Chào mừng đến với trang quản trị</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item">
                    <a href="index.php">Bảng Điều Khiển</a>
                </li>
                <li class="breadcrumb-item active">Admin</li>
<!--            </ol>
        </div>
    </main>
</div>
-->
<?php require_once __DIR__. '/includes/footer.php'; ?>