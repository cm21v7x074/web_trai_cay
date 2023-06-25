<?php
include '../partials/header.php';

include '../partials/db_connect.php';

// if (isset($_GET['random'])) {
// 	$query = 'SELECT id, quote, source, favorite FROM quotes ORDER BY RAND() DESC LIMIT 1';
// } elseif (isset($_GET['favorite'])) {
// 	$query = 'SELECT id, quote, source, favorite FROM quotes WHERE favorite=1 ORDER BY RAND() DESC LIMIT 1';
// } else {
// 	$query = 'SELECT id, quote, source, favorite FROM quotes ORDER BY date_entered DESC LIMIT 1';
// }

// try {
// 	$sth = $pdo->query($query);
// 	$row = $sth->fetch();
// } catch (PDOException $e) {
// 	$pdo_error = $e->getMessage();
// }
?>

<div class="my-2">
	<div class="row">
		<div class="col-12 col-md-6">
			<img class="img-fluid" src="https://cdn.tgdd.vn/Products/Images/8788/223091/bhx/le-duong-tui-1kg-4-6-trai-202211040848115718.jpg" alt="">
		</div>
		<div class="col-12 col-md-6 d-flex align-items-center">
			<div class="w-100">
				<h3 class="text-danger">44.850₫</h3>
				<form class="d-flex mua-ngay" action="">
					<input class="form-control me-3" type="number" value="1" name="soluong" />
					<button class="btn btn-primary">Mua ngay</button>
				</form>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-12">
			<h1>Lê</h1>
			<h2>Thông tin sản phẩm</h2>
			<div>
				Táo gala là trái cây nhập khẩu 100% từ New Zealand. Đạt tiêu chuẩn xuất khẩu toàn cầu. Bảo quản tươi ngon đến tận tay khách hàng. Táo gala ngon nhất khi có lớp vỏ màu đỏ đậm, táo còn cứng, không bị dập.
			</div>
			<h3>Ưu điểm khi mua táo gala tại Bách hoá XANH</h3>
			<p>Táo gala có lượng dưỡng chất dồi dào, vị giòn ngọt, thanh mát, trái nhỏ. Táo Gala nhập khẩu New Zealand là trái cây nhập khẩu chất lượng an toàn, vừa tiết kiệm về giá, lại vừa vặn cho một lần ăn mà không gây ngán, không phải dự trữ lại.</p>
			<p>Táo tươi ngon, không bị dập, 1kg khoảng 5-7 trái. Táo được đóng gói bằng hộp nhựa trong giúp bảo quản tốt hơn, tránh bị dập.</p>
			<p>Đặt giao hàng nhanh</p>
			<h3>Giá trị dinh dưỡng của táo gala</h3>
			<p>Táo gala có lớp vỏ giàu chất xơ, thịt táo giàu vitamin A, vitamin C, vitamin B1, vitamin B2,...tốt cho sức khỏe.</p>
			<p>Trong 100g táo gala có khoảng 52 calo.</p>
			<p><strong>Lưu ý:</strong> Sản phẩm nhận được có thể khác với hình ảnh về màu sắc và số lượng nhưng vẫn đảm bảo về mặt khối lượng và chất lượng.</p>
		</div>
	</div>
</div>

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
