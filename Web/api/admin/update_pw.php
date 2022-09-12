<?php
include "../db.php";
$id_user = $_POST['id_user'];
$PassWord = $_POST['password'];
$NewPassWord = $_POST['newpassword'];

$check= sqlsrv_num_rows(sqlsrv_query($conn,"SELECT * FROM NguoiDung WHERE IDNguoiDung = '$id_user' AND dbo.NguoiDung.PassWord ='$PassWord'",  array(), array("Scrollable"=>"buffered")));

if ($check > 0) {
    $update_nguoidung = sqlsrv_query($conn, "UPDATE NguoiDung SET  PassWord= N'$NewPassWord' WHERE IDNguoiDung = '$id_user'");

    if ($update_nguoidung === false) {
        die(print_r(sqlsrv_errors(), true));
        echo json_encode("false");
    }else{
        echo json_encode("true");
    }
}
else {
    print_r( $check, true);
}


