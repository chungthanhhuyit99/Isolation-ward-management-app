<?php
include "../db.php";
$room_id = $_POST['room_id'];
$query_result = sqlsrv_query($conn, "SELECT * FROM Giuong WHERE IDPhong = '$room_id' AND TinhTrang = 0", array(), array("Scrollable" => "buffered"));
$count = sqlsrv_num_rows($query_result);
$bed = [];
if ($count > 0) {
    while ($b = sqlsrv_fetch_array($query_result)) {
        array_push($bed, $b);
    }
    echo json_encode($bed);
}
else {
    echo json_encode(false);
}


