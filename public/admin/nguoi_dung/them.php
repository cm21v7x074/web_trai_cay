<?php
include '../../../partials/header_admin.php';

include '../../../partials/db_connect.php';

?>

<?php 
	if ( !(empty($_SESSION['user'])) && $_SESSION['role'] == 'admin' ) {
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			if (!empty($_POST['ten_nguoi_dung'])) {
				include '../../../partials/db_connect.php';
				$query = 'INSERT INTO nguoi_dung (ten_nguoi_dung,sdt_nguoi_dung,dia_chi,email,mat_khau) VALUE (?,?,?,?,?)';
				try {
					$statement = $pdo->prepare($query);
					$statement->execute([
						$_POST['ten_nguoi_dung'],
						$_POST['sdt_nguoi_dung'],
						$_POST['dia_chi'],
						$_POST['email'],
						$_POST['mat_khau']
					]);
				} catch (PDOException $e) {
					$pdo_error = $e->getMessage();
				}
		
				if ($statement && $statement->rowCount() == 1){
					echo '<h4 class="text-success p-3">Người Dùng đã được lưu!</h4>';
				} else {
					$error_message = 'Không thể lưu trữ Người Dùng!';
					$reason = $pdo_error ?? 'Không rõ nguyễn nhân';
					include '../../../partials/show_error.php';
				}
			} else {
				$error_message = 'Chưa nhập tên Người Dùng';
				include '../../../partials/show_error.php';
			}
		}
?>

<div class="row my-3">
    <div class="col-12">
		<h2>Thêm Người Dùng</h2>
    </div>
	<div class="col-12">
		<form method="post" action="them.php" class="mt-3">
			<div class="row">
				<div class="col-12 col-md-2">
					<label class="form-label">Tên tài khoản</label>
				</div>
				<div class="col-12 col-md-10">
					<input type="text" name="ten_nguoi_dung" value="" class="form-control mb-3">
				</div>
                <div class="col-12 col-md-2">
					<label class="form-label">Số điện thoại</label>
				</div>
				<div class="col-12 col-md-10">
					<input type="text" name="sdt_nguoi_dung" value="" class="form-control mb-3">
				</div>
                <div class="col-12 col-md-2">
					<label class="form-label">Địa chỉ</label>
				</div>
				<div class="col-12 col-md-10">
					<input type="text" name="dia_chi" value="" class="form-control mb-3">
				</div>
                <div class="col-12 col-md-2">
					<label class="form-label">Email</label>
				</div>
				<div class="col-12 col-md-10">
					<input type="text" name="email" value="" class="form-control mb-3">
				</div>
                <div class="col-12 col-md-2">
					<label class="form-label">Mật khẩu</label>
				</div>
				<div class="col-12 col-md-10">
					<input type="text" name="mat_khau" value="" class="form-control mb-3">
				</div>
			</div>
            <div class="row">
                <div class="col-12 col-md-2">
					<label class="form-label">&nbsp;</label>
				</div>
				<div class="col-12 col-md-10">
                    <button type="submit" class="btn btn-primary">Thêm</button>
				</div>
            </div>
			<input type="hidden" name="id" value="">
		</form>
	</div>
</div>

<?php } else { ?>

<div class="row my-3">
	<div class="col-12">
		<p>Bạn chưa đăng nhập!</p>
	</div>
</div>

<?php }

include '../../../partials/footer_admin.php';
