<?php
include "../db.php";
$UserName = $_POST['UserName'];
$PassWord = $_POST['PassWord'];
$VaiTro = $_POST['VaiTro'];

$check_exist = sqlsrv_num_rows(sqlsrv_query($conn,"SELECT * FROM NguoiDung WHERE UserName = '$UserName'",  array(), array("Scrollable"=>"buffered")));
if ($check_exist == 0) {
    if($VaiTro == 1){
        $insert_nv=sqlsrv_query($conn,"EXEC dbo.InsertDieuDuong '', '1999-9-19','','0', '', '$UserName', '$PassWord', ''");
        if( $insert_nv === false ) {
            die( print_r( sqlsrv_errors(), true));
        }else{
            echo  json_encode("true");
        }
    }
    if($VaiTro == 2){
        $insert_bs=sqlsrv_query($conn,"EXEC dbo.InsertBacSi '','1999-9-19','','0', '', '$UserName', '$PassWord', ''");
        if( $insert_bs === false ) {
            die( print_r( sqlsrv_errors(), true));
        }else{
            echo  json_encode("true");
        }
    }
    if($VaiTro == 3){
        $insert_cb = sqlsrv_query($conn,"EXEC dbo.InsertCanBo '', '1999-9-19', '', '0', '', '$UserName', '$PassWord', ''");
        if( $insert_cb === false ) {
            die( print_r( sqlsrv_errors(), true));
        }else{
            echo  json_encode("true");
        }
    }
    #$insert_nv=sqlsrv_query($conn,"EXEC dbo.InsertDieuDuong '$fullname','$dob','$phone',$gender,'$national','$chitiettrinhdo'")
}
else {
    print_r($check_exist, true);
    echo  json_encode("false");
}
