<?php
    include_once("ketnoi.php");
    class modelVaiTro{
        public function selectAllVaiTro(){
            $p = new cls_KetNoi();
            $con = $p->OpenConnect();
            $truyvan = "select * from vaitro";
            $kq = $con ->query($truyvan);
            $p->DongKetNoi($con);
            return $kq;
        }
        public function insertVT($tenVT, $MT, $GC){
            $p = new cls_KetNoi();
            $truyvan = "insert into vaitro (TenVT, MoTa, GhiChu) values (N'$tenVT', N'$MT', N'$GC')";
            $con =$p ->OpenConnect();
            $kq = mysqli_query($con, $truyvan);
            $p ->DongKetNoi($con);
            return $kq;
        }
        public function delVT($MaVT){
            $p = new cls_KetNoi();
            $truyvan = "DELETE from vaitro where MaVT=$MaVT";
            $con =$p ->OpenConnect();
            $kq = mysqli_query($con, $truyvan);
            $p ->DongKetNoi($con);
            return $kq;
        }
    }

?>