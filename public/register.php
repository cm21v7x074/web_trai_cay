<?php

define('TITLE', 'Register');
include '../partials/header.php';

$loggedin = false;
$error_message = false;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	if (!empty($_POST['ten_nguoi_dung']) && !empty($_POST['sdt_nguoi_dung']) && !empty($_POST['dia_chi']) && !empty($_POST['mat_khau']) && !empty($_POST['email'])) {
		include '../partials/db_connect.php';
		$query = 'INSERT INTO nguoi_dung (ten_nguoi_dung, sdt_nguoi_dung, dia_chi, mat_khau, email) VALUE (?,?,?,?,?)';
		try {
			$statement = $pdo->prepare($query);
			$statement->execute([
				$_POST['ten_nguoi_dung'],
				$_POST['sdt_nguoi_dung'],
				$_POST['dia_chi'],
				$_POST['mat_khau'],
				$_POST['email']
			]);
		} catch (PDOException $e) {
			$pdo_error = $e->getMessage();
		}

		if ($statement && $statement->rowCount() == 1){
			echo '<h4 class="text-success p-3">Đăng ký tài khoản thành công!</h4>';
		} else {
			$error_message = 'Không thể Đăng ký tài khoản!';
			$reason = $pdo_error ?? 'Không rõ nguyễn nhân';
			include '../partials/show_error.php';
		}
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
			<input required type="text" name="ten_nguoi_dung" class="form-control">
		</div>
		<div class="mb-3">
			<label for="" class="form-label">Email</label>
			<input required type="email" name="email" class="form-control">
		</div>
		<div class="mb-3">
			<label for="" class="form-label">Mật khẩu</label>
			<input required type="password" name="mat_khau" class="form-control">
		</div>
		<div class="mb-3">
			<label for="" class="form-label">Nhập lại mật khẩu</label>
			<input required type="password" name="nhap_lai_mat_khau" class="form-control">
		</div>
		<div class="mb-3">
			<label for="" class="form-label">Số điện thoại</label>
			<input required type="text" name="sdt_nguoi_dung" class="form-control">
		</div>
		<div class="mb-3">
			<label for="" class="form-label">Địa chỉ</label>
			<input required type="text" name="dia_chi" class="form-control">
		</div>
		<div class="d-flex flex-wrap align-items-center justify-content-between">
			<button type="submit" class="btn btn-primary">Đăng ký!</button>
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
