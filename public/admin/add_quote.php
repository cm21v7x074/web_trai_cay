<?php

define('TITLE', 'Thêm một Trích dẫn');
include '../../partials/header_admin.php';

echo '<h2>Thêm một Trích dẫn</h2>';

include '../../partials/check_admin.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	if (!empty($_POST['quote']) && !empty($_POST['source'])) {
		include '../../partials/db_connect.php';
		$query = 'INSERT INTO quotes (quote, source, favorite) VALUE (?, ?, ?)';
		try {
			$statement = $pdo->prepare($query);
			$statement->execute([
				$_POST['quote'],
				$_POST['source'],
				+ isset($_POST['favorite'])
			]);
		} catch (PDOException $e) {
			$pdo_error = $e->getMessage();
		}

		if ($statement && $statement->rowCount() == 1){
			echo '<p>Trích dẫn đã được lưu trữ!</p>';
		} else {
			$error_message = 'Không thể lưu trữ trích dẫn';
			$reason = $pdo_error ?? 'Không rõ nguyễn nhân';
			include '../../partials/show_error.php';
		}
	} else {
		$error_message = 'Chưa nhập đủ trích dẫn';
		include '../../partials/show_error.php';
	}
}

?>

<form action="add_quote.php" method="post">
	<p><label>Trích dẫn <textarea name="quote" rows="5" cols="30"></textarea></label></p>
	<p><label>Nguồn <input type="text" name="source"></label></p>
	<p><label>Đây là trích dẫn yêu thích? <input type="checkbox" name="favorite" value="yes"></label></p>
	<p><input type="submit" name="submit" value="Thêm Trích dẫn này!"></p>
</form>

<?php include '../../partials/footer_admin.php'; ?>