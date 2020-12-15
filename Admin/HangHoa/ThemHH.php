<?php
session_start();
include_once(__DIR__ . '/../../config.php');
if (!isset($_SESSION["email_logged"])) {
    header("location:sign-in.php");
}

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
        // Ví dụ: các file upload sẽ được lưu vào thư mục ../../assets/uploads
        $upload_dir = "../../image/upload/";

        // Đối với mỗi file, sẽ có các thuộc tính như sau:
        // $_FILES['s_hinhanh']['name']     : Tên của file chúng ta upload
        // $_FILES['s_hinhanh']['type']     : Kiểu file mà chúng ta upload (hình ảnh, word, excel, pdf, txt, ...)
        // $_FILES['s_hinhanh']['tmp_name'] : Đường dẫn đến file tạm trên web server
        // $_FILES['s_hinhanh']['error']    : Trạng thái của file chúng ta upload, 0 => không có lỗi
        // $_FILES['s_hinhanh']['size']     : Kích thước của file chúng ta upload

        // Nếu file upload bị lỗi, tức là thuộc tính error > 0
        if ($_FILES['Hinh']['error'] > 0) {
            echo 'File Upload Bị Lỗi';
            die;
        } else {
            // Tiến hành di chuyển file từ thư mục tạm trên server vào thư mục chúng ta muốn chứa các file uploads
            // Ví dụ: move file từ C:\xampp\tmp\php6091.tmp -> C:/xampp/htdocs/learning.nentang.vn/php/twig/assets/uploads/hoahong.jpg
            $Hinh = $_FILES['Hinh']['name'];
            $hinhanh = date('YmdHis') . '_' . $Hinh; //20200530154922_hoahong.jpg

            move_uploaded_file($_FILES['Hinh']['tmp_name'], $upload_dir . $hinhanh);
            //echo 'File Uploaded';
        }
    }

    // Câu lệnh INSERT
    $sql = "INSERT INTO `hanghoa` (MSHH,TenHH, Gia, SoLuongHang, MaNhom, Hinh, MoTaHH, Sale) VALUES 
    ('$MSHH','$TenHH', $Gia, $SoLuongHang, '$MaNhom', '$hinhanh', '$MoTaHH', $Sale);";

    // Thực thi INSERT
    mysqli_query($conn, $sql);

    // Đóng kết nối
    mysqli_close($conn);

    // Sau khi cập nhật dữ liệu, tự động điều hướng về trang Danh sách
    header('location:HangHoa.php');
}

if (isset($_POST['btnCancel'])) {
    header('location:HangHoa.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Hang Hóa</title>
    <?php
    include_once '../layout/header.php';
    ?>
    

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
                <h1>Bảng Thêm Hàng Hóa</h1>
            </div>
            <div class="col-md-3"></div>

        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-8">
                <form class="form-horizontal" name="frmHangHoa" id="frmHangHoa" method="post" action="ThemHH.php" enctype="multipart/form-data">
                    <fieldset>
                        <legend>Thêm Mới Hàng Hóa</legend>
                        <div class="control-group success">
                            <label class="control-label" for="MSHH">Mã Hàng Hóa</label>
                            <div class="controls">
                                <input type="text" id="MSHH" name="MSHH" placeholder="Mã Hàng Hóa">
                                <!-- <span class="help-inline">Woohoo!</span> -->
                            </div>
                        </div>

                        <div class="control-group warning">
                            <label class="control-label" for="TenHH">Tên Hàng Hóa</label>
                            <div class="controls">
                                <input type="text" id="TenHH" name="TenHH" placeholder="Tên Hàng Hóa">
                                <!-- <span class="help-inline">Something may have gone wrong</span> -->
                            </div>
                        </div>

                        <div class="control-group warning">
                            <label class="control-label" for="Gia">Giá Hàng Hóa</label>
                            <div class="controls">
                                <input type="text" id="Gia" name="Gia" placeholder="Giá Hàng Hóa">
                                <!-- <span class="help-inline">Something may have gone wrong</span> -->
                            </div>
                        </div>

                        <div class="control-group warning">
                            <label class="control-label" for="SoLuongHang">Số Lượng Hàng</label>
                            <div class="controls">
                                <input type="text" id="SoLuongHang" name="SoLuongHang" placeholder="Số Lượng Hàng">
                                <!-- <span class="help-inline">Something may have gone wrong</span> -->
                            </div>
                        </div>

                        <div class="control-group warning">
                            <label class="control-label" for="MaNhom">Mã Nhóm</label>
                            <div class="controls">
                                <select class="form-control" id="MaNhom" name="MaNhom" style="width: 182px;">
                                    <?php
                                    $sql = "SELECT  * FROM `nhomhanghoa` ";
                                    $result = mysqli_query($conn, $sql);

                                    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                                    ?>
                                        <option value="<?php echo $row['MaNhom'] ?>"><?php echo $row['TenNhom'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <!-- <div class="control-group warning">
                            <label class="control-label" for="Hinh">Hình</label>
                            <div class="controls">

                                <input id="Hinh" name="Hinh" cols="30" rows="10" placeholder="Hình"></input>
                            </div>
                        </div> -->
                        <div class="control-group">
                            <label for="Hinh" class="control-label">Tập tin ảnh</label>
                            <div class="controls">
                                <input type="file" class="input-file uniform_on" id="Hinh" name="Hinh">
                            </div>
                        </div>
                        <div class="control-group warning">
                            <label class="control-label" for="MoTaHH">Mô Tả hang Hóa</label>
                            <div class="controls">
                                <textarea id="MoTaHH" name="MoTaHH" cols="30" rows="10" placeholder="Mô Tả hang Hóa"></textarea>
                                <!-- <span class="help-inline">Something may have gone wrong</span> -->
                            </div>
                        </div>


                        <div class="control-group warning">
                            <label class="control-label" for="Sale">Sale</label>
                            <div class="controls">
                                <input type="text" id="Sale" name="Sale" placeholder="Sale">
                                <!-- <span class="help-inline">Something may have gone wrong</span> -->
                            </div>
                        </div>
                        <br>
                        <div class="control-group warning">
                            <button class="btn btn-primary" name="btnSave">Cập nhật</button>
                            <button class="btn btn-info" name="btnCancel">Quay về</button>
                        </div>
            </div>
        </div>

    </div>
</body>

</html>