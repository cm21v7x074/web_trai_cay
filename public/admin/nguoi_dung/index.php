<?php
include '../../../partials/header_admin.php';

include '../../../partials/db_connect.php';

?>

<?php
    if ( !(empty($_SESSION['user'])) && $_SESSION['role'] == 'admin' ) {
        $query = 'SELECT * FROM nguoi_dung WHERE role != "admin" ORDER BY id ASC';
?>

<div class="row my-3">
    <div class="col-12">
        <a class="btn btn-primary" href="them.php">Thêm</a>
    </div>
	<div class="col-12">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tên Tài Khoản</th>
                    <th scope="col">Email</th>
                    <th scope="col">SĐT</th>
                    <th scope="col">Hành Động</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($pdo->query($query) as $row) { ?>
                <tr>
                    <th scope="row"><?php echo $row['id']; ?></th>
                    <td><?php echo $row['ten_nguoi_dung']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['sdt_nguoi_dung']; ?></td>
                    <td>
                        <a class="btn btn-primary" href='sua.php?id=<?php echo $row["id"];?>'>Sửa</a>
                        <a class="btn btn-danger" href='xoa.php?id=<?php echo $row["id"];?>'>Xóa</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
	</div>
</div>

<?php } else { ?>

<div class="row my-3">
	<div class="col-12">
		<p>Bạn chưa đăng nhập!</p>
	</div>
</div>

<?php }

include '../../../partials/footer_admin.php';
