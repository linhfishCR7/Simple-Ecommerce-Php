<?php
    session_start();
    include_once(__DIR__ . '/../config.php');
     if(!isset($_SESSION["email_logged"])) {
        header("location:sign-in.php");
    }
        
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | LINHFISH SHOP</title>
    <?php
    include_once 'layout/header.php';
    ?>
    <link href="https://unpkg.com/bootstrap-table@1.18.0/dist/bootstrap-table.min.css" rel="stylesheet">

    <script src="https://unpkg.com/bootstrap-table@1.18.0/dist/bootstrap-table.min.js"></script>

</head>

<body>

    <div class="container-fluid">
        <!-- Content here -->
        <?php include_once 'layout/menu.php'; ?>
        <br>
        <div class="row">
            <div class="col-md-4">
            </div>
            <div class="col-md-6">
                <h1>DASHBOARD - LINHFISH SHOP</h1>
            </div>
            <div class="col-md-2"></div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <h3>Nhóm Sản Phẩm</h3>
                <table id="table" data-toggle="table">
                    <thead>
                        <tr class="table-primary text-center ">
                            <th data-field="id" data-valign="middle">ID</th>
                            <th data-field="name">Tên Sản Phẩm</th>


                        </tr>

                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT  * FROM `nhomhanghoa` ";
                        $result = mysqli_query($conn, $sql);

                        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                        ?>
                            <tr>
                                <td><?php echo $row['MaNhom'] ?></td>
                                <td><?php echo $row['TenNhom'] ?></td>


                            </tr>
                        <?php } ?>
                    </tbody>
                </table>


            </div>
            <div class="col-md-6">
                <h3>Sản Phẩm</h3>
                <table id="table" data-toggle="table">
                    <thead>
                        <tr class="table-primary text-center ">
                            <th data-field="id" data-valign="middle">ID</th>
                            <th data-field="name">Tên Sản Phẩm</th>
                            <th data-field="price">Địa Chỉ</th>
                            <th data-field="quantity" data-valign="middle">Số Lượng</th>
                            <th data-field="group">Mã Nhóm</th>
                            <th data-field="picture">Hình Ảnh</th>
                            <th data-field="sale">Sale</th>

                        </tr>

                    </thead>
                    <tbody>
                        <?php
                        $sql1 = "SELECT  * FROM `hanghoa` as hh JOIN `nhomhanghoa` as nhh ON hh.MaNhom=nhh.MaNhom LIMIT 3 ";
                        $result1 = mysqli_query($conn, $sql1);

                        while ($row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC)) {
                        ?>
                            <tr>
                                <td><?php echo $row1['MSHH'] ?></td>
                                <td><?php echo $row1['TenHH'] ?></td>
                                <td><?php echo $row1['Gia'] ?></td>
                                <td><?php echo $row1['SoLuongHang'] ?></td>
                                <td><?php echo $row1['MaNhom'] ?></td>
                                <td><img src="<?php echo $row1['Hinh'] ?>" alt="" style="height: 100px; width: 100px;"></td>
                                <td><?php echo $row1['Sale'] ?></td>

                            </tr>
                        <?php } ?>
                    </tbody>
                </table>


            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-6">
                <h3>Nhân Viên</h3>
                <table id="table" data-toggle="table">
                    <thead>
                        <tr class="table-primary text-center ">
                            <th data-field="id" data-valign="middle">ID</th>
                            <th data-field="name">Họ Tên</th>
                            <th data-field="position" data-valign="middle">Chức Vụ</th>
                            <th data-field="address">Địa Chỉ</th>
                            <th data-field="phone">Số Điện Thoại</th>
                        </tr>

                    </thead>
                    <tbody>
                        <?php
                        $sql2 = "SELECT  * FROM `nhanvien` LIMIT 8";
                        $result2 = mysqli_query($conn, $sql2);

                        while ($row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC)) {
                        ?>
                            <tr>
                                <td><?php echo $row2['MSNV'] ?></td>
                                <td><?php echo $row2['HoTenNV'] ?></td>
                                <td><?php echo $row2['ChucVu'] ?></td>
                                <td><?php echo $row2['DiaChi'] ?></td>
                                <td><?php echo $row2['SoDienThoai'] ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>


            </div>
            <div class="col-md-6">
                <h3>Khách Hàng</h3>
                <table id="table" data-toggle="table">
                    <thead>
                        <tr class="table-primary text-center ">
                            <th data-field="id" data-valign="middle">ID</th>
                            <th data-field="name">Họ tên</th>
                            <th data-field="address">Địa Chỉ</th>
                            <th data-field="phone">Số Điện Thoại</th>

                        </tr>

                    </thead>
                    <tbody>
                        <?php
                        $sql3 = "SELECT  * FROM `khachhang` LIMIT 8";
                        $result3 = mysqli_query($conn, $sql3);

                        while ($row3 = mysqli_fetch_array($result3, MYSQLI_ASSOC)) {
                        ?>
                            <tr>
                                <td><?php echo $row3['MSKH'] ?></td>
                                <td><?php echo $row3['HoTenKH'] ?></td>
                                <td><?php echo $row3['DiaChi'] ?></td>
                                <td><?php echo $row3['SoDienThoai'] ?></td>
                                

                            </tr>
                        <?php } ?>
                    </tbody>
                </table>


            </div>
        </div>

    </div>
    <br>
    <?php
    include_once 'layout/footer.php';
    ?>
</body>

</html>