
<?php
session_start();
include_once("Controller/cSanPham.php");
$p = new controlSanPham();
$MaSP = $_REQUEST['id'];
$Idnd=$_SESSION['idnd'];
$sp = $p->getOneSanPham($MaSP);
if ($sp) {
    while ($r = mysqli_fetch_assoc($sp)) {
        $tensp = $r['TenSP'];
        $giaban = $r['GiaBan'];
        $giagoc = $r['GiaGoc'];
        $hinh = $r['HinhAnh'];
        $thuonghieu = $r['TenTH'];
    }
} else {
    echo "<script>alert('Mã sản phẩm không tồn tại!')</script>";
    header("refresh:0; url='admin.php'");
}
?>
<?php
    if (isset($_REQUEST["btnThem"])) {
        if(isset($_SESSION['dn'])){
            $kq = $p->themgiohang($_REQUEST['id'], $Idnd, $_REQUEST["txtTenSP"], $_REQUEST["txtGiaGoc"], $_REQUEST["txtGiaBan"]);
            if ($kq) {
                echo "<script>alert('Thêm vào giỏ hàng thành công')</script>";
            } else {
                echo "<script>alert('Thêm vào giỏ hàng thất bại!')</script>";
            }
        }else{
            echo"<script>alert('Vui lòng đăng nhập để tiếp tục')</script>";
            header("refresh:0.5; url='index.php?dangnhap'");
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết sản phẩm</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .card {
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            border: none;
            border-radius: 10px;
        }
        .card-body {
            padding: 2rem;
        }
        .form-control-plaintext {
            font-weight: bold;
            color: #495057;
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
            padding: 10px 20px;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        .btn-secondary {
            background-color: #6c757d;
            border: none;
            padding: 10px 20px;
        }
        .btn-secondary:hover {
            background-color: #545b62;
        }
        .img-container {
            height: 300px;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }
        .img-container img {
            max-width: 100%;
            max-height: 100%;
            object-fit: contain;
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <nav class="navbar navbar-light bg-light mb-4">
        <a class="navbar-brand" href="index.php">
            <i class="fas fa-home"></i> Trang chủ
        </a>
    </nav>
    <div class="card">
        <div class="card-body">
            <h2 class="card-title text-center mb-4">Chi tiết sản phẩm</h2>
            <form action="#" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="tenSanPham"><i class="fas fa-tag"></i> TÊN SẢN PHẨM</label>
                            <p id="tenSanPham" class="form-control-plaintext"><?php if (isset($tensp)) echo $tensp; ?></p>
                            <input type="hidden" name="txtTenSP" value="<?php if (isset($tensp)) echo $tensp; ?>">
                        </div>
                        <div class="form-group">
                            <label for="giaGoc"><i class="fas fa-dollar-sign"></i> GIÁ GỐC (VNĐ)</label>
                            <p id="giaGoc" class="form-control-plaintext"><?php if (isset($giagoc)) echo number_format($giagoc, 0, ',', '.'); ?></p>
                            <input type="hidden" name="txtGiaGoc" value="<?php if (isset($giagoc)) echo $giagoc; ?>">
                        </div>
                        <div class="form-group">
                            <label for="giaBan"><i class="fas fa-tags"></i> GIÁ BÁN (VNĐ)</label>
                            <p id="giaBan" class="form-control-plaintext"><?php if (isset($giaban)) echo number_format($giaban, 0, ',', '.'); ?></p>
                            <input type="hidden" name="txtGiaBan" value="<?php if (isset($giaban)) echo $giaban; ?>">
                        </div>
                        <div class="form-group">
                            <label for="thuongHieu"><i class="fas fa-building"></i> THƯƠNG HIỆU</label>
                            <p id="thuongHieu" class="form-control-plaintext">
                                <?php
                                include_once("Controller/cThuongHieu.php");
                                $pt = new controlThuongHieu();
                                $kq = $pt->getAllThuongHieu();
                                if (!$kq) {
                                    echo "No data!";
                                } else {
                                    while ($ro = mysqli_fetch_assoc($kq)) {
                                        if ($ro['TenTH'] == $thuonghieu) {
                                            echo $ro['TenTH'];
                                            echo "<input type='hidden' name='cboThuongHieu' value='".$ro['MaTH']."'>";
                                            break;
                                        }
                                    }
                                }
                                ?>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="hinhAnh"><i class="fas fa-image"></i> HÌNH ẢNH</label>
                            <div class="img-container border rounded">
                                <img src='image/sanpham/<?php echo $hinh ?>' class='img-fluid' alt='Sản phẩm'/>
                            </div>
                            <input type="hidden" name="txtHinhAnh" value="<?php if (isset($hinh)) echo $hinh; ?>">
                        </div>
                    </div>
                </div>
                <div class="form-group text-center mt-4">
                    <button type="submit" name="btnThem" class="btn btn-primary mr-2">
                        <i class="fas fa-cart-plus"></i> Thêm vào giỏ hàng
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
