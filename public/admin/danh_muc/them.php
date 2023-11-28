<?php
include '../../../partials/header_admin.php';

include '../../../partials/db_connect.php';

?>

<?php 
	if ( !(empty($_SESSION['user'])) && $_SESSION['role'] == 'admin' ) {
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			if (!empty($_POST['ten_danh_muc'])) {
				include '../../../partials/db_connect.php';
				$query = 'INSERT INTO danh_muc (ten_danh_muc) VALUE (?)';
				try {
					$statement = $pdo->prepare($query);
					$statement->execute([
						$_POST['ten_danh_muc']
					]);
				} catch (PDOException $e) {
					$pdo_error = $e->getMessage();
				}
		
				if ($statement && $statement->rowCount() == 1){
					echo '<h4 class="text-success p-3">Danh Mục đã được lưu!</h4>';
				} else {
					$error_message = 'Không thể lưu trữ Danh Mục!';
					$reason = $pdo_error ?? 'Không rõ nguyễn nhân';
					include '../../../partials/show_error.php';
				}
			} else {
				$error_message = 'Chưa nhập tên Danh Mục';
				include '../../../partials/show_error.php';
			}
		}
?>

<div class="row my-3">
    <div class="col-12">
		<h2>Thêm Danh Mục</h2>
    </div>
	<div class="col-12">
		<form method="post" action="them.php" class="mt-3">
			<div class="row">
				<div class="col-12 col-md-2">
					<label class="form-label">Tên Danh Mục</label>
				</div>
				<div class="col-12 col-md-10">
					<input type="text" name="ten_danh_muc" class="form-control mb-3">
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
