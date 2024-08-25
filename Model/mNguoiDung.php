<?php
include_once("ketnoi.php");
class modelNguoiDung
{
    public function select01NguoiDung($TenND, $MatKhau)
    {
        $p = new cls_KetNoi();
        $con = $p->OpenConnect();
        $truyvan = "Select * from nguoidung where TenNguoiDung = '$TenND' and MatKhau = '$MatKhau'";
        $ketqua = mysqli_query($con, $truyvan);
        $p->DongKetNoi($con);
        return $ketqua;
    }
    function dangkytk($name, $mk, $mail, $phone)
    {
        $p = new cls_KetNoi();
        $con = $p->OpenConnect();

        $truyvan = "INSERT INTO nguoidung(TenNguoiDung, MatKhau, Email, SoDienThoai, MaVT)
            VALUES ('" . $name . "', '" . $mk . "',  '" . $mail . "','" . $phone . "', 3)";
        $ketqua = mysqli_query($con, $truyvan);

        $p->DongKetNoi($con);

        return $ketqua;
    }
    public function selectAllNguoiDung()
    {
        $p = new cls_KetNoi();
        $con = $p->OpenConnect();
        $truyvan = "SELECT DISTINCT n.*, v.TenVT
                    FROM nguoidung n
                    JOIN vaitro v ON n.MaVT = v.MaVT
                    WHERE n.MaVT in(2,3)
                    ORDER BY n.IDNguoiDung;";
        $kq = mysqli_query($con, $truyvan);
        $p->DongKetNoi($con);
        return $kq;
    }
    public function updateND($maND, $tenND, $Email, $phone, $vaitro){
        $p = new cls_KetNoi();
        $truyvan = "update nguoidung set TenNguoiDung = N'$tenND', Email='$Email',  SoDienThoai = '$phone', MaVT = $vaitro where IDNguoiDung = '$maND'";
        $con =$p ->OpenConnect();
        $kq = mysqli_query($con, $truyvan);
        $p ->DongKetNoi($con);
        return $kq;
    }
    public function delND($maND){
        $p = new cls_KetNoi();
        $truyvan = "DELETE from nguoidung where IDNguoiDung=$maND";
        $con =$p ->OpenConnect();
        $kq = mysqli_query($con, $truyvan);
        $p ->DongKetNoi($con);
        return $kq;
    }
    public function insertND($tenND, $MK, $Email, $Phone){
        $p = new cls_KetNoi();
        $truyvan = "insert into nguoidung (TenNguoiDung, MatKhau, Email, SoDienThoai, MaVT) values (N'$tenND', N'$MK', '$Email', '$Phone',2)";
        $con =$p ->OpenConnect();
        $kq = mysqli_query($con, $truyvan);
        $p ->DongKetNoi($con);
        return $kq;
    }
    public function selectOneND($MaND){
        $p = new cls_KetNoi();
        //$truyvan = "Select * from nguoidung where IDNguoiDung = '$MaND'";
        $truyvan = "Select n.*, v.TenVT from nguoidung n join vaitro v on n.MaVT = v.MaVT where IDNguoiDung = '$MaND'";
        $con = $p -> OpenConnect();
        $kq = mysqli_query($con, $truyvan);
        $p -> DongKetNoi($con);
        return $kq;
    }
    // public function chonND($id)
    // {
    //     $p = new cls_KetNoi();
    //     $con = $p->OpenConnect();
    //     $truyvan = "Select ID_NguoiDung from dathang where ID_NguoiDung = $id";
    //     $ketqua = mysqli_query($con, $truyvan);
    //     $p->DongKetNoi($con);
    //     return $ketqua;
    // }
    public function selectProfile($id){
        $p = new cls_KetNoi();
        $con = $p->OpenConnect();
        $truyvan = "Select IDNguoiDung, TenNguoiDung, MatKhau, Email, SoDienThoai, v.TenVT from nguoidung n join vaitro v on n.MaVT = v.MaVT where IDNguoiDung = $id";
        $ketqua = mysqli_query($con, $truyvan);
        $p->DongKetNoi($con);
        return $ketqua;
    }

}
