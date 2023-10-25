<?php require_once __DIR__. '/autoload/autoload.php'; 

//_debug($_SESSION['cart']);
// unset($_SESSION['cart']);

$category = $db->fetchsql("SELECT * FROM category WHERE level=1 AND home=1");

$sqlRated = "SELECT product.* FROM product LEFT JOIN category ON category.id = product.category_id 
WHERE category.level = 1 ORDER BY rated DESC LIMIT 5";
$productRated = $db->fetchsql($sqlRated);

$sqlNew = "SELECT product.* FROM product LEFT JOIN category ON category.id = product.category_id 
WHERE category.level = 1 ORDER BY id DESC LIMIT 5";
$productNew = $db->fetchsql($sqlNew);

$sqlSale = "SELECT product.* FROM product LEFT JOIN category ON category.id = product.category_id 
WHERE category.level = 1 ORDER BY sale DESC LIMIT 5";
$productSale = $db->fetchsql($sqlSale);

$sqlCheap = "SELECT product.* FROM product LEFT JOIN category ON category.id = product.category_id 
WHERE category.level = 1 ORDER BY price LIMIT 5";
$productCheap = $db->fetchsql($sqlCheap);



?>


<?php require_once __DIR__. '/includes/header.php'; ?>
<div class="col-md-12 bor">
    <aside class="homebanner">
        <div class="bannerphukien">
            <div class="owl-carousel owl-theme" id="owl-phukien"></div>
        </div>
        
    </aside>

    <aside class="homenews">
        <figure>
            <h2>Tin công nghệ</h2>
            <b></b>
        </figure>
        <div class="right">
        <img src="images/tintuc/p1.png" style="cursor: pointer; margin-bottom: 10px;">
        <img src="images/tintuc/p2.png" style="cursor: pointer; margin-bottom: 10px;">
    </div>
    </aside>
    <script src="http://localhost/webbanhang/public/frontend/js/trangchu.js"></script>
    <script  src="http://localhost/webbanhang/public/frontend/js/slick.min.js"></script>

</div>

<div class="col-md-12">
    <div class="header-accessories">
        <h2> DANH MỤC PHỤ KIỆN</h2>
    </div>
</div>

<div class="col-md-12">
    <?php require_once __DIR__. '/danhmucphukien.php'; ?>
</div>


<hr>

<div class="col-md-12">
<section class="box-main1 clearfix" 
style=
"
position: relative;
border: 3px solid #ba0953;
margin-top: 8%;
min-height: 1px;
">
    
        <div class="shockaccessories-header"></div>

        <div class="showitem">
            <?php foreach ($productRated as $item): ?>
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

    <section class="box-main1 clearfix" 
style=
"
position: relative;
border: 3px solid #ba0953;
margin-top: 8%;
min-height: 1px;
">
        
        <div class="shockaccessories-header-moi"></div>

        <div class="showitem">
            <?php foreach ($productNew as $item): ?>
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

    <section class="box-main1 clearfix" 
style=
"
position: relative;
border: 3px solid #ba0953;
margin-top: 8%;
min-height: 1px;
">
        
        <div class="shockaccessories-header-giamgia"></div>

        <div class="showitem">
            <?php foreach ($productSale as $item): ?>
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
    <a href="#" class="xem-full">>>Xem tất cả</a>
        


</div>


<?php require_once __DIR__. '/includes/footer.php'; ?>