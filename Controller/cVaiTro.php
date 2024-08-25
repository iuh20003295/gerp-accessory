<?php
    include_once("Model/mVaiTro.php");
    include_once("upload.php");
    class controlVaiTro{
        public function getAllVaiTro(){
            $p = new modelVaiTro();
            $kq = $p -> selectAllVaiTro();
            if(mysqli_num_rows($kq)>0){
                return $kq;
            }else{
                return false;
            }
        }
        public function cInsertVT($tenVT, $MT, $GC){
            $p = new modelVaiTro();
            $kq = $p->insertVT($tenVT, $MT, $GC);
            return $kq;
        }
        public function deleteVT($MaVT){
            $p = new modelVaiTro();
            $kq = $p -> delVT($MaVT);
            return $kq;
        }
    }

?>