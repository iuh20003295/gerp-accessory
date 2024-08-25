<?php
if($_SESSION['dn']>1)
{
    echo "<script>alert('Bạn không có quyền truy cập')</script>";
    header("refresh: 0.5; url='admin.php'");
}
include_once("Controller/cVaiTro.php");
    $p = new controlVaiTro();
    $kq = $p -> getAllVaiTro();
    if(!$kq){
        echo "No data!";
    }else{
        echo "<a href='?action3=insert'>THÊM VAI TRÒ</a>";
        echo "<table>";
        echo "<tr>
                <th>Mã Vai Trò</th>
                <th>Tên Vai Trò</th>
                <th>Mô Tả</th>
                <th>Ghi Chú</th>
                <th>Thao tác</th>
            </tr>";
            while($r = mysqli_fetch_assoc($kq)){
                echo "<tr>";
                    echo "<td>".$r["MaVT"]."</td>";
                    echo "<td>".$r["TenVT"]."</td>";
                    echo "<td>".$r["MoTa"]."</td>";
                    echo "<td>".$r["GhiChu"]."</td>";
                    echo "<td><a href='?action3=delete&id=".$r["MaVT"]."'onclick='return confirm("."\"Bạn thực sự muốn xóa?\"".");'>Xóa</a></td>";
                echo "</tr>";
            }
        echo "</table>";
    }

?>