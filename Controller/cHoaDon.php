<?php
    include_once("Model/mHoaDon.php");
    include_once("upload.php");
    class controlHoaDon{
        public function getAllHoaDon(){
            $p = new modelHoaDon();
            $kq = $p -> selectAllHoaDon();
            if(mysqli_num_rows($kq)>0){
                return $kq;
            }else{
                return false;
            }
        }
        public function getAllHoaDonByUser($id){
            $p = new modelHoaDon();
            $kq = $p -> selectAllHoaDonByUser($id);
            if(mysqli_num_rows($kq)>0){
                return $kq;
            }else{
                return false;
            }
        }
        public function deleteDonHang($MaDH){
            $p = new modelHoaDon();
            $kq = $p -> deldonhang($MaDH);
            return $kq;
        }
    }

?>