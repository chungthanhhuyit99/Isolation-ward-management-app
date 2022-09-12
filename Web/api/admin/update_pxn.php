<?php
include "../db.php";
session_start();
$iddd=$_SESSION["id"];
$id_phieu =$_POST['id_phieu'];
$idbn = $_POST['id_bn'];
$NgayLayMau = $_POST['NgayLayMau'];
$PCR= $_POST['PCR'];
$NgayTraKetQua = $_POST['NgayTraKetQua'];
$ChiSoCT  = $_POST['ChiSoCT'];
$KetQuaXetNghiem = $_POST['KetQuaXetNghiem'];
$NgayLayMauTiepTheo = $_POST['NgayLayMauTiepTheo'];
//$spo = $_POST['spo'];
//$status = $_POST['status'];
//$ketluan = $_POST['ketluan'];

//$NgayTraKetQua = date('Y-m-d');
//$NgayLayMau = date('Y-m-d');
//var_dump($NgayLayMau);
//$NgayLayMauTiepTheo = date('Y-m-d');

$check_exist = sqlsrv_num_rows(sqlsrv_query($conn,"SELECT * FROM PhieuXetNghiem WHERE IDPhieu = '$id_phieu'",  array(), array("Scrollable"=>"buffered")));
if ($check_exist > 0) {
    $update_pxn=sqlsrv_query($conn,"UPDATE PhieuXetNghiem SET  NgayLayMau = '$NgayLayMau', PCR = '$PCR', 
    NgayTraKetQua= '$NgayTraKetQua', ChiSoCT = '$ChiSoCT', KetQuaXetNghiem = '$KetQuaXetNghiem', NgayLayMauTiepTheo = '$NgayLayMauTiepTheo', IDDieuDuong = '$iddd', IDBenhNhan = N'$idbn'
     WHERE IDPhieu = '$id_phieu'");
    if( $update_pxn === false ) {
        die( print_r( sqlsrv_errors(), true));
    }else{
        echo  json_encode("true");
    }
}
else {
    print_r( $check_exist, true);
}
