<?php
include "../db.php";
$MaKhu= $_POST['MaKhu'];
$IDPhong = $_POST['IDPhong'];
$SoLuongGiuong = $_POST['SoLuongGiuong'];

$check_exist = sqlsrv_num_rows(sqlsrv_query($conn,"SELECT * FROM  Phong WHERE IDPhong = '$IDPhong'",  array(), array("Scrollable"=>"buffered")));
if ($check_exist > 0) {
    print_r( $check_exist, true);
}
else {
    $insert_phong = sqlsrv_query($conn, "INSERT INTO Phong (IDPhong, SoLuongGiuong, MaKhu) 
    VALUES ('$IDPhong', '$SoLuongGiuong','$MaKhu');");
    if ($insert_phong === false) {
        die(print_r(sqlsrv_errors(), true));
    } else {
        echo json_encode("true");
    }
}
