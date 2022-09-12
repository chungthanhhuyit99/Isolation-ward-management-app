<?php
include "../db.php";
$TenCoSo= $_POST['TenCoSo'];
$DiaChi = $_POST['DiaChi'];

$id_cs = substr(str_shuffle(str_repeat("0123456789abcdefghijklmnopqrstuvwxyz", 5)), 0, 5);

$insert_tb=sqlsrv_query($conn,"INSERT INTO CoSo (MaCoSo, TenCoSo, DiaChi) 
    VALUES ('$id_cs', N'$TenCoSo',N'$DiaChi');");
if( $insert_tb === false ) {
    die( print_r( sqlsrv_errors(), true));
}else{
    echo  json_encode("true");
}

