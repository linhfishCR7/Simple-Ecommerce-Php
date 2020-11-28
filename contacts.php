<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>LIÊN HỆ | LINHFISH SHOP</title>
	<?php include_once 'layout/css.php'; ?>
</head>
<body>

<?php include_once 'layout/header.php'; ?>

	<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Contacts</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="index.html">Home</a> / <span>Contacts</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<div class="beta-map">
		
		<div class="abs-fullwidth beta-map wow flipInX"><iframe src="https://www.google.com/maps/embed?pb=!1m28!1m12!1m3!1d298771.065828803!2d105.23101191311586!3d10.297395621811825!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m13!3e6!4m5!1s0x310a198a4ee22a8d%3A0xdc1cb02c52c088ba!2zQW4gR2lhbmcsIFZp4buHdCBOYW0!3m2!1d10.5215836!2d105.1258955!4m5!1s0x31a0629f6de3edb7%3A0x527f09dbfb20b659!2zQ-G6p24gVGjGoSwgTmluaCBLaeG7gXUsIEPhuqduIFRoxqEsIFZp4buHdCBOYW0!3m2!1d10.045161799999999!2d105.7468535!5e0!3m2!1svi!2s!4v1605714246232!5m2!1svi!2s"></iframe></div>
	</div>
	<div class="container">
		<div id="content" class="space-top-none">
			
			<div class="space50">&nbsp;</div>
			<div class="row">
				<div class="col-sm-8">
					<h2>Liên Hệ</h2>
					<div class="space20">&nbsp;</div>
					<p><b> Để lại thông tin để chúng tôi có tư vấn trực tiếp cho bạn hay là đặt hàng bến cửa hàng chúng tôi. Cảm ơn quý khách hàng</b></p>
					<div class="space20">&nbsp;</div>
					<form action="auth/contactBackend.php" method="post" class="contact-form">	
						<div class="form-block">
							<input name="your-name" type="text" placeholder="Tên *">
						</div>
						<div class="form-block">
							<input name="your-email" type="email" placeholder="Email *">
						</div>
						<div class="form-block">
							<input name="your-subject" type="text" placeholder="Chủ đề">
						</div>
						<div class="form-block">
							<textarea name="your-message" placeholder="Nội dung"></textarea>
						</div>
						<div class="form-block">
							<button type="submit" class="beta-btn primary" name="btnGoiLoiNhan">Send Message <i class="fa fa-chevron-right"></i></button>
						</div>
					</form>
				</div>
				<div class="col-sm-4">
					<h2>Thông tin liên hệ</h2>
					<div class="space20">&nbsp;</div>

					<h6 class="contact-title">Đại chỉ</h6>
					<p>
						Khu dân cư 148,3/2,<br>
						Phường Hưng Lợi, Ninh Kiều <br>
						Cần Thơ
					</p>
					<div class="space20">&nbsp;</div>
					<h6 class="contact-title">Bộ phần kinh doanh</h6>
					<p>
					<p>
						Hãy liên hệ đến chúng tôi qua: <br>
						Phone: <a href="tel:+84342878766">0342875456</a>
						Email: <a href="mailto:havanlinh19042000@gmail.com">havanlinh19042000@gmail.com</a>					
					</p>
					</p>
					<div class="space20">&nbsp;</div>
					<h6 class="contact-title">Bộ phần kĩ thuật</h6>
					<p>
						Hãy liên hệ đến chúng tôi qua: <br>
						Phone: <a href="tel:+84342878766">0342878766</a>
						Email: <a href="mailto:linhfish10c1@gmail.com">linhfish10c1@gmail.com</a>					
					</p>
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

    jQuery('#style-selector a.close').click(function(e){
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