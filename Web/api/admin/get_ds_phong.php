<?php
include "../db.php";

$query_result = sqlsrv_query($conn, "SELECT * FROM CoSo,Khu,Phong WHERE CoSo.MaCoSo = Khu.MaCoSo AND Khu.MaKhu = Phong.MaKhu AND CoSo.TrangThai = Khu.TrangThai AND Phong.TrangThai = Khu.TrangThai AND Phong.TrangThai = 1
", array(), array("Scrollable" => "buffered"));
$count = sqlsrv_num_rows($query_result);
$phong = [];
if ($count > 0) {
    while ($b = sqlsrv_fetch_array($query_result)){
        array_push($phong, $b);
    }
    $res['data'] = $phong;
    echo json_encode($res);
} else {
    $res['error'] = true;
    $res['message'] = "Hiện chưa có phòng nào!";
    echo json_encode($res);
}
