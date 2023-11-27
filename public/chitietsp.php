<?php
include '../partials/header.php';

include '../partials/db_connect.php';

// print_r($_SESSION);
$query = 'SELECT * FROM san_pham WHERE id='. $_GET['id'] .' ORDER BY id ASC';
$statement = $pdo->query($query);

$row = $statement->fetch();
if (!empty($row)) {
	$nguon_goc = 'SELECT * FROM nguon_goc WHERE id='. $row['id_nguon_goc'] .' ORDER BY id ASC';
	$statement_nguon_goc = $pdo->query($nguon_goc);
	$row_nguon_goc = $statement_nguon_goc->fetch();

	$loai_san_pham = 'SELECT * FROM loai_san_pham WHERE id='. $row['id_loai_san_pham'] .' ORDER BY id ASC';
	$statement_loai_san_pham = $pdo->query($loai_san_pham);
	$row_loai_san_pham = $statement_loai_san_pham->fetch();
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
			<h4 class="mt-4">Danh mục sản phẩm</h4>
			<div>
				<?php echo $row_loai_san_pham['ten'] ?>
			</div>
			<h4 class="mt-4">Nguồn gốc sản phẩm</h4>
			<div>
				<?php echo $row_nguon_goc['xuat_xu'] ?>
			</div>
			<h4 class="mt-4">Thông tin sản phẩm</h4>
			<div>
				<?php echo $row['noi_dung'] ?>
			</div>
		</div>
	</div>
</div>
<script>
	$(window).on("load", function () {
		$(document).on('click','#mua_ngay',function(e){
			var soluong = $(this).parent().find('input').val(), id_nguoi_dung = <?php echo $_SESSION['id'] ? $_SESSION['id'] : 0;  ?>;
			if (id_nguoi_dung == 0) {
				alert('Vui lòng đăng nhập để thêm vào giỏ hàng!');
				window.location.href = window.location.href = "<?php echo getBaseUrl(); ?>/public/login.php";;
				return false;
			}
			if (soluong > 0){
				$.ajax({
					type: "POST",
					url: 'ajax/gio_hang.php',
					data: {
						'soluong' : soluong,
						'id_nguoi_dung' : id_nguoi_dung,
						'id_san_pham' : <?php echo $_GET['id'] ?>
					},
					success: function(response)
					{
						var jsonData = JSON.parse(response);
						if (jsonData.success){
							$('.fruit-cart sup').html(jsonData.count);
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
