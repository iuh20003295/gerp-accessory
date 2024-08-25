<?php
    if(isset($_REQUEST["btnDK"])){
        include_once("Controller/cNguoiDung.php");
        $p = new controlNguoiDung();
        $kq = $p->gettk($_POST["txtTDN"], $_POST["txtMK"], $_POST["txtEmail"], $_POST["txtphone"]);
        if($kq){
            echo "<script>alert('Đăng ký tài khoản thành công')</script>";
            header("refresh:0.5; url = 'index.php?dangnhap'");
        }else{
            echo "<script>alert('Đăng ký thất bại')</script>";
            header("refresh:0.5; url = 'index.php?dangky'");
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Ký</title>
    <script>
        function validateForm() {
            var password = document.forms["frmDangKy"]["txtMK"].value;
            var confirmPassword = document.forms["frmDangKy"]["txtMKConfirm"].value;
            if (password !== confirmPassword) {
                alert("Mật khẩu và Nhập lại Mật khẩu phải giống nhau");
                return false;
            }
            var phone = document.forms["frmDangKy"]["txtphone"].value;
            var phonePattern = /^0[0-9]{9}$/; 
            if (!phonePattern.test(phone)) {
                alert("Số điện thoại không hợp lệ. Vui lòng nhập đúng");
                return false;
            }
            return true;
        }
    </script>
</head>
<body>
    <h2>Đăng Ký</h2>
    <form name="frmDangKy" action="#" method="post" onsubmit="return validateForm()">
        <table>
            <tr>
                <td>Tên Đăng Nhập</td>
                <td><input type="text" name="txtTDN" required></td>
            </tr>
            <tr>
                <td>Mật Khẩu</td>
                <td><input type="password" name="txtMK" required></td>
            </tr>
            <tr>
                <td>Nhập lại Mật Khẩu</td>
                <td><input type="password" name="txtMKConfirm" required></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="email" name="txtEmail" required></td>
            </tr>
            <tr>
                <td>Số điện thoại</td>
                <td><input type="tel" name="txtphone" required></td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="submit" name="btnDK" value="Đăng Ký">
                    <input type="reset" value="Nhập lại">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>
