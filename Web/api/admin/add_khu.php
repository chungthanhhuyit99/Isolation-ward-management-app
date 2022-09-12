<?php
include "../db.php";
$MaCoSo= $_POST['MaCoSo'];
$MaKhu = $_POST['MaKhu'];
$TenKhu = $_POST['TenKhu'];

$check_exist = sqlsrv_num_rows(sqlsrv_query($conn,"SELECT * FROM Khu WHERE MaKhu = '$MaKhu'",  array(), array("Scrollable"=>"buffered")));
if ($check_exist > 0) {
    print_r( $check_exist, true);
}
else {
    $insert_khu = sqlsrv_query($conn, "INSERT INTO Khu (MaKhu, TenKhu, MaCoSo) 
    VALUES ('$MaKhu', '$TenKhu','$MaCoSo');");
    if ($insert_khu === false) {
        die(print_r(sqlsrv_errors(), true));
    } else {
        echo json_encode("true");
    }
}
