<?php
    include_once("ketnoi.php");
    class modelSanPham{
        public function selectAllSanPham(){
            $p = new cls_KetNoi();
            $truyvan = "Select s.*, t.TenTH from sanpham s join thuonghieu t on s.MaTH = t.MaTH order by MaSP";
            $con = $p -> OpenConnect();
            $kq = mysqli_query($con, $truyvan);
            $p -> DongKetNoi($con);
            return $kq;
        }
        public function selectOneSanPham($MaSP){
            $p = new cls_KetNoi();
            $truyvan = "Select *, t.TenTH from sanpham s join thuonghieu t on s.MaTH = t.MaTH where MaSP='$MaSP'";
            $con = $p -> OpenConnect();
            $kq = mysqli_query($con, $truyvan);
            $p -> DongKetNoi($con);
            return $kq;
        }
        public function selectAllSanPhamByType($th){
            $p = new cls_KetNoi();
            $truyvan = "Select s.*, t.TenTH from sanpham s join thuonghieu t on s.MaTH = t.MaTH where s.MaTH='$th'";
            $con = $p -> OpenConnect();
            $kq = mysqli_query($con, $truyvan);
            $p -> DongKetNoi($con);
            return $kq;
        }
        public function selectAllSanPhamByName($tukhoa){
            $p = new cls_KetNoi();
            $truyvan = "Select s.*, t.TenTH from sanpham s join thuonghieu t on s.MaTH = t.MaTH where s.TenSP like N'%$tukhoa%'";
            $con = $p -> OpenConnect();
            $kq = mysqli_query($con, $truyvan);
            $p -> DongKetNoi($con);
            return $kq;
        }
        public function updateSanPham($maSP, $tenSP, $giaGoc, $giaBan, $hinhAnh, $thuongHieu){
            $p = new cls_KetNoi();
            if($giaBan == null){
                $truyvan = "update sanpham set TenSP = N'$tenSP', GiaGoc='$giaGoc', GiaBan=null, HinhAnh = '$hinhAnh', MaTH='$thuongHieu' where MaSP = '$maSP'";
            }else{
                $truyvan = "update sanpham set TenSP = N'$tenSP', GiaGoc='$giaGoc', GiaBan='$giaBan', HinhAnh = '$hinhAnh', MaTH='$thuongHieu' where MaSP = '$maSP'";
            }
            $con =$p ->OpenConnect();
            $kq = mysqli_query($con, $truyvan);
            $p ->DongKetNoi($con);
            return $kq;
        }
        public function mInsertSP($TenSP, $GiaBan, $GiaGoc, $HinhAnh, $thuongHieu){
            $p = new cls_KetNoi();
            $truyvan = "insert into sanpham (TenSP, GiaBan, GiaGoc, HinhAnh, MaTH) values (N'$TenSP', $GiaBan, $GiaGoc, '$HinhAnh', $thuongHieu)";
            $con =$p ->OpenConnect();
            $kq = mysqli_query($con, $truyvan);
            $p ->DongKetNoi($con);
            return $kq;
        }
        public function delSanPham($MaSP){
            $p = new cls_KetNoi();
            $truyvan = "DELETE from sanpham where MaSP=$MaSP";
            $con =$p ->OpenConnect();
            $kq = mysqli_query($con, $truyvan);
            $p ->DongKetNoi($con);
            return $kq;
        }
        public function giohang($MaSP, $Idnd, $TenSP, $GiaGoc, $GiaBan){
            $p = new cls_KetNoi();
            $truyvan = "insert into dathang (MaSP, ID_NguoiDung, TenSP, GiaGoc, GiaBan) values ($MaSP, $Idnd ,N'$TenSP', $GiaGoc, $GiaBan)";
            $con =$p ->OpenConnect();
            $kq = mysqli_query($con, $truyvan);
            $p ->DongKetNoi($con);
            return $kq;
        }
        public function viewgiohang(){
            $p = new cls_KetNoi();
            $truyvan = "Select * from dathang";
            $con =$p ->OpenConnect();
            $kq = mysqli_query($con, $truyvan);
            $p ->DongKetNoi($con);
            return $kq;
        }
        function selectAllProductbySeachGia($giabd, $giakt){
            $p = new cls_KetNoi();
            $truyvan = "select* from sanpham where GiaBan BETWEEN '$giabd' AND '$giakt' order by MaSP desc";
            $con =$p ->OpenConnect();
            $kq = mysqli_query($con,$truyvan);
            $p->DongKetNoi($con);
            return $kq;
        }
    }
?>