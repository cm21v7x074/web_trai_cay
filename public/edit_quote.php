<?php

define('TITLE', 'Sửa một Trích dẫn');
include '../partials/header.php';

echo '<h2>Sửa một Trích dẫn</h2>';

include '../partials/check_admin.php';

include '../partials/db_connect.php';

if (isset($_GET['id']) && is_numeric($_GET['id']) && ($_GET['id'] > 0)) {
    $query = "SELECT * FROM quotes WHERE id={$_GET['id']}";
    try {
        $statement = $pdo->query($query);
        $row = $statement->fetch();
    } catch (PDOException $e) {
        $pdo_error = $e->getMessage();
    }

    if (!empty($row)){
        echo '<form action="edit_quote.php" method="post">
            <p><label>Trích dẫn <textarea name="quote" rows="5" cols="30">'. htmlspecialchars($row['quote']) .'</textarea></label></p><p><label>Nguồn <input name="source" value="'. htmlspecialchars($row['source']) .'"></label></p><p><label>Đây là trích dẫn được yêu thích? <input type="checkbox" name="favorite" value="yes"';
            if ($row['favorite'] == 1){
                echo ' checked="checked"';
            }
        echo '/></label></p>
            <input type="hidden" name="id" value="'. $_GET['id'] .'" >
            <p><input type="submit" name="submit" value="Cập nhật Trích dẫn này!" ></p>
        </form>';
    } else {
        $error_message = 'Không thể lấy được trích dẫn';
        $reason = $pdo_error ?? 'Không rõ nguyễn nhân';
        include '../partials/show_error.php';
    }
} elseif (isset($_POST['id']) && is_numeric($_POST['id']) && ($_POST['id'] > 0)) {
    if (!empty($_POST['quote']) && !empty($_POST['source'])) {
        $query = 'UPDATE quotes SET quote=?, source=?, favorite=? WHERE id=?';
        try {
			$statement = $pdo->prepare($query);
			$statement->execute([
				$_POST['quote'],
				$_POST['source'],
				+ isset($_POST['favorite']),
                $_POST['id']
			]);
            echo 'Trích dẫn này đã được cập nhật';
		} catch (PDOException $e) {
			$error_message = 'Không thể cập nhật trích dẫn này';
            $reason = $e->getMessage();
		    include '../partials/show_error.php';
		}
    } else {
        $error_message = 'Chưa nhập đủ trích dẫn';
		include '../partials/show_error.php';
    }
} else {
    include '../partials/show_error.php';
}

include '../partials/footer.php';
?>