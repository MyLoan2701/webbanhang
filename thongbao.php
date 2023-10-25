<?php require_once __DIR__. '/autoload/autoload.php'; ?>
<?php require_once __DIR__. '/includes/header.php'; ?>

 <div class="col-md-12 bor">
 	 <section class="box-main1">
      <div class="header-modal1-2" style="margin-bottom: 10px; margin-left: 45%;">
                Thông báo
            </div>
        <h1 style="text-align: center;color: red"><?php echo $_SESSION['success'] ; unset($_SESSION['success']) ?> !</h1>
       
    </section>

</div>


<?php require_once __DIR__. '/includes/footer.php'; ?>