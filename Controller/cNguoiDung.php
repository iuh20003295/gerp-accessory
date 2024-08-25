<?php
    session_start();
    include_once("Model/mNguoiDung.php");
    class controlNguoiDung{
        public function get01NguoiDung($TND, $MK){
            $MK = md5($MK);
            $p = new modelNguoiDung();
            $ketqua = $p -> select01NguoiDung($TND, $MK);
            if(mysqli_num_rows($ketqua)>0){
                while($r = mysqli_fetch_assoc($ketqua)){
                    $_SESSION["dn"] = $r["MaVT"];
                    $_SESSION["name"] = $r["TenNguoiDung"];
                    $_SESSION["idnd"] = $r["IDNguoiDung"];

                }
                if($_SESSION["dn"]<=2){
                    echo "<script>alert('Đăng nhập thành công tài khoản')</script>";
                    header("refresh:0.5; url = 'admin.php'");
                }elseif($_SESSION["dn"]>2){
                    echo "<script>alert('Đăng nhập thành công tài khoản')</script>";
                    header("refresh:0.5; url = 'index.php'");
                }
            }else{
                echo "<script>alert('Sai thông tin đăng nhập')</script>";
                header("refresh:0.5; url = index.php?dangnhap");
            }
        }
        public function gettk($name, $mk, $mail, $phone){
            $mk = md5($mk);
            $p = new modelNguoiDung();
            $ketqua = $p -> dangkytk($name, $mk, $mail, $phone);
            return $ketqua;
        }
        public function getAllNguoiDung(){
            $p = new modelNguoiDung();
            $kq = $p -> selectAllNguoiDung();
            if(mysqli_num_rows($kq)>0){
                return $kq;
            }else{
                return false;
            }
        }
        public function cUpdateND($maND, $tenND, $Email, $phone, $vaitro){
            $p = new modelNguoiDung();
            $kq = $p -> updateND($maND, $tenND, $Email, $phone, $vaitro);
            return $kq;
        }
        public function deleteND($maND){
            $p = new modelNguoiDung();
            $kq = $p -> delND($maND);
            return $kq;
        }
        public function cInsertND($tenND, $MK, $Email, $Phone){
            $MK = md5($MK);
            $p = new modelNguoiDung();
            $kq = $p->insertND($tenND, $MK, $Email, $Phone);
            return $kq;
        }
        public function getOneND($MaND){
            $p = new modelNguoiDung();
            $kq = $p -> selectOneND($MaND);
            if(mysqli_num_rows($kq)>0){
                return $kq;
            }else{
                return false;
            }
        }
        public function getProfile($id){
            $p = new modelNguoiDung();
            $kq = $p -> selectProfile($id);
            if(mysqli_num_rows($kq)>0){
                return $kq;
            }else{
                return false;
            }
        }
        

}
?>