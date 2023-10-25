<?php require_once __DIR__. '/autoload/autoload.php'; 

//_debug($_SESSION['cart']);
// unset($_SESSION['cart']);

$category = $db->fetchsql("SELECT * FROM category WHERE level=0 AND home=1");

//laptop
$sqlRatedLaptop = "SELECT product.* FROM product LEFT JOIN category ON category.id = product.category_id 
WHERE category.level = 0 ORDER BY rated DESC LIMIT 4";
$productRatedLaptop = $db->fetchsql($sqlRatedLaptop);

$sqlSale = "SELECT product.* FROM product LEFT JOIN category ON category.id = product.category_id 
WHERE category.level = 0 ORDER BY sale DESC LIMIT 5";
$productSale = $db->fetchsql($sqlSale);

$sqlNewlp = "SELECT product.* FROM product LEFT JOIN category ON category.id = product.category_id 
WHERE category.level = 0 ORDER BY id DESC LIMIT 4";
$productNewlp = $db->fetchsql($sqlNewlp);

//dienthoai
$sqlRatedDienthoai = "SELECT product.* FROM product LEFT JOIN category ON category.id = product.category_id 
WHERE category.level = 2 ORDER BY rated DESC LIMIT 5";
$productRatedDienthoai = $db->fetchsql($sqlRatedDienthoai);

$sqlNewdt = "SELECT product.* FROM product LEFT JOIN category ON category.id = product.category_id 
WHERE category.level = 2 ORDER BY id DESC LIMIT 5";
$productNewdt = $db->fetchsql($sqlNewdt);

$sqlSaledt = "SELECT product.* FROM product LEFT JOIN category ON category.id = product.category_id 
WHERE category.level = 2 ORDER BY sale DESC LIMIT 5";
$productSaledt = $db->fetchsql($sqlSaledt);

$sqlCheapdt = "SELECT product.* FROM product LEFT JOIN category ON category.id = product.category_id 
WHERE category.level = 2 ORDER BY price LIMIT 5";
$productCheapdt = $db->fetchsql($sqlCheapdt);


//maytinhbang
$sqlRatedTablet = "SELECT product.* FROM product LEFT JOIN category ON category.id = product.category_id 
WHERE category.level = 4 ORDER BY rated DESC LIMIT 5";
$productRatedTablet = $db->fetchsql($sqlRatedTablet);

$sqlNewtb = "SELECT product.* FROM product LEFT JOIN category ON category.id = product.category_id 
WHERE category.level = 4 ORDER BY id DESC LIMIT 5";
$productNewtb = $db->fetchsql($sqlNewtb);

$sqlSaletb = "SELECT product.* FROM product LEFT JOIN category ON category.id = product.category_id 
WHERE category.level = 4 ORDER BY sale DESC LIMIT 5";
$productSaletb = $db->fetchsql($sqlSaletb);


//manhinh
$sqlRatedManhinh = "SELECT product.* FROM product LEFT JOIN category ON category.id = product.category_id 
WHERE category.level = 5 ORDER BY rated DESC LIMIT 4";
$productRatedManhinh = $db->fetchsql($sqlRatedManhinh);

//mayin
$sqlRatedMayin = "SELECT product.* FROM product LEFT JOIN category ON category.id = product.category_id 
WHERE category.level = 3 ORDER BY rated DESC LIMIT 4";
$productRatedMayin = $db->fetchsql($sqlRatedMayin);

//pk
$sqlAcc = "SELECT product.* FROM product LEFT JOIN category ON category.id = product.category_id 
WHERE category.level = 1 ORDER BY price LIMIT 5";
$productAcc = $db->fetchsql($sqlAcc);



$sqlCheap = "SELECT product.* FROM product LEFT JOIN category ON category.id = product.category_id WHERE category.level = 2 ORDER BY price LIMIT 5";
$productCheap = $db->fetchsql($sqlCheap);

?>

<!------------------ main ----------------------->

<?php require_once __DIR__. '/includes/header.php'; ?>

