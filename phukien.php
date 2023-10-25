<?php
require_once __DIR__. '/autoload/autoload.php';

$f = intval(getInput('f'));
$l = intval(getInput('l'));
$the = getInput('the');
$sx = getInput('sx');

$category = $db->fetchsql("SELECT * FROM category WHERE level = 1");

if($f == 0 && $l == 0)
{
    if($sx == "")
    {
        if($the == "hot")
        {
            $sql = "SELECT product.* FROM product LEFT JOIN category ON category.id = product.category_id WHERE category.level = 1 ORDER BY rated DESC";
            $ten = "shockaccessories-header";
        }
        else
        if($the == "new")
        {
            $sql = "SELECT product.* FROM product LEFT JOIN category ON category.id = product.category_id WHERE category.level = 1 ORDER BY id DESC";
            $ten = "shockaccessories-header-moi";
        }
        else
        if($the == "sale")
        {
            $sql = "SELECT product.* FROM product LEFT JOIN category ON category.id = product.category_id WHERE category.level = 1 ORDER BY sale DESC";
            $ten = "shockaccessories-header-giamgia";
        }
        else
        if($the == "cheap"){
            $sql = "SELECT product.* FROM product LEFT JOIN category ON category.id = product.category_id WHERE category.level = 1 ORDER BY price";
            $ten = "GIÁ RẺ";
        }
        else
        {
            $sql = "SELECT product.* FROM product LEFT JOIN category ON category.id = product.category_id WHERE category.level = 1 AND product.slug LIKE'%".$the."%' ";
            $ten = "shockaccessories-header";
        }
    }
    else
    {
        $sql = "SELECT product.* FROM product LEFT JOIN category ON category.id = product.category_id WHERE category.level = 1 ORDER BY price ".$sx;
        if($sx == "ASC")$sx2="TĂNG DẦN";
        else $sx2="GIẢM DẦN";
       $ten = "SẮP XẾP ".$sx2;
    }
}
else
{
    $sql = "SELECT product.* FROM product LEFT JOIN category ON category.id = product.category_id WHERE category.level = 1 AND product.price*(100-product.sale)/100 > ".$f."000000 AND product.price*(100-product.sale)/100 < ".$l."000000";
    $ten = "TỪ ".$f."TRIỆU ĐẾN ".$l."TRIỆU";
    if($l == 1000)
    {
        $ten = "trên ".$f."tr";
    }
}

$total = count($db->fetchsql($sql));
if(isset($_GET['page']))
{
    $p = $_GET['page'];
}
else
{
    $p = 1;
}

$product = $db->fetchJones("product",$sql,$total,$p,32,true);

if(isset($product))
{
    $sotrang = $product['page'];
    unset($product['page']);
}

?>

<?php require_once __DIR__. '/includes/header.php'; ?>

<div class="col-md-12 bor" style="margin: 10px 0; height: 255px">
    <?php require_once __DIR__. '/danhmucphukien.php'; ?>
</div>
<div class="col-md-12 bor" style=
"
position: relative;
border: 3px solid #ba0953;
margin-top: 5%;
min-height: 1px;
">
    <div class="<?php echo $ten ?>"></div>

    <section class="box-main1 clearfix" >
        
        <div class="showitem">
            <?php foreach ($product as $item): ?>
                <div class="col-md-2dot4 item-product bor index-laptop">
                    <a href="sanpham.php?id=<?php echo $item['id'] ?>">
                        <img src="<?php echo uploads() ?>product/<?php echo $item['thundar'] ?>" class="" 
                         style="margin: 9%;width: 80%; height: 250px;">
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

    <nav aria-label="Page navigation" style="text-align: center">
        <ul class="pagination pullright">
            <?php for($i = 1;$i <= $sotrang;$i++) : ?>
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
                    <a class="page-link" href="?the=<?php echo $the ?>&&page=<?php echo $i ; ?>">
                        <?php echo $i; ?>
                    </a>
                </li>
            <?php endfor; ?>
        </ul>
    </nav>
</div>


<?php require_once __DIR__. '/includes/footer.php'; ?>