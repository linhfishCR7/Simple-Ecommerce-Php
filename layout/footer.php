<div id="footer">
	<div class="container">
		<div class="row">
			<div class="col-sm-3">
				<div class="widget">
					<h4 class="widget-title">Thương Hiệu</h4>
					<div>
						<div>
						<a href="index.php"><img src="image/logo/LINH.png" alt="" /></a>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-2">
				<div class="widget">
					<h4 class="widget-title">Loại Sản Phẩm</h4>
					<div>
						<ul>
						<?php
						include_once(__DIR__ . '/../config.php');

									$sql = "SELECT  * FROM `nhomhanghoa` ";
									$result = mysqli_query($conn, $sql);
									while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
									?>
							<li><a href="product_type.php"><i class="fa fa-chevron-right"></i> <?php echo $row['TenNhom']; ?></a></li>

									<?php }?>
						</ul>
					</div>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="col-sm-10">
					<div class="widget">
						<h4 class="widget-title">Liên Hệ</h4>
						<div>
							<div class="contact-info">
								<i class="fa fa-map-marker"></i>
								<p>Khu dân cư 148,3/2,
								Phường Hưng Lợi, Ninh Kiều
								Cần Thơ</p>
								<p>Phone: 0342875456 Email: havanlinh19042000@gmail.com</p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-3">
				<div class="widget">
					<h4 class="widget-title">Đăng Ký</h4>
					<form action="../source/auth/dangkyBackend.php" method="post">
						<input type="email" name="email" >
						<button class="pull-right" type="submit" name="btnGoiLoiNhan">Đăng Ký <i class="fa fa-chevron-right"></i></button>
					</form>
				</div>
			</div>
		</div> <!-- .row -->
	</div> <!-- .container -->
</div> <!-- #footer -->
<div class="copyright">
	<div class="container">
		<p class="pull-left">Develop by <a href="https://linhfishcr7.wordpress.com/"><b>LINHFISH</b></a>. (&copy;) <?php echo date("Y"); ?></p>
		
	</div> <!-- .container -->
</div> <!-- .copyright -->
