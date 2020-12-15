<?php
    session_start();
    include_once(__DIR__ . '/../../config.php');
     if(!isset($_SESSION["email_logged"])) {
        header("location:sign-in.php");
    }
        
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hang Hóa</title>
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
                <h2>Thêm</h2>
                <a href="/source/Admin/HangHoa/ThemHH.php"><img src="https://img.icons8.com/cute-clipart/64/000000/add-property.png" /></a>
            </div>
            <div class="col-md-6"><h1>Bảng Hàng Hóa</h1></div>
            <div class="col-md-3"></div>

        </div>
        <div class="row">
            <div class="col-md-12">

                <table id="table"  data-toggle="table" data-search="true" data-show-columns="true">
                    <thead>
                        <tr class="table-primary text-center ">
                            <th data-field="id" data-valign="middle">ID</th>
                            <th data-field="name">Tên Sản Phẩm</th>
                            <th data-field="price">Giá</th>
                            <th data-field="quantity" data-valign="middle">Số Lượng</th>
                            <th data-field="group">Mã Nhóm</th>
                            <th data-field="picture">Hình Ảnh</th>
                            <th data-field="description">Mô Tả</th>
                            <th data-field="sale">Sale</th>
                            <th data-field="edit">Sửa</th>
                            <th data-field="delete">Xóa</th>
                        </tr>

                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT  * FROM `hanghoa` as hh JOIN `nhomhanghoa` as nhh ON hh.MaNhom=nhh.MaNhom ";
                        $result = mysqli_query($conn, $sql);

                        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                        ?>
                            <tr>
                                <td><?php echo $row['MSHH'] ?></td>
                                <td><?php echo $row['TenHH'] ?></td>
                                <td><?php echo $row['Gia'] ?></td>
                                <td><?php echo $row['SoLuongHang'] ?></td>
                                <td><?php echo $row['MaNhom'] ?></td>
                                <td><img src="/source/image/upload/<?php echo $row['Hinh'] ?>" alt="" style="height: 100px; width: 100px;"></td>
                                <td><?php echo $row['MoTaHH'] ?></td>
                                <td><?php echo $row['Sale'] ?></td>
                                <td><a href="/source/Admin/HangHoa/CapNhatHH.php?MSHH=<?php echo $row['MSHH'] ?>"><img src="https://img.icons8.com/metro/26/000000/edit.png" /></a></td>
                                <td><a href="/source/Admin/HangHoa/XoaHH.php?MSHH=<?php echo $row['MSHH'] ?>"><img src="https://img.icons8.com/material-sharp/26/000000/filled-trash.png" /></a></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>


            </div>
            
        </div>

    </div>
</body>

</html>