<?php
// 1. Include file cấu hình kết nối đến database, khởi tạo kết nối $conn
include_once(__DIR__ . '/config.php');
?>
<!doctype html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>BLOG | LINHFISH SHOP</title>
	<?php include_once 'layout/css.php'; ?>
	<link rel="stylesheet" href="./assets/dest/css/blog.css">

</head>

<body>

	<?php include_once 'layout/header.php'; ?>

	<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Giới thiệu</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="index.html">Home</a> / <span>Giới thiệu</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<div class="container">
		<div id="content">
			<div class="our-history">
				<h2 class="text-center wow fadeInDown">TOP TIN TỨC</h2>
				<div class="space35">&nbsp;</div>

				<div class="history-slider">
					<div class="history-navigation">
					
						<a data-slide-index="1" href="blog_with_2sidebars_type_e.html" class="circle"><span class="auto-center">1</span></a>
						<a data-slide-index="1" href="blog_with_2sidebars_type_e.html" class="circle"><span class="auto-center">2</span></a>
						<a data-slide-index="2" href="blog_with_2sidebars_type_e.html" class="circle"><span class="auto-center">3</span></a>
						<a data-slide-index="3" href="blog_with_2sidebars_type_e.html" class="circle"><span class="auto-center">4</span></a>
						<a data-slide-index="4" href="blog_with_2sidebars_type_e.html" class="circle"><span class="auto-center">5</span></a>
						<a data-slide-index="5" href="blog_with_2sidebars_type_e.html" class="circle"><span class="auto-center">6</span></a>
						<a data-slide-index="6" href="blog_with_2sidebars_type_e.html" class="circle"><span class="auto-center">7</span></a>
					</div>

					<div class="history-slides">
						<?php
						$sql = "SELECT  * FROM `blog` order by ID desc LIMIT 7 ";
						$result = mysqli_query($conn, $sql);
						while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
						?>
							<div>
								<div class="row">
									<div class="col-sm-5">
										<a href=""><img src="<?php echo $row['HinhAnh']; ?>" alt="" class="imgblog_top"></a>
									</div>
									<div class="col-sm-7">
										<h2 class="other-title "><a href=""><?php echo $row['TenTT']; ?></a></h2>
										<span>
											<?php echo $row['ThoiGian']; ?>
										</span>
										<div class="space20">&nbsp;</div>
										<p><?php echo $row['MoTa']; ?></p>
									</div>
								</div>
							</div>
						<?php } ?>

					</div>
				</div>
			</div>

			<div class="space60">&nbsp;</div>
			<h5 class="text-center other-title wow fadeInDown">TIN TỨC</h5>
			<p class="text-center wow fadeInUp">Thông tin và tin tức về LINHFISH SHOP.</p>
			<div class="space20">&nbsp;</div>
			<div class="row">
				<?php
				$sql1 = "SELECT  * FROM `blog` ";
				$result1 = mysqli_query($conn, $sql1);
				while ($row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC)) {
				?>
					<div class="col-sm-3">
						<div class="beta-person beta-person-full">
							<div class="bets-img-hover">
								<img src="<?php echo $row1['HinhAnh']; ?>" alt="" class="imgblog">
							</div>
							<div class="beta-person-body">
								<h5 class="blogh5"><?php echo $row1['TenTT']; ?></h5>
								<span class="font-large"><?php echo $row1['ThoiGian']; ?></span>
								<a href="">Chi Tiết... <i class="fa fa-chevron-right"></i></a>
							</div>
						</div>
					</div>
				<?php } ?>
				<div class="space20">&nbsp;</div>

			</div>
		</div> <!-- #content -->
	</div> <!-- .container -->

	<?php include_once 'layout/footer.php'; ?>



	<!-- include js files -->
	<?php include_once 'layout/js.php'; ?>

	<!--customjs-->
	<script>
		/* <![CDATA[ */
		jQuery(document).ready(function($) {
			'use strict';


			try {
				if ($(".animated")[0]) {
					$('.animated').css('opacity', '0');
				}
				$('.triggerAnimation').waypoint(function() {
					var animation = $(this).attr('data-animate');
					$(this).css('opacity', '');
					$(this).addClass("animated " + animation);

				}, {
					offset: '80%',
					triggerOnce: true
				});
			} catch (err) {

			}

			var wow = new WOW({
				boxClass: 'wow', // animated element css class (default is wow)
				animateClass: 'animated', // animation css class (default is animated)
				offset: 150, // distance to the element when triggering the animation (default is 0)
				mobile: false // trigger animations on mobile devices (true is default)
			});
			wow.init();
			// NUMBERS COUNTER START
			$('.numbers').data('countToOptions', {
				formatter: function(value, options) {
					return value.toFixed(options.decimals).replace(/\B(?=(?:\d{3})+(?!\d))/g, ',');
				}
			});

			// start timer
			$('.timer').each(count);

			function count(options) {
				var $this = $(this);
				options = $.extend({}, options || {}, $this.data('countToOptions') || {});
				$this.countTo(options);
			} // NUMBERS COUNTER END 

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

		/* ]]> */
	</script>
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
</body>

</html>