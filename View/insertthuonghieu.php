<form action="#" method="post" enctype="multipart/form-data">
    <table>
        <tr>
            <td>TÊN THƯƠNG HIỆU </td>
            <td>
                <input type="text" name="txtTenTH"  required/>
            </td>
        </tr>
        <tr>
            <td>ĐỊA CHỈ</td>
            <td>
                <input type="text" name="txtDC"  required/>
        </tr>
        <tr>
            <td>WEBSITE</td>
            <td>
                <input type="text" name="txtWS"  required/>
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
        include_once("Controller/cThuongHieu.php");
        $p= new controlThuongHieu();
        $kq = $p->cInsertTH($_REQUEST["txtTenTH"], $_REQUEST["txtDC"],$_REQUEST["txtWS"],$_REQUEST["txtDT"]);
        if($kq){
            echo "<script>alert('Thêm thương hiệu thành công')</script>";
            header("refresh:0; url = 'admin.php?type=thuonghieu'");
        }else{
            echo "<script>alert('Thêm thương hiệu thất bại!')</script>";

        }
    }

?>