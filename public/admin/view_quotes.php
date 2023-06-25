<?php

define('TITLE', 'Xem tất cả các Trích dẫn');
include '../../partials/header_admin.php';

echo '<h2>Tất cả các Trích dẫn</h2>';

include '../../partials/check_admin.php';

// echo '<p>Trang đang được xây dựng...</p>';
include '../../partials/db_connect.php';
$query = 'SELECT * FROM quotes ORDER BY date_entered DESC';

try {
    foreach ($pdo->query($query) as $row) {
        echo "<div><blockquote>" . htmlspecialchars($row['quote']) . "</blockquote>-" . htmlspecialchars($row['source']) . "<br>";
        if ($row['favorite'] == 1){
            echo '<strong>Yêu thích</strong>';
        }
        echo "<p><b>Quản trị Trích dẫn:<b> <a href='edit_quote.php?id={$row["id"]}'>Sửa</a> <a href='delete_quote.php?id={$row["id"]}'>Xóa</a></p></div><br>";
    }
} catch (PDOException $e) {
    $error_message = 'Không thể lấy dữ liệu';
    $reason = $e->getMessage();
    include '../../partials/show_error.php';
}

include '../../partials/footer_admin.php';
?>