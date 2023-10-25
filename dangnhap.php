<?php 
require_once __DIR__. '/autoload/autoload.php';
if(isset($_SESSION['name_id']))
{
  echo "<script>location.href='index.php'</script>";
}

$data = 
[
    'email' => postInput("email"),
    'password' => postInput("password")
];

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $error = [];
    if(postInput('email') == '')
    {
        $error['email'] = "Email không được để trống!";
    }

    if(postInput('password') == '')
    {
        $error['password'] = "Mật khẩu không được để trống!";
    }
    else
    {
        $data['password'] = MD5(postInput('password'));
    }

    //dang nhap thanh cong
    if(empty($error))
    {
        $isset = $db->fetchOne("users","email = '".$data['email']."' AND password = '".$data['password']."' ");
        if($isset > 0)
        {
            $path = getInput("path");
            $_SESSION['name_user'] = $isset['name'];
            $_SESSION['name_id'] = $isset['id'];
            echo "<script>alert('Đăng nhập thành công'); location.href='http://localhost/webbanhang/index.php'</script>";
        }
        else
        {
            $_SESSION['error'] = "Đăng nhập thất bại";
        }
    }
}
?>

<?php require_once __DIR__. '/includes/header.php'; ?>
<div class="col-md-12 bor">
  <section class="box-main-dk">
    <div class="modal-dk">
      <div class="container-dangki">
        
          
              <div class="general modal1">

                <div class="left modal1-1">
                  <h2>Đăng nhập</h2>
                  <p>Đăng nhập để theo dõi đơn hàng, nhận nhiều ưu đãi hấp dẫn từ MIU Shop</p>
                  <img src="images/img/img8.png">
                </div>

                <div class="right modal1-2">
                  <div class="header-modal1-2">
                    Đăng nhập
                  </div>
                  <hr>
                  <div class="right modal1-2 r1">
                      <?php if(isset($_SESSION['success'])) :?>
                            <div class="alert alert-success" role="alert">
                                <?php echo $_SESSION['success'];unset($_SESSION['success']); ?>
                            </div>
                        <?php endif; ?>

                        <?php if(isset($_SESSION['error'])) :?>
                            <div class="alert alert-success" role="alert">
                                <?php echo $_SESSION['error'];unset($_SESSION['error']); ?>
                            </div>
                        <?php endif; ?>

                    <form action="" method="POST" class="form-dangki">

                      <div class="form-group row muc">
                        <label for="email"><b>Email</label>
                        <input type="email" id="email" placeholder="Nhập email" name="email" required>
                        
                      </div>

                      <div class="form-group row muc">
                        <label for="password"><b>Mật khẩu</label>
                        <input type="password" id="password" placeholder="Nhập mật khẩu" name="password"
                        required value="">
                        
                      </div>

                      <div class="form-group row muc">
                        <div style="width: calc(100% - 75px); display: inline-block;">
                          <button type="submit" class="btn btn-success"style="background: #fdd504; width: 100%; margin: 0 50px 20px;">Đăng nhập</button>
                          <p style="margin: 0 50px 15px; width: 100%; font-size: 12px; line-height: 22px;">Khi bạn nhấn Đăng ký, bạn đã đồng ý thực hiện mọi giao dịch mua bán theo 
                          <a target="_blank" href="dieukien.php" rel="noreferrer">điều kiện sử dụng và chính sách của MIU Shop.</a>
                          </p>
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
            
        
      </div>
    </div>
  </section>
</div>
<?php require_once __DIR__. '/includes/footer.php'; ?>