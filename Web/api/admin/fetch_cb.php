<?php
include "../db.php";
$query_result = sqlsrv_query($conn, "SELECT * FROM NguoiDung WHERE VaiTro = 'CB'", array(), array("Scrollable" => "buffered"));
$cb = [];

while ($b = sqlsrv_fetch_array($query_result)) {
    array_push($cb, $b);
}
echo json_encode($cb);
