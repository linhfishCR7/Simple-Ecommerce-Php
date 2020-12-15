<?php
session_start();
include_once(__DIR__ . '/../../config.php');
if (!isset($_SESSION["email_logged"])) {
    header("location:sign-in.php");
}
$MSHH = $_GET['MSHH'];
$sqlSelect = "SELECT * FROM `hanghoa`WHERE MSHH = '$MSHH'";

// Thực thi câu truy vấn SQL để lấy về dữ liệu ban đầu của record cần update
$resultSelect = mysqli_query($conn, $sqlSelect);
$sanphamRow = mysqli_fetch_array($resultSelect, MYSQLI_ASSOC); // 1 record
// 2. Chuẩn bị câu truy vấn $sql
// Lấy giá trị khóa chính được truyền theo dạng QueryString Parameter key1=value1&key2=value2...
$MSHH = $_GET['MSHH'];
$sql = "DELETE FROM `hanghoa` WHERE MSHH = '$MSHH'";

// 3. Thực thi câu lệnh DELETE
$result = mysqli_query($conn, $sql);

$upload_dir = "../../image/upload/";

$old_file = $upload_dir.$sanphamRow['Hinh'];
if(file_exists($old_file)) {
    unlink($old_file);
}
// 4. Đóng kết nối
mysqli_close($conn);
    
// Sau khi cập nhật dữ liệu, tự động điều hướng về trang Danh sách
header('location:HangHoa.php');