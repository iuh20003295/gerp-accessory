<?php
  session_start();
  if(!isset($_SESSION['dn'])){
    echo '<script>alert("Chưa đăng nhập")</script>';
    header("refresh:0.5; url='index.php?dangnhap'");
  }
  if($_SESSION['dn']>2){
    echo '<script>alert("Bạn không có quyền")</script>';
    header("refresh:0; url='index.php'");
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Quản Trị</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
  </head>
<body>
  <div class="container">
    <header class="mb-4">
      <h2>Gerp Digital</h2>
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="collapse navbar-collapse">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item"><a class="nav-link" href="index.php">Trang chủ</a></li>
            <li class="nav-item"><a class="nav-link" href="View/dangxuatadmin.php" onclick="return confirm('Are you sure to logout?');">Đăng Xuất</a></li>
          </ul>
          <form class="form-inline my-2 my-lg-0" action="#" method='post'>
            <input class="form-control mr-sm-2" type="text" name="txtTuKhoa" placeholder="Từ khóa tìm kiếm">
            <button class="btn btn-outline-success my-2 my-sm-0" name="btnTimKiem" type="submit">Search</button>
          </form>
        </div>
      </nav>
    </header>
    
    <div class="row">
      <aside class="col-md-3">
        <ul class="list-group">
          <?php
            if($_SESSION['dn']<=2){
              echo'<li class="list-group-item"><a href="?type=thuonghieu">Quản lý Thương Hiệu</a></li>';
              echo'<li class="list-group-item"><a href="?type=sanpham">Quản lý Sản Phẩm</a></li>';

            }
            if($_SESSION['dn']<=1){
              echo'<li class="list-group-item"><a href="?type=xemnd">Quản lý Người dùng</a></li>';
              echo'<li class="list-group-item"><a href="?action2=insert">Thêm tài khoản nhân viên</a></li>';
              echo'<li class="list-group-item"><a href="?type=xemvt">Quản lí Vai trò</a></li>';
              echo'<li class="list-group-item"><a href="?type=xemdh">Quản lí Đơn Hàng</a></li>';

            
            }
          ?>
        </ul>
      </aside>

      <section class="col-md-9">
        <?php
          if(isset($_REQUEST["type"]) && $_REQUEST["type"]=="thuonghieu"){
            include_once("View/aThuongHieu.php");
          } elseif(isset($_REQUEST["type"]) && $_REQUEST["type"]=="sanpham"){
            include_once("View/aSanPham.php");
          } elseif(isset($_REQUEST["type"]) && $_REQUEST["type"]=="xemnd"){
            include_once("View/tblkhachhang.php");
          } elseif(isset($_REQUEST["type"]) && $_REQUEST["type"]=="xemvt"){
            include_once("View/qlVaiTro.php");
          }elseif(isset($_REQUEST["type"]) && $_REQUEST["type"]=="xemdh"){
            include_once("View/tbldonhang.php");
          } elseif(isset($_REQUEST["action"]) && $_REQUEST["action"]=="update"){
            include_once("View/editsanpham.php");
          } elseif(isset($_REQUEST["action"]) && $_REQUEST["action"]=="delete"){
            include_once("View/deletesanpham.php");
          } elseif(isset($_REQUEST["action"]) && $_REQUEST["action"]=="insert"){
            include_once("View/insertsanpham.php");
          } elseif(isset($_REQUEST["action1"]) && $_REQUEST["action1"]=="update"){
            include_once("View/editthuonghieu.php");
          } elseif(isset($_REQUEST["action1"]) && $_REQUEST["action1"]=="delete"){
            include_once("View/deletethuonghieu.php");
          } elseif(isset($_REQUEST["action1"]) && $_REQUEST["action1"]=="insert"){
            include_once("View/insertthuonghieu.php");
          } elseif(isset($_REQUEST["action2"]) && $_REQUEST["action2"]=="update"){
            include_once("View/editnguoidung.php");
          } elseif(isset($_REQUEST["action2"]) && $_REQUEST["action2"]=="delete"){
            include_once("View/deletenguoidung.php");
          } elseif(isset($_REQUEST["action2"]) && $_REQUEST["action2"]=="insert"){
            include_once("View/insertnguoidung.php");
          } elseif(isset($_REQUEST["action3"]) && $_REQUEST["action3"]=="update"){
            include_once("View/editvaitro.php");
          } elseif(isset($_REQUEST["action3"]) && $_REQUEST["action3"]=="delete"){
            include_once("View/deletevaitro.php");
          } elseif(isset($_REQUEST["action3"]) && $_REQUEST["action3"]=="insert"){
            include_once("View/insertvaitro.php");
          }elseif(isset($_REQUEST["action4"]) && $_REQUEST["action4"]=="delete"){
            include_once("View/deletedonhang.php");
          } elseif(isset($_REQUEST["action4"]) && $_REQUEST["action4"]=="insert"){
            include_once("View/insertvaitro.php");
          }
          
          
          else {
            echo "<img src='image/hero-bg.jpg' class='img-fluid' alt='Responsive image'>";
          }
        ?>
      </section>
    </div>

    <footer class="mt-5">
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <h5>Liên kết nhanh</h5>
            <ul class="list-unstyled">
              <li><a href="#">Trang chủ</a></li>
              <li><a href="#">Sản phẩm</a></li>
              <li><a href="#">Khuyến mãi</a></li>
              <li><a href="#">Liên hệ</a></li>
            </ul>
          </div>
          <div class="col-md-4">
            <h5>Thông tin liên hệ</h5>
            <p>
              Địa chỉ: 16 Nguyễn Văn Nghi, Phường 5, Thành phố HCM<br>
              Điện thoại: 0123 456 789<br>
              Email: dphuho23@gmail.com
            </p>
          </div>
          <div class="col-md-4">
            <h5>Kết nối với chúng tôi</h5>
            <a href="https://lms.iuh.edu.vn/" class="text-dark mr-2"><i class="fab fa-facebook-f"></i></a>
            <a href="https://lms.iuh.edu.vn/" class="text-dark mr-2"><i class="fab fa-twitter"></i></a>
            <a href="https://lms.iuh.edu.vn/" class="text-dark mr-2"><i class="fab fa-instagram"></i></a>
            <a href="https://lms.iuh.edu.vn/" class="text-dark mr-2"><i class="fab fa-linkedin"></i></a>
            <a href="https://lms.iuh.edu.vn/" class="text-dark mr-2"><i class="fab fa-tiktok"></i></a>
          </div>
        </div>
        <div class="footer-bottom text-center mt-4">
          <p>&copy; 2024 Gerp Digital Corporation or its affiliates. All rights reserved.</p>
        </div>
      </div>
    </footer>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <!-- Font Awesome -->
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</body>
</html>
