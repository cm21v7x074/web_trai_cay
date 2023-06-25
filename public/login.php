<?php

define('TITLE', 'Login');
include '../partials/header.php';
include '../partials/db_connect.php';

$loggedin = false;
$error_message = false;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	if (!empty($_POST['email']) && !empty($_POST['password'])) {
		$query = "SELECT * FROM nguoi_dung WHERE email='". $_POST['email'] ."' AND mat_khau='".$_POST['password']."'";
		try {
			$statement = $pdo->query($query);
			$row = $statement->fetch();
		} catch (PDOException $e) {
			$pdo_error = $e->getMessage();
		}
		if (!empty($row)) {
			$_SESSION['id'] = $row['id'];
			$_SESSION['user'] = $row['email'];
			$_SESSION['role'] = $row['role'];
			$loggedin = true;
		} else {
			$error_message = 'Địa chỉ email và mật khẩu không khớp!';
		}
	} else {
		$error_message = 'Hãy đảm bảo rằng bạn cung cấp đầy đủ địa chỉ email và mật khẩu!';
	}
}

if ( !(empty($_SESSION['user'])) ) { ?>
<div class="my-3 text-center">
	<p>Bạn đã đăng nhập!</p>
	<div>
		<a class="btn btn-primary" href="index.php">Trang chủ</a>
		<a class="btn btn-success" href="taikhoan.php">Tài khoản</a>
		<?php if ($_SESSION['role'] == 'admin') { ?>
			<a class="btn btn-warning" href="admin/index.php">Quản lý</a>
		<?php } ?>
	</div>
</div>
<?php } else {
	echo '<h1 class="text-center py-3">Đăng nhập</h1>
	<form action="login.php" method="post">
		<div class="mb-3">
			<label for="exampleInputEmail1" class="form-label">Địa chỉ Email</label>
			<input required type="email" name="email" class="form-control" id="exampleInputEmail1">
		</div>
		<div class="mb-3">
			<label for="exampleInputPassword1" class="form-label">Mật khẩu</label>
			<input required type="password" name="password" class="form-control" id="exampleInputPassword1">
		</div>
		<div class="d-flex flex-wrap align-items-center justify-content-between">
			<button type="submit" name="submit" class="btn btn-primary">Đăng nhập!</button>
			<div>
				Bạn đã là thành viên chưa ? <a href="register.php">Đăng ký</a>
			</div>
		</div>
	</form>';
}

if ($error_message) {
	include '../partials/show_error.php';
}

include '../partials/footer.php';
