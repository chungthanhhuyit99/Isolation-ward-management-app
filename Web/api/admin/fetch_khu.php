<?php
include "../db.php";
$MaCoSo = $_POST['MaCoSo'];
$query_result = sqlsrv_query($conn, "SELECT * FROM Khu WHERE MaCoSo = '$MaCoSo'", array(), array("Scrollable" => "buffered"));
$Khu = [];
while ($d = sqlsrv_fetch_array($query_result)) {
    array_push($Khu, $d);
}
echo json_encode($Khu);
