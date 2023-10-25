<?php require_once __DIR__. '/autoload/autoload.php';

$id = $_SESSION['name_id'];
$sql = "SELECT * FROM transaction WHERE users_id = $id";
$trans = $db->fetchsql($sql);

?>

<?php require_once __DIR__. '/includes/header.php'; ?>

<div class="col-md-12 bor">
    <section class="box-main1">
        <?php if(count($trans) > 0) :?>
            <div class="header-modal1-2" style="margin-bottom: 10px; margin-left: 45%;">
                Lịch sử mua hàng
            </div>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Tên người nhận</th>
                        <th scope="col">Số điện thoại</th>
                        <th scope="col">Địa chỉ</th>
                        <th scope="col">Ngày mua hàng</th>
                        <th scope="col">Tổng tiền</th>
                        <th scope="col">Chi tiết</th>
                    </tr>
                </thead>
            
                <tbody>
                    <?php $stt=1; $sum = 0; foreach($trans as $item) : ?>
                        <tr>
                            <th scope="row"><?php echo $stt ?></th>
                            <td>
                                <?php echo $item['name'] ?>
                            </td>
                            <td>
                                <?php echo $item['phone'] ?>
                            </td>
                            <td>
                                <?php echo $item['address'] ?>
                            </td>
                            <td>
                                <?php echo $item['created_at'] ?>
                            </td>
                            <td>
                                <?php echo formatPrice($item['amount']) ?> đ
                            </td>
                            <td>
                                <a class="btn btn-info" href="chitietdonhang.php?id=<?php echo $item['id'] ?>">Xem</a>
                            </td>
                        </tr>
                    <?php $stt += 1; endforeach ?>
                </tbody>
            </table>
        <?php else: ?>
            <section style="background: #fff;">
                <div class="null_cart">
                    <img src="images/img/img9.jpg" alt="giỏ hàng trống" class="anh9" height="150px" width="200px">
                    <div class="callship">
                        Bạn chưa từng mua sản phẩm nào!
                    </div>
                    <a href="http://localhost/webbanhang/" class="buy other">Mua hàng bây giờ</a>
                    <div class="callship">
                        Khi cần trợ giúp vui lòng gọi <strong style="font-size: 20px;">1800.1999</strong> (7h30 - 22h)
                    </div>
                </div>
            </section>
        <?php endif ?>
    </section>
</div>

<?php require_once __DIR__. '/includes/footer.php'; ?>