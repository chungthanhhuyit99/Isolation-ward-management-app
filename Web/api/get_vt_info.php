<?php
include "db.php";
$id = $_GET['id'];
$sql = sqlsrv_query($conn, "SELECT * FROM BenhNhan, Giuong, Phong, Khu WHERE BenhNhan.IDBenhNhan = '$id'  AND BenhNhan.IDGiuong = Giuong.IDGiuong AND Giuong.IDPhong = Phong.IDPhong AND Phong.MaKhu = Khu.MaKhu");
$get = sqlsrv_fetch_array($sql, 2);
echo json_encode($get);
