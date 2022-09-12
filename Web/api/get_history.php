<?php
include "db.php";
$id = $_GET['id'];
$get_pxn = sqlsrv_query($conn, "SELECT * FROM PhieuXetNghiem WHERE IDBenhNhan = '$id' ORDER BY NgayLayMau DESC");
$get_pkb = sqlsrv_query($conn, "SELECT * FROM PhieuKhamBenh WHERE IDBenhNhan = '$id' ORDER BY NgayKham DESC");
$pkb_arr = [];
$pxn_arr = [];
while ($pkb = sqlsrv_fetch_array($get_pkb, 2)) {
        $pkb_arr[$pkb['NgayKham']->format('d/m/Y')][]= $pkb;
}
while ($pxn = sqlsrv_fetch_array($get_pxn, 2)) {
        $pxn_arr[$pxn['NgayLayMau']->format('d/m/Y')][] = $pxn;
}
$res['pkb'] = $pkb_arr;
$res['pxn'] = $pxn_arr;
echo json_encode($res);
