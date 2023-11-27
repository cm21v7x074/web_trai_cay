<!-- END CHANGEABLE CONTENT. -->
<?php
	if ( !(empty($_SESSION['user'])) ) {
?>
<?php } else { ?>
	<!-- <div class="text-center mt-5">
		<a class="btn btn-primary" href="index.php">Trang chủ</a> - <a class="btn btn-primary" href="register.php">Đăng ký</a> - <a class="btn btn-primary" href="login.php">Đăng nhập</a>
	</div> -->
<?php } ?>
	</div><!-- container -->
	<div id="footer" class="border-top pt-3">
		<div class="container py-3">
			<div class="row">
				<div class="col-12 col-md-3">
					<a class="navbar-brand" href="index.php">
						<img src="img/logo.jpg" alt="img/logo.jpg" width="150">
					</a>
					<h3 class="mt-2">Bắp Bo Family</h3>
					<p class="my-2">
						<strong>Địa chỉ:</strong> 37/5A Đường Xuân Thới Sơn 29, Ấp 2, Hóc Môn, Thành phố Hồ Chí Minh, Việt Nam
					</p>
					<p class="my-2">
						<strong>Điện thoại:</strong> 0987654321
					</p>
				</div>
				<div class="col-12 col-md-3">
					<ul class="list-unstyled ft-menu">
						<li><a href="#">Về chúng tôi</a></li>
						<li><a href="#">Sản phẩm</a></li>
						<li><a href="#">Liên hệ</a></li>
					</ul>
					<img class="img-fluid" src="img/qrcode.jpg" width="200" alt="">
				</div>
				<div class="col-12 col-md-6">
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d244.8802286883658!2d106.58414482539257!3d10.881241497692836!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752bcb40535317%3A0x48cfb67d3730f0d7!2zQuG6r3AgQm8gZmFtaWx5!5e0!3m2!1svi!2s!4v1688275652846!5m2!1svi!2s" width="600" height="350" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
				</div>
			</div>
		</div>
		<div class="text-center text-light py-3 bg-success bg-gradient">Copyright &copy; <strong>2022</strong> by Bắp Bo Family</div>
	</div>
</body>
</html>