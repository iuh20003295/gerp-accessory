<?php
    include_once("Controller/cHoaDon.php");
    $p = new controlHoaDon();
    $kq = $p->deleteDonHang($_REQUEST['id']);
    if($kq){
        echo "<script>alert('Xóa sản phẩm thành công')</script>";
        header("refresh:0; url = 'index.php?cart'");
    }else{
        echo "<script>alert('Xóa sản phẩm thất bại!')</script>";
    }

?>