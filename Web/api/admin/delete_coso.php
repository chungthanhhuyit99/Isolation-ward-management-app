<?php
include "../db.php";
$MaCoSo = $_POST['id_cs'];

$check_exist = sqlsrv_num_rows(sqlsrv_query($conn,"SELECT * FROM CoSo WHERE MaCoSo = '$MaCoSo'",  array(), array("Scrollable"=>"buffered")));

if ($check_exist == 1 ) {
    $update_CoSo=sqlsrv_query($conn,"UPDATE CoSo SET TrangThai = 0 WHERE MaCoSo = '$MaCoSo';");
    if( $update_CoSo === false ) {
        die( print_r( sqlsrv_errors(), true));
    }else{
        echo  json_encode("true");
    }
}
else {
    print_r( $check_exist, true);
}
