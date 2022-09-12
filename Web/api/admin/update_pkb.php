<?php
include "../db.php";
$id_phieu =$_POST['IDPhieu'];
$idbn = $_POST['id_bn'];
$hinhthuc = $_POST['KhamDinhKy'];
$ngaykham= $_POST['NgayKham'];
$tongquan = $_POST['TongQuan'];
$nhietdo  = $_POST['NhietDo'];
$huyetapmin = $_POST['HuyetApMin'];
$huyetapmax = $_POST['HuyetApMax'];
$spo = $_POST['ChiSoSpO'];
$status = $_POST['TinhTrang'];
$ketluan = $_POST['KetLuan'];



$check_exist = sqlsrv_num_rows(sqlsrv_query($conn,"SELECT * FROM PhieuKhamBenh WHERE IDPhieu = '$id_phieu'",  array(), array("Scrollable"=>"buffered")));
if ($check_exist > 0) {
    $update_pkb=sqlsrv_query($conn,"UPDATE PhieuKhamBenh SET  NgayKham = '$ngaykham', KhamDinhKy = '$hinhthuc', 
    TongQuan = N'$tongquan', HuyetApMax = '$huyetapmax', HuyetApMin = '$huyetapmin', NhietDo = '$nhietdo', ChiSoSpO2 = '$spo', KetLuan = N'$ketluan' WHERE IDPhieu = '$id_phieu'");
    $update_bn = sqlsrv_query($conn,"UPDATE BenhNhan SET  TinhTrang = '$status' WHERE IDBenhNhan = '$idbn'");
    if( $update_pkb === false || $update_bn === false) {
        die( print_r( sqlsrv_errors(), true));
    }else{
        echo  json_encode("true");
    }
}
else {
    print_r( $check_exist, true);
}




