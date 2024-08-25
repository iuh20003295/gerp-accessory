<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh Sách Sản Phẩm</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <div class="row">
        <?php
        include_once("Controller/cSanPham.php");
        $p = new controlSanPham();
        if(isset($_REQUEST['th'])){
            $kq = $p->getAllSanPhamByType($_REQUEST['th']);
        }elseif(isset($_REQUEST['btnTimKiem'])){
            $kq = $p->getAllSanPhamByName($_REQUEST['txtTuKhoa']);
        }elseif(isset($_REQUEST['btnSearchGia'])){
            $kq = $p->getAllProductbySeachGia($_REQUEST['GiaBD'],$_REQUEST['GiaKT']);
        }else{
            $kq = $p->getAllSanPham();
        }
        if (!$kq) {
            echo "<div class='col-12'><p>No data!</p></div>";
        } else {
            while ($r = mysqli_fetch_assoc($kq)) {
                $pergiamgia = ceil((($r['GiaGoc'] - $r['GiaBan'])/$r['GiaGoc'])*100);
                echo "<div class='col-md-3 mb-3'>";
                echo "<div class='card h-100'>";
                echo "<img src='image/sanpham/" . $r["HinhAnh"] . "' class='card-img-top img-fluid' alt='" . $r["TenSP"] . "'>";
                echo "<div class='card-body text-center'>";
                echo "<h5 class='card-title'><a href='chitietsanpham.php?id=".$r["MaSP"]."'>" . $r["TenSP"] . "</a></h5>";
                if ($r["GiaBan"] == null) {
                    echo "<p class='card-text'>" . number_format($r['GiaGoc'], 0, ",", ".") . " VNĐ</p>";
                }elseif($r["GiaBan"] == $r["GiaGoc"]){
                    echo "<p class='card-text'>" . number_format($r['GiaBan'], 0, ",", ".") . " VNĐ</p>";
                } else {
                    echo "<p class='card-text'><s>" . number_format($r['GiaGoc'], 0, ",", ".") . " VNĐ</s></p>";
                    echo "<p class='card-text text-danger font-weight-bold'> -".$pergiamgia."%</p>";
                    echo "<p class='card-text'>" . number_format($r['GiaBan'], 0, ",", ".") . " VNĐ</p>";
                    echo "<p class='card-text'>Giảm ". number_format(($r['GiaGoc']-$r['GiaBan']), 0, ",", "."). " VNĐ</p>";
                }
                echo "</div>";
                echo "</div>";
                echo "</div>";
            }
        }
        ?>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
