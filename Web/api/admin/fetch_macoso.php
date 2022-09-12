<?php
include "../db.php";
$query_result = sqlsrv_query($conn, "SELECT * FROM CoSo", array(), array("Scrollable" => "buffered"));
$cs = [];
while ($b = sqlsrv_fetch_array($query_result)) {
    array_push($cs, $b);
}
echo json_encode($cs);