<?php
include "../db.php";


//$query_result = sqlsrv_query($conn, "SELECT * FROM dbo.BenhNhan, dbo.NguoiDung WHERE dbo.BenhNhan.IDBenhNhan = dbo.NguoiDung.IDNguoiDung AND dbo.BenhNhan.IDBenhNhan = dbo.PhieuNhapXuat.IDBenhNhan AND dbo.PhieuNhapXuat.MaCoSo = '1' ORDER BY Ngay DESC ", array(), array("Scrollable" => "buffered"));
$query_result = sqlsrv_query($conn, "SELECT * FROM dbo.BenhNhan, dbo.PhieuNhapXuat, dbo.NguoiDung WHERE dbo.BenhNhan.IDBenhNhan = dbo.NguoiDung.IDNguoiDung AND dbo.BenhNhan.IDBenhNhan = dbo.PhieuNhapXuat.IDBenhNhan AND dbo.PhieuNhapXuat.MaCoSo = '1' ORDER BY Ngay DESC ", array(), array("Scrollable" => "buffered"));

$count = sqlsrv_num_rows($query_result);
$bn = [];
if ($count > 0) {
    $res['error'] = false;
    while ($b = sqlsrv_fetch_array($query_result, 2))  {
       array_push($bn, $b);
    }
    $res['data'] = $bn;
    echo json_encode($res);
} else {
    $res['error'] = true;
    $res['message'] = "Hiện cơ sở này chưa có bệnh nhân nào!";
    echo json_encode($res);
}