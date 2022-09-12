<?php
include "../db.php";
$id_user = $_POST['id_user'];
$fullname = $_POST['fullname'];
$dob= $_POST['dob'];
$phone = $_POST['phone'];
$status = $_POST['status'];
$id = $_POST['id'];
$ward = $_POST['ward'];
$detail = $_POST['detail'];
$national = $_POST['national'];
$gender = $_POST['gender'];
$bed = $_POST['bed'];


$dob = date('Y-m-d');

//    $insert_benhnhan=sqlsrv_query($conn,"EXEC dbo.InsertBenhNhan '$fullname','$dob','$phone',$gender,'$national',$status,'$bed','$id','$ward','$detail','$id_phieu','N','Nhập viện bệnh nhân','1','50'");
$check_statusbed = sqlsrv_fetch_array(sqlsrv_query($conn,"SELECT * FROM BenhNhan WHERE CCCD = '$id'"));
$oldbed = $check_statusbed["IDGiuong"];
if(strcmp($check_statusbed["IDGiuong"],$bed)==0){
    echo json_encode("true");
}else{
    $update_newbed = sqlsrv_query($conn, "UPDATE Giuong SET TinhTrang = 1 WHERE IDGiuong = '$bed'");
    $update_oldbed = sqlsrv_query($conn, "UPDATE Giuong SET TinhTrang = 0 WHERE IDGiuong = '$oldbed'");
    if ($update_newbed === false || $update_oldbed === false) {
        die(print_r(sqlsrv_errors(), true));
    } else {
        echo "newbed_true";
    }
}
$check_exist = sqlsrv_num_rows(sqlsrv_query($conn,"SELECT * FROM BenhNhan WHERE CCCD = '$id'",  array(), array("Scrollable"=>"buffered")));

if ($check_exist > 0) {
    print_r( $check_exist, true);
}
else {
    $update_nguoidung = sqlsrv_query($conn, "UPDATE NguoiDung SET HovaTen = N'$fullname', NgaySinh ='$dob', SDT='$phone',GioiTinh= $gender,Quoctich= N'$national' WHERE IDNguoiDung = '$id_user'");
    $update_benhnhan = sqlsrv_query($conn, "UPDATE BenhNhan SET TinhTrang = '$status', IDGiuong ='$bed', CCCD='$id',MaXa='$ward',ChiTietDiaChi= N'$detail' WHERE IDBenhNhan = '$id_user'");
    if ($update_benhnhan === false || $update_nguoidung === false) {
        die(print_r(sqlsrv_errors(), true));
    } else {
        echo json_encode("update_user_true");
    }
}
