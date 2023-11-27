<?php
include '../partials/header.php';

include '../partials/db_connect.php';

$loai_san_pham = 'SELECT * FROM loai_san_pham ORDER BY id ASC';
?>

<div id="carouselExample" class="carousel slide">
	<div class="carousel-inner">
		<div class="carousel-item active">
			<img src="img/banner-web.png" class="d-block w-100" alt="img/banner-web.png">
		</div>
		<div class="carousel-item">
			<img src="img/website-2.png" class="d-block w-100" alt="img/website-2.png">
		</div>
	</div>
	<button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
	<span class="carousel-control-prev-icon" aria-hidden="true"></span>
	<span class="visually-hidden">Previous</span>
	</button>
	<button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
	<span class="carousel-control-next-icon" aria-hidden="true"></span>
	<span class="visually-hidden">Next</span>
	</button>
</div>

<?php 
	foreach ($pdo->query($loai_san_pham) as $data) {
		$sanpham = 'SELECT * FROM san_pham WHERE id_loai_san_pham='. $data['id'] .' ORDER BY id ASC';
?>
	<div class="my-3">
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

	
} else if (isset($pdo_error)) {
	$error_message = 'Không thể lấy dữ liệu';
	$reason = $pdo_error;
	include '../partials/show_error.php';
}

include '../partials/footer.php';
