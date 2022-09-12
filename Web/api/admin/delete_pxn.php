<?php
include "../db.php";
$id_pxn = $_POST['id'];
var_dump($id_pxn);

$check_exist = sqlsrv_num_rows(sqlsrv_query($conn,"SELECT * FROM PhieuXetNghiem WHERE IDPhieu = '$id_pxn'",  array(), array("Scrollable"=>"buffered")));
if ($check_exist == 0) {
    print_r( $check_exist, true);
}
else {
    $delete_pxn = sqlsrv_query($conn, "DELETE FROM PhieuXetNghiem WHERE IDPhieu = '$id_pxn'");
    if ($delete_pxn === false) {
        die(print_r(sqlsrv_errors(), true));
    } else {
        echo json_encode("update_user_true");
    }
}
