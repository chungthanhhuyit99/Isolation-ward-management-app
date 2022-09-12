<?php
include "../db.php";
$id_pkb = $_GET['id'];

$check_exist = sqlsrv_num_rows(sqlsrv_query($conn,"SELECT * FROM PhieuKhamBenh WHERE IDPhieu = '$id_pkb'",  array(), array("Scrollable"=>"buffered")));
if ($check_exist == 0) {
    print_r( $check_exist, true);
}
else {
    $delete_pkb = sqlsrv_query($conn, "DELETE FROM PhieuKhamBenh WHERE IDPhieu = '$id_pkb'");
    if ($delete_pkb === false) {
        die(print_r(sqlsrv_errors(), true));
    } else {
        echo json_encode("delete_true");
    }
}
