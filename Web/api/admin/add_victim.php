<?php
include "../db.php";
session_start();
$id_dd=$_SESSION["id"];
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
$idcb = $_POST['idcb'];
$note = $_POST['note'];

/*'idcb' : $idcb,
'note' : $idcb*/
//$dob = date('Y-m-d');
//$dob->format('Y-m-d');
$id_phieu = substr(str_shuffle(str_repeat("0123456789abcdefghijklmnopqrstuvwxyz", 5)), 0, 5);
$getcb = sqlsrv_query($conn, "SELECT * FROM NguoiDung WHERE  Vaitro = 'CB'");

$cb = sqlsrv_fetch_array($getcb);
$id_cb = $cb["IDNguoiDung"];

$check_exist = sqlsrv_num_rows(sqlsrv_query($conn,"SELECT * FROM BenhNhan WHERE CCCD = '$id'",  array(), array("Scrollable"=>"buffered")));
if ($check_exist > 0) {
    print_r( $check_exist, true);
}
else {
    $insert_benhnhan=sqlsrv_query($conn,"EXEC dbo.InsertBenhNhan N'$fullname','$dob','$phone',$gender,N'$national',$status,'$bed','$id','$ward','$detail','$id_phieu','N',N'$note','1','$idcb'");
    if( $insert_benhnhan === false ) {
        die( print_r( sqlsrv_errors(), true));
    }else{

            $update_bed=sqlsrv_query($conn,"UPDATE Giuong SET TinhTrang = 1 WHERE IDGiuong = '$bed'");
            echo  json_encode("true");


        /*if( $update_bed === false ) {
            die( print_r( sqlsrv_errors(), true));
        }else{
            echo  json_encode("bed_true");
        }*/
        /*echo  json_encode("true");*/
    }
}


