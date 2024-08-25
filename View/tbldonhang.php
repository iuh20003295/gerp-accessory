<?php
if($_SESSION['dn']>2)
{
    echo "<script>alert('Bạn không có quyền truy cập')</script>";
    header("refresh: 0.5; url='index.php'");
}
    include_once("Controller/cHoaDon.php");
    $p = new controlHoaDon();
    $kq = $p -> getAllHoaDon();
    if(!$kq){
        echo "No data!";
    }else{
        echo "<table>";
        echo "<tr>
                <th>Mã Đặt Hàng</th>
                <th>Mã sản phẩm</th>
                <th>Tên sản phẩm</th>
                <th>Giá Gốc</th>
                <th>Giá Bán</th>
                <th>Thao tác</th>
            </tr>";
            while($r = mysqli_fetch_assoc($kq)){
                echo "<tr>";
                    echo "<td style='text-align:center'>".$r["ID_dathang"]."</td>";
                    echo "<td style='text-align:center'>".$r["MaSP"]."</td>";
                    echo "<td class='canhphai'>".$r["TenSP"]."</td>";
                    echo "<td class='canhphai'>".number_format($r['GiaGoc'],0,",",".")."</td>";
                    echo "<td class='canhphai'>".number_format($r['GiaBan'],0,",",".")."</td>";
                    echo "<td style='text-align:center'><a href='?action4=delete&id=".$r["ID_dathang"]."'onclick='return confirm("."\"Bạn thực sự muốn xóa?\"".");'>Xóa</a></td>";
                echo "</tr>";
            }
        echo "</table>";
    }
?>