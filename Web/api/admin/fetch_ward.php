<?php
include "../db.php";
$wardtrict_id = $_POST['district_id'];
$query_result = sqlsrv_query($conn, "SELECT * FROM DMXa WHERE MaHuyen = '$wardtrict_id'", array(), array("Scrollable" => "buffered"));
$ward = [];
while ($w = sqlsrv_fetch_array($query_result)) {
    array_push($ward, $w);
}

echo json_encode($ward);
