<form action="#" method="post" enctype="multipart/form-data">
    <table>
        <tr>
            <td>TÊN VAI TRÒ </td>
            <td>
                <input type="text" name="txtVT"  required/>
            </td>
        </tr>
        <tr>
            <td>MÔ TẢ</td>
            <td>
                <input type="text" name="txtMT"  required/>
        </tr>
        <tr>
            <td>GHI CHÚ</td>
            <td>
                <input type="text" name="txtGC"  required/>
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
        include_once("Controller/cVaiTro.php");
        $p= new controlVaiTro();
        $kq = $p->cInsertVT($_REQUEST["txtVT"], $_REQUEST["txtMT"],$_REQUEST["txtGC"]);
        if($kq){
            echo "<script>alert('Thêm vai trò thành công')</script>";
            header("refresh:0; url = 'admin.php?type=xemnd'");
        }else{
            echo "<script>alert('Thêm vai trò thất bại!')</script>";

        }
    }

?>