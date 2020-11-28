<?php
    session_start();

// Điều hướng người dùng về trang DASHBOARD
if(isset($_SESSION['email_logged'])) {
    unset($_SESSION['email_logged']);
    header('location:sign-in.php');
}
else {
    echo 'Người dùng chưa đăng nhập. Không thể đăng xuất dược!'; die;
}