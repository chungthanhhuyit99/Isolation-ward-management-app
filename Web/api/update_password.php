<?php
include "db.php";
$data = json_decode(file_get_contents('php://input'), true);
$id = $data['id'];
$pw = $data['newpw'];
$old = $data['oldpw'];


$check_pass = sqlsrv_num_rows(sqlsrv_query($conn, "SELECT * FROM dbo.NguoiDung WHERE IDNguoiDung = '$id' AND PassWord = '$old'", array(), array("Scrollable"=>"buffered")));
if ($check_pass > 0) {
    $update = sqlsrv_query($conn, "UPDATE NguoiDung SET PassWord = '$pw' WHERE IDNguoiDung = '$id'") or die( print_r( sqlsrv_errors(), true));
    $mess['error'] = false;
    $mess['message'] = "Đổi mật khẩu thành công!";
    echo  json_encode($mess);
} 
else {
    $mess['error'] = true;
    $mess['message'] = "Mật khẩu cũ không chính xác!";
    echo  json_encode($mess);
}
