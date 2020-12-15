<?php include_once(__DIR__ . '/config.php');
?>
<!doctype html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>SẢN PHẨM THEO MỤC | LINHFISH SHOP</title>
	<?php include_once 'layout/css.php'; ?>

</head>

<body>

	<?php include_once 'layout/header.php'; ?>

	<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Sản phẩm</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="index.html">Home</a> / <span>Sản phẩm</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<div class="container">
		<div id="content" class="space-top-none">
			<div class="main-content">
				<div class="space60">&nbsp;</div>
				<div class="row">
					<div class="col-sm-3">
						<form action="product_type.php" method="post">
							<ul class="aside-menu">
								<?php
								$sql1 = "SELECT  * FROM `nhomhanghoa` ";
								$result1 = mysqli_query($conn, $sql1);
								while ($row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC)) {
								?>
									<li><a href="product_type_tk.php?MaNhom=<?php echo $row1['MaNhom'];?>"><?php echo $row1['TenNhom']; ?></a></li>
								<?php } ?>
							</ul>
						</form>

					</div>
					<div class="col-sm-9">
						<div class="beta-products-list">
							<h4>Tất cả sản phẩm</h4>
							<div class="row">
								<?php
								$sql = "SELECT  * FROM `hanghoa` hh JOIN `nhomhanghoa` nhh ON hh.MaNhom = nhh.MaNhom ORDER BY hh.MSHH desc ";
								$result = mysqli_query($conn, $sql);
								while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
								?>
									<div class="col-sm-4">
										<div class="single-item">

											<div class="single-item-header">

												<a href="/source/product.php?MSHH=<?php echo $row['MSHH']; ?>"><img src="/source/image/upload/<?php echo $row['Hinh']; ?>" class="hinh" alt=""></a>

											</div>
											<div class="single-item-body">
												<p class="single-item-title"><?php echo $row['TenHH']; ?></p>
												<p class="single-item-price">
													<span>$<?php echo $row['Gia']; ?></span>
												</p>
											</div>
											<div class="single-item-caption">
												<a class="add-to-cart pull-left" href="shopping_cart.php"><i class="fa fa-shopping-cart"></i></a>
												<a class="beta-btn primary" href="/source/product.php?MSHH=<?php echo $row['MSHH']; ?>">Details <i class="fa fa-chevron-right"></i></a>
												<div class="clearfix"></div>
											</div>
										</div>
									</div>
								<?php } ?>
							</div>
						</div> <!-- .beta-products-list -->

						<div class="space50">&nbsp;</div>
					</div>
				</div> <!-- end section with sidebar and main content -->


			</div> <!-- .main-content -->
		</div> <!-- #content -->
	</div> <!-- .container -->

	<?php include_once 'layout/footer.php'; ?>



	<!-- include js files -->
	<?php include_once 'layout/js.php'; ?>

	<!--customjs-->

	<script>
		$(document).ready(function($) {
			$(window).scroll(function() {
				if ($(this).scrollTop() > 150) {
					$(".header-bottom").addClass('fixNav')
				} else {
					$(".header-bottom").removeClass('fixNav')
				}
			})
		})
	</script>
</body>

</html>