
<div class="filter">
    <div class="menu-filter group flexContain">
        <button>
            <a href="danhmuc.php?id=28" class="danhmuc" data-id="28" data-name="iphone">
            <img src="images/danhmuc/iphone.jpg">
            </a>
        </button>
        <button>
            <a href="danhmuc.php?id=30" class="danhmuc" data-id="30" data-name="samsung">
            <img src="images/danhmuc/samsung.jpg">
            </a>
        </button>
        <button>
            <a href="danhmuc.php?id=31" class="danhmuc" data-id="31" data-name="oppo">
            <img src="images/danhmuc/oppo.png">
        </a>
        </button>
        <button>
        <a href="danhmuc.php?id=34" class="danhmuc" data-id="34" data-name="realme">
            <img src="images/danhmuc/realme.png">
        </a>
        </button>
        <button>
        <a href="danhmuc.php?id=39" class="danhmuc" data-id="39" data-name="mobell">
            <img src="images/danhmuc/mobell.jpg">
        </a>
        </button>
        <button>
        <a href="danhmuc.php?id=33" class="danhmuc" data-id="33" data-name="vivo">
            <img src="images/danhmuc/vivo.jpg">
        </a>
        </button>
        <button>
        <a href="danhmuc.php?id=32" class="danhmuc" data-id="32" data-name="xiaomi">
            <img src="images/danhmuc/xiaomi.jpg">
        </a>
        </button>
        <button>
        <a href="danhmuc.php?id=35" class="danhmuc" data-id="35" data-name="oneplus">
            <img src="images/danhmuc/oneplus.jpg">
        </a>
        </button>

        <button>
        <a href="danhmuc.php?id=37" class="danhmuc" data-id="37" data-name="nokia">
            <img src="images/danhmuc/nokia.jpg">
        </a>
        </button>
        <button>
        <a href="danhmuc.php?id=40" class="danhmuc" data-id="40" data-name="itel">
            <img src="images/danhmuc/itel.jpg">
        </a>
        </button>
        <button>
        <a href="danhmuc.php?id=38" class="danhmuc" data-id="38" data-name="huawei">
            <img src="images/danhmuc/huawei.jpg">
        </a>
        </button>
        <button>
        <a href="danhmuc.php?id=41" class="danhmuc" data-id="41" data-name="masstel">
            <img src="images/danhmuc/masstel.png">
        </a>
        </button>
        <button>
        <a href="danhmuc.php?id=63" class="danhmuc" data-id="63" data-name="coolpad">
            <img src="images/danhmuc/coolpad.png">
        </a>
        </button>
        <button>
        <a href="danhmuc.php?id=42" class="danhmuc" data-id="42" data-name="energizer">
            <img src="images/danhmuc/energizer.jpg">
        </a>
        </button>
        <button>
        <a href="danhmuc.php?id=29" class="danhmuc" data-id="29" data-name="blackberry">
            <img src="images/danhmuc/blackberry.png">
        </a>
        </button>
        <button>
        <a href="danhmuc.php?id=36" class="danhmuc" data-id="36" data-name="vsmart">
            <img src="images/danhmuc/vsmart.png">
        </a>
        </button>

    </div>

    <div class="filter-prices">
        <label>Chọn mức giá: </label>
        <a href="<?php if(isset($id)):?><?php echo "danhmuc.php?id=".$id."&&f=0&l=2";?><?php else: ?><?php echo "?f=0&l=2";?><?php endif ?>" class="">Dưới 2 triệu</a>
        <a href="<?php if(isset($id)):?><?php echo "danhmuc.php?id=".$id."&&f=2&l=4";?><?php else: ?><?php echo "?f=2&l=4";?><?php endif ?>" class="">Từ 2 - 4 triệu</a>
        <a href="<?php if(isset($id)):?><?php echo "danhmuc.php?id=".$id."&&f=4&l=7";?><?php else: ?><?php echo "?f=4&l=7";?><?php endif ?>" class="">Từ 4 - 7 triệu</a>
        <a href="<?php if(isset($id)):?><?php echo "danhmuc.php?id=".$id."&&f=7&l=13";?><?php else: ?><?php echo "?f=7&l=13";?><?php endif ?>" class="">Từ 7 - 13 triệu</a>
        <a href="<?php if(isset($id)):?><?php echo "danhmuc.php?id=".$id."&&f=13&l=1000";?><?php else: ?><?php echo "?f=13&l=1000";?><?php endif ?>" class="">Trên 13 triệu</a>
    </div>


    <div class="filter-sort sorts">
        <a href="<?php if(isset($id)):?><?php echo "danhmuc.php?id=".$id."&&sx=ASC";?><?php else: ?><?php echo "?sx=ASC";?><?php endif ?>" class="criteria" style="margin-right: 10px;"> Giá tăng dần <i class="fa fa-arrow-up"></i></a>
        <a href="<?php if(isset($id)):?><?php echo "danhmuc.php?id=".$id."&&sx=DESC";?><?php else: ?><?php echo "?sx=DESC";?><?php endif ?>" class="criteria"> Giá giảm dần <i class="fa fa-arrow-down"></i></a>
    </div>

</div>
