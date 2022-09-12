<?php
include "../db.php";
session_start();
$iddd=$_SESSION["id"];
$Ten = $_POST['Ten'];
$MoTa = $_POST['MoTa'];
$TinhTrang = $_POST['TinhTrang'];
$NgayNhap = $_POST['NgayNhap'];


$id_thietbi = substr(str_shuffle(str_repeat("0123456789abcdefghijklmnopqrstuvwxyz", 5)), 0, 7);

$insert_thietbi=sqlsrv_query($conn,"INSERT INTO ThietBi (IDThietBi, Ten, MoTa, TinhTrang, NgayNhap, IDDieuDuong) 
    VALUES ('$id_thietbi', N'$Ten',N'$MoTa','$TinhTrang', '$NgayNhap','$iddd');");
if( $insert_thietbi === false ) {
    die( print_r( sqlsrv_errors(), true));
}else{
    echo  json_encode("true");
}

