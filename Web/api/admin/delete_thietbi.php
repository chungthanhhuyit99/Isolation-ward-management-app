<?php
include "../db.php";
$id_thietbi = $_POST['id'];
var_dump($id_thietbi);

$check_exist = sqlsrv_num_rows(sqlsrv_query($conn,"SELECT * FROM ThietBi WHERE IDThietBi = '$id_thietbi'",  array(), array("Scrollable"=>"buffered")));
if ($check_exist == 0) {
    print_r( $check_exist, true);
}
else {
    $delete_thietbi = sqlsrv_query($conn, "DELETE FROM ThietBi WHERE IDThietBi = '$id_thietbi'");
    if ($delete_thietbi === false) {
        die(print_r(sqlsrv_errors(), true));
    } else {
        echo json_encode("delete_true");
    }
}
