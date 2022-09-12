<?php
include "../db.php";
$id_phieu = $_POST['id_phieu'];
$id_bn = $_POST['id_bn'];
$Ngay = $_POST['Ngay'];
$LoaiPhieu = $_POST['LoaiPhieu'];
$NoiDung = $_POST['NoiDung'];
$CoSo  = $_POST['CoSo'];


$check_exist = sqlsrv_num_rows(sqlsrv_query($conn,"SELECT * FROM PhieuNhapXuat WHERE IDPhieu = '$id_phieu'",  array(), array("Scrollable"=>"buffered")));
if ($check_exist > 0) {
    $update_pnx = sqlsrv_query($conn,"UPDATE PhieuNhapXuat SET Ngay = '$Ngay', LoaiPhieu = '$LoaiPhieu', NoiDung = N'$NoiDung', IDBenhNhan = '$id_bn', MaCoSo = $CoSo WHERE IDPhieu = '$id_phieu';");
    if( $update_pnx === false ) {
        die( print_r( sqlsrv_errors(), true));
    }else{
        echo  json_encode("true");
    }
}
else {
    print_r( $check_exist, true);
}

