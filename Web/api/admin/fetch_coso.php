<?php
include "../db.php";
$query_result = sqlsrv_query($conn, "SELECT * FROM CoSo", array(), array("Scrollable" => "buffered"));
$coso = [];

while ($b = sqlsrv_fetch_array($query_result)) {
    array_push($coso, $b);
}
echo json_encode($coso);
