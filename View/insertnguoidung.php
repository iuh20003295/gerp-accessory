<form action="#" method="post" enctype="multipart/form-data">
    <table>
        <tr>
            <td>TÊN NGƯỜI DÙNG </td>
            <td>
                <input type="text" name="txtTenND"  required/>
            </td>
        </tr>
        <tr>
            <td>MẬT KHẨU</td>
            <td>
                <input type="password" name="txtpass"  required/>
        </tr>
        <tr>
            <td>EMAIL</td>
            <td>
                <input type="text" name="txtmail"  required/>
            </td>
        </tr>
        <tr>
            <td>ĐIỆN THOẠI</td>
            <td>
                <input type="text" name="txtDT"  required/> 
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <input type="submit" name ="btnThem" value="Thêm">
                <input type="reset" value="Nhập lại">
            </td>
            
        </tr>
    </table>
</form>
<?php
    if(isset($_REQUEST["btnThem"])){
        include_once("Controller/cNguoiDung.php");
        $p= new controlNguoiDung();
        $kq = $p->cInsertND($_REQUEST["txtTenND"], $_REQUEST["txtpass"],$_REQUEST["txtmail"],$_REQUEST["txtDT"]);
        if($kq){
            echo "<script>alert('Thêm tài khoản thành công')</script>";
            header("refresh:0; url = 'admin.php?type=xemnd'");
        }else{
            echo "<script>alert('Thêm tài khoản thất bại!')</script>";

        }
    }

?>