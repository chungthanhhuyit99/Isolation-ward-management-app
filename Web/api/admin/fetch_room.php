<?php
include "../db.php";
$query_result = sqlsrv_query($conn, "SELECT * FROM Phong WHERE TrangThai = 1", array(), array("Scrollable" => "buffered"));
$room = [];
while ($r = sqlsrv_fetch_array($query_result)) {
    array_push($room, $r);
}
echo json_encode($room);
