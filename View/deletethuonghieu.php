<?php
    include_once("Controller/cThuongHieu.php");
    $p = new controlThuongHieu();
    $kq = $p->deleteThuongHieu($_REQUEST['id']);
    if($kq){
        echo "<script>alert('Xóa thương hiệu thành công')</script>";
        header("refresh:0; url = 'admin.php?type=thuonghieu'");
    }else{
        echo "<script>alert('Xóa thương hiệu thất bại!')</script>";
    }

?>