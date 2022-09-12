<?php
include "db.php";
$id = $_GET['id'];
$get_user = sqlsrv_query($conn, "SELECT * FROM NguoiDung, BenhNhan WHERE IDNguoiDung = IDBenhNhan AND NguoiDung.IDNguoiDung = '$id'");
$user = sqlsrv_fetch_array($get_user, 2);
echo json_encode($user);
