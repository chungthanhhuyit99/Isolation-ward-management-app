<?php
include "../db.php";

$query_result = sqlsrv_query($conn, "SELECT * FROM CoSo,Khu,Phong,Giuong WHERE CoSo.MaCoSo = Khu.MaCoSo AND Khu.MaKhu = Phong.MaKhu AND Giuong.IDPhong = Phong.IDPhong AND CoSo.TrangThai = Khu.TrangThai AND Phong.TrangThai = Khu.TrangThai AND Phong.TrangThai = 1
", array(), array("Scrollable" => "buffered"));
$count = sqlsrv_num_rows($query_result);
$giuong = [];
if ($count > 0) {
    while ($b = sqlsrv_fetch_array($query_result)){
        array_push($giuong, $b);
    }
    $res['data'] = $giuong;
    echo json_encode($res);
} else {
    $res['error'] = true;
    $res['message'] = "Hiện chưa có giường nào!";
    echo json_encode($res);
}

