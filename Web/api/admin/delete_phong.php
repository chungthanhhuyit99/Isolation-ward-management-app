<?php
include "../db.php";
$IDPhong = $_POST['id_p'];

$check_exist = sqlsrv_num_rows(sqlsrv_query($conn,"SELECT * FROM Phong WHERE IDPhong = '$IDPhong'",  array(), array("Scrollable"=>"buffered")));

if ($check_exist == 1 ) {
    $update_Phong=sqlsrv_query($conn,"UPDATE Phong SET TrangThai = 0 WHERE IDPhong = '$IDPhong';");
    if( $update_Phong === false ) {
        die( print_r( sqlsrv_errors(), true));
    }else{
        echo  json_encode("true");
    }
}
else {
    print_r($check_exist, true);
}

