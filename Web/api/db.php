<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
Header('Access-Control-Allow-Origin: *'); //for allow any domain, insecure
Header('Access-Control-Allow-Headers: *'); //for allow any headers, insecure
Header('Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE'); //method allowed
$params = [
    "UID" => "SA",
    "PWD" => "Huychung99",
    "Database" => "QL_KCL_2",
];
$conn = sqlsrv_connect("20.39.185.180", $params);

?>
