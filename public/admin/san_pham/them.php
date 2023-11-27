<?php
include '../../../partials/header_admin.php';

include '../../../partials/db_connect.php';

?>

<?php 
	if ( !(empty($_SESSION['user'])) && $_SESSION['role'] == 'admin' ) {
		$gia_khuyen_mai = 0;
		$nguon_goc = 'SELECT * FROM nguon_goc ORDER BY id ASC';
		$loai_san_pham = 'SELECT * FROM loai_san_pham ORDER BY id ASC';
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			if (!empty($_POST['ten_san_pham']) && !empty($_POST['can_nang']) && !empty($_POST['gia_tien']) && !empty($_POST['id_nguon_goc']) && !empty($_POST['id_loai_san_pham'])) {
				if ( !empty($_POST['gia_khuyen_mai']) ) $gia_khuyen_mai = $_POST['gia_khuyen_mai'];
				include '../../../partials/db_connect.php';
				$query = 'INSERT INTO san_pham (ten_san_pham, can_nang, gia_tien, id_nguon_goc, id_loai_san_pham, hinh_anh, gia_khuyen_mai, noi_dung) VALUE (?,?,?,?,?,?,?,?)';
				try {
					$statement = $pdo->prepare($query);
					$statement->execute([
						$_POST['ten_san_pham'],
						$_POST['can_nang'],
						$_POST['gia_tien'],
						$_POST['id_nguon_goc'],
						$_POST['id_loai_san_pham'],
						$_POST['hinh_anh'],
						$gia_khuyen_mai,
						$_POST['noi_dung']
					]);
				} catch (PDOException $e) {
					$pdo_error = $e->getMessage();
				}
		
				if ($statement && $statement->rowCount() == 1){
					echo '<h4 class="text-success p-3">Sản Phẩm đã được lưu!</h4>';
				} else {
					$error_message = 'Không thể lưu trữ Sản Phẩm!';
					$reason = $pdo_error ?? 'Không rõ nguyễn nhân';
					include '../../../partials/show_error.php';
				}
			} else {
				$error_message = 'Chưa nhập tên Sản Phẩm';
				include '../../../partials/show_error.php';
			}
		}
?>

<div class="row my-3">
    <div class="col-12">
		<h2>Thêm Sản Phẩm</h2>
    </div>
	<div class="col-12">
		<form method="post" action="them.php" class="mt-3">
			<div class="row">
				<div class="col-12 col-md-2">
					<label class="form-label">Tên Sản Phẩm</label>
				</div>
				<div class="col-12 col-md-10">
					<input required type="text" name="ten_san_pham" class="form-control mb-3">
				</div>
				<div class="col-12 col-md-2">
					<label class="form-label">Cân nặng</label>
				</div>
				<div class="col-12 col-md-10">
					<input required type="text" name="can_nang" class="form-control mb-3">
				</div>
				<div class="col-12 col-md-2">
					<label class="form-label">Giá tiền</label>
				</div>
				<div class="col-12 col-md-10">
					<input required type="text" name="gia_tien" class="form-control mb-3">
				</div>
				<div class="col-12 col-md-2">
					<label class="form-label">Giá khuyến mãi</label>
				</div>
				<div class="col-12 col-md-10">
					<input type="text" name="gia_khuyen_mai" class="form-control mb-3">
				</div>
				<div class="col-12 col-md-2">
					<label class="form-label">Nguồn gốc</label>
				</div>
				<div class="col-12 col-md-10">
					<select required name="id_nguon_goc" class="form-select mb-3" aria-label="Default select example">
						<option value="">Chọn nguồn gốc</option>
						<?php foreach ($pdo->query($nguon_goc) as $row) { ?>
							<option value="<?php echo $row['id'] ?>"><?php echo $row['xuat_xu'] ?></option>
						<?php } ?>
					</select>
				</div>
				<div class="col-12 col-md-2">
					<label class="form-label">Loại sản phẩm</label>
				</div>
				<div class="col-12 col-md-10">
					<select required name="id_loai_san_pham" class="form-select mb-3" aria-label="Default select example">
						<option value="">Chọn loại sản phẩm</option>
						<?php foreach ($pdo->query($loai_san_pham) as $row) { ?>
							<option value="<?php echo $row['id'] ?>"><?php echo $row['ten'] ?></option>
						<?php } ?>
					</select>
				</div>
				<div class="col-12 col-md-2">
					<label class="form-label">Hình ảnh</label>
				</div>
				<div class="col-12 col-md-10">
					<input required type="text" name="hinh_anh" class="form-control mb-3">
				</div>
				<div class="col-12 col-md-2">
					<label class="form-label">Nội dung</label>
				</div>
				<div class="col-12 col-md-10">
					<textarea class="form-control mb-3" name="noi_dung" id="" cols="30" rows="10"></textarea>
				</div>
				<div class="col-12 col-md-2"></div>
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
