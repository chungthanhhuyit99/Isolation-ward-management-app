<?php
include "../db.php";
session_start();
$idcb=$_SESSION["id"];
$TieuDe = $_POST['TieuDe'];
$NgayDang = $_POST['NgayDang'];
$NoiDung = $_POST['NoiDung'];

$id_tb = substr(str_shuffle(str_repeat("0123456789abcdefghijklmnopqrstuvwxyz", 5)), 0, 5);
    $insert_tb=sqlsrv_query($conn,"INSERT INTO ThongBao (ID, TieuDe, NgayDang, NoiDung, IDCanBo, DoiTuong) 
    VALUES ('$id_tb', N'$TieuDe','$NgayDang ',N'$NoiDung','$idcb', 'all');");
    if( $insert_tb === false ) {
        die( print_r( sqlsrv_errors(), true));
    }else{
        echo  json_encode("true");
    }

