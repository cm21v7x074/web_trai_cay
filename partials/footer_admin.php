<!-- END CHANGEABLE CONTENT. -->
<?php

if ( !(empty($_SESSION['user'])) && $_SESSION['role'] == 'admin' ) {
?>
	<div class="text-center mt-5">
		<a class="btn btn-primary" href="<?php echo getBaseUrl(); ?>/logout.php">Đăng xuất</a>
	</div>
<?php } else { ?>
	<div class="text-center mt-5">
		<a class="btn btn-primary" href="<?php echo getBaseUrl(); ?>/index.php">Trang chủ</a> - <a class="btn btn-primary" href="<?php echo getBaseUrl(); ?>/register.php">Đăng ký</a> - <a class="btn btn-primary" href="<?php echo getBaseUrl(); ?>/login.php">Đăng nhập</a>
	</div>
<?php } ?>
	</div><!-- container -->
	<div id="footer" class="text-center mt-2">Content &copy; <strong>2022</strong></div>
</body>
</html>