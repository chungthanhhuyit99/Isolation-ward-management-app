<?php
include "../db.php";
$MaKhu = $_POST['MaKhu'];
$query_result = sqlsrv_query($conn, "SELECT * FROM Phong WHERE MaKhu = '$MaKhu'", array(), array("Scrollable" => "buffered"));
$phong = [];
while ($d = sqlsrv_fetch_array($query_result)) {
    array_push($phong, $d);
}
echo json_encode($phong);
