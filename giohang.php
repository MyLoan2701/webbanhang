<?php require_once __DIR__. '/autoload/autoload.php';

$id = intval(getInput('id'));
$sl = intval(getInput('sl'));

if($id != "" && isset($_SESSION['cart'][$id]) && $sl == 0)
{
    $update = $db->update2("UPDATE `product` SET `number` = `number`+".$_SESSION['cart'][$id]['qty']." WHERE `id` = ".$id);
    unset($_SESSION['cart'][$id]);
}
else if($sl != 0 && isset($_SESSION['cart'][$id]))
{
    $sql = "SELECT `number` FROM product WHERE ".$id." = `id`";
    $number = $db->total($sql);
    if($number['number'] == 0)
	{
        $_SESSION['error'] = "Hết hàng!";
	}
    //$update = $db->update2("UPDATE `product` SET `number` = `number`-".$sl." WHERE `id` = ".$id);

   // _debug($update);
   else
   {
    $update = $db->update2("UPDATE `product` SET `number` = `number`-".$sl." WHERE `id` = ".$id);
    _debug($update);
    $_SESSION['cart'][$id]['qty'] += $sl;
    if($_SESSION['cart'][$id]['qty'] == 0)
    unset($_SESSION['cart'][$id]);
   }
    
}
?>


<?php require_once __DIR__. '/includes/header.php' ?>
<div class="col-md-12 bor">
    <main>
        <section class="box-main1">
        <?php if (isset($_SESSION['cart']) && count($_SESSION['cart'])>0): ?>
            
            <div class="container-giohang">
                <div class="CartPage">
                    <div class="cart">
                        <div class="cart-inner">
                            <div class="cart-inner-main">
                                <div class="header-modal1-2" style="margin-bottom: 10px;">
                                    Giỏ hàng
                                </div>

                                <div class="cart-products-inner">
                                    <div class="cart-products-group">
                                    
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th scope="col">STT</th>
                                                    <th scope="col">Hình ảnh</th>
                                                    <th scope="col">Tên sản phẩm</th>
                                                    <th scope="col">Giá</th>
                                                    <th scope="col">Số lượng</th>
                                                    <th scope="col">Thành tiền</th>
                                                    <th scope="col">Xóa</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                
                                                    <?php $stt=1;$sum=0 ;foreach ($_SESSION['cart'] as $item): ?>
                                                    <tr>
                                                        <th scope="row"><?php echo $stt ?></th>
                                                        <td>
                                                            <img src="<?php echo uploads() ?>product/<?php echo $item['thundar'] ?>" width="100px" height="100px">
                                                        </td>
                                                        <td style="font-weight: 500; width: 30%">
                                                            <?php echo $item['name'] ?>

                                                            <?php if(isset($_SESSION['error'])) :?>
                            <div class="alert alert-success" role="alert">
                                <?php echo $_SESSION['error'];unset($_SESSION['error']); ?>
                            </div>
                        <?php endif; ?>
                                                        </td>
                                                        <td style="width: 12%">
                                                            <?php echo formatPrice($item['price']) ?> đ
                                                        </td>
                                                        <td>
                                                            <button>
                                                                <a href="?sl=-1&id=<?php echo $item['id'] ?>">
                                                                    <i class="fa fa-minus"></i>
                                                                </a>
                                                            </button>
                                                            <input value="<?php echo $item['qty'] ?>">
                                                            <button>
                                                                <a href="?sl=1&id=<?php echo $item['id'] ?>">
                                                                    <i class="fa fa-plus"></i>
                                                                </a>
                                                            </button>
                                                        </td>
                                                        <td style="width: 12%">
                                                            <?php echo formatPrice($item['price']*$item['qty']) ?> đ
                                                        </td>
                                                        <td>
                                                            <a href="giohang.php?id=<?php echo $item['id'] ?>">
                                                                <i class="fa fa-trash"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <?php $stt+=1;$sum+=$item['price']*$item['qty']; endforeach ; $_SESSION['amount']=$sum?>
                                            </tbody>

                                            <!--<tfoot>
                                                <tr>
                                                    <th colspan="5" style="text-align: center;">Tổng tiền</th>
                                                    <th scope="col" style="color: red;"><?php echo formatPrice($sum) ?> đ</th>
                                                    <th scope="col"></th>
                                                </tr>
                                                <tr>
                                                    <td colspan="7">
                                                        <a href="dathang.php" class="btn btn-primary">Đặt hàng</a>
                                                        <button type="reset" class="btn btn-danger">Xóa hết</button>
                                                    </td>
                                                </tr>
                                            </tfoot>-->
                                                
                                        </table>
                                        
                                        
                                    </div>
                                </div>
                            </div>

                            
                        </div>

                        <div class="cart-total-prices">
                                <div class="cart-total-prices-inner">
                                    <div class="prices">
                                        <p class="prices-total">
                                            <span class="prices-text">Thành tiền</span>
                                            <span class="prices-value"><?php echo formatPrice($sum) ?> đ</span>
                                        </p>
                                    </div>
                                    <a href="dathang.php" class="cart-submit">Đặt hàng</a>

                                </div>
                        </div>

                        <?php else: ?>
                                            <?php require_once __DIR__. '/giohang-trong.php'?>
                    </div>
                </div>
            </div>
            <?php endif ?>
        </section>
    </main>
</div>

<main>

<?php require_once __DIR__. '/includes/footer.php'?>