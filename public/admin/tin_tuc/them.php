<?php
include '../../../partials/header_admin.php';

include '../../../partials/db_connect.php';

?>

<?php 
	if ( !(empty($_SESSION['user'])) && $_SESSION['role'] == 'admin' ) {
		$danh_muc = 'SELECT * FROM danh_muc ORDER BY id ASC';
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			if ( !empty($_POST['tieu_de']) && !empty($_POST['id_danh_muc']) && !empty($_POST['noi_dung']) && !empty($_POST['hinh_anh']) ) {
				include '../../../partials/db_connect.php';
				$query = 'INSERT INTO tin_tuc (tieu_de, hinh_anh, noi_dung, id_danh_muc) VALUE (?, ?, ?, ?)';
				try {
					$statement = $pdo->prepare($query);
					$statement->execute([
						$_POST['tieu_de'],
						$_POST['hinh_anh'],
						$_POST['noi_dung'],
						$_POST['id_danh_muc']
					]);
				} catch (PDOException $e) {
					$pdo_error = $e->getMessage();
				}
		
				if ($statement && $statement->rowCount() == 1){
					echo '<h4 class="text-success p-3">Tin Tức đã được lưu!</h4>';
				} else {
					$error_message = 'Không thể lưu trữ Tin Tức!';
					$reason = $pdo_error ?? 'Không rõ nguyễn nhân';
					include '../../../partials/show_error.php';
				}
			} else {
				$error_message = 'Chưa nhập tên Tin Tức';
				include '../../../partials/show_error.php';
			}
		}
?>

<div class="row my-3">
    <div class="col-12">
		<h2>Thêm Tin Tức</h2>
    </div>
	<div class="col-12">
		<form method="post" action="them.php" class="mt-3">
			<div class="row">
				<div class="col-12 col-md-2">
					<label class="form-label">Tiêu Đề</label>
				</div>
				<div class="col-12 col-md-10">
					<input type="text" name="tieu_de" class="form-control mb-3">
				</div>
				<div class="col-12 col-md-2">
					<label class="form-label">Danh Mục</label>
				</div>
				<div class="col-12 col-md-10">
					<select required name="id_danh_muc" class="form-select mb-3" aria-label="Default select example">
						<option value="">Chọn danh mục</option>
						<?php 
							foreach ($pdo->query($danh_muc) as $data) {
								if ($data['id'] == $row['id_danh_muc']) {
						?>
							    <option selected="selected" value="<?php echo $data['id'] ?>"><?php echo $data['ten_danh_muc'] ?></option>
                            <?php } else { ?>
                                <option value="<?php echo $data['id'] ?>"><?php echo $data['ten_danh_muc'] ?></option>
                            <?php } ?>
						<?php } ?>
					</select>
				</div>
				<div class="col-12 col-md-2">
					<label class="form-label">Nội Dung</label>
				</div>
				<div class="col-12 col-md-10">
					<textarea class="form-control mb-3" name="noi_dung" id="" cols="30" rows="10"></textarea>
				</div>
				<div class="col-12 col-md-2">
					<label class="form-label">Hình ảnh</label>
				</div>
				<div class="col-12 col-md-10">
					<input required type="text" name="hinh_anh" class="form-control mb-3">
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
