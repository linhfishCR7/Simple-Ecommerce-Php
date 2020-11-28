<?php
session_start();
include_once(__DIR__ . '/../../config.php');
if (!isset($_SESSION["email_logged"])) {
    header("location:sign-in.php");
}

// 2. Nếu người dùng có bấm nút Đăng ký thì thực thi câu lệnh UPDATE
if(isset($_POST['btnSave'])) 
{
    // Lấy dữ liệu người dùng hiệu chỉnh gởi từ REQUEST POST
    $ten = $_POST['sp_ten'];
    $gia = $_POST['sp_gia'];
    $giacu = $_POST['sp_giacu'];
    $motangan = $_POST['sp_mota_ngan'];
    $motachitiet = $_POST['sp_mota_chitiet'];
    $ngaycapnhat = $_POST['sp_ngaycapnhat'];
    $sp_soluong = $_POST['sp_soluong'];
    $sp_khoiluong = $_POST['sp_khoiluong'];
    $sp_availability = $_POST['sp_availability'];
    $sp_shipping = $_POST['sp_shipping'];
    $sp_phantram = $_POST['sp_phantram'];
    $lsp_ma = $_POST['lsp_ma'];
    $nsx_ma = $_POST['nsx_ma'];

    // Câu lệnh INSERT
    $sql = "INSERT INTO `sanpham` (sp_ten, sp_gia, sp_giacu, sp_mota_ngan, sp_mota_chitiet, sp_ngaycapnhat, sp_soluong,sp_khoiluong,sp_availability,sp_shipping,sp_phantram, lsp_ma, nsx_ma, km_ma) VALUES ('$ten', $gia, $giacu, '$motangan', '$motachitiet', '$ngaycapnhat', $sp_soluong,$sp_khoiluong, '$sp_availability','$sp_shipping','$sp_phantram', $lsp_ma, $nsx_ma, $km_ma);";
    
    // Thực thi INSERT
    mysqli_query($conn, $sql);

    // Đóng kết nối
    mysqli_close($conn);

    // Sau khi cập nhật dữ liệu, tự động điều hướng về trang Danh sách
    header('location:index.php');
}

// Yêu cầu `Twig` vẽ giao diện được viết trong file `backend/sanpham/create.html.twig`
echo $twig->render('backend/sanpham/create.html.twig', [
    'ds_loaisanpham' => $dataLoaiSanPham,
    'ds_nhasanxuat' => $dataNhaSanXuat,
    'ds_khuyenmai' => $dataKhuyenMai,
]);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
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
                <h1>Bảng Thêm Hàng Hóa</h1>
            </div>
            <div class="col-md-3"></div>

        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-8">

                <form class="form-horizontal" name="frmLoaiSanPham" id="frmLoaiSanPham" method="post" action="/backend/sanpham/create.php">
                    <fieldset>
                        <legend>Thêm Mới Hàng Hóa</legend>
                        <div class="control-group success">
                            <label class="control-label" for="MSHH">Mã Hàng Hóa</label>
                            <div class="controls">
                                <input type="text" id="MSHH" name="MSHH" placeholder="Mã Hàng Hóa" readonly>
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
                            <select class="form-control" id="MaNhom" name="MaNhom">
                            <?php
                        $sql = "SELECT  * FROM `nhomhanghoa` ";
                        $result = mysqli_query($conn, $sql);

                        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                        ?>
                                    <option value="<?php echo $row['MaNhom'] ?>"><?php echo $row['TenNhom'] ?></option>
                        <?php }?>
                                </select>                                
                            </div>
                        </div>

                        <div class="control-group warning">
                            <label class="control-label" for="Hinh">Hình</label>
                            <div class="controls">
                                <input id="Hinh" name="Hinh" cols="30" rows="10" placeholder="Hình"></input>
                                <!-- <span class="help-inline">Something may have gone wrong</span> -->
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
                        
                        <button class="btn btn-primary" name="btnSave">Cập nhật</button>
                </form>


            </div>
        </div>

    </div>
</body>

</html>