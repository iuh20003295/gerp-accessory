<?php
    include_once("Controller/cNguoiDung.php");
    $p= new controlNguoiDung();
    $MaND=$_REQUEST['id'];
    $sp= $p->getOneND($MaND);
    if($sp){
        while($r = mysqli_fetch_assoc($sp)){
            $TenND = $r['TenNguoiDung'];
            $Email = $r['Email'];
            $SoDienThoai = $r['SoDienThoai'];
            $vaitro = $r['TenVT'];
        }
    }else{
        echo"<script>alert('Mã Người Dùng không tồn tại')</script>";
        header("refresh:0; url='admin.php'");
    }
?>
<form action="#" method="post" enctype="multipart/form-data">
    <table>
        <tr>
            <td>TÊN NGƯỜI DÙNG </td>
            <td>
                <input type="text" name="txtTenND" value="<?php if(isset($TenND)) echo $TenND; ?>" required/>
            </td>
        </tr>
        <tr>
            <td>EMAIL</td>
            <td>
                <input type="text" name="txtEmail" value="<?php if(isset($Email)) echo $Email; ?>" required/>
        </tr>
        <tr>
            <td>ĐIỆN THOẠI</td>
            <td>
                <input type="text" name="txtDT" value="<?php if(isset($SoDienThoai)) echo $SoDienThoai; ?>" required/> 
            </td>
        </tr>
        <tr>
            <td>VAI TRÒ</td>
            <td>
                    <?php
                        include_once("Controller/cVaiTro.php");
                        $pt = new controlVaiTro();
                        $kq = $pt -> getAllVaiTro();
                        if(!$kq){
                            echo "No data!";
                        }else{
                            echo "<select name='cboVaiTro'>";
                            while($ro = mysqli_fetch_assoc($kq)){
                                if($ro['TenVT']==$vaitro){
                                    echo "<option value=".$ro['MaVT']." selected>".$ro['TenVT']."</option>";
                                }else{
                                    echo "<option value=".$ro['MaVT'].">".$ro['TenVT']."</option>";
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
        $kq = $p->cUpdateND($MaND, $_REQUEST["txtTenND"], $_REQUEST["txtEmail"],$_REQUEST["txtDT"], $_REQUEST["cboVaiTro"]);
        if($kq){
            echo "<script>alert('Cập nhật thông tin người dùng thành công')</script>";
            header("refresh:0; url = 'admin.php?type=xemnd'");
        }else{
            echo "<script>alert('Cập nhật người dùng thất bại')</script>";

        }
    }

?>