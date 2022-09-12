<?php
include "../db.php";


$IDPhong = $_POST['IDPhong'];
$IDGiuong = $_POST['IDGiuong'];

$check_exist = sqlsrv_num_rows(sqlsrv_query($conn,"SELECT * FROM  Giuong WHERE IDGiuong = '$IDGiuong'",  array(), array("Scrollable"=>"buffered")));
if ($check_exist > 0) {
    print_r( $check_exist, true);
}
else {
    $insert_giuong = sqlsrv_query($conn, "INSERT INTO Giuong (IDPhong, IDGiuong, TinhTrang) 
    VALUES ('$IDPhong', '$IDGiuong','0');");
    if ($insert_giuong === false) {
        die(print_r(sqlsrv_errors(), true));
    } else {
        echo json_encode("true");
    }
}
