<?php

define('TITLE', 'Register');
include '../partials/header.php';

$loggedin = false;
$error_message = false;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	if (!empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['password_confirm']) && !empty($_POST['phone']) && !empty($_POST['address'])) {
		
	} else {
		$error_message = 'Hãy đảm bảo rằng bạn cung cấp đầy đủ nội dung!';
	}
}

if ($loggedin) {
	echo '<p>Bạn đã đăng nhập!</p>';
} else {
	echo '<h1 class="text-center py-3">Đăng ký</h1>
	<form action="register.php" method="post">
		<div class="mb-3">
			<label for="" class="form-label">Tên tài khoản</label>
			<input required type="email" name="email" class="form-control" id="">
		</div>
		<div class="mb-3">
			<label for="" class="form-label">Mật khẩu</label>
			<input required type="password" name="password" class="form-control" id="">
		</div>
		<div class="mb-3">
			<label for="" class="form-label">Nhập lại mật khẩu</label>
			<input required type="password" name="password_confirm" class="form-control" id="">
		</div>
		<div class="mb-3">
			<label for="" class="form-label">Số điện thoại</label>
			<input required type="text" name="phone" class="form-control" id="">
		</div>
		<div class="mb-3">
			<label for="" class="form-label">Địa chỉ</label>
			<input required type="text" name="address" class="form-control" id="">
		</div>
		<div class="d-flex flex-wrap align-items-center justify-content-between">
			<button type="submit" name="submit" class="btn btn-primary">Đăng ký!</button>
			<div>
				Bạn đã là thành viên ? <a href="login.php">Đăng nhập</a>
			</div>
		</div>
	</form>';
}

if ($error_message) {
	include '../partials/show_error.php';
}

include '../partials/footer.php';
