<?php
	session_start();
    include_once(__DIR__ . '/../config.php');
if(isset($_POST['email']) && $_POST['password']!='') {
    // echo 'Bạn đã đăng nhập rồi. <a href="/source/Admin/dashboard.php">Bấm vào đây để quay về trang chủ.</a>';
    $email = $_POST['email'];
    $password = sha1($_POST['password']);
    // Câu lệnh SELECT
        //  var_dump($password);die;
    $sqlSelect = <<<EOT
    SELECT *
    FROM khachhang kh
    WHERE kh.Email = '$email' AND kh.Password = '$password';
EOT;
    // Thực thi SELECT
    $result = mysqli_query($conn, $sqlSelect);
    if (mysqli_num_rows($result) > 0) {
        $_SESSION['email_logged'] = $email;
        //  var_dump($_SESSION['email_logged']);die;
                // redirect đi đâu đó...
        header("location:/source/Admin/dashboard.php");
        // $_SESSION['email_logged'] = $email;
    } else {
        header("location:sign-in.php");
    }
}else{
//if(isset($_POST['btnLogin'])) {
    // Kiểm tra đăng nhập...
//     $email = $_POST['email'];
//     $password = sha1($_POST['password']);
//     // Câu lệnh SELECT
//         //  var_dump($password);die;
//     $sqlSelect = <<<EOT
//     SELECT *
//     FROM khachhang kh
//     WHERE kh.Email = '$email' AND kh.Password = '$password';
// EOT;
//     // Thực thi SELECT
//     $result = mysqli_query($conn, $sqlSelect);
    // var_dump($result);die;
    // Sử dụng hàm `mysqli_num_rows()` để đếm số dòng SELECT được
    // Nếu có bất kỳ dòng dữ liệu nào SELECT được <-> Người dùng có tồn tại và đã đúng thông tin USERNAME, PASSWORD
    // if (mysqli_num_rows($result) > 0) {
    //     $_SESSION['email_logged'] = $email;
    //     //  var_dump($_SESSION['email_logged']);die;
    //             // redirect đi đâu đó...
    //     header("location:/source/Admin/dashboard.php");
    //     // $_SESSION['email_logged'] = $email;
    // } else {
    //     header("location:sign-in.php");
    // }
//} 
$_SESSION["thongbao"]="Vui lòng nhập đầy đủ thông tin!";
		header('location: sign-in.php');
}
?>