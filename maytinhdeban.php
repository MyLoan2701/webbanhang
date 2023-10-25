
<?php require_once __DIR__. '/autoload/autoload.php';

$the = getInput('the');

$category = $db->fetchsql("SELECT * FROM category WHERE level=5 AND home=1");

if($the == "")
{
    $sqlRated = "SELECT product.* FROM product LEFT JOIN category ON category.id = product.category_id WHERE category.level = 5 ORDER BY rated DESC";

}
else
{
    $sqlRated = "SELECT product.* FROM product LEFT JOIN category ON category.id = product.category_id WHERE category.level = 5 AND product.slug LIKE'%".$the."%' ";
}

$total = count($db->fetchsql($sqlRated));

if(isset($_GET['page']))
{
    $p = $_GET['page'];
}
else
{
    $p = 1;
}
$productRated = $db->fetchJones("product",$sqlRated,$total,$p,40,true);

if(isset($productRated))
{
    $sotrang = $productRated['page'];
    unset($productRated['page']);
}
?>

<?php require_once __DIR__. '/includes/header.php'; ?>
<div class="tabslink">
    <a href="maytinhdeban.php" class="pc">Máy tính bộ - Màn hình</a>
    <a href="mayin.php" class>Máy in</a>
</div>

<div class="bannerpc">
    <div id="owl-home" class="owl-carsourel owl-theme" style="opacity: 1; display:block;">
        <div class="owl-wrapper-outer">
            <div class="owl-wrapper" style="width: 20800px;">
                <div class="owl-item">
                    <img src="images/banner-pc/banner2.png" style="width: 765px">
                </div>
            </div>
        </div>
        
    </div>
    <div class="right">
        <img src="images/tintuc/pc1.png" style="cursor: pointer;margin-bottom: 10px;">
        <img src="images/tintuc/pc2.png" style="cursor: pointer;margin-bottom: 10px;">
    </div>

</div>

<hr>

<!--index-->
<div class="col-md-12 bor">
    <section class="box-main1 clearfix">
        <h1 class="h1">MÀN HÌNH MÁY TÍNH</h1>

        <div class="showitem">
            <?php foreach ($productRated as $item): ?>
                <div class="col-md-2dot4 item-product bor index-laptop">
                    <a href="sanpham.php?id=<?php echo $item['id'] ?>">
                        <img src="<?php echo uploads() ?>product/<?php echo $item['thundar'] ?>" class="" 
                        width="80%" height="80%" style="margin: 9%;">
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