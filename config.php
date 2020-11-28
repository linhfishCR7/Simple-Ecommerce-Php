<?php
    $conn=mysqli_connect('localhost','root','','quanlybanhangltw') or die('Không thể kết nối dữ liệu');
    $conn->query("SET NAME 'utf8'");
    $conn->query("SET CHARACTER SET UTF8");
    $conn->query("SET SESSION collation_connection='utf8_general_ci'");
?>
