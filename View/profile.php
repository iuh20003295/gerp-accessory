<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TRANG CÁ NHÂN</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php
    session_start();
    if(isset($_SESSION['dn'])){
        $id = $_SESSION['idnd'];
    }
    include_once("Controller/cNguoiDung.php");
    $p = new controlNguoiDung();
    $kq = $p->getProfile($id);
    if(!$kq){
        echo '<div class="alert alert-warning" role="alert">No data</div>';
    }else{
        echo '<div class="container mt-5">';
        echo '<div class="card">';
        echo "<div class='card-header bg-dark text-white'>Thông tin khách hàng</div>";
        echo '<ul class="list-group list-group-flush">';
        while($r = mysqli_fetch_assoc($kq)){
            echo '<li class="list-group-item"><strong>ID Khách hàng:</strong> '.$r['IDNguoiDung'].'</li>';
            echo '<li class="list-group-item"><strong>Tên Khách Hàng:</strong> '.$r['TenNguoiDung'].'</li>';
            echo '<li class="list-group-item"><strong>Mật Khẩu:</strong> '.$r['MatKhau'].'</li>';
            echo '<li class="list-group-item"><strong>Email:</strong> '.$r['Email'].'</li>';
            echo '<li class="list-group-item"><strong>Số Điện Thoại:</strong> '.$r['SoDienThoai'].'</li>';
            echo '<li class="list-group-item"><strong>Vai Trò:</strong> '.$r['TenVT'].'</li>';
            echo '<li class="list-group-item"><a href="#" class="btn btn-primary btn-sm">Cập nhật</a></li>';
        }
        echo '</ul>';
        echo '</div>';
        echo '</div>';
    }
    ?>
</body>
</html>
