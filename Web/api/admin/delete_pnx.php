<?php
include "../db.php";
$id_pnx = $_POST['id'];
var_dump($id_pnx);

$check_exist = sqlsrv_num_rows(sqlsrv_query($conn,"SELECT * FROM PhieuNhapXuat WHERE IDPhieu = '$id_pnx'",  array(), array("Scrollable"=>"buffered")));
if ($check_exist == 0) {
    print_r( $check_exist, true);
}
else {
    $delete_pnx = sqlsrv_query($conn, "DELETE FROM PhieuNhapXuat WHERE IDPhieu = '$id_pnx'");
    if ($delete_pnx === false) {
        die(print_r(sqlsrv_errors(), true));
    } else {
        echo json_encode("delete_true");
    }
}
