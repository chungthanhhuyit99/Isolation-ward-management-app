<?php
include "../db.php";
$IDGiuong = $_POST['id_g'];

$check_exist = sqlsrv_num_rows(sqlsrv_query($conn,"SELECT * FROM Giuong WHERE IDGiuong = '$IDGiuong'",  array(), array("Scrollable"=>"buffered")));

if ($check_exist == 1 ) {
    $update_Giuong=sqlsrv_query($conn,"UPDATE Giuong SET TinhTrang = 0 WHERE IDGiuong = '$IDGiuong';");
    if( $update_Giuong === false ) {
        die( print_r( sqlsrv_errors(), true));
    }else{
        echo  json_encode("true");
    }
}
else {
    print_r($check_exist, true);
}
