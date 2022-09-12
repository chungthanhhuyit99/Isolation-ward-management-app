<?php

include "../db.php";

$query_result = sqlsrv_query($conn, "SELECT * FROM ThongBao", array(), array("Scrollable" => "buffered"));
$count = sqlsrv_num_rows($query_result);
$tb = [];
if ($count > 0) {
    while ($b = sqlsrv_fetch_array($query_result))  {
        array_push($tb, $b);
    }
    $res['data'] = $tb;
    echo json_encode($res);
} else {
    $res['error'] = true;
    $res['message'] = "Hiện cơ sở này chưa có thông báo nào!";
    echo json_encode($res);
}