<div class="col-md-12 bor">
    <aside class="homebanner">
        <div class="banner">
            <div class="owl-carousel owl-theme"></div>
        </div>
        
    </aside>
    <aside class="homenews">
        <figure>
            <h2>Tin công nghệ</h2>
            <b></b>
        </figure>
        <div class="fourbanner">
            <img src="images/tintuc/tin1.jpg" class="tin">
            <img src="images/tintuc/tin2.jpg" class="tin">
            <img src="images/tintuc/tin3.jpg" class="tin">
            <img src="images/tintuc/tin4.jpg" class="tin">
        </div>
    </aside>
    <div class="smallbanner"></div>

    <script src="http://localhost/webbanhang/public/frontend/js/trangchu.js"></script>
    <script  src="http://localhost/webbanhang/public/frontend/js/slick.min.js"></script>

</div>

<!--Index-->
<div class="col-md-12 bor">
    <section>
        <div style="height: 20px;">
            <img src="images/img/laptopnoibat.png" style="width:100%;position: absolute;z-index: -1;padding-right: 30px">
            <a href="laptop.php?the=hot" style="float: right;padding-top: 15px; color: white; padding-right: 20px">>>Xem tất cả</a>
        </div>

    <section class="box-main1 clearfix">
        
        <!--
        <img src="images/img/laptopnoibat.png" style="width:100%">
        <a href="laptop.php?the=hot" style="float: right; line-height: 50px">>>Xem tất cả</a>
-->

<!-- lt -->
        <div class="showitem">
            <?php foreach ($productRatedLaptop as $item): ?>
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
    </section>

    <section>
        <div style="height: 20px;">
            <img src="images/img/laptopsieugiamgia.jpg" style="width:100%;position: absolute;z-index: -1;padding-right: 30px">
            <a href="laptop.php?the=sale" style="float: right;padding-top: 15px; color: white; padding-right: 20px">>>Xem tất cả</a>
        </div>
    <section class="box-main1 clearfix">

        <div class="showitem">
            <?php foreach ($productSale as $item): ?>
                <div class="col-md-2dot4 item-product bor index-dienthoai">
                    <div class="img-product" style="height: 280px">
                    <a href="sanpham.php?id=<?php echo $item['id'] ?>">
                        <img src="<?php echo uploads() ?>product/<?php echo $item['thundar'] ?>" class="" 
                        width="80%" height="80%" style="margin: 9%;">
                        <label class="giamgia">Giảm giá!</label>
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
    </section>

    <section>
        <div style="height: 20px;">
            <img src="images/img/laptopmoi.jpg" style="width:100%;position: absolute;z-index: -1;padding-right: 30px">
            <a href="laptop.php?the=new" style="float: right;padding-top: 15px; color: white; padding-right: 20px">>>Xem tất cả</a>
        </div>
    <section class="box-main1 clearfix">
        
        <div class="showitem">
            <?php foreach ($productNewlp as $item): ?>
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
    </section>

<!-- dt -->
    <section>
        <div style="height: 20px;">
            <img src="images/img/dienthoainoibat.png" style="width:100%;position: absolute;z-index: -1;padding-right: 30px">
            <a href="dienthoai.php?the=hot" style="float: right;padding-top: 15px; color: white; padding-right: 20px">>>Xem tất cả</a>
        </div>
    <section class="box-main1 clearfix">
        
        <div class="showitem">
            <?php foreach ($productRatedDienthoai as $item): ?>
                <div class="col-md-2dot4 item-product bor index-dienthoai">
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

    <section>
        <div style="height: 20px;">
            <img src="images/img/dienthoaimoi.jpg" style="width:100%;position: absolute;z-index: -1;padding-right: 30px">
            <a href="dienthoai.php?the=new" style="float: right;padding-top: 15px; color: white; padding-right: 20px">>>Xem tất cả</a>
        </div>
    <section class="box-main1 clearfix">
        

        <div class="showitem">
            <?php foreach ($productNewdt as $item): ?>
                <div class="col-md-2dot4 item-product bor index-dienthoai">
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
    </section>

    <section>
        <div style="height: 20px;">
            <img src="images/img/dienthoaisieugiamgia.jpg" style="width:100%;position: absolute;z-index: -1;padding-right: 30px">
            <a href="dienthoai.php?the=sale" style="float: right;padding-top: 15px; color: white; padding-right: 20px">>>Xem tất cả</a>
        </div>
    <section class="box-main1 clearfix">

        <div class="showitem">
            <?php foreach ($productSaledt as $item): ?>
                <div class="col-md-2dot4 item-product bor index-dienthoai">
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
    </section>


