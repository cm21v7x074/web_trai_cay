<?php
include '../../../partials/header_admin.php';

include '../../../partials/db_connect.php';

?>

<?php 
	if ( !(empty($_SESSION['user'])) && $_SESSION['role'] == 'admin' ) {
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			if (!empty($_POST['ten'])) {
				include '../../../partials/db_connect.php';
				$query = 'INSERT INTO loai_san_pham (ten) VALUE (?)';
				try {
					$statement = $pdo->prepare($query);
					$statement->execute([
						$_POST['ten']
					]);
				} catch (PDOException $e) {
					$pdo_error = $e->getMessage();
				}
		
				if ($statement && $statement->rowCount() == 1){
					echo '<h4 class="text-success p-3">Loại Sản Phẩm đã được lưu!</h4>';
				} else {
					$error_message = 'Không thể lưu trữ Loại Sản Phẩm!';
					$reason = $pdo_error ?? 'Không rõ nguyễn nhân';
					include '../../../partials/show_error.php';
				}
			} else {
				$error_message = 'Chưa nhập tên Loại Sản Phẩm';
				include '../../../partials/show_error.php';
			}
		}
?>

<div class="row my-3">
    <div class="col-12">
		<h2>Thêm Loại Sản Phẩm</h2>
    </div>
	<div class="col-12">
		<form method="post" action="them.php" class="mt-3">
			<div class="row">
				<div class="col-12 col-md-2">
					<label class="form-label">Tên Loại Sản Phẩm</label>
				</div>
				<div class="col-12 col-md-10">
					<input type="text" name="ten" class="form-control mb-3">
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
