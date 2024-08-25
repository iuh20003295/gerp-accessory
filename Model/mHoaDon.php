<?php
    include_once("ketnoi.php");
    class modelHoaDon{
        public function selectAllHoaDon(){
            $p = new cls_KetNoi();
            $con = $p->OpenConnect();
            $truyvan = "select * from dathang";
            $kq = $con ->query($truyvan);
            $p->DongKetNoi($con);
            return $kq;
        }
        public function selectAllHoaDonByUser($id){
            $p = new cls_KetNoi();
            $con = $p->OpenConnect();
            $truyvan = "select d.*, n.TenNguoiDung from dathang d join nguoidung n 
            on d.ID_NguoiDung=n.IDNguoiDung where ID_NguoiDung = '$id'";
            $kq = $con ->query($truyvan);
            $p->DongKetNoi($con);
            return $kq;
        }
        public function deldonhang($MaDH){
            $p = new cls_KetNoi();
            $truyvan = "DELETE from dathang where ID_dathang=$MaDH";
            $con =$p ->OpenConnect();
            $kq = mysqli_query($con, $truyvan);
            $p ->DongKetNoi($con);
            return $kq;
        }
    }

?>