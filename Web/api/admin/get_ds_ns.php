<?php

include "../db.php";
$query_result_dd = sqlsrv_query($conn, "SELECT * FROM  dbo.DieuDuong, dbo.NguoiDung WHERE dbo.DieuDuong.IDDieuDuong = dbo.NguoiDung.IDNguoiDung AND dbo.NguoiDung.TrangThai = 1 ", array(), array("Scrollable" => "buffered"));
$query_result_bs = sqlsrv_query($conn, "SELECT * FROM  dbo.BacSi, dbo.NguoiDung WHERE dbo.BacSi.IDBacSi = dbo.NguoiDung.IDNguoiDung AND dbo.NguoiDung.TrangThai = 1", array(), array("Scrollable" => "buffered"));
$count_dd = sqlsrv_num_rows($query_result_dd);
$count_bs = sqlsrv_num_rows($query_result_bs);
$ns = [];
if ($count_dd > 0 || $count_bs > 0) {
    $res['error'] = false;
    while ($d = sqlsrv_fetch_array($query_result_dd))  {
        array_push($ns, $d);
    }
    while ($d = sqlsrv_fetch_array($query_result_bs))  {
        array_push($ns, $d);
    }
    $res['data'] = $ns;
    echo json_encode($res);

} else {
    $res['error'] = true;
    $res['message'] = "Hiện cơ sở này chưa có nhân sự nào!";
    echo json_encode($res);
}