<?php
    include_once("Controller/cVaiTro.php");
    $p = new controlVaiTro();
    $kq = $p->deleteVT($_REQUEST['id']);
    if($kq){
        echo "<script>alert('Xóa vai trò thành công')</script>";
        header("refresh:0; url = 'admin.php?type=xemvt'");
    }else{
        echo "<script>alert('Xóa vai trò thất bại!')</script>";
    }

?>