<!-- tablet -->
    <section>
        <div style="height: 20px;">
            <img src="images/img/tabletnoibat.png" style="width:100%;position: absolute;z-index: -1; padding-right: 30px">
            <a href="tablet.php?the=hot" style="float: right;padding-top: 15px; color: white; padding-right: 20px">>>Xem tất cả</a>
        </div>
    <section class="box-main1 clearfix">

        <div class="showitem">
            <?php foreach ($productRatedTablet as $item): ?>
                <div class="col-md-2dot4 item-product bor index-dienthoai">
                    <div class="img-product" style="height: 280px">
                    <a href="sanpham.php?id=<?php echo $item['id'] ?>">
                        <img src="<?php echo uploads() ?>product/<?php echo $item['thundar'] ?>" class="" 
                        width="80%" height="80%" style="margin: 9%;">
                        <label class="hot">Hot!!!</label>
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
    </section>

    <section>
        <div style="height: 20px;">
            <img src="images/img/tabletmoi.jpg" style="width:100%;position: absolute;z-index: -1; padding-right: 30px">
            <a href="tablet.php?the=new" style="float: right;padding-top: 15px; color: white; padding-right: 20px">>>Xem tất cả</a>
        </div>
    <section class="box-main1 clearfix">
        
        <div class="showitem">
            <?php foreach ($productNewtb as $item): ?>
                <div class="col-md-2dot4 item-product bor index-dienthoai">
                    <div class="img-product" style="height: 280px;">
                    <a href="sanpham.php?id=<?php echo $item['id'] ?>">
                        <img src="<?php echo uploads() ?>product/<?php echo $item['thundar'] ?>" class="" 
                        width="80%" height="80%" style="margin: 9%;">
                        <label class="new">New!!!</label>
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
    </section>

    <section>
        <div style="height: 20px;">
            <img src="images/img/tabletsieugiamgia.jpg" style="width:100%;position: absolute;z-index: -1; padding-right: 30px">
            <a href="tablet.php?the=sale" style="float: right;padding-top: 15px; color: white; padding-right: 20px">>>Xem tất cả</a>
        </div>
    <section class="box-main1 clearfix">
        
        <div class="showitem">
            <?php foreach ($productSaletb as $item): ?>
                <div class="col-md-2dot4 item-product bor index-dienthoai">
                    <div class="img-product" style="height: 280px;">
                    <a href="sanpham.php?id=<?php echo $item['id'] ?>">
                        <img src="<?php echo uploads() ?>product/<?php echo $item['thundar'] ?>" class="" 
                        width="80%" height="80%" style="margin: 9%;">
                        <label class="giamgia">Giảm giá <?php echo $item['sale'] ?>%</label>
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
    </section>

    <!-- pk -->
    <section>
        <div style="height: 20px;">
            <img src="images/img/phukienchinhhang.png" style="width:100%;position: absolute;z-index: -1;padding-right: 30px">
            <a href="phukien.php?the=hot" style="float: right;padding-top: 15px; color: white; padding-right: 20px">>>Xem tất cả</a>
        </div>
    <section class="box-main1 clearfix">

        <div class="showitem">
            <?php foreach ($productAcc as $item): ?>
                <div class="col-md-2dot4 item-product bor index-dienthoai">
                    <div class="img-product" style="height: 280px">
                    <a href="sanpham.php?id=<?php echo $item['id'] ?>">
                        <img src="<?php echo uploads() ?>product/<?php echo $item['thundar'] ?>" class="" 
                        width="80%" height="80%" style="margin: 9%;">
                        <label class="hot">Hot!!!</label>
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
    </section>

    <section>
        <div style="height: 20px;">
            <img src="images/img/dienthoaigiare.jpg" style="width:100%;position: absolute;z-index: -1; padding-right: 30px">
            <a href="dienthoai.php?the=cheap" style="float: right;padding-top: 15px; color: white; padding-right: 20px">>>Xem tất cả</a>
        </div>
    <section class="box-main1 clearfix">

        <div class="showitem">
            <?php foreach ($productCheap as $item): ?>
                <div class="col-md-2dot4 item-product bor index-dienthoai">
                    <div class="img-product" style="height: 280px">
                    <a href="sanpham.php?id=<?php echo $item['id'] ?>">
                        <img src="<?php echo uploads() ?>product/<?php echo $item['thundar'] ?>" class="" 
                        width="80%" height="80%" style="margin: 9%;">
                        <label class="giare">Giá rẻ online</label>
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
    </section>
</div>

<?php require_once __DIR__. '/includes/footer.php'; ?>