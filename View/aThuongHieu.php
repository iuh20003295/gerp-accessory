<?php
if($_SESSION['dn']>2)
{
    echo "<script>alert('Bạn không có quyền truy cập')</script>";
    header("refresh: 0.5; url='index.php'");
}
    include_once("Controller/cThuongHieu.php");
    $p = new controlThuongHieu();
    $kq = $p -> getAllThuongHieu();
    if(!$kq){
        echo "No data!";
    }else{
        echo "<a href='?action1=insert'>THÊM THƯƠNG HIỆU</a>";
        echo "<table>";
        echo "<tr>
                <th>MaTH</th>
                <th>TenTH</th>
                <th>Địa chỉ</th>
                <th>Website</th>
                <th>Điện thoại</th>
                <th>Thao tác</th>
            </tr>";
            while($r = mysqli_fetch_assoc($kq)){
                echo "<tr>";
                    echo "<td>".$r["MaTH"]."</td>";
                    echo "<td>".$r["TenTH"]."</td>";
                    echo "<td>".$r["DiaChi"]."</td>";
                    echo "<td>".$r["Website"]."</td>";
                    echo "<td>".$r["DienThoai"]."</td>";
                    echo "<td><a href='?action1=update&id=".$r["MaTH"]."'>Sửa</a> | <a href='?action1=delete&id=".$r["MaTH"]."'onclick='return confirm("."\"Bạn thực sự muốn xóa?\"".");'>Xóa</a></td>";
                echo "</tr>";
            }
        echo "</table>";
    }
?>