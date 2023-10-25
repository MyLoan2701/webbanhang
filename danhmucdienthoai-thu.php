
<div class="filter">
    <div class="menu-filter companyMenu group flexContain">
    <?php foreach ($category as $item): ?>
        <button>
            <a href="danhmuc.php?id=<?php echo $item['id'] ?>" class="danhmuc">
            <img src="images/uploads/category/<?php echo $item['images'] ?>">
            </a>
        </button>
    <?php endforeach ?>
        

    </div>

    <div class="filter-prices">
        <label>Chọn mức giá: </label>
        <a href="?f=0&l=2" class="">Dưới 2 triệu</a>
        <a href="?f=2&l=4" class="">Từ 2 - 4 triệu</a>
        <a href="?f=4&l=7" class="">Từ 4 - 7 triệu</a>
        <a href="?f=7&l=13" class="">Từ 7 - 13 triệu</a>
        <a href="?f=13&l=1000" class="">Trên 13 triệu</a>
    </div>

    <div class="filter-sort">
        <span class="criteria">Sắp xếp <i class="fa fa-caret-down"></i></span>
        <ul class="shows">
            <li><a href="?sx=ASC"> Giá tăng dần <i class="fa fa-arrow-up"></i></a></li>
            <li><a href="?sx=DESC"> Giá giảm dần <i class="fa fa-arrow-down"></i></a></li>
        </ul>
    </div>
</div>
