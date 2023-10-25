
<div id="id02" class="modal">
  <div class="container-dangnhap">
  <div class="ReactModalPortal">
    <div class="ReactModal_Overlay ReactModal_Overlay--after-open">
      <div class="ReactModal_Content ReactModal_Content--after-open">
        <div class="general modal1">
          <div class="imgcontainer">
            <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
          </div>
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
              <form action="" method="POST" class="form-dangki">
                <div class="muc">
                <label for="email"><b>Email</b></label>
                <input type="email" id="email" placeholder="Nhập email" name="email" required>
                </div>
                <div class="muc">
                <label for="pwd"><b>Mật khẩu</b></label>
                <input type="password" id="pwd" placeholder="Nhập mật khẩu" name="pwd" required>
                </div>

                <div class="muc">
                  <div style="width: calc(100% - 75px); display: inline-block;">
                  <button type="submit" class="nut-dang-ki" style="background: #fdd504; width: 100%; margin: 0 50px 20px;">Đăng nhập</button>
                  <p style="margin: 0 50px 15px; width: 100%; font-size: 12px; line-height: 22px;">Nếu bạn chưa có tài khoản, hãy đăng kí ngay để tạo khoản của bạn.
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