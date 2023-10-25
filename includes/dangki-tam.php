
<?php
require_once __DIR__. '/autoload/autoload.php';

if(isset($_SESSION['name_id']))
{
  echo "<script>location.href='index.php'</script>";
}

$data =
[
  "name" => postInput('name'),
  "address" => postInput("address"),
  "email" => postInput('email'),
  "phone" => postInput('phone'),
  "password" => postInput('password'),

];

if($_SERVER["REQUEST_METHOD"] == "POST")
{
  $error = [];
  if(postInput('name') == '')
  {
    $error['name'] = "Mời nhập đầy đủ họ tên.";
  }
  if(postInput('address') == '')
  {
    $error['address'] = "Mời nhập địa chỉ.";
  }
  if(postInput('email') == '')
  {
    $error['email'] = "Mời nhập email.";
  }
  if(postInput('phone') == '')
  {
    $error['phone'] = "Mời nhập số điện thoại.";
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
      if($id_insert > 0)
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

<div id="id01" class="modal">
  <div class="container-dangki">
  <div class="ReactModalPortal">
    <div class="ReactModal_Overlay ReactModal_Overlay--after-open">
      <div class="ReactModal_Content ReactModal_Content--after-open">
        <div class="general modal1">
          <div class="imgcontainer">
            <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
          </div>
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
                <div class="muc">
                <label for="name"><b>Họ tên</b></label>
                <input type="text" id="fullname" placeholder="Nhập họ tên" name="name" required value="<?php echo $data['name'] ?>">
                <?php if (isset($error['name'])): ?>
                  <br><p class="text-danger">Tên không được để trống!!!</p>
                <?php endif ?>
                </div>

                <div class="muc">
                <label for="phone"><b>SĐT</b></label>
                <input type="tel" id="phone" placeholder="Nhập số điện thoại" name="phone" required value="<?php echo $data['phone'] ?>">
                <?php if (isset($error['phone'])): ?>
                  <br><p class="text-danger">Số điện thoại không được để trống!!!</p>
                <?php endif ?>
                </div>

                <div class="muc">
                <label for="email"><b>Email</b></label>
                <input type="email" id="email" placeholder="Nhập email" name="email" required value="<?php echo $data['email'] ?>">
                <?php if (isset($error['email'])): ?>
                  <br><p class="text-danger">Email không được để trống!!!</p>
                <?php endif ?>
                </div>

                <div class="muc">
                <label for="password"><b>Mật khẩu</b></label>
                <input type="password" id="pwd" placeholder="Nhập mật khẩu" name="password" required value="<?php echo $data['password'] ?>">
                <?php if (isset($error['password'])): ?>
                  <br><p class="text-danger">Mật khẩu không được để trống!!!</p>
                <?php endif ?>
                </div>

                <div class="muc">
                <label for="address"><b>Địa chỉ</b></label>
                <input type="text" id="diachi" placeholder="Nhập địa chỉ" name="address" required value="<?php echo $data['address'] ?>">
                <?php if (isset($error['address'])): ?>
                  <br><p class="text-danger">Địa chỉ không được để trống!!!</p>
                <?php endif ?>
                </div>

                <div class="muc">
                <label for="gioitinh"><b>Giới tính</b></label>
                <input type="radio" id="male" name="gender" value="male">
                <label for="male">Nam</label>
                <input type="radio" id="female" name="gender" value="female">
                <label for="female">Nữ</label>
                </div>

                <div class="muc">
                <label for="ngaysinh"><b>Ngày sinh</b></label>
                <input type="date" id="ngaysinh" name="ngaysinh">
                </div>

                <div class="muc">
                  <div style="width: calc(100% - 75px); display: inline-block;">
                  <button type="submit" class="nut-dang-ki" style="background: #fdd504; width: 100%; margin: 0 50px 20px;">Tạo tài khoản</button>
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

  </div>
  </div>
</div>
<style>
  .modal-dk
{
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1000; 
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    /*padding-top: 60px;*/
}
.container-dangki, .container-dangnhap
{
    padding: 16px;
    min-width: 1000px;
    width: 890px;
    margin-left: auto;
    margin-right: auto;
}
.ReactModal_Overlay .ReactModal_Overlay--after-open
{
    position: fixed;
    top: 0px;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0,0,0,0.53);
    overflow-y: scroll;
    z-index: 1000;/* Sit on top */
    width: 800px;
}
.ReactModal_Content .ReactModal_Content--after-open
{
    position: relative;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    border: none;
    background: rgb(255, 255, 255);
    overflow: unset;
    border-radius: 4px;
    outline: none;
    padding: 0;
    width: 900px;
    margin: 0 auto;
}
.modal1
{
    display: flex;
    width: 100%;
    margin: 60px 0;
    background: rgb(248, 248, 248);
    border-radius: 6px;
}
  /* Center the image and position the close button */
  .imgcontainer 
{
    text-align: center;
    margin: 24px 0 12px 0;
    position: relative;
}
.modal1-1
{
    width: 50%;
    float: left;
    padding: 45px 30px;
    background: white;
    border-radius: 6px 0px;
    overflow: hidden;
}
.modal1-1 h2
{
    font-size: 32px;
    font-weight: 300;
    color: rgb(36,36,36);
    margin-top: 0;
    margin-bottom: 10px;
}
.modal1-1 p
{
    font-size: 16px;
    font-weight: 300;
    line-height: 1.38;
    color: rgb(120, 120, 120);
    margin: 0 0 10px;
}
.modal1-2
{
    
    float: left; 
    min-height: 600px;
    background: white;
    border-radius: 0 6px;
    margin: 10px;
}
.header-modal1-2
{
    float: left;
    font-size: 16px;
    width: 150px;
    text-align: center;
    margin-left: 20px;font-weight: 300;
    display: block;
    cursor: pointer;
    color: #55ACEE;
    padding: 15px 5px 7px;
    text-decoration: none;
    border-bottom: 3px solid #55ACEE;
}
.modal1-2 hr
{
    margin-top: 60px;
    border: 2px solid rgb(248, 248, 248);

}
.modal1-2 .r1
{
    width: 550px;
    padding: 0px 20px 10px;
    margin: 0 auto;
}
.form-dangki
{
    display: block;
    margin-top: 0;
}
.r1 .muc
{
    display: block;
    font-size: 13px;
    margin: 0 0 35px;
}
.muc > label
{
    color: #0e0e0e;
    font-weight: 400;
    width: 75px;
    display: inline-block;
}
/* Full-width input fields */
.muc input[type=text], .muc input[type=password], .muc input[type=email], .muc input[type=date]
{
    float: right;
    width: calc(100% - 75px);
}
#fullname, #phone, #email, #pwd, #diachi
{
    height: 34px;
    border: 1px solid rgb(204, 204, 204);
    border-image: initial;
    padding: 6px 12px;
    outline: none;
    overflow: visible;
}
.muc button
{
    color: #000;
    display: inline-block;
    font-weight: 400;
    text-align: center;
    vertical-align: middle;
    touch-action: manipulation;
    cursor: pointer;
    white-space: nowrap;
    font-size: 14px;
    user-select: none;
    width: 100%;
    height: 41px;
    line-height: 41px;
    padding: 0;
    border-radius: 4px;
    outline: none;
}
/* The Close Button (x) */
  .close {
    position: absolute;
    top: -20px;
    left: 935px;
    color: #000;
    font-size: 35px;
    font-weight: bold;
  }
  
  .close:hover,
  .close:focus {
    color: red;
    cursor: pointer;
  }

  @-webkit-keyframes animatezoom {
    from {-webkit-transform: scale(0)} 
    to {-webkit-transform: scale(1)}
  }
    
  @keyframes animatezoom {
    from {transform: scale(0)} 
    to {transform: scale(1)}
  }
  
  /* Change styles for span and cancel button on extra small screens */
  @media screen and (max-width: 300px) {
    span.psw {
       display: block;
       float: none;
    }
    .cancelbtn {
       width: 100%;
    }
  }
</style>
<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>