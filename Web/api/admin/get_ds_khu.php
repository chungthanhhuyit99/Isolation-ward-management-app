<?php

include "../db.php";

$query_result = sqlsrv_query($conn, "SELECT * FROM CoSo,Khu WHERE CoSo.MaCoSo = Khu.MaCoSo AND CoSo.TrangThai = Khu.TrangThai AND Khu.TrangThai = 1", array(), array("Scrollable" => "buffered"));
$count = sqlsrv_num_rows($query_result);
$khu = [];
if ($count > 0) {
    while ($b = sqlsrv_fetch_array($query_result))  {
        array_push($khu, $b);
    }
    $res['data'] = $khu;
    echo json_encode($res);
} else {
    $res['error'] = true;
    $res['message'] = "Hiện chưa có khu nào!";
    echo json_encode($res);
}
