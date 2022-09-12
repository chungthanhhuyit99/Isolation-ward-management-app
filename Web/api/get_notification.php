<?php
include "db.php";
$id = $_GET['id'];
$get_noti = sqlsrv_query($conn, "SELECT * FROM ThongBao WHERE DoiTuong = 'all' OR DoiTuong = '$id' ORDER BY NgayDang DESC");
$noti = [];
while ($nt = sqlsrv_fetch_array($get_noti, 2)) {
    array_push(
        $noti, $nt
    );
}
echo json_encode($noti);
