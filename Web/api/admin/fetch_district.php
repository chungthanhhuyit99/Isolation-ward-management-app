<?php
include "../db.php";
$province_id = $_POST['province_id'];
$query_result = sqlsrv_query($conn, "SELECT * FROM DMHuyen WHERE MaTinh = '$province_id'", array(), array("Scrollable" => "buffered"));
$dis = [];
while ($d = sqlsrv_fetch_array($query_result)) {
    array_push($dis, $d);
}

echo json_encode($dis);
