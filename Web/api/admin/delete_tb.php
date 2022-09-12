<?php
include "../db.php";
$id_tb = $_POST['id'];
var_dump($id_tb);

$check_exist = sqlsrv_num_rows(sqlsrv_query($conn,"SELECT * FROM ThongBao WHERE ID = '$id_tb'",  array(), array("Scrollable"=>"buffered")));
if ($check_exist == 0) {
    print_r( $check_exist, true);
}
else {
    $delete_tb = sqlsrv_query($conn, "DELETE FROM ThongBao WHERE ID = '$id_tb'");
    if ($delete_tb === false) {
        die(print_r(sqlsrv_errors(), true));
    } else {
        echo json_encode("update_user_true");
    }
}
