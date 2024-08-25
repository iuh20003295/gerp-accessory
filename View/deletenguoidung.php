<?php
    include_once("Controller/cNguoiDung.php");
    $p = new controlNguoiDung();
    $kq = $p->deleteND($_REQUEST['id']);
    if($kq){
        echo "<script>alert('Xóa người dùng thành công')</script>";
        header("refresh:0; url = 'admin.php?type=xemnd'");
    }else{
        echo "<script>alert('Xóa người dùng thất bại!')</script>";
    }

?>