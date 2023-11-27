<?php
include '../../../partials/header_admin.php';

include '../../../partials/db_connect.php';

?>

<?php 
	if ( !(empty($_SESSION['user'])) && $_SESSION['role'] == 'admin' ) {
		if (isset($_GET['id']) && is_numeric($_GET['id']) && ($_GET['id'] > 0)) {
            $query = "SELECT * FROM nguoi_dung WHERE id={$_GET['id']}";
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
		<h2>Sửa Người Dùng</h2>
    </div>
	<div class="col-12">
		<form method="post" action="sua.php" class="mt-3">
			<div class="row">
				<div class="col-12 col-md-2">
					<label class="form-label">Tên tài khoản</label>
				</div>
				<div class="col-12 col-md-10">
					<input type="text" name="ten_nguoi_dung" value="<?php echo htmlspecialchars($row['ten_nguoi_dung']); ?>" class="form-control mb-3">
				</div>
                <div class="col-12 col-md-2">
					<label class="form-label">Số điện thoại</label>
				</div>
				<div class="col-12 col-md-10">
					<input type="text" name="sdt_nguoi_dung" value="<?php echo htmlspecialchars($row['sdt_nguoi_dung']); ?>" class="form-control mb-3">
				</div>
                <div class="col-12 col-md-2">
					<label class="form-label">Địa chỉ</label>
				</div>
				<div class="col-12 col-md-10">
					<input type="text" name="dia_chi" value="<?php echo htmlspecialchars($row['dia_chi']); ?>" class="form-control mb-3">
				</div>
                <div class="col-12 col-md-2">
					<label class="form-label">Email</label>
				</div>
				<div class="col-12 col-md-10">
					<input type="text" name="email" value="<?php echo htmlspecialchars($row['email']); ?>" class="form-control mb-3">
				</div>
                <div class="col-12 col-md-2">
					<label class="form-label">Mật khẩu</label>
				</div>
				<div class="col-12 col-md-10">
					<input type="text" name="mat_khau" value="<?php echo htmlspecialchars($row['mat_khau']); ?>" class="form-control mb-3">
				</div>
			</div>
            <div class="row">
                <div class="col-12 col-md-2">
					<label class="form-label">&nbsp;</label>
				</div>
				<div class="col-12 col-md-10">
                    <button type="submit" class="btn btn-primary">Sửa</button>
				</div>
            </div>
			<input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
		</form>
	</div>
</div>
            <?php } else {
                $error_message = 'Không thể lấy được Người Dùng';
                $reason = $pdo_error ?? 'Không rõ nguyễn nhân';
                include '../../../partials/show_error.php';
            }
        } else if (isset($_POST['id']) && is_numeric($_POST['id']) && ($_POST['id'] > 0)) {
            if (!empty($_POST['xuat_xu'])) {
                $query = 'UPDATE nguoi_dung SET ten_nguoi_dung=?, sdt_nguoi_dung=?, dia_chi=?, email=?, mat_khau=? WHERE id=?';
                try {
                    $statement = $pdo->prepare($query);
                    $statement->execute([
						$_POST['ten_nguoi_dung'],
						$_POST['sdt_nguoi_dung'],
						$_POST['dia_chi'],
                        $_POST['email'],
                        $_POST['mat_khau'],
						$_POST['id']
					]);
                    echo '<h4 class="text-success p-3">Người Dùng này đã được cập nhật!</h4><div><a class="btn btn-primary" href="index.php">Danh sách</a></div>';
                } catch (PDOException $e) {
                    $error_message = 'Không thể cập nhật Người Dùng này';
                    $reason = $e->getMessage();
                    include '../../../partials/show_error.php';
                }
            } else {
                $error_message = 'Chưa nhập đủ Người Dùng';
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
