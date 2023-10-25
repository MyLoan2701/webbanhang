<?php
require_once __DIR__. '/autoload/autoload.php'; 

$id = intval(getInput('id'));

$category = $db->fetchID("category",$id);

$catelv = intval($category['level']);

$sql1 = "SELECT * FROM product WHERE category_id = $id ORDER BY id DESC";

$f = intval(getInput('f'));
$l = intval(getInput('l'));
$the = getInput('the');
$sx = getInput('sx');

if($f == 0 && $l == 0)
{
    if($sx == "")
    {
        if($the == "hot")
        {
            $sql = "SELECT product.* FROM product LEFT JOIN category ON category.id = product.category_id WHERE category.level = $catelv ORDER BY rated DESC";
            $ten = "NỔI BẬT NHẤT";
        }
        else
        if($the == "new")
        {
            $sql = "SELECT product.* FROM product LEFT JOIN category ON category.id = product.category_id WHERE category.level = $catelv ORDER BY id DESC";
            $ten = "MỚI NHẤT";
        }
        else
        if($the == "sale")
        {
            $sql = "SELECT product.* FROM product LEFT JOIN category ON category.id = product.category_id WHERE category.level = $catelv ORDER BY sale DESC";
            $ten = "SIÊU GIẢM GIÁ";
        }
        else
        if($the == "cheap"){
            $sql = "SELECT product.* FROM product LEFT JOIN category ON category.id = product.category_id WHERE category.level = $catelv ORDER BY price";
            $ten = "GIÁ RẺ";
        }
        else
        {
            $sql = "SELECT * FROM product WHERE category_id = $id ORDER BY id DESC";
            $ten = "";
        }
    }
    else
    {

        $sql = "SELECT product.* FROM product LEFT JOIN category ON category.id = product.category_id WHERE category.level = {$catelv} AND product.category_id = {$id} ORDER BY price ".$sx;
        
        if($sx == "ASC")$sx2="tăng dần";
        else $sx2="giảm dần";
       $ten = "sắp xếp ".$sx2;
    }
}
else
{
    $sql = "SELECT product.* FROM product LEFT JOIN category ON category.id = product.category_id WHERE category.level = $catelv AND product.category_id = {$id} AND product.price*(100-product.sale)/100 > ".$f."000000 AND product.price*(100-product.sale)/100 < ".$l."000000";
    $ten = "TỪ ".$f."TRIỆU ĐẾN ".$l."TRIỆU";
    if($l == 1000)
    {
        $ten = "trên ".$f."tr";
    }
}

$total = count($db->fetchsql($sql1));

if(isset($_GET['page']))
{
    $p = $_GET['page'];
}
else
{
    $p = 1;
}

$product = $db->fetchJones("product",$sql,$total,$p,12,true);

if(isset($product))
{
    $sotrang = $product['page'];
    unset($product['page']);
}

?>

<?php require_once __DIR__. '/includes/header.php'; ?>

<!--Danh Mục-->
<?php if ($catelv == 0) :?>
<?php require_once __DIR__. '/danhmuclaptop.php';?>
<?php endif ?>

<?php if ($catelv == 1) :?>
    <div style="margin-bottom: 20px;">
        <?php require_once __DIR__. '/danhmucphukien.php';?>
    </div>
<?php endif ?>

<?php if ($catelv == 2) :?>
<?php require_once __DIR__. '/danhmucdienthoai.php';?>
<?php endif ?>

<?php if ($catelv == 4) :?>
<?php require_once __DIR__. '/danhmuctablet.php';?>
<?php endif ?>

<?php if ($catelv == 3) :?>
<?php require_once __DIR__. '/danhmucmayin.php';?>
<?php endif ?>

<!--san pham-->
<div class="col-md-12 bor">
    <section class="box-main1 clearfix">
        <div class="header-modal1-2 flexContain" style="margin-bottom: 10px; margin-left: 40%;">
            <?php if (!isset($_SESSION['error'])): ?>
                <?php echo $category['name']." ".$ten;?>
            <?php endif ?>
        </div>

        <div class="showitem col-md-12">
            <?php foreach($product as $item): ?>
                <div class="col-md-3 item-product bor">
                    <a href="sanpham.php?id=<?php echo $item['id'] ?>">
                        <img src="<?php echo uploads() ?>product/<?php echo $item['thundar'] ?>" 
                        class="" width="100%" height="270">
                    </a>

                    <div class="info-item">
                        <a href="sanpham.php?id=<?php echo $item['id'] ?>">
                            <?php echo $item['name'] ?>
                        </a>
                        <p>
                            <?php if ($item['sale'] > 0): ?>
                                <strike class="sale">
                                    <?php echo formatPrice($item['price']) ?> đ
                                </strike>
                            <?php endif ?>
                            <b class="price">
                                <?php echo formatPrice(formatSale($item['price'],$item['sale'])) ?> đ
                            </b>
                        </p>

                        <div class="ratingresult">
                            <i class="fa fa-star<?php if ($item['rated']<1): ?>-o<?php endif ?>"></i>
                            <i class="fa fa-star<?php if ($item['rated']<2): ?>-o<?php endif ?>"></i>
                            <i class="fa fa-star<?php if ($item['rated']<3): ?>-o<?php endif ?>"></i>
                            <i class="fa fa-star<?php if ($item['rated']<4): ?>-o<?php endif ?>"></i>
                            <i class="fa fa-star<?php if ($item['rated']<5): ?>-o<?php endif ?>"></i>
                            <span> <?php echo $item['comment'] ?> đánh giá </span>
                        </div>
                    </div>

                    <div class="hidenitem">
                        <p>
                            <a href="sanpham.php?id=<?php echo $item['id'] ?>">
                                <i class="fa fa-search"></i>
                            </a>
                        </p>
                        
                        <p>
                            <a href="cart.php?id=<?php echo $item['id'] ?>">
                                <i class="fa fa-shopping-basket"></i>
                            </a>
                        </p>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </section>

    <nav aria-label="Page navigation" style="text-align: center;">
        <ul class="pagination pullright">
            <?php for($i = 1; $i <= $sotrang; $i++):?>
                <?php
                if(isset($_GET['page']))
                {
                    $p = $_GET['page'];
                }
                else
                {
                    $p = 1;
                }
                ?>
                <li class="page-item <?php echo ($i == $p) ? 'active' : '' ?>">
                    <a class="page-link" href="?id=<?php echo $id ?>&&page=<?php echo $i ; ?>&&sx=<?php echo $sx ; ?>&&f=<?php echo $f ; ?>&l=<?php echo $l ; ?>">
                        <?php echo $i; ?>
                    </a>
                </li>
            <?php endfor; ?>
        </ul>
    </nav>
</div>

<?php require_once __DIR__. '/includes/footer.php'; ?>