<?php
if($_SESSION['dn']>2)
{
    echo "<script>alert('Bạn không có quyền truy cập')</script>";
    header("refresh: 0.5; url='index.php'");
}
    include_once("Controller/cSanPham.php");
    $p = new controlSanPham();
    $kq = $p -> getAllSanPham();
    if(!$kq){
        echo "No data!";
    }else{
        echo "<a href='?action=insert'>THÊM SẢN PHẨM</a>";
        echo "<table>";
        echo "<tr>
                <th>Mã SP</th>
                <th>Tên SP</th>
                <th>Giá Gốc</th>
                <th>Giá Bán</th>
                <th>Hình Ảnh</th>
                <th>Thương Hiệu</th>
                <th>Thao tác</th>
            </tr>";
            while($r = mysqli_fetch_assoc($kq)){
                echo "<tr>";
                    echo "<td>".$r["MaSP"]."</td>";
                    echo "<td>".$r["TenSP"]."</td>";
                    echo "<td class='canhphai'>".number_format($r['GiaGoc'],0,",",".")."</td>";
                    echo "<td class='canhphai'>".number_format($r['GiaBan'],0,",",".")."</td>";
                    echo "<td class='canhgiua'>"."<img src='image/sanpham/".$r["HinhAnh"]."'width='50px'/>"."</td>";
                    echo "<td>".$r["TenTH"]."</td>";
                    echo "<td><a href='?action=update&id=".$r["MaSP"]."'>Sửa</a> | <a href='?action=delete&id=".$r["MaSP"]."'onclick='return confirm("."\"Bạn thực sự muốn xóa?\"".");'>Xóa</a></td>";
                echo "</tr>";
            }
        echo "</table>";
    }
?>