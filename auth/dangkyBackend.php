<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once "../vendor/autoload.php";

// Lấy dữ liệu người dùng hiệu chỉnh gởi từ REQUEST POST
$email = $_POST['email'];
// Gởi mail kích hoạt tài khoản
$mail = new PHPMailer(true);                               // Passing `true` enables exceptions
try {
    //Server settings
    //$mail->SMTPDebug = 2;                                // Enable verbose debug output
    $mail->isSMTP();                                       // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';                        // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                                // Enable SMTP authentication
    $mail->Username = 'havanlinh19042000@gmail.com';// SMTP username
    $mail->Password = 'rbytultztoudnlbp';                  // SMTP password
    $mail->SMTPSecure = 'tls';                             // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                     // TCP port to connect to
    $mail->CharSet = "UTF-8";
    // Bật chế bộ tự mình mã hóa SSL
    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
    );
    //Recipients
    $mail->setFrom('havanlinh19042000@gmail.com', 'LINHFISHSHOP');
    $mail->addAddress('linhfish10c1@gmail.com');                // Add a recipient
    $mail->addReplyTo($email);
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');
    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');        // Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');   // Optional name
    //Content
    $mail->isHTML(true);                                    // Set email format to HTML
    $mail->Subject = "Đăng ký theo dõi website";
    // $siteUrl = siteURL();
    $body = <<<EOT
    Theo dõi Shop và cần hỗ trợ. <br />
    Email của khách: $email <br />
EOT;
    $mail->Body   = $body;
    $mail->send();
    // echo "Message has been sent successfully";
} catch (Exception $e) {
    echo 'Lỗi khi gởi mail: ', $mail->ErrorInfo;
}
// print_r(error_get_last());

// Sau khi cập nhật dữ liệu, tự động điều hướng về trang Đăng ký thành công
header("location:../index.php");

?>