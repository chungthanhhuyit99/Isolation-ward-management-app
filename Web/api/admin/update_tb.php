<?php
include "../db.php";
$id_tb = $_POST['id_tb'];
$TieuDe = $_POST['TieuDe'];
$NgayDang = $_POST['NgayDang'];
$NoiDung = $_POST['NoiDung'];
$IDCanBo  = $_POST['id_cb'];


$check_exist = sqlsrv_num_rows(sqlsrv_query($conn,"SELECT * FROM ThongBao WHERE ID = '$id_tb'",  array(), array("Scrollable"=>"buffered")));
if ($check_exist > 0) {
    $update_tb=sqlsrv_query($conn,"UPDATE ThongBao SET TieuDe = N'$TieuDe', NgayDang = '$NgayDang', NoiDung = N'$NoiDung', IDCanBo = '$IDCanBo' WHERE ID = '$id_tb';");
    if( $update_tb === false ) {
        die( print_r( sqlsrv_errors(), true));
    }else{
        echo  json_encode("true");
    }
}
else {
    print_r( $check_exist, true);
}