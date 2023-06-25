<?php
include '../../partials/header_admin.php';

include '../../partials/db_connect.php';

?>

<?php if ( (is_administrator() && (basename($_SERVER['PHP_SELF']) != 'logout.php'))
		|| ! (empty($loggedin)) ) { ?>

<div class="row my-3">
	<div class="col-12">
		<p>Bạn đã đăng nhập!</p>
	</div>
</div>

<?php } else { ?>

<div class="row my-3">
	<div class="col-12">
		<p>Bạn chưa đăng nhập!</p>
	</div>
</div>

<?php }

include '../../partials/footer_admin.php';
