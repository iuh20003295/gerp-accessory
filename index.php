<!DOCTYPE html>
<?php session_start(); ?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ - SSD, SD Card, Memory Card and Flask Devices</title>
    <link rel="icon" type="image/png" href="image/tittle.png">
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            margin-top: 20px;
        }

        header {
            background: url(image/hero-bg.jpg);
            background-size: cover;
            background-position: center;
            height: 200px;
            color: white;
            text-shadow: 2px 2px 4px #000000;
        }

        header h2 {
            padding: 20px;
            text-align: center;
            line-height: 200px;
        }

        footer {
            background-color: #343a40;
            color: white;
            padding: 40px 0;
        }

        footer a {
            color: white;
            text-decoration: none;
        }

        footer a:hover {
            color: #ffc107;
        }

        .footer-links,
        .footer-contact,
        .footer-social {
            margin-bottom: 20px;
        }

        .footer-social a {
            margin-right: 15px;
            font-size: 1.2em;
        }

        .footer-social i {
            color: #ffc107;
        }

        .footer-bottom {
            background-color: #212529;
            padding: 10px 0;
            text-align: center;
        }
    </style>
</head>

<body>
    <header>
    </header>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="index.php">Trang chủ</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mr-auto">
                    <?php
                    if (isset($_SESSION["dn"])) {
                        if($_SESSION["dn"]<3){
                            echo '<li class="nav-item"><a href="admin.php" class="nav-link">Quản lý</a></li>';
                        }
                        echo '<li class="nav-item"><a href="?dangxuat" onclick="return confirm(\'Are you sure to logout?\');" class="nav-link">Đăng xuất</a></li>';
                    } else {
                        echo '<li class="nav-item"><a href="?dangnhap" class="nav-link">Đăng nhập</a></li>';
                        echo '<li class="nav-item"><a href="?dangky" class="nav-link">Đăng ký</a></li>';
                    }
                
                    ?>
                </ul>
                <form class="form-inline my-2 my-lg-0" action="#" method='post'>
                    <input class="form-control mr-sm-2" type="text" name="txtTuKhoa" placeholder="Từ khóa tìm kiếm">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="btnTimKiem">Search</button>
                    <?php if (isset($_SESSION["dn"])) {
                        if($_SESSION["dn"]>2){
                            echo"<a href='?profile' class='btn btn-outline-info ml-2 my-2 my-sm-0'>
                            <i class='fas fa-user-circle fa-lg' style='color: #74C0FC'></i>
                            </a>";
                            echo"<a href='?cart' class='btn btn-outline-info ml-2 my-2 my-sm-0'>
                            <i class='fas fa-shopping-cart'></i>
                            </a>";
                        }
                    }
                    ?>
                </form>
            </div>
        </nav>
        <div class="row mt-4">
            <aside class="col-lg-3 col-md-4">
                <h4><a style="text-decoration:none" href="index.php">THƯƠNG HIỆU</a></h4>
                <?php include_once("View/thuonghieu.php"); ?>
            </aside>
            <section class="col-lg-9 col-md-8">
            <?php
                if (isset($_GET["dangnhap"])) {
                    include_once("View/dangnhap.php");
                } elseif (isset($_GET["dangky"])) {
                    include_once("View/dangky.php");
                } elseif (isset($_GET["dangxuat"])) {
                    include_once("View/dangxuat.php");
                }elseif(isset($_GET["profile"])){
                    include_once("View/profile.php");
                }elseif(isset($_GET["cart"])){
                    include_once("View/giohang.php");
                }elseif(isset($_REQUEST["action"]) && $_REQUEST["action"]=="delete"){
                    include_once("View/deletegiohang.php");
                }
                else {
                    include_once("View/sanpham.php");
                }
                ?>
            </section>
        </div>
    </div>
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4 footer-links">
                    <h5>Liên kết nhanh</h5>
                    <ul class="list-unstyled">
                        <li><a href="#">Trang chủ</a></li>
                        <li><a href="#">Sản phẩm</a></li>
                        <li><a href="#">Khuyến mãi</a></li>
                        <li><a href="#">Liên hệ</a></li>
                    </ul>
                </div>
                <div class="col-md-4 footer-contact">
                    <h5>Thông tin liên hệ</h5>
                    <p>
                        Địa chỉ: 308 Hoàng Diệu - Đông Hà - Quảng Trị<br>
                        Điện thoại: 0911992103<br>
                        Email: dphuho23@gmail.com
                    </p>

                </div>
                <div class="col-md-4 footer-social">
                    <h5>Kết nối với chúng tôi</h5>
                    <a href="https://www.facebook.com/ducphu.ger/" class="text-white"><i class="fab fa-facebook-f"></i></a>
                    <a href="https://lms.iuh.edu.vn/" class="text-white"><i class="fab fa-twitter"></i></a>
                    <a href="https://lms.iuh.edu.vn/" class="text-white"><i class="fab fa-instagram"></i></a>
                    <a href="https://lms.iuh.edu.vn/" class="text-white"><i class="fab fa-linkedin"></i></a>
                    <a href="https://lms.iuh.edu.vn/" class="text-white"><i class="fab fa-tiktok"></i></a>
                    <a href="https://lms.iuh.edu.vn/" class="text-white"><i class="fab fa-youtube"></i></a>

                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2024 Gerp Digital Corporation or its affiliates. All rights reserved.</p>
        </div>
            </footer>



    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</body>

</html>
<!-- <form action="#" name="frgia" method="get">
                    <h4 class="text-decoration-none" style='color: #007bff'>LỌC THEO GIÁ (VNĐ)</h4>
                    <div class="form-group">
                        <label for="GiaBD">Từ:</label>
                        <select class="form-control" name="GiaBD" id="GiaBD">
                            <option value="1">1</option>
                            <option value="500000">500.000</option>
                            <option value="1000000">1.000.000</option>
                            <option value="2000000">2.000.000</option>
                            <option value="3000000">3.000.000</option>
                            <option value="4000000">4.000.000</option>
                            <option value="5000000">5.000.000</option>
                            <option value="6000000">6.000.000</option>
                            <option value="7000000">7.000.000</option>
                            <option value="8000000">8.000.000</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="GiaKT">Đến:</label>
                        <select class="form-control" name="GiaKT" id="GiaKT">
                            <option value="500000">500.000</option>
                            <option value="1000000">1.000.000</option>
                            <option value="2000000">2.000.000</option>
                            <option value="3000000">3.000.000</option>
                            <option value="4000000">4.000.000</option>
                            <option value="5000000">5.000.000</option>
                            <option value="6000000">6.000.000</option>
                            <option value="7000000">7.000.000</option>
                            <option value="8000000">8.000.000</option>
                            <option value="9000000">9.000.000</option>
                        </select>
                    </div>
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="btnSearchGia">Lọc</button>
                </form> -->
