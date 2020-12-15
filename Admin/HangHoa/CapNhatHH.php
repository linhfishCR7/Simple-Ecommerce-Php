<?php
session_start();
include_once(__DIR__ . '/../../config.php');
if (!isset($_SESSION["email_logged"])) {
    header("location:sign-in.php");
}

/* --- 
   --- 5. Truy vấn dữ liệu Sản phẩm theo khóa chính
   --- 
*/
// Chuẩn bị câu truy vấn $sqlSelect, lấy dữ liệu ban đầu của record cần update
// Lấy giá trị khóa chính được truyền theo dạng QueryString Parameter key1=value1&key2=value2...
$MSHH = $_GET['MSHH'];
//var_dump($MSHH);die;

$sqlSelect = "SELECT * FROM `hanghoa` hh WHERE hh.MSHH = '$MSHH'";
// var_dump($sqlSelect);die;

// Thực thi câu truy vấn SQL để lấy về dữ liệu ban đầu của record cần update
$resultSelect = mysqli_query($conn, $sqlSelect);
$sanphamRow = mysqli_fetch_array($resultSelect, MYSQLI_ASSOC); // 1 record
// var_dump($sanphamRow);die;
/* --- End Truy vấn dữ liệu Sản phẩm theo khóa chính --- */

// 2. Nếu người dùng có bấm nút Đăng ký thì thực thi câu lệnh UPDATE
if (isset($_POST['btnSave'])) {
    // Lấy dữ liệu người dùng hiệu chỉnh gởi từ REQUEST POST
    $MSHH = $_POST['MSHH'];
    $TenHH = $_POST['TenHH'];
    $Gia = $_POST['Gia'];
    $SoLuongHang = $_POST['SoLuongHang'];
    $MaNhom = $_POST['MaNhom'];
    // $Hinh = $_POST['Hinh'];
    $MoTaHH = $_POST['MoTaHH'];
    $Sale = $_POST['Sale'];

    if (isset($_FILES['Hinh'])) {
        // Đường dẫn để chứa thư mục upload trên ứng dụng web của chúng ta. Các bạn có thể tùy chỉnh theo ý các bạn.
        // Ví dụ: các file upload sẽ được lưu vào thư mục ../../image/upload/
        $upload_dir = "../../image/upload/";

        // Đối với mỗi file, sẽ có các thuộc tính như sau:
        // $_FILES['hsp_tentaptin']['name']     : Tên của file chúng ta upload
        // $_FILES['hsp_tentaptin']['type']     : Kiểu file mà chúng ta upload (hình ảnh, word, excel, pdf, txt, ...)
        // $_FILES['hsp_tentaptin']['tmp_name'] : Đường dẫn đến file tạm trên web server
        // $_FILES['hsp_tentaptin']['error']    : Trạng thái của file chúng ta upload, 0 => không có lỗi
        // $_FILES['hsp_tentaptin']['size']     : Kích thước của file chúng ta upload

        // Nếu file upload bị lỗi, tức là thuộc tính error > 0
        if ($_FILES['Hinh']['error'] > 0) {
            echo 'File Upload Bị Lỗi';
            die;
        } else {
            // Tiến hành di chuyển file từ thư mục tạm trên server vào thư mục chúng ta muốn chứa các file uploads
            $Hinh = $_FILES['Hinh']['name'];
            $hinhanh = date('YmdHis') . '_' . $Hinh; 
            move_uploaded_file($_FILES['Hinh']['tmp_name'], $upload_dir . $hinhanh);

            // Xóa file cũ để tránh rác trong thư mục UPLOADS
            $old_file = $upload_dir . $sanphamRow['Hinh'];
            if (file_exists($old_file)) {
                unlink($old_file);
            }
        }
    }
        // Câu lệnh INSERT
        $sql = "UPDATE `hanghoa` SET MSHH='$MSHH',TenHH='$TenHH', Gia=$Gia, SoLuongHang=$SoLuongHang, MaNhom='$MaNhom', Hinh='$hinhanh', MoTaHH='$MoTaHH', Sale=$Sale WHERE MSHH='$MSHH';";


        // Thực thi INSERT
        mysqli_query($conn, $sql);
        // Đóng kết nối
        mysqli_close($conn);

        // Sau khi cập nhật dữ liệu, tự động điều hướng về trang HangHoa
        header('location:HangHoa.php');
    
    
}if (isset($_POST['btnCancel'])) {
    header('location:HangHoa.php');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cập Nhật Hàng Hóa</title>
    <?php
    include_once '../layout/header.php';
    ?>
    <link href="https://unpkg.com/bootstrap-table@1.18.0/dist/bootstrap-table.min.css" rel="stylesheet">

    <script src="https://unpkg.com/bootstrap-table@1.18.0/dist/bootstrap-table.min.js"></script>

</head>

<body>

    <div class="container-fluid">
        <!-- Content here -->
        <?php include_once '../layout/menu.php'; ?>
        <br>
        <div class="row">
            <div class="col-md-3">
                <a href=""><img src="https://img.icons8.com/cute-clipart/64/000000/add-property.png" /></a>
            </div>
            <div class="col-md-6">
                <h1>Bảng Cập Nhật Hàng Hóa</h1>
            </div>
            <div class="col-md-3"></div>

        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-8">
                <form class="form-horizontal" name="frmHangHoa" id="frmHangHoa" method="post" action="CapNhatHH.php" enctype="multipart/form-data">
                    <fieldset>
                        <legend>Cập Nhật Hàng Hóa</legend>
                        <div class="control-group success">
                            <label class="control-label" for="MSHH">Mã Hàng Hóa</label>
                            <div class="controls ">
                                <input type="text" id="MSHH" name="MSHH" value="<?php echo $sanphamRow['MSHH'] ?>" readonly>
                                <!-- <span class="help-inline">Woohoo!</span> -->
                            </div>
                        </div>

                        <div class="control-group warning">
                            <label class="control-label" for="TenHH">Tên Hàng Hóa</label>
                            <div class="controls">
                                <input type="text" id="TenHH" name="TenHH" value="<?php echo $sanphamRow['TenHH'] ?>">
                                <!-- <span class="help-inline">Something may have gone wrong</span> -->
                            </div>
                        </div>

                        <div class="control-group warning">
                            <label class="control-label" for="Gia">Giá Hàng Hóa</label>
                            <div class="controls">
                                <input type="text" id="Gia" name="Gia" value="<?php echo $sanphamRow['Gia'] ?>">
                                <!-- <span class="help-inline">Something may have gone wrong</span> -->
                            </div>
                        </div>

                        <div class="control-group warning">
                            <label class="control-label" for="SoLuongHang">Số Lượng Hàng</label>
                            <div class="controls">
                                <input type="text" id="SoLuongHang" name="SoLuongHang" value="<?php echo $sanphamRow['SoLuongHang'] ?>">
                                <!-- <span class="help-inline">Something may have gone wrong</span> -->
                            </div>
                        </div>
                        <!--  so sánh chuỗi không fung == được  -->
                        <div class="control-group warning">
                            <label class="control-label" for="MaNhom">Mã Nhóm</label>
                            <div class="controls">
                                <select class="form-control" id="MaNhom" name="MaNhom" style="width:182px;">
                                    <?php
                                    $sql = "SELECT  * FROM `nhomhanghoa` as nhh";
                                    $result = mysqli_query($conn, $sql);

                                    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                                        if ($sanphamRow['MaNhom']  == $row['MaNhom']) {
                                    ?>
                                            <option value="<?php echo $row['MaNhom'] ?>" selected><?php echo $row['TenNhom'] ?></option>
                                        <?php } ?>
                                        <option value="<?php echo $row['MaNhom'] ?>"><?php echo $row['TenNhom'] ?></option>

                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <?php
                        $sql1 = "SELECT hh.Hinh FROM `hanghoa` hh WHERE hh.MSHH = '$MSHH'";
                        $result1 = mysqli_query($conn, $sql1);
                        $Row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC); // 1 record

                        ?>
                        <div class="form-group">
                            <label class="control-label" for="bl_ma">Hình ảnh</label>
                            <br />
                            <img src="/source/image/upload/<?php echo $Row1['Hinh'] ?>" class="img-fluid" width="300px" />
                        </div>
                        <div class="control-group">
                            <label for="Hinh" class="control-label">Tập tin ảnh</label>
                            <div class="controls">
                                <input type="file" class="input-file uniform_on" id="Hinh" name="Hinh" value="">
                            </div>
                        </div>
                        <div class="control-group warning">
                            <label class="control-label" for="MoTaHH">Mô Tả hang Hóa</label>
                            <div class="controls">
                                <input id="MoTaHH" name="MoTaHH" value="<?php echo $sanphamRow['MoTaHH'] ?>"></input>
                                <!-- <span class="help-inline">Something may have gone wrong</span> -->
                            </div>
                        </div>


                        <div class="control-group warning">
                            <label class="control-label" for="Sale">Sale</label>
                            <div class="controls">
                                <input type="text" id="Sale" name="Sale" value="<?php echo $sanphamRow['Sale'] ?>">
                                <!-- <span class="help-inline">Something may have gone wrong</span> -->
                            </div>
                        </div>
                        <br>
                        <div class="control-group warning">
                            <button class="btn btn-primary" name="btnSave">Cập nhật</button>
                            <button class="btn btn-info" name="btnCancel">Quay về</button>
                        </div>


                </form>
            </div>
        </div>

    </div>
</body>

</html>