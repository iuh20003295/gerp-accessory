<?php
    include_once("Controller/cSanPham.php");
    $p = new controlSanPham();
    $kq = $p->deleteSanPham($_REQUEST['id']);
    if($kq){
        echo "<script>alert('Xóa sản phẩm thành công')</script>";
        header("refresh:0; url = 'admin.php?type=sanpham'");
    }else{
        echo "<script>alert('Xóa sản phẩm thất bại!')</script>";
    }

?>