<!-- END CHANGEABLE CONTENT. -->
<?php
	if ( !(empty($_SESSION['user'])) ) {
?>
	<div class="text-center mt-5">
		<a class="btn btn-primary" href="logout.php">Đăng xuất</a>
	</div>
<?php } else { ?>
	<div class="text-center mt-5">
		<a class="btn btn-primary" href="index.php">Trang chủ</a> - <a class="btn btn-primary" href="register.php">Đăng ký</a> - <a class="btn btn-primary" href="login.php">Đăng nhập</a>
	</div>
<?php } ?>
	</div><!-- container -->
	<div id="footer" class="text-center mt-2">Content &copy; <strong>2022</strong></div>
</body>
</html>