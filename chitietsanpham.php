<!-- CHUA VIẾT CSS -->


<?php require_once __DIR__. '/includes/header.php'; ?>

<div class="col-md-12 bor">
    <div class="chitietsanpham">
        <h1 data-s="java"> <!-- # --> </h1>
        <div class="rowdetail group">
            <div class="picture">
                <img src="#">
            </div>
            <div class="price-sale">
                <div class="area-price">
                    <strong>#đ</strong>
                    <span class="hisprice">#đ</span>
                    <label class="installment">Trả góp 0%</label>
                </div>
                <div class="are-promotion">
                    <strong>KHUYẾN MÃI
                        <i>Giá và khuyến mãi dự kiến áp dụng đến 31/12</i>
                    </strong>
                    <div class="infopr promo">
                        <span class="promo-sp">
                            <i class="fa fa-check-circle"></i>
                            Trả góp 0% thẻ tín dụng
                        </span>
                        <span class="promo-sp">
                            <i class="fa fa-check-circle"></i>
                            Thu cũ đổi mới, giá cực sốc
                        </span>
                        <span class="promo-sp">
                            <i class="fa fa-check-circle"></i>
                            Cơ hội trúng <strong>xe Wave Alpha </strong>khi trả góp Home Credit
                        </span>
                        <span class="promo-sp">
                            <i class="fa fa-check-circle"></i>
                            Pin sạc dự phòng giảm 30% khi mua kèm
                        </span>
                    </div>
                    <div class="promo-bhx">
                        <div class="l1">
                            <img src="images/img/img10.png" class="anh10">
                        </div>
                        <div class="l2">
                            <span><strong style="color: red;">Tặng 100.000đ</strong> khi mua hàng tại website thành viên của MIU Shop, áp dụng khi mua hàng online trị giá trên 10.000.000đ</span>
                        </div>
                    </div>
                </div>
                
                <div class="policy">
                    <div>
                        <i class="fa fa-archive"></i>
                        <p>Trong hộp có: Sạc, Tai nghe, Sách hướng dẫn, Cây lấy sim, Ốp lưng. </p>
                    </div>
                    <div>
                        <i class="fa fa-star"></i>
                        <p>Bảo hành chính hãng 12 tháng.</p>
                    </div>
                    <div class="last">
                        <i class="fa fa-retweet"></i>
                        <p>1 đổi 1 trong 1 tháng nếu lỗi, đổi sản phẩm tại nhà trong 1 ngày.</p>
                    </div>
                </div>

                <div class="vipservice desk">
                    <b>Chọn thêm các dịch vụ miễn phí ở <b style="color: #c33c5f;">MIU Shop</b></b>
                    <div class="o1">
                        <a href="javascript:;" class="first check" onclick="VIPService($(this), 1)">
                        <i class="iconmobile-checkbox"></i>
                        <span>Mang nhiều màu để bạn lựa chọn</span>
                        </a>
                        <input id="IsDeliveryImmediately" name="IsDeliveryImmediately" type="hidden" value="true">
                    </div>
                    <div class="o1">
                        <a href="javascript:;" class="first check" onclick="VIPService($(this), 2)">
                        <i class="iconmobile-checkbox"></i>
                        <span>Mang thêm sản phẩm khác để bạn xem</span>
                        </a>
                        <input id="IsDeliveryImmediately" name="IsDeliveryImmediately" type="hidden" value="true">
                    </div>
                </div>
                
                <div class="area-order">
                    <a class="buy-now" href="cart.php?id=43">
                        <h3>
                            <i class="fa fa-plus" style="color: white;"></i>
                            Thêm vào giỏ hàng
                        </h3>
                    </a>
                </div>
            </div>
            <div class="info-product">
                <h2>Thông số kĩ thuật</h2>
                <ul class="info">
                    <li>
                        <p>Màn hình</p>
                        <div><!-- --></div>
                    </li>
                    <li>
                        <p>Hệ điều hành</p>
                        <div><!-- --></div>
                    </li>
                    <li>
                        <p>Camera sau</p>
                        <div><!-- --></div>
                    </li>
                    <li>
                        <p>Camera trước</p>
                        <div><!-- --></div>
                    </li>
                    <li>
                        <p>CPU</p>
                        <div><!-- --></div>
                    </li>
                    <li>
                        <p>RAM</p>
                        <div><!-- --></div>
                    </li>
                    <li>
                        <p>Bộ nhớ trong</p>
                        <div><!-- --></div>
                    </li>
                    <li>
                        <p>Thẻ nhớ</p>
                        <div><!-- --></div>
                    </li>
                    <li>
                        <p>Dung lượng pin</p>
                        <div><!-- --></div>
                    </li>
                </ul>
            </div>
        </div>
        <hr>
        <div class="comment-area">
            <div class="guibinhluan">
                <form action="danhgia.php">
                    <div class="stars">
                        <input type="hidden" name="id" value="<?php echo $id ?>">

                        <input class="star star-5" id="star-5" value="5" type="radio" name="star">
                        <label class="star star-5" for="star-5" title="Tuyệt vời"></label>

                        <input class="star star-4" id="star-4" value="4" type="radio" name="star">
                        <label class="star star-4" for="star-4" title="Tốt"></label>

                        <input class="star star-3" id="star-3" value="3" type="radio" name="star">
                        <label class="star star-3" for="star-3" title="Khá"></label>

                        <input class="star star-2" id="star-2" value="2" type="radio" name="star">
                        <label class="star star-2" for="star-2" title="Tạm"></label>

                        <input class="star star-1" id="star-1" value="1" type="radio" name="star">
                        <label class="star star-1" for="star-1" title="Tệ"></label>
                    </div>
                    <input type="textarea" maxlength="250" id="inpBinhLuan" name="comment"
                    placeholder="Viết suy nghĩ của bản vào đây...">
                    <input type="submit" id="btnBinhLuan" value="GỬI BÌNH LUẬN">
                </form>
            </div>

            <div class="rating">
                <i class="fa fa-star<?php if ($star<1): ?>-o<?php endif ?>"></i>
                <i class="fa fa-star<?php if ($star<2): ?>-o<?php endif ?>"></i>
                <i class="fa fa-star<?php if ($star<3): ?>-o<?php endif ?>"></i>
                <i class="fa fa-star<?php if ($star<4): ?>-o<?php endif ?>"></i>
                <i class="fa fa-star<?php if ($star<5): ?>-o<?php endif ?>"></i>
                <span> <!-- --> đánh giá </span>
            </div>

            <div class="comment-content">
                <!-- -->
            </div>
        </div>
    </div>
</div>

<?php require_once __DIR__. '/includes/footer.php'; ?>