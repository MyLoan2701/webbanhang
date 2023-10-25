<?php
require_once __DIR__. '/autoload/autoload.php';


$id = intval(getInput('id'));
$item = $db->fetchId("product",$id);
$accessories = $db->fetchID("category",$item['category_id']);
$catelv = intval($accessories['level']);

if($catelv == 0)
{
    $item2 = $db->fetchId("laptop",$id);
}
else if($catelv == 1)
{
    $item2 = $db->fetchId("accessories",$id);
}
else if($catelv == 2)
{
    $item2 = $db->fetchId("phone",$id);
}
else if($catelv == 3)
{
    $item2 = $db->fetchId("mayin",$id);
}
else if($catelv == 4)
{
    $item2 = $db->fetchId("tablet",$id);
}
else
{
    $item2 = $db->fetchId("manhinh",$id);
}

$sql = "SELECT users.name,rated.comment,rated.rated,rated.created_at FROM rated LEFT JOIN users ON rated.id_users = users.id WHERE id_product = $id";
$rated = $db->fetchsql($sql);

?>

<?php require_once __DIR__. '/includes/header.php'; ?>

<div class="col-md-12 bor">
    <ul class="breadcrumb">
        <li>
            <a href="<?php 
            switch($catelv)
            {
                case "0":
                    echo "laptop.php";
                    break;
                case "1":
                    echo "phukien.php";
                    break;
                case "2":
                    echo "dienthoai.php";
                    break;
                case "3":
                    echo "mayin.php";
                    break;
                case "4":
                    echo "tablet.php";
                    break;
                case "5":
                    echo "maytinhdeban.php";
                    break;
                default:
                    echo "#";
            }
            ?>">
                <?php switch($catelv)
                {
                    case "0":
                        echo "Laptop";
                        break;
                    case "1":
                        echo "Phụ kiện";
                        break;
                    case "2":
                        echo "Điện thoại";
                        break;
                    case "3":
                        echo "Máy in";
                        break;
                    case "4":
                        echo "Máy tính bảng";
                        break;
                    case "5":
                        echo "Màn hình máy tính";
                        break;
                    default:
                        echo "";
                }
                ?>
            </a>
            <meta property="position" content="0">
        </li>

    </ul>


    <div class="chitietSanpham" style="min-height: 85vh;">
        <h1>
        <?php switch($catelv)
                {
                    case "0":
                        echo "Laptop";
                        break;
                    case "1":
                        echo "Phụ kiện";
                        break;
                    case "2":
                        echo "";
                        break;
                    case "3":
                        echo "";
                        break;
                    case "4":
                        echo "Máy tính bảng";
                        break;
                    case "5":
                        echo "Màn hình máy tính";
                        break;
                    default:
                        echo "";
                }
                ?> <?php echo $item['name'] ?> </h1>

        <div class="rowdetail group">
            <div class="picture">
                <img src="<?php echo uploads() ?>product/<?php echo $item['thundar'] ?>">
            </div>

            <div class="price_sale">
                <div class="area_price">
                    <strong>
                        <?php echo formatPrice(formatSale($item['price'],$item['sale'])) ?>₫
                    </strong>
                    <?php if ($item['sale'] > 0): ?>
                        <span>
                            <?php echo formatPrice($item['price']) ?>đ 
                        </span>
                    <?php endif ?>
                </div>

                <div class="ship" style="display:none">
                    <i class="fa fa-clock-o"></i>
                    <div>NHẬN HÀNG TRONG 1 GIỜ</div>
                </div>

                <div class="area_promotion">
                    <strong class="km">Khuyến mãi
                        <i>Giá và khuyến mãi áp dụng đặt và nhận hàng từ 00:00 30/11 - 23:59 31/3</i>
                    </strong>
                    <div class="promo">
                        <div style="margin-bottom: 5px;">
                        <?php if($catelv != 1) : ?>
                            <i class="fa fa-check-circle"></i>
                            <div id="detailPromo">Pin sạc dự phòng giảm 30% khi mua kèm.</div>
                        <?php endif ?>
                        </div>

                        <div style="margin-bottom: 5px;">
                        <?php if($catelv == 4 && $item['slug'] == 'ipad') : ?>
                            <i class="fa fa-check-circle"></i>
                            <div id="detailPromo">Phụ kiện Apple mua kèm giảm đến 20% (không áp dụng đồng thời KM khác).</div>
                        <?php endif ?>
                        </div>

                        <div style="margin-bottom: 5px;">
                        <?php if($item['price'] >= 5000000) : ?>
                            <i class="fa fa-check-circle"></i>
                            <div id="detailPromo">Phiếu mua hàng 500,000đ.</div>
                        <?php endif ?>
                        </div>

                        <i class="fa fa-check-circle"></i>
                        <div id="detailPromo">
                            Cơ hội trúng <span style="font-weight: bold">61 xe Wave Alpha</span> khi trả góp Home Credit.
                        </div>

                    </div>

                    
                        <div class="promo_bhx">
                            <div class="l1">
                                <img src="images/img/img10.png" width="16px">
                            </div>
                            <div class="l2">
                                <span>
                                    <strong style="color: red;">Tặng 100.000₫</strong>
                                     mua online tại web thành viên 
                                     <a href="index.php">MIUShop</a>
                                      cho hóa đơn trên 1.000.000₫.
                                </span>
                                <p class="first-pap">- Một số điện thoại được nhận 1 lần duy nhất.</p>
                            </div>
                        </div>
                    </div>

                    <div>
                        <?php if($item['number'] <= 5 && $item['number'] > 0) :?>
                            <span style="color: #ff376c; font-size: 16px;
                            font-weight:600; padding-left: 10px;">Chỉ còn lại <?php echo $item['number'] ?> sản phẩm</span>
                        <?php elseif($item['number'] == 0): ?>
                            <span style="color: #ff376c; font-size: 16px;
                            font-weight:600; padding-left: 10px;">Đã hết hàng, chờ cập nhật</span>
                        <?php endif ?>
                    </div>

                    <div class="area_order">
                      <!--  <?php if($item['number'] > 0): ?> --> 
                        <a class="buy_now" href="cart.php?id=<?php echo $item['id'] ?>">
                            <h3>
                                <i class="fa fa-plus" style="color: white;"></i> Thêm vào giỏ hàng
                            </h3>
                        </a>
                        
                      <!--  <?php elseif($item['number'] == 0): ?>
                            <?php echo "<script>alert('Sản phẩm đã hết hàng, chờ cập nhật.');history.go(-1)</script>"; ?>
                        
                         
                             <?php endif ?>
                      -->
                     
                    </div>

                    <div class="callorder">
                        <div class="ct">
                            <span>Gọi đạt mua <strong style="color: #288ad6;">1800.2712</strong>  (7:30-22:00)</span>
                        </div>
                    </div>
                </div>

                <div class="policy">
                        <div>
                            <i class="fa fa-archive"></i>
                            <?php if ($catelv == 2): ?>
                                <p>Trong hộp có: Sạc, Tai nghe, Sách hướng dẫn, Cây lấy sim, Ốp lưng. </p>
                            <?php endif ?>

                            <?php if ($catelv == 0): ?>
                                <p>Trong hộp có: Sạc, Dây nguồn, Sách hướng dẫn.</p>
                            <?php endif ?>

                            <?php if ($catelv == 4): ?>
                                <p>Trong hộp có: Sạc, Tai nghe, Sách hướng dẫn, Cây lấy sim. </p>
                            <?php endif ?>

                            <?php if ($catelv == 3): ?>
                                <p>Trong hộp có: Dây nguồn, Bình mực ( Có sẵn trong máy ) , Cáp mạng. </p>
                            <?php endif ?>
                            
                            <?php if ($catelv == 5): ?>
                                <p>Trong hộp có: Cáp chuyển ( HDMI ) , Dây nguồn. </p>
                            <?php endif ?>

                        </div>

                        <div>
                            <i class="fa fa-star"></i>
                            <?php if ($item['price'] <= 10000000): ?>
                                <p>Bảo hành chính hãng 12 tháng. </p>
                            <?php endif ?>

                            <?php if ($item['price'] > 10000000): ?>
                                <p>Bảo hành chính hãng 24 tháng. </p>
                            <?php endif ?>
                        </div>

                        <div>
                            <i class="fa fa-retweet"></i>
                            <p>1 đổi 1 trong 1 tháng nếu lỗi, đổi sản phẩm tại nhà trong 1 ngày.</p>
                        </div>
                    </div>
            </div>

            
            <div class="rowdetail">
                <div class="info-product">
                    <h2>Thông số kỹ thuật</h2>
                    <ul class="info">
                        <!--laptop-->
                        <?php if ($catelv == 0): ?>
                            <li>
                                <p>CPU:</p>
                                <div><?php echo $item2["CPU"] ?></div>
                            </li>
                            <li>
                                <p>RAM:</p>
                                <div><?php echo $item2["RAM"] ?></div>
                            </li>
                            <li>
                                <p>Ổ cứng:</p>
                                <div><?php echo $item2["OCung"] ?></div>
                            </li>
                            <li>
                                <p>Màn hình:</p>
                                <div><?php echo $item2["ManHinh"] ?></div>
                            </li>
                            <li>
                                <p>Card màn hình:</p>
                                <div><?php echo $item2["CardManHinh"] ?></div>
                            </li>
                            <li>
                                <p>Cổng kết nối:</p>
                                <div><?php echo $item2["CongKetNoi"] ?></div>
                            </li>
                            <li>
                                <p>Hệ điều hành:</p>
                                <div><?php echo $item2["HDH"] ?></div>
                            </li>
                            <li>
                                <p>Thiết kế:</p>
                                <div><?php echo $item2["ThietKe"] ?></div>
                            </li>
                            <li>
                                <p>Kích thước:</p>
                                <div><?php echo $item2["KichThuoc"] ?></div>
                            </li>
                            <li>
                                <p>Web Cam:</p>
                                <div><?php echo $item2["WebCam"] ?></div>
                            </li>
                            <li>
                                <p>Pin:</p>
                                <div><?php echo $item2["Pin"] ?></div>
                            </li>
                            <li>
                                <p>Trọng lượng:</p>
                                <div><?php echo $item2["TrongLuong"] ?></div>
                            </li>
                        <?php endif ?>


                        <!--điện thoại-->
                        <?php if ($catelv == 2): ?>
                            <li>
                                <p>Màn hình:</p>
                                <div><?php echo $item2["ManHinh"] ?></div>
                            </li>
                            <li>
                                <p>Hệ điều hành:</p>
                                <div><?php echo $item2["HDH"] ?></div>
                            </li>
                            <li>
                                <p>Camera sau:</p>
                                <div><?php echo $item2["Camsau"] ?></div>
                            </li>
                            <li>
                                <p>Camera trước:</p>
                                <div><?php echo $item2["Camtruoc"] ?></div>
                            </li>
                            <li>
                                <p>CPU:</p>
                                <div><?php echo $item2["CPU"] ?></div>
                            </li>
                            <li>
                                <p>RAM:</p>
                                <div><?php echo $item2["RAM"] ?></div>
                            </li>
                            <li>
                                <p>ROM:</p>
                                <div><?php echo $item2["ROM"] ?></div>
                            </li>
                            <li>
                                <p>Pin:</p>
                                <div><?php echo $item2["Pin"] ?></div>
                            </li>
                        <?php endif ?>


                        <!--tablet-->
                        <?php if ($catelv == 4): ?>
                            <li>
                                <p>Màn hình:</p>
                                <div><?php echo $item2["ManHinh"] ?></div>
                            </li>
                            <li>
                                <p>Hệ điều hành:</p>
                                <div><?php echo $item2["HDH"] ?></div>
                            </li>
                            <li>
                                <p>Camera sau:</p>
                                <div><?php echo $item2["Camsau"] ?></div>
                            </li>
                            <li>
                                <p>Camera trước:</p>
                                <div><?php echo $item2["Camtruoc"] ?></div>
                            </li>
                            <li>
                                <p>CPU:</p>
                                <div><?php echo $item2["CPU"] ?></div>
                            </li>
                            <li>
                                <p>RAM:</p>
                                <div><?php echo $item2["RAM"] ?></div>
                            </li>
                            <li>
                                <p>ROM:</p>
                                <div><?php echo $item2["BoNhoTrong"] ?></div>
                            </li>
                            <li>
                                <p>Pin:</p>
                                <div><?php echo $item2["Pin"] ?></div>
                            </li>
                            <li>
                                <p>Trọng lượng:</p>
                                <div><?php echo $item2["TrongLuong"] ?></div>
                            </li>
                        <?php endif ?>

                        <!--máy in-->
                        <?php if ($catelv == 3): ?>
                            <li>
                                <p>Loại máy:</p>
                                <div><?php echo $item2["LoaiMay"] ?></div>
                            </li>
                            <li>
                                <p>Chức năng:</p>
                                <div><?php echo $item2["ChucNang"] ?></div>
                            </li>
                            <li>
                                <p>Công suất in khuyến nghị:</p>
                                <div><?php echo $item2["CongSuat"] ?></div>
                            </li>
                            <li>
                                <p>Tốc độ in:</p>
                                <div><?php echo $item2["TocDoIn"] ?></div>
                            </li>
                            <li>
                                <p>Tuổi thọ in:</p>
                                <div><?php echo $item2["TuoiTho"] ?></div>
                            </li>
                            <li>
                                <p>Chất lượng in:</p>
                                <div><?php echo $item2["ChatLuong"] ?></div>
                            </li>
                            <li>
                                <p>Loại mực in:</p>
                                <div><?php echo $item2["LoaiMuc"] ?></div>
                            </li>
                            <li>
                                <p>Thời gian in trang đầu tiên:</p>
                                <div><?php echo $item2["ThoiGian"] ?></div>
                            </li>
                            <li>
                                <p>Cổng kết nối:</p>
                                <div><?php echo $item2["CongKetNoi"] ?></div>
                            </li>
                            <li>
                                <p>Trọng lượng:</p>
                                <div><?php echo $item2["TrongLuong"] ?></div>
                            </li>
                        <?php endif ?>


                        <!--màn hình-->
                        <?php if ($catelv == 5): ?>
                            <li>
                                <p>Kích thước màn hình:</p>
                                <div><?php echo $item2["ManHinh"] ?></div>
                            </li>
                            <li>
                                <p>Độ phân giải:</p>
                                <div><?php echo $item2["DoPhanGiai"] ?></div>
                            </li>
                            <li>
                                <p>Công nghệ màn hình:</p>
                                <div><?php echo $item2["CongNghe"] ?></div>
                            </li>
                            <li>
                                <p>Độ tương phản:</p>
                                <div><?php echo $item2["DoTuongPhan"] ?></div>
                            </li>
                            <li>
                                <p>Thời gian đáp ứng:</p>
                                <div><?php echo $item2["ThoiGianDapUng"] ?></div>
                            </li>
                            <li>
                                <p>Góc nhìn:</p>
                                <div><?php echo $item2["GocNhin"] ?></div>
                            </li>
                            <li>
                                <p>Trọng lượng:</p>
                                <div><?php echo $item2["TrongLuong"] ?></div>
                            </li>
                        <?php endif ?>

                        <!--phụ kiện-->
                        <?php if ($catelv == 1): ?>

                            <?php if ($accessories['slug'] == "loa"): ?>
                            <li>
                                <p>Loại loa:</p>
                                <div><?php echo $item2["speaker"] ?></div>
                            </li>
                            <?php endif ?>

                            <?php if ($accessories['slug'] == "pk-ipad"): ?>
                            <li>
                                <p>Tính năng:</p>
                                <div><?php echo $item2["feature"] ?></div>
                            </li>
                            <?php endif ?>

                            <?php if($accessories['slug'] == "tai-nghe" || $accessories['slug'] == "loa" || $accessories['slug'] == "chuot" || $accessories['slug'] == "pk-ipad"): ?>
                                <li>
                                    <p>Tương thích:</p>
                                    <div><?php echo $item2["compatible"] ?></div>
                                </li>
                            <?php endif ?>

                            <?php if($accessories['slug'] == "chuot"): ?>
                                <li>
                                    <p>Độ phân giải:</p>
                                    <div><?php echo $item2["dpi"] ?></div>
                                </li>
                            <?php endif ?>

                            <?php if($accessories['slug'] == "tai-nghe"): ?>
                                <li>
                                    <p>Cổng sạc/Jack cắm:</p>
                                    <div><?php echo $item2["slot"] ?></div>
                                </li>
                            <?php endif ?>

                            <?php if($accessories['slug'] == "loa"): ?>
                                <li>
                                    <p>Tổng công suất:</p>
                                    <div><?php echo $item2["performance"] ?></div>
                                </li>
                            <?php endif ?>

                            <?php if ($accessories['slug'] == "sac-du-phong"): ?>
                            <li>
                                <p>Hiệu suất sạc:</p>
                                <div><?php echo $item2["performance"] ?></div>
                            </li>
                            <?php endif ?>

                            <?php if ($accessories['slug'] == "sac-du-phong"): ?>
                            <li>
                                <p>Dung lượng pin:</p>
                                <div><?php echo $item2["capacity"] ?></div>
                            </li>
                            <?php endif ?>

                            <?php if ($accessories['slug'] == "sac-du-phong"): ?>
                            <li>
                                <p>Dung lượng pin:</p>
                                <div><?php echo $item2["capacity"] ?></div>
                            </li>
                            <?php endif ?>

                            <?php if ($accessories['slug'] == "usb" || $accessories['slug'] == "the-nho"): ?>
                            <li>
                                <p>Dung lượng:</p>
                                <div><?php echo $item2["capacity"] ?></div>
                            </li>
                            <?php endif ?>

                            <?php if ($accessories['slug'] == "usb" || $accessories['slug'] == "the-nho"): ?>
                            <li>
                                <p>Tốc độ chuẩn:</p>
                                <div><?php echo $item2["speed"] ?></div>
                            </li>
                            <?php endif ?>

                            <?php if ($accessories['slug'] == "usb" || $accessories['slug'] == "the-nho"): ?>
                            <li>
                                <p>Tốc độ đọc:</p>
                                <div><?php echo $item2["rs"] ?></div>
                            </li>
                            <?php endif ?>

                            <?php if ($accessories['slug'] == "usd" || $accessories['slug'] == "the-nho"): ?>
                            <li>
                                <p>Tốc độ ghi:</p>
                                <div><?php echo $item2["ws"] ?></div>
                            </li>
                            <?php endif ?>

                            <?php if ($accessories['slug'] == "sac-du-phong"): ?>
                            <li>
                                <p>Nguồn vào:</p>
                                <div><?php echo $item2["input"] ?></div>
                            </li>
                            <?php endif ?>

                            <?php if ($accessories['slug'] == "sac-du-phong"): ?>
                            <li>
                                <p>Nguồn ra:</p>
                                <div><?php echo $item2["output"] ?></div>
                            </li>
                            <?php endif ?>

                            <?php if ($accessories['slug'] == "sac-du-phong"): ?>
                            <li>
                                <p>Lõi pin:</p>
                                <div><?php echo $item2["core"] ?></div>
                            </li>
                            <?php endif ?>

                            <?php if ($accessories['slug'] == "chuot"): ?>
                            <li>
                                <p>Loại pin:</p>
                                <div><?php echo $item2["core"] ?></div>
                            </li>
                            <?php endif ?>

                            <?php if($accessories['slug'] == "loa"): ?>
                                <li>
                                    <p>Kết nối không dây:</p>
                                    <div><?php echo $item2["slot"] ?></div>
                                </li>
                                <li>
                                    <p>Kết nối khác:</p>
                                    <div><?php echo $item2["other"] ?></div>
                                </li>
                            <?php endif ?>

                            <?php if($accessories['slug'] == "loa"): ?>
                                <li>
                                    <p>Tiện ích:</p>
                                    <div><?php echo $item2["extensions"] ?></div>
                                </li>
                            <?php endif ?>

                            <?php if ($accessories['slug'] == "sac-du-phong" || $accessories['slug'] == "loa" || $accessories['slug'] == "tai-nghe" || $accessories['slug'] == "pk-ipad"): ?>
                            <li>
                                <p>Thời gian sử dụng:</p>
                                <div><?php echo $item2["usedtime"] ?></div>
                            </li>
                            <?php endif ?>

                            <?php if ($accessories['slug'] == "tai-nghe"): ?>
                            <li>
                                <p>Kết nối cùng lúc:</p>
                                <div><?php echo $item2["connected"] ?></div>
                            </li>
                            <?php endif ?>

                            <?php if ($accessories['slug'] == "tai-nghe"): ?>
                            <li>
                                <p>Độ dài dây:</p>
                                <div><?php echo $item2["longs"] ?></div>
                            </li>
                            <?php endif ?>

                            <?php if ($accessories['slug'] == "chuột"): ?>
                            <li>
                                <p>Độ dài dây/Khoảng cách kết nối:</p>
                                <div><?php echo $item2["longs"] ?></div>
                            </li>
                            <?php endif ?>

                            <?php if ($accessories['slug'] == "sac-du-phong"): ?>
                            <li>
                                <p>Công nghệ/Tiện ích:</p>
                                <div><?php echo $item2["extensions"] ?></div>
                            </li>
                            <?php endif ?>

                            <?php if ($accessories['slug'] == "sac-du-phong" || $accessories['slug'] == "loa" || $accessories['slug'] == "pk-ipad"): ?>
                            <li>
                                <p>Kích thước:</p>
                                <div><?php echo $item2["size"] ?></div>
                            </li>
                            <?php endif ?>

                            <?php if ($accessories['slug'] == "sac-du-phong" || $accessories['slug'] == "chuot" || $accessories['slug'] == "pk-ipad"): ?>
                            <li>
                                <p>Trọng lượng:</p>
                                <div><?php echo $item2["weight"] ?></div>
                            </li>
                            <?php endif ?>

                            <?php if ($accessories['slug'] == "sac-du-phong" || $accessories['slug'] == "tai-nghe" || $accessories['slug'] == "usb" || $accessories['slug'] == "chuot" || $accessories['slug'] == "pk-ipad"): ?>
                            <li>
                                <p>Sản xuất:</p>
                                <div><?php echo $item2["made"] ?></div>
                            </li>
                            <?php endif ?>

                        <?php endif ?>
                    </ul>
                </div>
            

            <div class="comment-area">
                <div class="guibinhluan">
                    <form action="danhgia.php?">
                        <div class="stars">
                            <input type="hidden" name="id" value="<?php echo $id ?>">

                            <input class="star star-5" id="star-5" value="5" type="radio" name="star">
                            <label class="star star-5" for="star-5" title="Tuyệt vời"></label>

                            <input class="star star-4" id="star-4" value="4" type="radio" name="star">
                            <label class="star star-4" for="star-4" title="Tốt"></label>
                        
                            <input class="star star-3" id="star-3" value="3" type="radio" name="star">
                            <label class="star star-3" for="star-3" title="Tạm"></label>
                        
                            <input class="star star-2" id="star-2" value="2" type="radio" name="star">
                            <label class="star star-2" for="star-2" title="Khá"></label>
                        
                            <input class="star star-1" id="star-1" value="1" type="radio" name="star">
                            <label class="star star-1" for="star-1" title="Tệ"></label>
                        </div>

                        <input type="textarea" maxlength="250" id="inpBinhLuan" name="comment" placeholder="Nhập đánh giá về sản phẩm (tối thiểu 250 ký tự)">
                        <input type="submit" id="btnBinhLuan" value="GỬI BÌNH LUẬN">
                    </form>
                </div>

                <?php if(isset($_SESSION['success'])) :?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $_SESSION['success'];unset($_SESSION['success']); ?>
                    </div>
                <?php endif; ?>

                <?php if(isset($_SESSION['error_cm'])) :?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $_SESSION['error_cm'];unset($_SESSION['error_cm']); ?>
                    </div>
                <?php endif; ?>

                <?php $star=0;$count=0; foreach ($rated as $item2): ?>
                    <?php $star+=$item2['rated'];$count+=1; ?>
                <?php endforeach; ?>

                <?php if ($count > 0):
                $star /= $count;
                $data = 
                [
                    'rated' => $star,
                    'comment' => $count
                ];
                $id_update = $db->update("product",$data,array("id" => $id));
                ?>
                <?php endif ?>

                <div class="rating">
                    <i class="fa fa-star<?php if ($star<1): ?>-o<?php endif ?>"></i>
                    <i class="fa fa-star<?php if ($star<2): ?>-o<?php endif ?>"></i>
                    <i class="fa fa-star<?php if ($star<3): ?>-o<?php endif ?>"></i>
                    <i class="fa fa-star<?php if ($star<4): ?>-o<?php endif ?>"></i>
                    <i class="fa fa-star<?php if ($star<5): ?>-o<?php endif ?>"></i>
                    <span> <?php echo $count ?> đánh giá </span>
                </div>

                <div class="comment-content">
                    <?php foreach ($rated as $it): ?>
                        <div class="comment">
                            <i class="fa fa-user-circle"> </i>
                            <h4>
                                <?php echo $it['name'] ?>
                                <span>
                                    <i class="fa fa-star<?php if ($it['rated']<1): ?>-o<?php endif ?>"></i>
                                    <i class="fa fa-star<?php if ($it['rated']<2): ?>-o<?php endif ?>"></i>
                                    <i class="fa fa-star<?php if ($it['rated']<3): ?>-o<?php endif ?>"></i>
                                    <i class="fa fa-star<?php if ($it['rated']<4): ?>-o<?php endif ?>"></i>
                                    <i class="fa fa-star<?php if ($it['rated']<5): ?>-o<?php endif ?>"></i>
                                </span>
                            </h4>
                            <p><?php echo $it['comment'] ?></p>
                            <span class="time"><?php echo $it['created_at'] ?></span>
                        </div>
                    <?php endforeach ?>
                </div>
            </div>
        </div>

        </div>
    </div>
</div>

<?php require_once __DIR__. '/includes/footer.php'; ?>