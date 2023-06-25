<?php
if (session_status() === PHP_SESSION_NONE) {
	session_start();
}

include __DIR__ . '/../functions.php'; ?><!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
	<link rel="stylesheet" media="all" href="../../css/admin/style.css">
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
<?php if ( !(empty($_SESSION['user'])) && $_SESSION['role'] == 'admin' ) { ?>
	<div class="my-3">
		<h2>Quản lý</h2>
	</div>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<div class="container-fluid">
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav me-auto">
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
							Người dùng
						</a>
						<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
							<li><a class="dropdown-item" href="#">Danh sách</a></li>
							<li><a class="dropdown-item" href="#">Thêm mới</a></li>
						</ul>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
							Đơn hàng
						</a>
						<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
							<li><a class="dropdown-item" href="#">Danh sách</a></li>
							<li><a class="dropdown-item" href="#">Thêm mới</a></li>
						</ul>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
							Sản phẩm
						</a>
						<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
							<li><a class="dropdown-item" href="<?php echo getBaseUrl(); ?>/admin/san_pham/index.php">Danh sách</a></li>
							<li><a class="dropdown-item" href="<?php echo getBaseUrl(); ?>/admin/san_pham/them.php">Thêm mới</a></li>
						</ul>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
							Loại sản phẩm
						</a>
						<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
							<li><a class="dropdown-item" href="<?php echo getBaseUrl(); ?>/admin/loai_san_pham/index.php">Danh sách</a></li>
							<li><a class="dropdown-item" href="<?php echo getBaseUrl(); ?>/admin/loai_san_pham/them.php">Thêm mới</a></li>
						</ul>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
							Nguồn gốc
						</a>
						<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
							<li><a class="dropdown-item" href="<?php echo getBaseUrl(); ?>/admin/nguon_goc/index.php">Danh sách</a></li>
							<li><a class="dropdown-item" href="<?php echo getBaseUrl(); ?>/admin/nguon_goc/them.php">Thêm mới</a></li>
						</ul>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
							Trạng thái
						</a>
						<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
							<li><a class="dropdown-item" href="<?php echo getBaseUrl(); ?>/admin/trang_thai/index.php">Danh sách</a></li>
							<li><a class="dropdown-item" href="<?php echo getBaseUrl(); ?>/admin/trang_thai/them.php">Thêm mới</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</nav>
<?php } ?>
 		<!-- BEGIN CHANGEABLE CONTENT. -->