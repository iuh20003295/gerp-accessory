<?php
    include_once("Model/mSanPham.php");
    include_once("upload.php");
    class controlSanPham{
        public function getAllSanPham(){
            $p = new modelSanPham();
            $kq = $p -> selectAllSanPham();
            if(mysqli_num_rows($kq)>0){
                return $kq;
            }else{
                return false;
            }
        }
        public function getOneSanPham($MaSP){
            $p = new modelSanPham();
            $kq = $p -> selectOneSanPham($MaSP);
            if(mysqli_num_rows($kq)>0){
                return $kq;
            }else{
                return false;
            }
        }
        public function getAllSanPhamByType($th){
            $p = new modelSanPham();
            $kq = $p -> selectAllSanPhamByType($th);
            if(mysqli_num_rows($kq)>0){
                return $kq;
            }else{
                return false;
            }
        }
        public function getAllSanPhamByName($tukhoa){
            $p = new modelSanPham();
            $kq = $p -> selectAllSanPhamByName($tukhoa);
            if(mysqli_num_rows($kq)>0){
                return $kq;
            }else{
                return false;
            }
        }
        function getAllProductbySeachGia($giabd,$giakt){
            $p = new modelSanPham();
            $kq = $p->selectAllProductbySeachGia($giabd,$giakt);
            if(mysqli_num_rows($kq)>0){
                return $kq;
            }else{
                return false;
            }
        }
        public function updateSanPham($maSP, $tenSP, $giaGoc, $giaBan, $fileHinh, $hinh, $thuongHieu){
            if($fileHinh["tmp_name"]!=""){
                $pu = new clsUploadHinhSP();
                $kq = $pu->UploadAnh($fileHinh, $tenSP, $hinh);
                if(!$kq){
                    return false;
                }
            }
            $p = new modelSanPham();
            $kq = $p->updateSanPham($maSP, $tenSP, $giaGoc, $giaBan, $hinh, $thuongHieu);
            return $kq;
        }
        public function cInsertSP($TenSP,$GiaGoc,$GiaBan,$fileHinh,$thuongHieu){
            $hinh ="";
            if($fileHinh["tmp_name"]!=""){
                $pu = new clsUploadHinhSP();
                $kq = $pu->UploadAnh($fileHinh, $TenSP, $hinh);
                if(!$kq){
                    return false;
                }
            }
            $p = new modelSanPham();
            $kq = $p->mInsertSP($TenSP, $GiaGoc, $GiaBan, $hinh, $thuongHieu);
            return $kq;
        }
        public function deleteSanPham($MaSP){
            $p = new modelSanPham();
            $kq = $p -> delSanPham($MaSP);
            return $kq;
        }
        public function themgiohang($MaSP,$Idnd,$TenSP,$GiaGoc,$GiaBan){
            $p = new modelSanPham();
            $kq = $p->giohang($MaSP, $Idnd, $TenSP, $GiaGoc, $GiaBan);
            return $kq;
        }
    }
?>