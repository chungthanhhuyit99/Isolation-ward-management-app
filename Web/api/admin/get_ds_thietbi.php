<?php
include "../db.php";

$query_result = sqlsrv_query($conn, "SELECT * FROM ThietBi", array(), array("Scrollable" => "buffered"));
$count = sqlsrv_num_rows($query_result);
$thietbi = [];
if ($count > 0) {
    while ($b = sqlsrv_fetch_array($query_result))  {
        array_push($thietbi, $b);
    }
    $res['data'] = $thietbi;
    echo json_encode($res);
} else {
    $res['error'] = true;
    $res['message'] = "Hiện cơ sở này chưa có thiết bị nào!";
    echo json_encode($res);
}
