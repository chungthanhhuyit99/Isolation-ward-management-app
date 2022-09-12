<?php
include "../db.php";
$id_user = $_POST['id_user'];

$check_exist = sqlsrv_num_rows(sqlsrv_query($conn,"SELECT * FROM NguoiDung WHERE IDNguoiDung = '$id_user'",  array(), array("Scrollable"=>"buffered")));
if ($check_exist == 0) {
    print_r( $check_exist, true);
}
else {
    $delete_nguoidung = sqlsrv_query($conn, "UPDATE NguoiDung SET TrangThai = 0 WHERE IDNguoiDung = '$id_user'");
    if ($delete_nguoidung === false) {
        die(print_r(sqlsrv_errors(), true));
    } else {
        echo json_encode("delete_true");
    }
}