<?php

define('TITLE', 'Xóa một Trích dẫn');
include '../../partials/header_admin.php';

echo '<h2>Xóa một Trích dẫn</h2>';

include '../../partials/check_admin.php';

include '../../partials/db_connect.php';

if (isset($_GET['id']) && is_numeric($_GET['id']) && ($_GET['id'] > 0)) {
    $query = "SELECT * FROM quotes WHERE id={$_GET['id']}";
    try {
        $statement = $pdo->query($query);
        $row = $statement->fetch();
    } catch (PDOException $e) {
        $pdo_error = $e->getMessage();
    }

    if (!empty($row)){
        echo '<form action="delete_quote.php" method="post">
            <p>Bạn có muốn xóa trích dẫn này?</p>
            <div><blockquote>'. htmlspecialchars($row['quote']) .'</blockquote> - '. htmlspecialchars($row['source']);
            if ($row['favorite'] == 1){
                echo ' <strong>Yêu thích!</strong>';
            }
        echo '</div><br>
            <input type="hidden" name="id" value="'. $_GET['id'] .'" >
            <p><input type="submit" name="submit" value="Xóa Trích dẫn này!" ></p>
        </form>';
    } else {
        $error_message = 'Không thể lấy được trích dẫn';
        $reason = $pdo_error ?? 'Không rõ nguyễn nhân';
        include '../../partials/show_error.php';
    }
} elseif (isset($_POST['id']) && is_numeric($_POST['id']) && ($_POST['id'] > 0)) {
    $query = "DELETE FROM quotes WHERE id={$_POST['id']}";

    try {
        $statement = $pdo->query($query);
    } catch (PDOException $e) {
        $pdo_error = $e->getMessage();
    }

    if ($statement && $statement->rowCount() == 1){
        echo '<p>Trích dẫn đã được xóa!</p>';
    } else {
        $error_message = 'Không thể xóa trích dẫn';
        $reason = $pdo_error ?? 'Không rõ nguyễn nhân';
        include '../../partials/show_error.php';
    }
} else {
    include '../../partials/show_error.php';
}

include '../../partials/footer_admin.php';
?>