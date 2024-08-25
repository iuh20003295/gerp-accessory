<?php
    include_once("Controller/cSanPham.php");
    $p= new controlSanPham();
    $MaSP=$_REQUEST['id'];
    $sp= $p->getOneSanPham($MaSP);
    if($sp){
        while($r = mysqli_fetch_assoc($sp)){
            $tensp = $r['TenSP'];
            $giaban = $r['GiaBan'];
            $giagoc = $r['GiaGoc'];
            $hinh = $r['HinhAnh'];
            $thuonghieu = $r['TenTH'];
        }
    }else{
        echo"<script>alert('Ma san pham khong ton tai!')</script>";
        header("refresh:0; url='admin.php'");
    }
?>
<form action="#" method="post" enctype="multipart/form-data">
    <table>
        <tr>
            <td>TÊN SẢN PHẨM</td>
            <td>
                <input type="text" name="txtTenSP" value="<?php if(isset($tensp)) echo $tensp; ?>" required/>
            </td>
        </tr>
        <tr>
            <td>GIÁ GỐC</td>
            <td>
                <input type="text" name="txtGiaGoc" value="<?php if(isset($giagoc)) echo $giagoc; ?>" required/> (VNĐ)
            </td>
        </tr>
        <tr>
            <td>GIÁ BÁN</td>
            <td>
                <input type="text" name="txtGiaBan" value="<?php if(isset($giaban)) echo $giaban; ?>" required/> (VNĐ)
            </td>
        </tr>
        <tr>
            <td>HÌNH ẢNH</td>
            <td>
                <input type="file" name="txtHinhAnh"/><br>
                <img src='image/sanpham/<?php echo $hinh ?>'width='50px'/>
            </td>
        </tr>
        <tr>
            <td>THƯƠNG HIỆU</td>
            <td>
                    <?php
                        include_once("Controller/cThuongHieu.php");
                        $pt = new controlThuongHieu();
                        $kq = $pt -> getAllThuongHieu();
                        if(!$kq){
                            echo "No data!";
                        }else{
                            echo "<select name='cboThuongHieu'>";
                            while($ro = mysqli_fetch_assoc($kq)){
                                if($ro['TenTH']==$thuonghieu){
                                    echo "<option value=".$ro['MaTH']." selected>".$ro['TenTH']."</option>";
                                }else{
                                    echo "<option value=".$ro['MaTH'].">".$ro['TenTH']."</option>";
                                }
                            }
                            echo "</select>";
                        }
                    ?>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <input type="submit" name ="btnCapNhat" value="Cập nhật">
                <input type="reset" value="Nhập lại">
            </td>
            
        </tr>
    </table>
</form>
<?php
    if(isset($_REQUEST["btnCapNhat"])){
        $kq = $p->updateSanPham($MaSP, $_REQUEST["txtTenSP"], $_REQUEST["txtGiaGoc"],$_REQUEST["txtGiaBan"],$_FILES["txtHinhAnh"], $hinh, $_REQUEST["cboThuongHieu"]);
        if($kq){
            echo "<script>alert('Cập nhật sản phẩm thành công')</script>";
            header("refresh:0; url = 'admin.php?type=sanpham'");

        }else{
            echo "<script>alert('Cập nhật sản phẩm thất bại!')</script>";

        }
    }

?>