<?php
$soluong = intval($_POST['soluong']);
$id_nguoi_dung = intval($_POST['id_nguoi_dung']);
$id_san_pham = intval($_POST['id_san_pham']);

$con = mysqli_connect('localhost','root','');

if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

if (!empty($soluong) && !empty($id_nguoi_dung) && !empty($id_san_pham)) {
    mysqli_select_db($con,"web_trai_cay");

    $sql = 'INSERT INTO gio_hang (id_nguoi_dung, id_san_pham, so_luong) VALUE ("'. $id_nguoi_dung .'","'. $id_san_pham .'","'. $soluong .'")';

    $result = mysqli_query($con, $sql);
    echo json_encode(array('success' => true));
} else {
    echo json_encode(array('success' => false));
}

