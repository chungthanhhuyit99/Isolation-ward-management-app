<?php

include "../db.php";

$query_result = sqlsrv_query($conn, "SELECT * FROM CoSo WHERE TrangThai = 1", array(), array("Scrollable" => "buffered"));
$count = sqlsrv_num_rows($query_result);
$cs = [];
if ($count > 0) {
    while ($b = sqlsrv_fetch_array($query_result))  {
        array_push($cs, $b);
    }
    $res['data'] = $cs;
    echo json_encode($res);
} else {
    $res['error'] = true;
    $res['message'] = "Hiện chưa có cơ sở nào!";
    echo json_encode($res);
}
