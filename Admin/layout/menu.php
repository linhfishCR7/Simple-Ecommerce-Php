
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="/source/index.php">SHOP</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="https://linhfishcr7.wordpress.com/" target="_blank">Profile</a>
      </li>
       <li class="nav-item dropdown">
      <?php 
      $email =$_SESSION["email_logged"];
      // var_dump($email);die;
      if(isset($_SESSION["email_logged"])){
        echo "<a class= nav-link dropdown-toggle href= # id= navbarDropdown role= button  data-toggle= dropdown aria-haspopup= true  aria-expanded= false >$email</a>";
        echo "<div class= dropdown-menu  aria-labelledby= navbarDropdown>";
        echo "<a class= dropdown-item  href= logout.php >Logout</a>";
        echo "</div>";
      }else{
        echo "<a class= nav-link  href= sign-in >Login</a>";
      }
      ?>

      </li> 

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Cập Nhật
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="Banner.php">Banner</a>
          <a class="dropdown-item" href="Blogs.php">Blogs</a>
          <a class="dropdown-item" href="ChiTietDonHang.php">Chi Tiết Đơn Hàng</a>
          <a class="dropdown-item" href="DatHang.php">Đặt Hàng</a>
          <a class="dropdown-item" href="HangHoa.php">Hàng Hóa</a>
          <a class="dropdown-item" href="KhachHang.php">Khách Hàng</a>
          <a class="dropdown-item" href="NhanVien.php">Nhân Viên</a>
          <a class="dropdown-item" href="NhomHangHoa.php">Nhóm Hàng Hóa</a>
          <a class="dropdown-item" href="Reviews.php">Reviews</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="dashboard.php">Dashboard</a>
        </div>
      </li>
      
    </ul>
   
  </div>
</nav>