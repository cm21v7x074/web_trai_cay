<?php

define('TITLE', 'Logout');
include '../partials/header.php';

if (isset($_SESSION['user'])) {
	unset($_SESSION['user']);
	unset($_SESSION['id']);
}

echo '<p>Bạn đã đăng xuất.</p>';
?>
<script>
	$(window).on('load',function(){
		setTimeout(function(){
			window.location.href = "<?php echo getBaseUrl(); ?>/public/index.php";
		}, 2000);
	});
</script>
<?php
include '../partials/footer.php';
?>