<?php
include "../db.php";
$IDNguoiDung = $_POST['id_taikhoan'];
$UserName = $_POST['UserName'];
$PassWord = $_POST['PassWord'];
$TrangThai = $_POST['TrangThai'];

$check_IDNguoiDung = sqlsrv_query($conn,"SELECT * FROM NguoiDung WHERE UserName = '$UserName'",  array(), array("Scrollable"=>"buffered"));
$NguoiDung =sqlsrv_fetch_array($check_IDNguoiDung);
$check_exist = sqlsrv_num_rows(sqlsrv_query($conn,"SELECT * FROM NguoiDung WHERE UserName = '$UserName'",  array(), array("Scrollable"=>"buffered")));
/* Enable tk */
if (($check_exist == 1 AND $NguoiDung['IDNguoiDung'] == $IDNguoiDung) OR $check_exist == 0) {
    $update_tb=sqlsrv_query($conn,"UPDATE NguoiDung SET UserName = '$UserName', PassWord = '$PassWord', TrangThai = '$TrangThai' WHERE IDNguoiDung = '$IDNguoiDung';");
    if( $update_tb === false ) {
        die( print_r( sqlsrv_errors(), true));
    }else{
        echo  json_encode("true");
    }
}
else {
    print_r( $check_exist, true);
}
