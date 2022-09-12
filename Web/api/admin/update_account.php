<?php
include "../db.php";
$id_user = $_POST['id_user'];
$fullname = $_POST['HovaTen'];
$dob= $_POST['NgaySinh'];
$phone = $_POST['SDT'];
$national = $_POST['QuocTich'];
$gender = $_POST['GioiTinh'];
$Trinhdo = $_POST['Trinhdo'];
$chuyenmon = $_POST['chuyenmon'];



/*$check_exist = sqlsrv_num_rows(sqlsrv_query($conn,"SELECT * FROM NguoiDung WHERE IDNguoiDung = '$id_user'",  array(), array("Scrollable"=>"buffered")));*/
$check= sqlsrv_num_rows(sqlsrv_query($conn,"SELECT * FROM NguoiDung WHERE IDNguoiDung = '$id_user'",  array(), array("Scrollable"=>"buffered")));

if ($check > 0) {
    $update_nguoidung = sqlsrv_query($conn, "UPDATE NguoiDung SET HovaTen = N'$fullname', NgaySinh ='$dob', SDT='$phone',GioiTinh= $gender,Quoctich= N'$national' WHERE IDNguoiDung = '$id_user'");
    if($chuyenmon == "BS"){
        $update_bs = sqlsrv_query($conn, "UPDATE BacSi SET TrinhDoChuyenMon = N'$Trinhdo' WHERE IDBacSi = '$id_user'");
    }else{
        $update_dd = sqlsrv_query($conn, "UPDATE DieuDuong SET DonViCongTac = N'$Trinhdo' WHERE IDDieuDuong = '$id_user'");

    }
    if($chuyenmon == "CB"){
        $update_dd = sqlsrv_query($conn, "UPDATE CanBo SET ChucVu = N'$Trinhdo' WHERE IDCanBo = '$id_user'");

    }
    if ($update_nguoidung === false) {
        die(print_r(sqlsrv_errors(), true));
        echo json_encode("false");
    }else{
        echo json_encode("true");
    }
}
else {
    print_r( $check, true);
}
