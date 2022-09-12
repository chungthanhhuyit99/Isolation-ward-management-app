<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
$params = [
    "UID" => "SA",
    "PWD" => "Huychung99",
    "Database" => "QL_KCL_2",
];
$conn = sqlsrv_connect("http://20.39.185.180/", $params);

?>
