<?php
include "../db.php";

$query_result = sqlsrv_query($conn, "SELECT * FROM NguoiDung", array(), array("Scrollable" => "buffered"));
$count = sqlsrv_num_rows($query_result);
$user = [];
if ($count > 0) {
    $res['error'] = false;
    while ($b = sqlsrv_fetch_array($query_result))  {
        array_push($user, $b);
    }
    $res['data'] = $user;
    echo json_encode($res);
} else {
    $res['error'] = true;
    $res['message'] = "Hiện cơ sở này chưa có bệnh nhân nào!";
    echo json_encode($res);
}
