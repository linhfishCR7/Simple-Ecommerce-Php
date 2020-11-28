<!doctype html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>SẢN PHẨM | LINHFISH SHOP</title>
	<?php include_once 'layout/css.php'; ?>

</head>

<body>
	<?php
	// 1. Include file cấu hình kết nối đến database, khởi tạo kết nối $conn
	include_once(__DIR__ . '/config.php');
	?>
	<?php include_once 'layout/header.php'; ?>


	<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Product</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="index.html">Home</a> / <span>Product</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>

	<div class="container">
		<div id="content">
			<div class="row">
				<div class="col-sm-9">

						<div class="row">
							<?php


							$MSHH = $_GET['MSHH'];
							$sql = <<<EOT
SELECT  hh.*,nhh.* FROM `hanghoa` hh 
JOIN `nhomhanghoa` nhh ON hh.MaNhom = nhh.MaNhom  
WHERE hh.MSHH='$MSHH'
EOT;
							// Thực thi câu truy vấn SQL để lấy về dữ liệu ban đầu của record 
							$result = mysqli_query($conn, $sql);
							$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
							// print_r($sql);die;
							?>

					
							<div class="col-sm-4">
								<img src="<?php echo $row['Hinh']; ?>" alt="">
							</div>
							<div class="col-sm-8">
								<div class="single-item-body">
									<p class="single-item-title"><?php echo $row['TenHH']; ?></p>
									<p class="single-item-price">
										<span>Giá: $<?php echo $row['Gia']; ?></span>
									</p>
								</div>

								<div class="clearfix"></div>
								<div class="space20">&nbsp;</div>

								<div class="single-item-desc">
									<p></p>
								</div>
								<div class="space20">&nbsp;</div>

								<p>Options:</p>
								<div class="single-item-options">
									<input name="Qty" id="Qty" type="number" value="1" style="width: 50px;" min="1">
									<a class="add-to-cart" href="/source/shopping_cart.php?MSHH=<?php echo $row['MSHH']; ?>" id="btnThemVaoGioHang"><i class="fa fa-shopping-cart"></i></a>
									<div class="clearfix"></div>
								</div>
							</div>
						</div>

					<?php

					/* --- 
   --- 2.Truy vấn dữ liệu Sản phẩm 
   --- Lấy giá trị khóa chính được truyền theo dạng QueryString Parameter key1=value1&key2=value2...
   --- 
*/
					$sql2 = <<<EOT
SELECT COUNT(Rv.ID) as Dem FROM `hanghoa` hh 
JOIN `review` Rv ON hh.MSHH = Rv.MSHH  
WHERE hh.MSHH='$MSHH'
EOT;
					// Thực thi câu truy vấn SQL để lấy về dữ liệu ban đầu của record 
					$result2 = mysqli_query($conn, $sql2);
					$row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC);
					// print_r($sql);die;
					?>
					<div class="space40">&nbsp;</div>
					<div class="woocommerce-tabs">
						<ul class="tabs">
							<li><a href="#tab-description">Description</a></li>
							<li><a href="#tab-reviews">Reviews (<?php echo $row2['Dem']; ?>)</a></li>
						</ul>

						<div class="panel" id="tab-description">
							<p><?php echo $row['MoTaHH']; ?></p>
						</div>
						<div class="panel" id="tab-reviews">
							<?php $sql1 = <<<EOT
SELECT  Rv.*  FROM `hanghoa` hh 
JOIN `review` Rv ON hh.MSHH = Rv.MSHH  
WHERE hh.MSHH='$MSHH'
EOT;
							// Thực thi câu truy vấn SQL để lấy về dữ liệu ban đầu của record 
							$result1 = mysqli_query($conn, $sql1);
							while ($row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC)) { ?>
								<p>- <?php echo $row1['NoiDung']; ?></p>
							<?php } ?>
						</div>
					</div>
					<div class="space50">&nbsp;</div>

				</div>
				<div class="col-sm-3 aside">
					<div class="widget">
						<h3 class="widget-title">Best Sellers</h3>
						<div class="widget-body">
							<div class="beta-sales beta-lists">

								<?php $sql2 = "SELECT  * FROM `hanghoa` hh JOIN `nhomhanghoa` nhh ON hh.MaNhom = nhh.MaNhom LIMIT 4 ";
								$result2 = mysqli_query($conn, $sql2);
								while ($row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC)) {
								?>
									<div class="media beta-sales-item">
										<a class="pull-left" href="/source/product.php?MSHH=<?php echo $row2['MSHH']; ?>"><img src="<?php echo $row2['Hinh']; ?>" alt=""></a>
										<div class="media-body">
											<?php echo $row2['TenHH']; ?>
											<span class="beta-sales-price">$<?php echo $row2['Gia']; ?></span>
										</div>
									</div>
								<?php } ?>
							</div>
						</div>
					</div> <!-- best sellers widget -->

				</div>
			</div>
		</div> <!-- #content -->
	</div> <!-- .container -->

	<?php include_once 'layout/footer.php'; ?>



	<!-- include js files -->
	<?php include_once 'layout/js.php'; ?>


	<!--customjs-->
	<script type="text/javascript">
		$(function() {
			// this will get the full URL at the address bar
			var url = window.location.href;

			// passes on every "a" tag
			$(".main-menu a").each(function() {
				// checks if its the same on the address bar
				if (url == (this.href)) {
					$(this).closest("li").addClass("active");
					$(this).parents('li').addClass('parent-active');
				}
			});
		});
	</script>
	<script>
		jQuery(document).ready(function($) {
			'use strict';

			// color box

			//color
			jQuery('#style-selector').animate({
				left: '-213px'
			});

			jQuery('#style-selector a.close').click(function(e) {
				e.preventDefault();
				var div = jQuery('#style-selector');
				if (div.css('left') === '-213px') {
					jQuery('#style-selector').animate({
						left: '0'
					});
					jQuery(this).removeClass('icon-angle-left');
					jQuery(this).addClass('icon-angle-right');
				} else {
					jQuery('#style-selector').animate({
						left: '-213px'
					});
					jQuery(this).removeClass('icon-angle-right');
					jQuery(this).addClass('icon-angle-left');
				}
			});
		});
	</script>
</body>

</html>