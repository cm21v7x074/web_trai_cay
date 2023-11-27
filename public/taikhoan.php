<?php
include '../partials/header.php';

include '../partials/db_connect.php';

if ( !(empty($_SESSION['user'])) ) {
	$query = 'SELECT * FROM nguoi_dung WHERE id='. $_SESSION['id'] .' ORDER BY id ASC';
	$result = mysqli_query($con, $query);
	$row = mysqli_fetch_assoc($result);
?>
<div class="container mb-5">
	<div class="row">
		<div class="col-12">
			<nav aria-label="breadcrumb" class="py-3">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
				<li class="breadcrumb-item active" aria-current="page">Tài khoản`</li>
			</ol>
			</nav>
		</div>
	</div>
	<div class="row align-items-center">
		<div class="col-12">
			<form action="taikhoan.php" method="post">
				<div class="mb-3">
					<label for="" class="form-label">Tên tài khoản</label>
					<input disabled="disabled" type="text" name="ten_nguoi_dung" class="form-control" value="<?php echo $_POST['ten_nguoi_dung'] ? $_POST['ten_nguoi_dung'] :$row['ten_nguoi_dung']; ?>">
				</div>
				<div class="mb-3">
					<label for="" class="form-label">Email</label>
					<input disabled="disabled" type="email" name="email" class="form-control" value="<?php echo $_POST['email'] ? $_POST['email'] :$row['email']; ?>">
				</div>
				<div class="mb-3">
					<label for="" class="form-label">Số điện thoại</label>
					<input required type="text" name="sdt_nguoi_dung" class="form-control" value="<?php echo $_POST['sdt_nguoi_dung'] ? $_POST['sdt_nguoi_dung'] :$row['sdt_nguoi_dung']; ?>">
				</div>
				<div class="mb-3">
					<label for="" class="form-label">Địa chỉ</label>
					<input required type="text" name="dia_chi" class="form-control" value="<?php echo $_POST['dia_chi'] ? $_POST['dia_chi'] :$row['dia_chi']; ?>">
				</div>
				<div class="d-flex flex-wrap align-items-center justify-content-between">
					<input type="hidden" name="id" value="<?php echo $row['id']; ?>" >
					<button type="submit" class="btn btn-primary">Cập nhật</button>
				</div>
			</form>
		</div>
	</div>
	<?php
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			if (!empty($_POST['ten_nguoi_dung']) && !empty($_POST['sdt_nguoi_dung']) && !empty($_POST['dia_chi'])) {
				$query = 'UPDATE nguoi_dung SET ten_nguoi_dung=?, sdt_nguoi_dung=?, dia_chi=? WHERE id=?';
				try {
					$statement = $pdo->prepare($query);
					$statement->execute([
						$_POST['ten_nguoi_dung'],
						$_POST['sdt_nguoi_dung'],
						$_POST['dia_chi'],
						$_POST['id']
					]);
					echo '<div class="my-3 p-3 bg-success text-white ">Thông tin tài khoản đã được cập nhật!</div>';
				} catch (PDOException $e) {
					$error_message = 'Không thể cập nhật trích dẫn này';
					$reason = $e->getMessage();
					include '../../partials/show_error.php';
				}
			} else {
				$error_message = 'Hãy đảm bảo rằng bạn cung cấp đầy đủ địa chỉ email và mật khẩu!';
			}
		}
	?>
</div>
<?php } else { ?>
<div class="container">
	<div class="row">
		<div class="col-12 my-5 text-center">
			<h2>Vui lòng đăng nhập!</h2>
		</div>
	</div>
</div>
<?php
}

include '../partials/footer.php';
