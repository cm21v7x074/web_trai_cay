<?php
include '../partials/header.php';

include '../partials/db_connect.php';

$loai_san_pham = 'SELECT * FROM loai_san_pham ORDER BY id ASC';
?>

<?php 
	foreach ($pdo->query($loai_san_pham) as $data) {
		$sanpham = 'SELECT * FROM san_pham WHERE id_loai_san_pham='. $data['id'] .' ORDER BY id ASC';
?>
	<div class="my-2">
		<h2 class="py-2"><?php echo $data['ten']; ?></h2>
		<div class="row">
			<?php foreach ($pdo->query($sanpham) as $row) { ?>
				<div class="col-6 col-md-3">
					<a class="link-success" href="chitietsp.php?id=<?php echo $row['id']; ?>">
						<img class="img-fluid" src="<?php echo $row['hinh_anh']; ?>" alt="">
						<h3 class="my-2"><?php echo $row['ten_san_pham']; ?></h3>
						<p><?php echo number_format($row['gia_tien'], 0, '', ','); ?> VNĐ</p>
					</a>
				</div>
			<?php } ?>
		</div>
	</div>
<?php } ?>

<?php
if (!empty($row)) {
	// $htmlspecialchars = 'htmlspecialchars';
	// echo "<div><blockquote>{$htmlspecialchars($row['quote'])}</blockquote>- 
	// 		{$htmlspecialchars($row['source'])}<br>";

	// if ($row['favorite'] == 1) {
	// 	echo ' <strong>Yêu thích!</strong>';
	// }

	// echo '</div>';

	// if (is_administrator()) {
	// 	echo "<p><b>Quản trị Trích dẫn:</b> <a href=\"edit_quote.php?id={$row['id']}\">Sửa</a> <->
	// 		<a href=\"delete_quote.php?id={$row['id']}\">Xóa</a>
	// 		</p><br>";
	// }
} else if (isset($pdo_error)) {
	$error_message = 'Không thể lấy dữ liệu';
	$reason = $pdo_error;
	include '../partials/show_error.php';
}

include '../partials/footer.php';
