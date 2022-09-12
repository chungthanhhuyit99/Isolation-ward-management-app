<?php
include "../db.php";

$fullname = $_POST['fullname'];
$dob= $_POST['dob'];
$phone = $_POST['phone'];
$national = $_POST['national'];
$gender = $_POST['gender'];
$chuyenmon = $_POST['chuyenmon'];
$chitiettrinhdo = $_POST['chitiettrinhdo'];





$check_sdt = sqlsrv_num_rows(sqlsrv_query($conn,"SELECT * FROM NguoiDung WHERE SDT = '$phone'",  array(), array("Scrollable"=>"buffered")));
if ($check_sdt > 0) {
    print_r( $check_sdt, true);
}
else {
    if($chuyenmon == 1){
        $insert_nhanvien=sqlsrv_query($conn,"EXEC dbo.InsertDieuDuong N'$fullname','$dob','$phone',$gender,N'$national','','',N'$chitiettrinhdo'");
        if( $insert_nhanvien === false ) {
            die( print_r( sqlsrv_errors(), true));
        }else{
            echo  json_encode("true");
        }
    }else{
    $insert_bacsi=sqlsrv_query($conn,"EXEC dbo.InsertBacSi N'$fullname','$dob','$phone',$gender,N'$national','','',N'$chitiettrinhdo'");
    if( $insert_bacsi === false ) {
        die( print_r( sqlsrv_errors(), true));
    }else{
        echo  json_encode("true");
    }
    }
}
