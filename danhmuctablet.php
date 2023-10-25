<div class="filter-tablet">
    <div class="menu-filter menu-tablet group flexContain">
        <button>
            <a href="danhmuc.php?id=51" class="danhmuc" data-id="47" data-name="ipad">
                <img src="images/danhmuc/ipad.jpg">
            </a>
        </button>
        <button>
            <a href="danhmuc.php?id=65" class="danhmuc" data-id="47" data-name="samsung">
                <img src="images/danhmuc/samsung.jpg">
            </a>
        </button>
        <button>
            <a href="danhmuc.php?id=66" class="danhmuc" data-id="47" data-name="mobell">
                <img src="images/danhmuc/mobell.jpg">
            </a>
        </button>
        <button>
            <a href="danhmuc.php?id=67" class="danhmuc" data-id="47" data-name="huawei">
                <img src="images/danhmuc/huawei.jpg">
            </a>
        </button>
        <button>
            <a href="danhmuc.php?id=68" class="danhmuc" data-id="47" data-name="masstel">
                <img src="images/danhmuc/masstel.png">
            </a>
        </button>
        <button>
            <a href="danhmuc.php?id=69" class="danhmuc" data-id="47" data-name="lenovo">
                <img src="images/danhmuc/lenovo.jpg">
            </a>
        </button>

        
    </div>

    <div class="filter-prices">
        <label>Chọn mức giá: </label>
        <a href="<?php if(isset($id)):?><?php echo "danhmuc.php?id=".$id."&&f=0&l=3";?><?php else: ?><?php echo "?f=0&l=3";?><?php endif ?>" class="">Dưới 3 triệu</a>
        <a href="<?php if(isset($id)):?><?php echo "danhmuc.php?id=".$id."&&f=3&l=10";?><?php else: ?><?php echo "?f=3&l=10";?><?php endif ?>" class="">Từ 3 - 10 triệu</a>
        <a href="<?php if(isset($id)):?><?php echo "danhmuc.php?id=".$id."&&f=10&l=1000";?><?php else: ?><?php echo "?f=10&l=1000";?><?php endif ?>" class="">Trên 10 triệu</a>

    </div>

    <div class="filter-sort sorts">
        <a href="<?php if(isset($id)):?><?php echo "danhmuc.php?id=".$id."&&sx=ASC";?><?php else: ?><?php echo "?sx=ASC";?><?php endif ?>" class="criteria" style="margin-right: 10px;"> Giá tăng dần <i class="fa fa-arrow-up"></i></a>
        <a href="<?php if(isset($id)):?><?php echo "danhmuc.php?id=".$id."&&sx=DESC";?><?php else: ?><?php echo "?sx=DESC";?><?php endif ?>" class="criteria"> Giá giảm dần <i class="fa fa-arrow-down"></i></a>
    </div>
</div>