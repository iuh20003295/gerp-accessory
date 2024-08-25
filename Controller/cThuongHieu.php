<?php
    include_once("Model/mThuongHieu.php");
    class controlThuongHieu{
        public function getAllThuongHieu(){
            $p = new modelThuongHieu();
            $kq = $p -> selectAllThuongHieu();
            if(mysqli_num_rows($kq)>0){
                return $kq;
            }else{
                return false;
            }
        }
        public function getOneThuongHieu($MaTH){
            $p = new modelThuongHieu();
            $kq = $p -> selectOneThuongHieu($MaTH);
            if(mysqli_num_rows($kq)>0){
                return $kq;
            }else{
                return false;
            }
        }
        public function updateThuongHieu($maTH, $tenTH, $diaChi, $website, $dienthoai){
            $p = new modelThuongHieu();
            $kq = $p -> updateTH($maTH, $tenTH, $diaChi, $website, $dienthoai);
            return $kq;
        }
        public function deleteThuongHieu($MaTH){
            $p = new modelThuongHieu();
            $kq = $p -> delThuongHieu($MaTH);
            return $kq;
        }
        public function cInsertTH($tenTH,$diaChi,$website,$dienthoai){
            $p = new modelThuongHieu();
            $kq = $p->mInsertTH($tenTH, $diaChi, $website, $dienthoai);
            return $kq;
        }
    }
?>