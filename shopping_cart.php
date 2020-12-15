<?php
session_start();
// 1. Include file cấu hình kết nối đến database, khởi tạo kết nối $conn
include_once(__DIR__ . '/config.php');
// Kiểm tra dữ liệu trong session
$data = [];
if (isset($_SESSION['giohangdata'])) {
	$data = $_SESSION['giohangdata'];
} else {
	$data = [];
}
// Yêu cầu `Twig` vẽ giao diện được viết trong file `frontend/thanhtoan/giohang.html.twig`
// với dữ liệu truyền vào file giao diện được đặt tên là `giohangdata`
// dd($data);
?>
<!doctype html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>BetaDesign &mdash; Shopping Cart</title>
	<?php include_once 'layout/css.php'; ?>

</head>

<body>

	<?php include_once 'layout/header.php'; ?>

	<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Shopping Cart</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="index.html">Home</a> / <span>Shopping Cart</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>

	<div class="container">
		<div id="content">

			<div class="table-responsive">
				<!-- Shop Products Table -->
				<table class="shop_table beta-shopping-cart-table listSanPham" cellspacing="0">
					<thead>
						<tr>
							<th class="product-name">Tên Sản Phẩm</th>
							<th class="product-price">Giá</th>
							<th class="product-quantity">Số Lượng</th>
							<th class="product-subtotal">Tổng</th>
							<th class="product-remove">Xóa</th>
						</tr>
					</thead>
					<tbody>
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
						?>
						<tr class="cart_item">
							<td class="product-name">
								<div class="media">
									<img class="pull-left" style="height: 100px; width: 100px;" src="<?php echo $row['Hinh']; ?>" alt="">
									<div class="media-body">
										<p class="font-large table-title"><?php echo $row['TenHH']; ?></p>

										<a class="table-edit" href="#">Sửa</a>
									</div>
								</div>
							</td>

							<td class="product-price">
								<span class="amount">$<?php echo $row['Gia']; ?></span>
							</td>



							<td class="product-quantity">
								<input name="Qty" id="Qty" type="number" value="<?php echo $row['Qty']; ?>" style="width: 80px;height: 40px;" min="1">
							</td>

							<td class="product-subtotal">
								<span class="amount">$<?php echo $row['Gia']; ?></span>
							</td>

							<td class="product-remove">
								<a href="#" class="remove" title="Remove this item"><i class="fa fa-trash-o"></i></a>
							</td>
						</tr>
					</tbody>


				</table>
				<!-- End of Shop Table Products -->
			</div>


			<!-- Cart Collaterals -->
			<div class="cart-collaterals">

				<form class="shipping_calculator pull-left" action="#" method="post">
					<h2><a href="#" class="shipping-calculator-button">Check out <span>↓</span></a></h2>
				</form>

				<!-- <div class="cart-totals pull-right">
					<div class="cart-totals-row">
						<h5 class="cart-total-title">Cart Totals</h5>
					</div>
					<div class="cart-totals-row"><span>Cart Subtotal:</span> <span>$188.00</span></div>
					<div class="cart-totals-row"><span>Shipping:</span> <span>Free Shipping</span></div>
					<div class="cart-totals-row"><span>Order Total:</span> <span>$188.00</span></div>
				</div> -->

				<div class="clearfix"></div>
			</div>
			<!-- End of Cart Collaterals -->
			<div class="clearfix"></div>

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