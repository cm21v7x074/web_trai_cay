<?php

if (session_status() === PHP_SESSION_NONE) {
	session_start();
}
include __DIR__ . '/../functions.php'; ?><!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.0/dist/jquery.min.js"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
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
			<a class="navbar-brand" href="index.php"></a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav me-auto">
					<li class="nav-item">
						<a class="nav-link active" aria-current="page" href="index.php">Trang chủ</a>
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
					<?php if ( !(empty($_SESSION['user'])) ) { ?>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="taikhoan.php" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
								Tài khoản
							</a>
							<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
								<li><a class="dropdown-item" href="logout.php">Đăng xuất</a></li>
							</ul>
						</li>
					<?php } ?>
				</ul>
				<form class="d-flex hd-search">
					<input class="form-control me-2" type="search" placeholder="Tìm kiếm" aria-label="Tìm kiếm">
					<button class="btn btn-outline-success" type="submit">Tìm kiếm</button>
				</form>
			</div>
		</div>
	</nav>
 		<!-- BEGIN CHANGEABLE CONTENT. -->