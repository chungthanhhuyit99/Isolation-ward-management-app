<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
include "db.php";
$data = json_decode(file_get_contents('php://input'), true);
$phone = $data['phone'];
$pw = $data['pw'];
$id = $data['id'];
$role = "BN";

//kiểm tra id gửi lên có tồn tại trong csdl k
$exist_user = sqlsrv_query($conn, "SELECT * FROM dbo.NguoiDung WHERE IDNguoiDung = '$id' AND VaiTro = 'BN'", array(), array("Scrollable"=>"buffered"));
if (sqlsrv_num_rows($exist_user)  > 0  ) {
    if (sqlsrv_fetch_array($exist_user)['UserName'] != null) {
        $res['error'] = true;
        $res['message'] = "Mã bệnh nhân đã được đăng ký với số điện thoại khác!";
        echo json_encode($res);
    }
    else {
        $exist_phone = sqlsrv_query($conn, "SELECT * FROM dbo.NguoiDung WHERE UserName = '$phone' AND VaiTro = 'BN'", array(), array("Scrollable"=>"buffered"));
        if (sqlsrv_num_rows($exist_phone) > 0) {
            $res['error'] = true;
            $res['message'] = "Số điện thoại đã được đăng ký!";
            echo json_encode($res);
        }
        else {
            $query_result = sqlsrv_query($conn, "UPDATE dbo.NguoiDung SET UserName = '$phone', PassWord = '$pw' WHERE IDNguoiDung = '$id' ") ;
            //; SELECT SCOPE_IDENTITY()
            //$lastid = lastInsertId($query_result)
            if ($query_result) {
                $res['error'] = false;
                $res['message'] = "Đăng ký thành công!";
                echo json_encode($res);
            } else {
                $res['error'] = true;
                $res['message'] = "Đăng ký không thành công. Thử lại sau!";
                echo json_encode($res);

            }
        }

    }
}
else {
    $res['error'] = true;
    $res['message'] = "Không tồn tại bệnh nhân với ID như trên!";
    echo json_encode($res);
}

function lastInsertId($queryID) {
    sqlsrv_next_result($queryID);
    sqlsrv_fetch($queryID);
    return sqlsrv_get_field($queryID, 0);
}