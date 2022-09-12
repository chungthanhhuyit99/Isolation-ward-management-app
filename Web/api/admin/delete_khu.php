<?php
include "../db.php";
$MaKhu = $_POST['id_k'];

$check_exist = sqlsrv_num_rows(sqlsrv_query($conn,"SELECT * FROM Khu WHERE MaKhu = '$MaKhu'",  array(), array("Scrollable"=>"buffered")));

if ($check_exist == 1 ) {
    $update_Khu=sqlsrv_query($conn,"UPDATE Khu SET TrangThai = 0 WHERE MaKhu = '$MaKhu';");
    if( $update_Khu === false ) {
        die( print_r( sqlsrv_errors(), true));
    }else{
        echo  json_encode("true");
    }
}
else {
    print_r($check_exist, true);
}
