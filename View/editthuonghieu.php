<?php
    include_once("Controller/cThuongHieu.php");
    $p= new controlThuongHieu();
    $MaTH=$_REQUEST['id'];
    $sp= $p->getOneThuongHieu($MaTH);
    if($sp){
        while($r = mysqli_fetch_assoc($sp)){
            $tenth = $r['TenTH'];
            $diachi = $r['DiaChi'];
            $website = $r['Website'];
            $dienthoai = $r['DienThoai'];

        }
    }else{
        echo"<script>alert('Ma thuong hieu khong ton tai!')</script>";
        header("refresh:0; url='admin.php'");
    }
?>
<form action="#" method="post" enctype="multipart/form-data">
    <table>
        <tr>
            <td>TÊN THƯƠNG HIỆU </td>
            <td>
                <input type="text" name="txtTenTH" value="<?php if(isset($tenth)) echo $tenth; ?>" required/>
            </td>
        </tr>
        <tr>
            <td>ĐỊA CHỈ</td>
            <td>
                <input type="text" name="txtDC" value="<?php if(isset($diachi)) echo $diachi; ?>" required/>
        </tr>
        <tr>
            <td>WEBSITE</td>
            <td>
                <input type="text" name="txtWS" value="<?php if(isset($website)) echo $website; ?>" required/>
            </td>
        </tr>
        <tr>
            <td>ĐIỆN THOẠI</td>
            <td>
                <input type="text" name="txtDT" value="<?php if(isset($dienthoai)) echo $dienthoai; ?>" required/> 
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
        $kq = $p->updateThuongHieu($MaTH, $_REQUEST["txtTenTH"], $_REQUEST["txtDC"],$_REQUEST["txtWS"],$_REQUEST["txtDT"]);
        if($kq){
            echo "<script>alert('Cập nhật thương hiệu thành công')</script>";
            header("refresh:0; url = 'admin.php?type=thuonghieu'");
        }else{
            echo "<script>alert('Cập nhật thương hiệu thất bại!')</script>";

        }
    }

?>