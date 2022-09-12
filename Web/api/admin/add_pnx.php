<?php
include "../db.php";
session_start();
$idcb=$_SESSION["id"];
$idbn = $_POST['id_bn'];
$Ngay = $_POST['Ngay'];
$LoaiPhieu = $_POST['LoaiPhieu'];
$NoiDung = $_POST['NoiDung'];
$CoSo  = $_POST['CoSo'];


$id_pnx = substr(str_shuffle(str_repeat("0123456789abcdefghijklmnopqrstuvwxyz", 5)), 0, 5);

$check_exist = sqlsrv_num_rows(sqlsrv_query($conn,"SELECT * FROM BenhNhan WHERE IDBenhNhan = '$idbn'",  array(), array("Scrollable"=>"buffered")));
if ($check_exist > 0) {
    $insert_pxn=sqlsrv_query($conn,"INSERT INTO PhieuNhapXuat (IDPhieu, Ngay, LoaiPhieu, NoiDung, IDBenhNhan, MaCoSo, IDCanBo) 
    VALUES ('$id_pnx', '$Ngay','$LoaiPhieu',N'$NoiDung','$idbn','$CoSo','$idcb');");
    if( $insert_pxn === false ) {
        die( print_r( sqlsrv_errors(), true));
    }else{
        echo  json_encode("true");
    }
}
else {
    print_r( $check_exist, true);
}
