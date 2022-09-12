<?php

include "../db.php";

$id_user = $_GET['id'];

//$id_user = $_POST['data'];
//var_dump($id_user);

$query_result = sqlsrv_query($conn, "SELECT * FROM PhieuNhapXuat WHERE PhieuNhapXuat.IDBenhNhan = '$id_user'", array(), array("Scrollable" => "buffered"));
$count = sqlsrv_num_rows($query_result);
$phieu = [];
if ($count > 0) {
    while ($b = sqlsrv_fetch_array($query_result))  {
        array_push($phieu, $b);
    }
    $res['data'] = $phieu;
    echo json_encode($res);
} else {
    $res['error'] = true;
    $res['message'] = "Hiện cơ sở này chưa có phiếu nhập xuất nào!";
    echo json_encode($res);
}