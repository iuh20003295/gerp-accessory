<?php
    if($_SESSION['dn']>1)
    {
        echo "<script>alert('Bạn không có quyền truy cập')</script>";
        header("refresh: 0.5; url='admin.php'");
    }
    include_once("Controller/cNguoiDung.php");
    $p = new controlNguoiDung();
    $kq = $p -> getAllNguoiDung();
    if(!$kq){
        echo "No data!";
    }else{
        echo "<h2>Quản lí người dùng</h2>";
        echo "<table width = 100%>";
        echo "<tr>
                <th>Mã Người dùng</th>
                <th>Tên Người dùng</th>
                <th>Email</th>
                <th>Số điện thoại</th>
                <th>Vai trò</th>
                <th>Thao tác</th>
            </tr>";
            while($r = mysqli_fetch_assoc($kq)){
                echo "<tr>";
                    echo "<td>".$r["IDNguoiDung"]."</td>";
                    echo "<td>".$r["TenNguoiDung"]."</td>";
                    echo "<td>".$r["Email"]."</td>";
                    echo "<td>".$r["SoDienThoai"]."</td>";
                    echo "<td>".$r["TenVT"]."</td>";
                    echo "<td><a href='?action2=update&id=".$r["IDNguoiDung"]."'>Sửa</a> | <a href='?action2=delete&id=".$r["IDNguoiDung"]."'onclick='return confirm("."\"Bạn thực sự muốn xóa?\"".");'>Xóa</a></td>";
                echo "</tr>";
            }
        echo "</table>";
    }
?>