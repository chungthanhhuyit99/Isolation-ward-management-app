<?php
include "../db.php";
session_start();
$iddd=$_SESSION["id"];

$idbn = $_POST['id_bn'];
$NgayLayMau = $_POST['NgayLayMau'];
$PCR = $_POST['PCR'];
$NgayTraKetQua = $_POST['NgayTraKetQua'];
$ChiSoCT  = $_POST['ChiSoCT'];
$KetQuaXetNghiem = $_POST['KetQuaXetNghiem'];
$NgayLayMauTiepTheo = $_POST['NgayLayMauTiepTheo'];


$id_pxn = substr(str_shuffle(str_repeat("0123456789abcdefghijklmnopqrstuvwxyz", 5)), 0, 4);

$check_exist = sqlsrv_num_rows(sqlsrv_query($conn,"SELECT * FROM BenhNhan WHERE IDBenhNhan = '$idbn'",  array(), array("Scrollable"=>"buffered")));
if ($check_exist > 0) {
    $insert_pxn=sqlsrv_query($conn,"INSERT INTO PhieuXetNghiem (IDPhieu, NgayLayMau, PCR, NgayTraKetQua, ChiSoCT, KetQuaXetNghiem, NgayLayMauTiepTheo, IDDieuDuong, IDBenhNhan) 
    VALUES ('$id_pxn', '$NgayLayMau','$PCR','$NgayTraKetQua','$ChiSoCT','$KetQuaXetNghiem','$NgayLayMauTiepTheo','$iddd','$idbn');");
    if( $insert_pxn === false ) {
        die( print_r( sqlsrv_errors(), true));
    }else{
        echo  json_encode("true");
    }
}
else {
    print_r( $check_exist, true);
}
