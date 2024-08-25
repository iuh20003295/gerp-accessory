<?php
    session_start();
    session_destroy();
    echo"<script>alert('Đăng xuất tài khoản thành công! Hẹn gặp lại!')</script>";
    header("refresh:0.5; url='../index.php'");
?>