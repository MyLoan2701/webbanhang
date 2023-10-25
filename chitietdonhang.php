<?php require_once __DIR__. '/autoload/autoload.php';

$id = intval(getInput('id'));
$sql = "SELECT product.name,product.thundar,orders.price,orders.qty FROM orders LEFT JOIN product ON orders.product_id = product.id WHERE orders.transaction_id = $id";
$order = $db->fetchsql($sql);
?>

<?php require_once __DIR__. '/includes/header.php'; ?>

<div class="col-md-12 bor">
    <section class="box-main1">
    <?php if (count($order)>0): ?>
        <div class="container-giohang">
                <div class="CartPage">
                    <div class="cart">
                        <div class="cart-inner">
                            <div class="cart-inner-main">
                                <div class="header-modal1-2" style="margin-bottom: 10px;">
                                    Chi tiết đơn hàng
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
                                                </tr>
                                            </thead>

                                            <tbody>
                                                                                             
                                                    <?php $stt=1;$sum=0 ;foreach ($order as $item): ?>
                                                    <tr>
                                                        <th scope="row"><?php echo $stt ?></th>
                                                        <td>
                                                            <img src="<?php echo uploads() ?>product/<?php echo $item['thundar'] ?>" width="100px" height="100px">
                                                        </td>
                                                        <td style="font-weight: 500; width: 30%">
                                                            <?php echo $item['name'] ?>
                                                        </td>
                                                        <td style="width: 12%">
                                                            <?php echo formatPrice($item['price']) ?> đ
                                                        </td>
                                                        <td>
                                                            <?php echo $item['qty'] ?>
                                                        </td>
                                                        <td style="width: 12%">
                                                            <?php echo formatPrice($item['price']*$item['qty']) ?> đ
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
                                    

                                </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        <?php endif ?>
    </section>
</div>

<?php require_once __DIR__. '/includes/footer.php'; ?>