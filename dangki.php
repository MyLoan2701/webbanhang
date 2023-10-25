<?php 
require_once __DIR__. '/autoload/autoload.php';
if(isset($_SESSION['name_id']))
{
  echo "<script>location.href='index.php'</script>";
}

$data = 
[
  "name" => postInput('name'),
  "email" => postInput('email'),
  "address" => postInput("address"),
  "phone" => postInput('phone'),
  "gioitinh" => postInput('gioitinh'),
  "ngaysinh" => postInput('ngaysinh'),
  "password" => postInput('password')
];

if($_SERVER["REQUEST_METHOD"] == "POST")
{
  $error = [];
  if(postInput('name') == '')
  {
    $error['name'] = "Mời nhập đầy đủ họ tên.";
  }
  if(postInput('email') == '')
  {
    $error['email'] = "Mời nhập dịa chỉ email.";
  }
  if(postInput('address') == '')
  {
    $error['address'] = "Mời nhập đầy địa chỉ.";
  }
  if(postInput('phone') == '')
  {
    $error['phone'] = "Mời nhập số diện thoại.";
  }
  if(postInput('password') == '')
  {
    $error['password'] = "Mời nhập mật khẩu.";
  }
  else
  {
    $data['password'] = MD5(postInput('password'));
  }

  //dang nhap thanh cong
  if(empty($error))
  {
    $isset = $db->fetchOne("users","email = '".$data['email']."' ");
    if(count($isset) > 0)
    {
      $error['email'] = "Email đã đã tồn tại!";
    }
    else
    {
      $id_insert = $db->insert("users",$data);
      if($id_insert>0)
      {
        $_SESSION['success'] = "Đăng kí thành công!";
        header("location: dangnhap.php");
      }
      else
      {
        $_SESSION['error'] = "Đăng kí thất bại!";
      }
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
                  <h2>Tạo tài khoản</h2>
                  <p>Tạo tài khoản để theo dõi đơn hàng, nhận nhiều ưu đãi hấp dẫn từ MIU Shop</p>
                  <img src="images/img/img8.png">
                </div>

                <div class="right modal1-2">
                  <div class="header-modal1-2">
                    Tạo tài khoản
                  </div>
                  <hr>
                  <div class="right modal1-2 r1">
                    <form action="" method="POST" class="form-dangki">

                      <div class="form-group row muc">
                        <label for="name"><b>Họ tên</label>
                        <input type="text" id="name" placeholder="Nhập họ tên" name="name"
                        required value="">
                        <?php if(isset($error['name'])): ?>
                          <br> <p class="text-danger">Tên không được để trống!</p>
                        <?php endif ?>
                      </div>

                      <div class="form-group row muc">
                        <label for="phone"><b>SĐT</label>
                        <input type="tel" id="phone" placeholder="Nhập số điện thoại" name="phone"
                        required value="">
                        <?php if(isset($error['phone'])): ?>
                          <br> <p class="text-danger">Số diện thoại không được để trống!</p>
                        <?php endif ?>
                      </div>

                      <div class="form-group row muc">
                        <label for="email"><b>Email</label>
                        <input type="email" id="email" placeholder="Nhập Email" name="email"
                        required value="">
                        <?php if(isset($error['email'])): ?>
                          <br> <p class="text-danger">Email không được để trống!</p>
                        <?php endif ?>
                      </div>

                      <div class="form-group row muc">
                        <label for="password"><b>Mật khẩu</label>
                        <input type="password" id="password" placeholder="Nhập mật khẩu" name="password"
                        required value="">
                        <?php if(isset($error['password'])): ?>
                          <br> <p class="text-danger">Mật khẩu không được để trống!</p>
                        <?php endif ?>
                      </div>

                      <div class="form-group row muc">
                        <label for="address"><b>Địa chỉ</label>
                        <input type="text" id="address" placeholder="Nhập địa chỉ" name="address"
                        required value="">
                        <?php if(isset($error['address'])): ?>
                          <br> <p class="text-danger">Địa chỉ không được để trống!</p>
                        <?php endif ?>
                      </div>

                      <div class="form-group row muc">
                        <label for="input2"><b>Giới tính</label>
                        <div class="gioitinh">
                          <select class="form-control" name="gioitinh">
                            <option value="1" <?php echo isset($data['gioitinh']) && $data['gioitinh'] == 1 ? "selected = 'selected'" : "" ?>>
                              Nữ
                            </option>
                            <option value="2" <?php echo isset($data['gioitinh']) && $data['gioitinh'] == 2 ? "selected = 'selected'" : "" ?>>
                              Nam
                            </option>
                          </select>
                          <?php if (isset($error['re_password'])): ?>
                                <p class="text-danger"> <?php echo $error['re_password']; ?> </p>
                          <?php endif ?>
                        </div>
                      </div>

                      <div class="form-group row muc">
                        <label for="ngaysinh"><b>Ngày sinh</label>
                        <input type="date" id="ngaysinh" name="ngaysinh" value="">
                      </div>

                      <div class="form-group row muc">
                        <div style="width: calc(100% - 75px); display: inline-block;">
                          <button type="submit" class="btn btn-success"style="background: #fdd504; width: 100%; margin: 0 50px 20px;">Tạo tài khoản</button>
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