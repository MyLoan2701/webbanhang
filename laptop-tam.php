<?php require_once __DIR__. '/autoload/autoload.php'; 

//_debug($_SESSION['cart']);
// unset($_SESSION['cart']);

$category = $db->fetchsql("SELECT * FROM category WHERE level=0 AND home=1");

$sqlRated = "SELECT product.* FROM product LEFT JOIN category ON category.id = product.category_id 
WHERE category.level = 0 ORDER BY rated DESC LIMIT 4";
$productRated = $db->fetchsql($sqlRated);

$sqlNew = "SELECT product.* FROM product LEFT JOIN category ON category.id = product.category_id 
WHERE category.level = 0 ORDER BY id DESC LIMIT 4";
$productNew = $db->fetchsql($sqlNew);

$sqlSale = "SELECT product.* FROM product LEFT JOIN category ON category.id = product.category_id 
WHERE category.level = 0 ORDER BY sale DESC LIMIT 4";
$productSale = $db->fetchsql($sqlSale);

$sqlCheap = "SELECT product.* FROM product LEFT JOIN category ON category.id = product.category_id 
WHERE category.level = 0 ORDER BY price LIMIT 4";
$productCheap = $db->fetchsql($sqlCheap);

$sqlAcc = "SELECT product.* FROM product LEFT JOIN category ON category.id = product.category_id 
WHERE category.level = 1 ORDER BY price LIMIT 4";
$productAcc = $db->fetchsql($sqlAcc);

?>


<?php require_once __DIR__. '/includes/header.php'; ?>
<div class="col-md-12 bor">
    <aside class="homebanner">
        <div class="bannerlaptop">
            <div class="owl-carousel owl-theme" id="owl-laptop"></div>
        </div>
        
    </aside>
    <aside class="homenews">
        <figure>
            <h2>Tin công nghệ</h2>
            <b></b>
        </figure>
        <div class="right">
        <img src="images/tintuc/l1.png" style="cursor: pointer; margin-bottom: 10px;">
        <img src="images/tintuc/l2.png" style="cursor: pointer; margin-bottom: 10px;">
    </div>
    </aside>

    <script src="http://localhost/webbanhang/public/frontend/js/trangchu.js"></script>
    <script  src="http://localhost/webbanhang/public/frontend/js/slick.min.js"></script>

</div>

<!--Danh Mục-->
<?php require_once __DIR__. '/danhmuclaptop.php'; ?>
<!--end Danh Mục-->

<!--Index-->
<div class="col-md-12 bor">
    <section class="box-main1 clearfix">
        <img src="images/img/laptopnoibat.png" style="width:100%">

        <div class="showitem">
            <?php foreach ($productRated as $item): ?>
                <div class="col-md-2dot4 item-product bor index-laptop">
                    <div class="img-product" style="height: 280px">
                    <a href="sanpham.php?id=<?php echo $item['id'] ?>">
                        <img src="<?php echo uploads() ?>product/<?php echo $item['thundar'] ?>" class="" 
                        width="80%" height="80%" style="margin: 9%;">
                        <label class="hot" >Hot!!!</label>
                    </a>
                    </div>
                    
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
                        <p><a href=""><i class="fa fa-heart"></i></a></p>
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

    <section class="box-main1 clearfix">
        <img src="images/img/laptopmoi.jpg" style="width:100%">

        <div class="showitem">
            <?php foreach ($productNew as $item): ?>
                <div class="col-md-2dot4 item-product bor index-laptop">
                    <div class="img-product" style="height: 280px;">
                    <a href="sanpham.php?id=<?php echo $item['id'] ?>">
                        <img src="<?php echo uploads() ?>product/<?php echo $item['thundar'] ?>" class="" 
                        width="80%" height="80%" style="margin: 9%;">
                        <label class="new" >New!!!</label>
                    </a>
                    </div>
                    
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
                        <p><a href=""><i class="fa fa-heart"></i></a></p>
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

    <section class="box-main1 clearfix">
        <img src="images/img/laptopsieugiamgia.jpg" style="width:100%">

        <div class="showitem">
            <?php foreach ($productSale as $item): ?>
                <div class="col-md-2dot4 item-product bor index-laptop">
                    <div class="img-product" style="height: 280px;">
                    <a href="sanpham.php?id=<?php echo $item['id'] ?>">
                        <img src="<?php echo uploads() ?>product/<?php echo $item['thundar'] ?>" class="" 
                        width="80%" height="80%" style="margin: 9%;">
                        <label class="giamgia" >Giảm giá <?php echo $item['sale'] ?>%</label>
                    </a>
                    </div>
                    
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
                        <p><a href=""><i class="fa fa-heart"></i></a></p>
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
    <a href="laptop.php" class="xem-full">>>Xem tất cả</a>
</div>


<?php require_once __DIR__. '/includes/footer.php'; ?>