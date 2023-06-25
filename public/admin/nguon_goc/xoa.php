<?php
include '../../../partials/header_admin.php';

include '../../../partials/db_connect.php';

?>

<?php 
	if ( (is_administrator() && (basename($_SERVER['PHP_SELF']) != 'logout.php')) || ! (empty($loggedin)) ) {
		if (isset($_GET['id']) && is_numeric($_GET['id']) && ($_GET['id'] > 0)) {
            $query = "SELECT * FROM nguon_goc WHERE id={$_GET['id']}";
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
		<h2>Xóa Nguồn Gốc</h2>
    </div>
	<div class="col-12">
		<form method="post" action="xoa.php" class="mt-3">
			<div class="row">
				<div class="col-12 col-md-2">
					<label class="form-label">Bạn có muốn xóa Nguồn Gốc này?</label>
				</div>
				<div class="col-12 col-md-10">
					<input type="text" disabled="disabled" name="xuat_xu" value="<?php echo htmlspecialchars($row['xuat_xu']); ?>" class="form-control mb-3">
					<button type="submit" class="btn btn-primary">Xóa</button>
				</div>
			</div>
			<input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
		</form>
	</div>
</div>
            <?php } else {
                $error_message = 'Không thể lấy được Nguồn Gốc';
                $reason = $pdo_error ?? 'Không rõ nguyễn nhân';
                include '../../../partials/show_error.php';
            }
        } else if (isset($_POST['id']) && is_numeric($_POST['id']) && ($_POST['id'] > 0)) {
            $query = "DELETE FROM nguon_goc WHERE id={$_POST['id']}";

            try {
                $statement = $pdo->query($query);
            } catch (PDOException $e) {
                $pdo_error = $e->getMessage();
            }
        
            if ($statement && $statement->rowCount() == 1){
                echo '<h4 class="text-success p-3">Nguồn Gốc này đã được xóa!</h4><div><a class="btn btn-primary" href="index.php">Danh sách</a></div>';
            } else {
                $error_message = 'Không thể xóa Nguồn Gốc';
                $reason = $pdo_error ?? 'Không rõ nguyễn nhân';
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
