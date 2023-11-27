<?php
if (session_status() === PHP_SESSION_NONE) {
	session_start();
}
include __DIR__ . '/../functions.php'; ?><!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<script src="js/cdn.jsdelivr.net_npm_jquery@3.7.0_dist_jquery.min.js"></script>
	<link href="css/cdn.jsdelivr.net_npm_bootstrap@5.3.0-alpha3_dist_css_bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/cdn.jsdelivr.net_npm_bootstrap-icons@1.5.0_font_bootstrap-icons.css">
	<script src="js/cdn.jsdelivr.net_npm_bootstrap@5.3.0-alpha3_dist_js_bootstrap.bundle.min.js"></script>
	<link rel="stylesheet" media="all" href="css/style.css">
	<title><?php
	if (defined('TITLE')) {
		echo TITLE;
	} else {
		echo 'Web Trai Cay';
	}
	?></title>
</head>
<body>
	<div class="container" id="container">
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<div class="container-fluid">
			<a class="navbar-brand" href="index.php">
				<img src="img/logo.jpg" alt="img/logo.jpg" width="60">
			</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav me-auto">
					<li class="nav-item">
						<a class="nav-link active" aria-current="page" href="index.php">Trang chủ</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="vechungtoi.php">Về chúng tôi</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="sanpham.php">Sản phẩm</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="tintuc.php">Tin tức</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="lienhe.php">Liên hệ</a>
					</li>
					<?php 
						if ( !(empty($_SESSION['user'])) ) {
					?>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="taikhoan.php" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
								Tài khoản
							</a>
							<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
								<li><a class="dropdown-item" href="logout.php">Đăng xuất</a></li>
							</ul>
						</li>
					<?php } else { ?>
						<li class="nav-item">
							<a class="nav-link" href="register.php">Đăng ký</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="login.php">Đăng nhập</a>
						</li>
					<?php } ?>
					<li class="nav-item d-flex align-items-center">
						<a class="fruit-cart" href="#">
							<i class="bi bi-cart"></i>
							<?php 
								if ( !(empty($_SESSION['id'])) ) {
									$con = mysqli_connect('localhost','root','');
									mysqli_select_db($con, "web_trai_cay");
									$sql_count = 'SELECT COUNT(`so_luong`) AS cart FROM gio_hang WHERE id_nguoi_dung = "'. $_SESSION['id'] .'"';
									$result_count = mysqli_query($con, $sql_count);
									$row = mysqli_fetch_assoc($result_count);
									$cart = (int)$row["cart"];
							?>
								<sup><?php echo $cart; ?></sup>
							<?php } else { ?>
								<sup>0</sup>
							<?php } ?>
						</a>
					</li>
				</ul>
				<form class="d-flex hd-search">
					<input class="form-control me-2" type="search" placeholder="Tìm kiếm" aria-label="Tìm kiếm">
					<button class="btn btn-outline-success" type="submit">Tìm kiếm</button>
				</form>
			</div>
		</div>
	</nav>
 		<!-- BEGIN CHANGEABLE CONTENT. -->