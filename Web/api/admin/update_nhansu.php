<?php
include "../db.php";
$id_user = $_POST['id_user'];
$fullname = $_POST['fullname'];
$dob= $_POST['dob'];
$phone = $_POST['phone'];
$national = $_POST['national'];
$gender = $_POST['gender'];
$chuyenmon = $_POST['chuyenmon'];
$chitiettrinhdo = $_POST['chitiettrinhdo'];


$check_exist = sqlsrv_num_rows(sqlsrv_query($conn,"SELECT * FROM NguoiDung WHERE IDNguoiDung = '$id_user'",  array(), array("Scrollable"=>"buffered")));

if ($check_exist > 0) {
    $update_nguoidung = sqlsrv_query($conn, "UPDATE NguoiDung SET HovaTen = N'$fullname', NgaySinh ='$dob', SDT='$phone',GioiTinh= $gender,Quoctich= N'$national' WHERE IDNguoiDung = '$id_user'");
    if($chuyenmon == "BS"){
        $update_bs = sqlsrv_query($conn, "UPDATE BacSi SET TrinhDoChuyenMon = N'$chitiettrinhdo' WHERE IDBacSi = '$id_user'");
        if ($update_bs === false) {
            die(print_r(sqlsrv_errors(), true));
        } else {
            echo json_encode("true");
        }
    }else{
        $update_dd = sqlsrv_query($conn, "UPDATE DieuDuong SET DonViCongTac = N'$chitiettrinhdo' WHERE IDDieuDuong = '$id_user'");
        if ($update_dd === false) {
            die(print_r(sqlsrv_errors(), true));
        } else {
            echo json_encode("true");
        }
    }
    if ($update_nguoidung === false) {
        die(print_r(sqlsrv_errors(), true));
    }
}
else {
    print_r( $check_exist, true);
}
