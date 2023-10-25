<div class="filter-laptop">
    <div class="menu-filter group flexContain">
        <button>
            <a href="danhmuc.php?id=47" class="danhmuc" data-id="47" data-name="macbook">
                <img src="images/danhmuc/macbook.png">
            </a>
        </button>
        <button>
            <a href="danhmuc.php?id=46" class="danhmuc" data-id="46" data-name="hp">
                <img src="images/danhmuc/hp.jpg">
            </a>
        </button>
        <button>
            <a href="danhmuc.php?id=44" class="danhmuc" data-id="44" data-name="asus">
                <img src="images/danhmuc/asus.jpg">
            </a>
        </button>
        <button>
            <a href="danhmuc.php?id=43" class="danhmuc" data-id="43" data-name="acer">
                <img src="images/danhmuc/acer.jpg">
            </a>
        </button>
        <button>
            <a href="danhmuc.php?id=45" class="danhmuc" data-id="45" data-name="dell">
                <img src="images/danhmuc/dell.jpg">
            </a>
        </button>
        <button>
            <a href="danhmuc.php?id=48" class="danhmuc" data-id="48" data-name="lenovo">
                <img src="images/danhmuc/lenovo.jpg">
            </a>
        </button>
        <button>
            <a href="danhmuc.php?id=49" class="danhmuc" data-id="49" data-name="lg">
                <img src="images/danhmuc/lg.jpg">
            </a>
        </button>
        <button>
            <a href="danhmuc.php?id=50" class="danhmuc" data-id="50" data-name="msi">
                <img src="images/danhmuc/msi.png">
            </a>
        </button>
        

        
    </div>

    <div class="filter-prices">
        <label>Chọn mức giá: </label>
        <a href="<?php if(isset($id)):?><?php echo "danhmuc.php?id=".$id."&&f=0&l=10";?><?php else: ?><?php echo "?f=0&l=10";?><?php endif ?>" class="">Dưới 10 triệu</a>
        <a href="<?php if(isset($id)):?><?php echo "danhmuc.php?id=".$id."&&f=10&l=15";?><?php else: ?><?php echo "?f=10&l=15";?><?php endif ?>" class="">Từ 10 - 15 triệu</a>
        <a href="<?php if(isset($id)):?><?php echo "danhmuc.php?id=".$id."&&f=15&l=20";?><?php else: ?><?php echo "?f=15&l=20";?><?php endif ?>" class="">Từ 15 - 20 triệu</a>
        <a href="<?php if(isset($id)):?><?php echo "danhmuc.php?id=".$id."&&f=20&l=25";?><?php else: ?><?php echo "?f=20&l=25";?><?php endif ?>" class="">Từ 20 - 25 triệu</a>
        <a href="<?php if(isset($id)):?><?php echo "danhmuc.php?id=".$id."&&f=25&l=1000";?><?php else: ?><?php echo "?f=25&l=1000";?><?php endif ?>" class="">Trên 25 triệu</a>
    </div>


    <div class="filter-sort sorts">
        <a href="<?php if(isset($id)):?><?php echo "danhmuc.php?id=".$id."&&sx=ASC";?><?php else: ?><?php echo "?sx=ASC";?><?php endif ?>" class="criteria" style="margin-right: 10px;"> Giá tăng dần <i class="fa fa-arrow-up"></i></a>
        <a href="<?php if(isset($id)):?><?php echo "danhmuc.php?id=".$id."&&sx=DESC";?><?php else: ?><?php echo "?sx=DESC";?><?php endif ?>" class="criteria"> Giá giảm dần <i class="fa fa-arrow-down"></i></a>
    </div>


</div>