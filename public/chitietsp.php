<?php
include '../partials/header.php';

include '../partials/db_connect.php';

// print_r($_SESSION);
$query = 'SELECT * FROM san_pham WHERE id='. $_GET['id'] .' ORDER BY id ASC';
$statement = $pdo->query($query);
$row = $statement->fetch();
if (!empty($row)) {
?>

<div class="my-4">
	<div class="row">
		<div class="col-12 col-md-6">
			<img class="img-fluid" src="<?php echo $row['hinh_anh']; ?>" alt="">
		</div>
		<div class="col-12 col-md-6 d-flex align-items-center">
			<div class="w-100">
				<?php if ($row['gia_khuyen_mai']) { ?>
					<h3 class="text-danger"><?php echo number_format($row['gia_khuyen_mai'], 0, '', ','); ?> VNĐ</h3>
				<?php } else { ?>
					<h3 class="text-danger"><?php echo number_format($row['gia_tien'], 0, '', ','); ?> VNĐ</h3>
				<?php } ?>
				<form class="d-flex mua-ngay">
					<input class="form-control me-3" type="number" value="1" name="soluong" />
					<button id="mua_ngay" class="btn btn-primary">Mua ngay</button>
				</form>
			</div>
		</div>
	</div>
	<div class="row mt-4">
		<div class="col-12">
			<h1><?php echo $row['ten_san_pham'] ?></h1>
			<h3>Thông tin sản phẩm</h3>
			<div>
				<?php echo $row['noi_dung'] ?>
			</div>
		</div>
	</div>
</div>
<script>
	$(window).on("load", function () {
		$(document).on('click','#mua_ngay',function(e){
			var soluong = $(this).parent().find('input').val();
			if (soluong > 0){
				$.ajax({
					type: "POST",
					url: 'ajax/gio_hang.php',
					data: {
						'soluong' : soluong,
						'id_nguoi_dung' : <?php echo $_SESSION['id'] ?>,
						'id_san_pham' : <?php echo $_GET['id'] ?>
					},
					success: function(response)
					{
						var jsonData = JSON.parse(response);
						if (jsonData.success){
							alert('Thêm giỏ hàng thành công!');
						} else {
							alert('Thêm giỏ hàng thất bại!');
						}
					}
				});
			}
			e.preventDefault();
		});
	});
</script>

<?php
} else if (isset($pdo_error)) {
	$error_message = 'Không thể lấy dữ liệu';
	$reason = $pdo_error;
	include '../partials/show_error.php';
}

include '../partials/footer.php';
