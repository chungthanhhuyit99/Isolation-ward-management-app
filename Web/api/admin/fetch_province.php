<?php
include "../db.php";
$query_result = sqlsrv_query($conn, "SELECT * FROM DMTinh", array(), array("Scrollable" => "buffered"));
$prv = [];

while ($b = sqlsrv_fetch_array($query_result)) {
        array_push($prv, $b);
}
echo json_encode($prv);
