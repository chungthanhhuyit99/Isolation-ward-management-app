<?php
include "../db.php";
session_start();
$idbs=$_SESSION["id"];
$idbn = $_POST['id_bn'];
$hinhthuc = $_POST['hinhthuc'];
$ngaykham= $_POST['ngaykham'];
$tongquan = $_POST['tongquan'];
$nhietdo  = $_POST['nhietdo'];
$huyetapmin = $_POST['huyetapmin'];
$huyetapmax = $_POST['huyetapmax'];
$spo = $_POST['spo'];
$ketluan = $_POST['ketluan'];


/*$ngaykham = date('Y-m-d');*/
$id_pkb = substr(str_shuffle(str_repeat("0123456789abcdefghijklmnopqrstuvwxyz", 5)), 0, 6);

$check_exist = sqlsrv_num_rows(sqlsrv_query($conn,"SELECT * FROM BenhNhan WHERE IDBenhNhan = '$idbn'",  array(), array("Scrollable"=>"buffered")));
if ($check_exist > 0) {
    $insert_pkb=sqlsrv_query($conn,"INSERT INTO PhieuKhamBenh (IDPhieu, NgayKham, KhamDinhKy, TongQuan, HuyetApMax, HuyetApMin, NhietDo, ChiSoSpO2, KetLuan, IDBacSi,IDBenhNhan) 
    VALUES ('$id_pkb', '$ngaykham','$hinhthuc',N'$tongquan','$huyetapmax','$huyetapmin','$nhietdo','$spo',N'$ketluan',$idbs,'$idbn');");
    if( $insert_pkb === false ) {
        die( print_r( sqlsrv_errors(), true));
    }else{
        echo  json_encode("true");
    }
}
else {
    print_r( $check_exist, true);
}



