<?php
include "../db.php";
$IDThietBi = $_POST['id_thietbi'];
$Ten = $_POST['Ten'];
$Mota = $_POST['Mota'];
$TinhTrang = $_POST['TinhTrang'];
$NgayNhap = $_POST['NgayNhap'];
$IDDieuDuong  = $_POST['id_dd'];


$check_exist = sqlsrv_num_rows(sqlsrv_query($conn,"SELECT * FROM ThietBi WHERE IDThietBi = '$IDThietBi'",  array(), array("Scrollable"=>"buffered")));
if ($check_exist > 0) {
    $update_thietbi=sqlsrv_query($conn,"UPDATE ThietBi SET Ten = N'$Ten', Mota = N'$Mota', TinhTrang = '$TinhTrang', NgayNhap = '$NgayNhap', IDDieuDuong = '$IDDieuDuong' WHERE IDThietBi = '$IDThietBi';");
    if( $update_thietbi === false ) {
        die( print_r( sqlsrv_errors(), true));
    }else{
        echo  json_encode("true");
    }
}
else {
    print_r( $check_exist, true);
}
