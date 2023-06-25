<?php
include '../../../partials/header_admin.php';

include '../../../partials/db_connect.php';

?>

<?php 
	if ( (is_administrator() && (basename($_SERVER['PHP_SELF']) != 'logout.php')) || ! (empty($loggedin)) ) {
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			if (!empty($_POST['xuat_xu'])) {
				include '../../../partials/db_connect.php';
				$query = 'INSERT INTO nguon_goc (xuat_xu) VALUE (?)';
				try {
					$statement = $pdo->prepare($query);
					$statement->execute([
						$_POST['xuat_xu']
					]);
				} catch (PDOException $e) {
					$pdo_error = $e->getMessage();
				}
		
				if ($statement && $statement->rowCount() == 1){
					echo '<h4 class="text-success p-3">Nguồn Gốc đã được lưu!</h4>';
				} else {
					$error_message = 'Không thể lưu trữ Nguồn Gốc!';
					$reason = $pdo_error ?? 'Không rõ nguyễn nhân';
					include '../../../partials/show_error.php';
				}
			} else {
				$error_message = 'Chưa nhập tên Nguồn Gốc';
				include '../../../partials/show_error.php';
			}
		}
?>

<div class="row my-3">
    <div class="col-12">
		<h2>Thêm Nguồn Gốc</h2>
    </div>
	<div class="col-12">
		<form method="post" action="them.php" class="mt-3">
			<div class="row">
				<div class="col-12 col-md-2">
					<label class="form-label">Tên Nguồn Gốc</label>
				</div>
				<div class="col-12 col-md-10">
					<input type="text" name="xuat_xu" class="form-control mb-3">
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