<?php
    include_once("ketnoi.php");
    class modelThuongHieu{
        public function selectAllThuongHieu(){
            $p = new cls_KetNoi();
            $truyvan = "Select * from thuonghieu";
            $con = $p -> OpenConnect();
            $kq = mysqli_query($con, $truyvan);
            $p -> DongKetNoi($con);
            return $kq;
        }
        public function selectOneThuongHieu($MaTH){
            $p = new cls_KetNoi();
            $truyvan = "Select * from thuonghieu where MaTH='$MaTH'";
            $con = $p -> OpenConnect();
            $kq = mysqli_query($con, $truyvan);
            $p -> DongKetNoi($con);
            return $kq;
        }
        public function updateTH($maTH, $tenTH, $diaChi, $website, $dienthoai){
            $p = new cls_KetNoi();
            $truyvan = "update thuonghieu set TenTH = N'$tenTH', DiaChi='$diaChi',  Website = '$website', DienThoai ='$dienthoai'  where MaTH = '$maTH'";
            $con =$p ->OpenConnect();
            $kq = mysqli_query($con, $truyvan);
            $p ->DongKetNoi($con);
            return $kq;
        }
        public function delThuongHieu($MaTH){
            $p = new cls_KetNoi();
            $truyvan = "DELETE from thuonghieu where MaTH=$MaTH";
            $con =$p ->OpenConnect();
            $kq = mysqli_query($con, $truyvan);
            $p ->DongKetNoi($con);
            return $kq;
        }
        public function mInsertTH($tenTH, $diaChi, $website, $dienthoai){
            $p = new cls_KetNoi();
            $truyvan = "insert into thuonghieu (TenTH, DiaChi, Website, DienThoai) values (N'$tenTH', N'$diaChi', '$website', '$dienthoai')";
            $con =$p ->OpenConnect();
            $kq = mysqli_query($con, $truyvan);
            $p ->DongKetNoi($con);
            return $kq;
        }
        
    }
?>