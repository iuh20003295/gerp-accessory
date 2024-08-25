<form action="#" method="post" enctype="multipart/form-data">
    <table>
        <tr>
            <td>TÊN SẢN PHẨM</td>
            <td>
                <input type="text" name="txtTenSP" required/>
            </td>
        </tr>
        <tr>
            <td>GIÁ GỐC</td>
            <td>
                <input type="text" name="txtGiaGoc"  required/> (VNĐ)
            </td>
        </tr>
        <tr>
            <td>GIÁ BÁN</td>
            <td>
                <input type="text" name="txtGiaBan" required/> (VNĐ)
            </td>
        </tr>
        <tr>
            <td>HÌNH ẢNH</td>
            <td>
                <input type="file" name="txtHinhAnh" required/><br>
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
                <input type="submit" name ="btnThem" value="Thêm sản phẩm">
                <input type="reset" value="Nhập lại">
            </td>
            
        </tr>
    </table>
</form>
<?php
    if(isset($_REQUEST["btnThem"])){
        include_once("Controller/cSanPham.php");
        $p= new controlSanPham();
        $kq = $p->cInsertSP( $_REQUEST["txtTenSP"], $_REQUEST["txtGiaGoc"],$_REQUEST["txtGiaBan"],$_FILES["txtHinhAnh"], $_REQUEST["cboThuongHieu"]);
        if($kq){
            echo "<script>alert('Thêm sản phẩm thành công')</script>";
            header("refresh:0; url = 'admin.php?type=sanpham'");
        }else{
            echo "<script>alert('Thêm sản phẩm thất bại!')</script>";

        }
    }

?>