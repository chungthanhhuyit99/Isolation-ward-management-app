<?php
include "db.php";
$data = json_decode(file_get_contents('php://input'), true);
$phone = $data['phone'];
$pw = $data['password'];
$query_result = sqlsrv_query($conn, "SELECT * FROM dbo.NguoiDung WHERE UserName = '$phone' AND PassWord ='$pw' AND VaiTro = 'BN'", array(), array("Scrollable"=>"buffered"));
$count = sqlsrv_num_rows($query_result);
if ($count > 0) {
    $usr = sqlsrv_fetch_array($query_result);
    $res['error'] = false;
    $res['message'] = "Đăng nhập thành công!";
    $res['id'] = $usr['IDNguoiDung'];
    $res['fname'] = $usr['HovaTen'];
     echo json_encode($res);
}
else {
    $res['error'] = true;
    $res['message'] = "Tài khoản hoặc mật khẩu không chính xác!";
    echo json_encode($res);
}