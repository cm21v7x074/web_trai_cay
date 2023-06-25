<?php
include '../../../partials/header_admin.php';

include '../../../partials/db_connect.php';

?>

<?php 
	if ( !(empty($_SESSION['user'])) && $_SESSION['role'] == 'admin' ) {
		if (isset($_GET['id']) && is_numeric($_GET['id']) && ($_GET['id'] > 0)) {
            $query = "SELECT * FROM loai_san_pham WHERE id={$_GET['id']}";
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
		<h2>Sửa Loại Sản Phẩm</h2>
    </div>
	<div class="col-12">
		<form method="post" action="sua.php" class="mt-3">
			<div class="row">
				<div class="col-12 col-md-2">
					<label class="form-label">Sửa Loại Sản Phẩm</label>
				</div>
				<div class="col-12 col-md-10">
					<input type="text" name="ten" value="<?php echo htmlspecialchars($row['ten']); ?>" class="form-control mb-3">
					<button type="submit" class="btn btn-primary">Sửa</button>
				</div>
			</div>
			<input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
		</form>
	</div>
</div>
            <?php } else {
                $error_message = 'Không thể lấy được Loại Sản Phẩm';
                $reason = $pdo_error ?? 'Không rõ nguyễn nhân';
                include '../../../partials/show_error.php';
            }
        } else if (isset($_POST['id']) && is_numeric($_POST['id']) && ($_POST['id'] > 0)) {
            if (!empty($_POST['ten'])) {
                $query = 'UPDATE loai_san_pham SET ten=? WHERE id=?';
                try {
                    $statement = $pdo->prepare($query);
                    $statement->execute([
                        $_POST['ten'],
                        $_POST['id']
                    ]);
                    echo '<h4 class="text-success p-3">Loại Sản Phẩm này đã được cập nhật!</h4><div><a class="btn btn-primary" href="index.php">Danh sách</a></div>';
                } catch (PDOException $e) {
                    $error_message = 'Không thể cập nhật Loại Sản Phẩm này';
                    $reason = $e->getMessage();
                    include '../../../partials/show_error.php';
                }
            } else {
                $error_message = 'Chưa nhập đủ Loại Sản Phẩm';
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
