<?php
// 1. Include file cấu hình kết nối đến database, khởi tạo kết nối $conn
include_once(__DIR__ . '/config.php');
?>
<!doctype php>
<php lang="en">

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>HOME | LINHFISH SHOP </title>
		<?php include_once 'layout/css.php'; ?>

	</head>

	<body>
		<?php include_once 'layout/header.php'; ?>
		<!--start carousel -->
		<div class="rev-slider">
			<div class="fullwidthbanner-container">
				<div class="fullwidthbanner">
					<div class="bannercontainer">
						<div class="banner">
							<ul>
								<?php
								$sql = "SELECT  * FROM `banner` order by ID desc ";
								$result = mysqli_query($conn, $sql);
								while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
								?>
									<li data-transition="boxfade" data-slotamount="20" class="active-revslide" style="width: 100%; height: 100%; overflow: hidden; z-index: 18; visibility: hidden; opacity: 0;">
										<div class="slotholder" style="width:100%;height:100%;" data-duration="undefined" data-zoomstart="undefined" data-zoomend="undefined" data-rotationstart="undefined" data-rotationend="undefined" data-ease="undefined" data-bgpositionend="undefined" data-bgposition="undefined" data-kenburns="undefined" data-easeme="undefined" data-bgfit="undefined" data-bgfitend="undefined" data-owidth="undefined" data-oheight="undefined">
											<div class="tp-bgimg defaultimg" data-lazyload="undefined" data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat" data-lazydone="undefined" src="<?php echo $row['Url']; ?>" data-src="<?php echo $row['Url']; ?>" style="background-color: rgba(0, 0, 0, 0); background-repeat: no-repeat; background-image: url('<?php echo $row['Url']; ?>'); background-size: cover; background-position: center center; width: 100%; height: 100%; opacity: 1; visibility: inherit;">
											</div>
										</div>
									</li>
								<?php } ?>
							</ul>
						</div>
					</div>

					<div class="tp-bannertimer"></div>
				</div>
			</div>
			<!--slider-->
		</div>
		<!-- end carousel -->

		<div class="container">
			<div id="content" class="space-top-none">
				<div class="main-content">
					<div class="space60">&nbsp;</div>
					<div class="row">
						<div class="col-sm-12">
							<div class="beta-products-list">
								<h4>New Products</h4>
								<!-- <div class="beta-products-details">
									<p class="pull-left">438 styles found</p>
									<div class="clearfix"></div>
								</div> -->
								<div class="row">
									<?php
									$sql = "SELECT  * FROM `hanghoa` hh JOIN `nhomhanghoa` nhh ON hh.MaNhom = nhh.MaNhom ORDER BY hh.MSHH desc LIMIT 4";
									$result = mysqli_query($conn, $sql);
									while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
									?>
										<div class="col-sm-3">
											<div class="single-item">

												<div class="single-item-header">

													<a href="/source/product.php?MSHH=<?php echo $row['MSHH']; ?>"><img src="<?php echo $row['Hinh']; ?>" class="hinh" alt=""></a>

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
									<?php
									} ?>
								</div>
							</div> <!-- .beta-products-list -->

							<div class="space50">&nbsp;</div>

						</div> <!-- .beta-products-list -->
						<div class="space50">&nbsp;</div>
						<div class="beta-products-list">
							<h4>Top Products</h4>
								
								<div class="row">
									<?php
									$sql = "SELECT  * FROM `hanghoa` hh JOIN `nhomhanghoa` nhh ON hh.MaNhom = nhh.MaNhom LIMIT 8";
									$result = mysqli_query($conn, $sql);

									while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
									?>
										<div class="col-sm-3">
											<div class="single-item">
												<?php if ($row['Sale'] == 1) { ?>
													<div class="ribbon-wrapper">
														<div class="ribbon sale">Sale</div>
													</div>
												<?php } else { ?>
													<div class="ribbon-wrapper"></div>
												<?php } ?>

												<div class="single-item-header">
													<a href="/source/product.php?MSHH=<?php echo $row['MSHH']; ?>"><img src="<?php echo $row['Hinh']; ?>" class="hinh" alt=""></a>
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
									<?php
									} ?>



								</div> <!-- .beta-products-list -->
							</form>
						</div>
					</div> <!-- end section with sidebar and main content -->


				</div> <!-- .main-content -->
			</div> <!-- #content -->
		</div> <!-- .container -->

		<!-- include footer -->
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
</php>