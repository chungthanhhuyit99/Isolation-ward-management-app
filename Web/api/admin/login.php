<?php
include "../db.php";

$phone = $_POST['phone'];
$pw = $_POST['password'];

$query_result = sqlsrv_query($conn, "SELECT * FROM dbo.NguoiDung WHERE dbo.NguoiDung.UserName = '$phone' AND dbo.NguoiDung.PassWord ='$pw' ", array(), array("Scrollable"=>"buffered"));
//AND dbo.NguoiDung.VaiTro = 'CB'  OR  dbo.NguoiDung.VaiTro = 'AD'
$count = sqlsrv_num_rows($query_result);
$user = sqlsrv_fetch_array($query_result);
if ($count > 0 && ($user['VaiTro'] == 'CB' || $user['VaiTro'] == 'AD' || $user['VaiTro'] == 'NV' || $user['VaiTro'] == 'BS') ) {
    $res['error'] = false;
    $res['id'] = $user['IDNguoiDung'];
    $res['role'] = $user['VaiTro'];
    $res['message'] = "Đăng nhập thành công!";
    echo json_encode($res);
}
else {
    $res['error'] = true;
    $res['message'] = "Tài khoản hoặc mật khẩu không chính xác!";
    echo json_encode($res);
}