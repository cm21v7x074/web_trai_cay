<?php
include '../../../partials/header_admin.php';

include '../../../partials/db_connect.php';

?>

<?php 
	if ( !(empty($_SESSION['user'])) && $_SESSION['role'] == 'admin' ) {
		if (isset($_GET['id']) && is_numeric($_GET['id']) && ($_GET['id'] > 0)) {
            $nguon_goc = 'SELECT * FROM nguon_goc ORDER BY id ASC';
		    $loai_san_pham = 'SELECT * FROM loai_san_pham ORDER BY id ASC';
            $query = "SELECT * FROM san_pham WHERE id={$_GET['id']}";
            try {
                $statement = $pdo->query($query);
                $row = $statement->fetch();
            } catch (PDOException $e) {
                $pdo_error = $e->getMessage();
            }

			if (!empty($row)) {
?>

<div class="row my-3">
    <div class="col-12">
		<h2>Sửa Sản Phẩm</h2>
    </div>
	<div class="col-12">
    <form method="post" action="sua.php" class="mt-3">
			<div class="row">
				<div class="col-12 col-md-2">
					<label class="form-label">Sửa Sản Phẩm</label>
				</div>
				<div class="col-12 col-md-10">
					<input required type="text" value="<?php echo htmlspecialchars($row['ten_san_pham']); ?>" name="ten_san_pham" class="form-control mb-3">
				</div>
				<div class="col-12 col-md-2">
					<label class="form-label">Cân nặng</label>
				</div>
				<div class="col-12 col-md-10">
                    <input required type="text" value="<?php echo htmlspecialchars($row['can_nang']); ?>" name="can_nang" class="form-control mb-3">
				</div>
				<div class="col-12 col-md-2">
					<label class="form-label">Giá tiền</label>
				</div>
				<div class="col-12 col-md-10">
                    <input required type="text" value="<?php echo htmlspecialchars($row['gia_tien']); ?>" name="gia_tien" class="form-control mb-3">
				</div>
				<div class="col-12 col-md-2">
					<label class="form-label">Giá khuyến mãi</label>
				</div>
				<div class="col-12 col-md-10">
                    <input type="text" value="<?php echo htmlspecialchars($row['gia_khuyen_mai']); ?>" name="gia_khuyen_mai" class="form-control mb-3">
				</div>
				<div class="col-12 col-md-2">
					<label class="form-label">Nguồn gốc</label>
				</div>
				<div class="col-12 col-md-10">
					<select required name="id_nguon_goc" class="form-select mb-3" aria-label="Default select example">
						<option value="">Chọn nguồn gốc</option>
						<?php 
                            foreach ($pdo->query($nguon_goc) as $data) {
                                if ($data['id'] == $row['id_nguon_goc']) {
                        ?>
							    <option selected="selected" value="<?php echo $data['id'] ?>"><?php echo $data['xuat_xu'] ?></option>
                            <?php } else { ?>
                                <option value="<?php echo $data['id'] ?>"><?php echo $data['xuat_xu'] ?></option>
                            <?php } ?>
						<?php } ?>
					</select>
				</div>
				<div class="col-12 col-md-2">
					<label class="form-label">Loại sản phẩm</label>
				</div>
				<div class="col-12 col-md-10">
                    <select required name="id_loai_san_pham" class="form-select mb-3" aria-label="Default select example">
						<option value="">Chọn nguồn gốc</option>
						<?php 
                            foreach ($pdo->query($loai_san_pham) as $data) {
                                if ($data['id'] == $row['id_loai_san_pham']) {
                        ?>
							    <option selected="selected" value="<?php echo $data['id'] ?>"><?php echo $data['ten'] ?></option>
                            <?php } else { ?>
                                <option value="<?php echo $data['id'] ?>"><?php echo $data['ten'] ?></option>
                            <?php } ?>
						<?php } ?>
					</select>
				</div>
                <div class="col-12 col-md-2">
					<label class="form-label">Hình ảnh</label>
				</div>
				<div class="col-12 col-md-10">
                    <input type="text" value="<?php echo htmlspecialchars($row['hinh_anh']); ?>" name="hinh_anh" class="form-control mb-3">
				</div>
				<div class="col-12 col-md-2">
					<label class="form-label">Nội dung</label>
				</div>
				<div class="col-12 col-md-10">
					<textarea class="form-control mb-3" name="noi_dung" cols="30" rows="10"><?php echo htmlspecialchars($row['noi_dung']); ?></textarea>
				</div>
				<div class="col-12 col-md-2"></div>
				<div class="col-12 col-md-10">
					<button type="submit" class="btn btn-primary">Sửa</button>
				</div>
			</div>
            <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
		</form>
	</div>
</div>
            <?php } else {
                $error_message = 'Không thể lấy được Sản Phẩm';
                $reason = $pdo_error ?? 'Không rõ nguyễn nhân';
                include '../../../partials/show_error.php';
            }
        } else if (isset($_POST['id']) && is_numeric($_POST['id']) && ($_POST['id'] > 0)) {
            if (!empty($_POST['ten_san_pham']) && !empty($_POST['can_nang']) && !empty($_POST['gia_tien']) && !empty($_POST['id_nguon_goc']) && !empty($_POST['id_loai_san_pham'])) {
                $query = 'UPDATE san_pham SET ten_san_pham=?, can_nang=?, gia_tien=?, id_nguon_goc=?, id_loai_san_pham=?, hinh_anh=?, gia_khuyen_mai=?, noi_dung=? WHERE id=?';
                try {
                    $statement = $pdo->prepare($query);
                    $statement->execute([
                        $_POST['ten_san_pham'],
                        $_POST['can_nang'],
                        $_POST['gia_tien'],
                        $_POST['id_nguon_goc'],
                        $_POST['id_loai_san_pham'],
                        $_POST['hinh_anh'],
                        $_POST['gia_khuyen_mai'],
						$_POST['noi_dung'],
                        $_POST['id']
                    ]);
                    echo '<h4 class="text-success p-3">Sản Phẩm này đã được cập nhật!</h4><div><a class="btn btn-primary" href="index.php">Danh sách</a></div>';
                } catch (PDOException $e) {
                    $error_message = 'Không thể cập nhật Sản Phẩm này';
                    $reason = $e->getMessage();
                    include '../../../partials/show_error.php';
                }
            } else {
                $error_message = 'Chưa nhập đủ Sản Phẩm';
                include '../../../partials/show_error.php';
            }
        }
} else { ?>

<div class="row my-3">
	<div class="col-12">
		<p>Bạn chưa đăng nhập!</p>
	</div>
</div>

<?php }

include '../../../partials/footer_admin.php';
