<?php
    session_start();
    $id = $_SESSION['idnd'];
    include_once("Controller/cHoaDon.php");
    $p = new controlHoaDon();
    $kq = $p->getAllHoaDonByUser($id);
    if(!$kq){
        echo "Chưa có đơn hàng nào!";
    }else{
        echo"<table border = '2' padding = 15px width=100%>";
        echo"<tr>";
        echo"<td style='text-align:center'>Mã đặt hàng</td>";
        echo"<td style='text-align:center'>Mã sản phẩm</td>";
        echo"<td style='text-align:center'>Tên sản phẩm</td>";
        echo"<td style='text-align:center'>Giá Gốc(VNĐ)</td>";
        echo"<td style='text-align:center'>Giá Bán(VNĐ)</td>";
        echo"<td style='text-align:center'>Thao tác</td>";
        echo"<td style='text-align:center'>Số lượng</td>";
        echo"</tr>";
        while($r = mysqli_fetch_assoc($kq)){
            echo"<tr>";
            echo"<td style='text-align:center'>".$r['ID_dathang']."</td>";
            echo"<td style='text-align:center'>".$r['MaSP']."</td>";
            echo"<td style='text-align:center'>".$r['TenSP']."</td>";
            echo"<td style='text-align:center'><s>".number_format(($r['GiaGoc']),0,",",".") . "</s></td>";
            echo"<td style='text-align:center'>".number_format(($r['GiaBan']),0,",",".") . "</td>";
            echo "<td style='text-align:center'><a href='?action=delete&id=".$r["ID_dathang"]."'onclick='return confirm("."\"Bạn thực sự muốn xóa?\"".");'>Xóa</a></td>";
            echo"<td><select name=dboSoLuong>
                        <option value='1' selected>1</option>
                    </select></td>";
            echo"</tr>";
        }
        echo"</table>";
    }

?>