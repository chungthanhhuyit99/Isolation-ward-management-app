<?php include('parent/header.php');
include "api/db1.php";
$id_phieu = $_GET['id'];

$getphieu = sqlsrv_query($conn, "SELECT * FROM PhieuKhamBenh WHERE  IDPhieu = '$id_phieu'");

$pkb = sqlsrv_fetch_array($getphieu);

$id_user = $pkb['IDBenhNhan'];

$get = sqlsrv_query($conn, "SELECT * FROM NguoiDung WHERE  IDNguoiDung = '$id_user'");
var_dump($id_phieu);

var_dump($id_user);
$getbenhnhan = sqlsrv_query($conn, "SELECT * FROM BenhNhan WHERE  IDBenhNhan = '$id_user'");
$getphieunx = sqlsrv_query($conn, "SELECT * FROM PhieuNhapXuat WHERE  IDBenhNhan = '$id_user'");

$nguoidung = sqlsrv_fetch_array($get);
$benhnhan = sqlsrv_fetch_array($getbenhnhan);
$phieu =sqlsrv_fetch_array($getphieunx);
?>

<!-- BEGIN: Content-->
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0">Thêm phiếu khám bệnh</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Trang chủ</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Quản lý phiếu khám bệnh</a>
                                </li>
                                <li class="breadcrumb-item active">Thêm phiếu
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="content-body">
            <!-- Vertical Wizard -->
            <section class="vertical-wizard">
                <div class="vertical-wizard-example">
                    <div class="card-body">
                        <div id="account-details-vertical"  aria-labelledby="account-details-vertical-trigger">
                            <div class="content-header">
                                <h3 class="mb-0">Thông tin bệnh nhân</h3>
                                <small class="text-muted">Thông tin bệnh nhân.</small>
                            </div>
                        </div>
                        <div id="account-details-vertical"  aria-labelledby="account-details-vertical-trigger">
                            <div class="row">
                                <div class="mb-1 col-md-6">
                                    <label class="form-label" for="vertical-username">Tên bệnh nhân</label>
                                    <input type="text" id="id_phieu"  hidden class="form-control" value="<?php echo $id_phieu ?>"/>
                                    <input type="text" id="id_user"  hidden class="form-control" value="<?php echo $nguoidung["IDNguoiDung"] ?>"/>
                                    <input type="text" id="fullnamevictim" class="form-control" value="<?php echo $nguoidung["HovaTen"] ?>" readonly="readonly"/>
                                </div>
                                <div class="mb-1 col-md-6">
                                    <label class="form-label" for="vertical-email">Ngày nhập viện</label>
                                    <input type="date" id="datevictim" class="form-control" value="<?php echo $phieu["Ngay"]->format('Y-m-d') ?>"  readonly="readonly"/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-1 col-md-6">
                                    <label class="form-label" for="vertical-username">Tình trạng</label>
                                    <select id="status" class="form-select" disabled="disabled">
                                        <option>Vui lòng chọn</option>
                                        <option value="-1"<?php if($benhnhan["TinhTrang"] == -1): ?> selected="selected"<?php endif; ?>>Mất</option>
                                        <option value="0"<?php if($benhnhan["TinhTrang"] == 0): ?> selected="selected"<?php endif; ?>>Hết bệnh</option>
                                        <option value="1"<?php if($benhnhan["TinhTrang"] == 1): ?> selected="selected"<?php endif; ?>>Đang theo dõi</option>
                                        <option value="2"<?php if($benhnhan["TinhTrang"] == 2): ?> selected="selected"<?php endif; ?>>Đã nhiễm bệnh</option>
                                        <option value="3"<?php if($benhnhan["TinhTrang"] == 3): ?> selected="selected"<?php endif; ?>>Đã trở nặng</option>
                                    </select>
                                </div>
                                <div class="mb-1 col-md-6">
                                    <label class="form-label" for="vertical-username">Giới tính</label>
                                    <select  class="form-select" id="gender" disabled="disabled" >
                                        <option>Vui lòng chọn</option>
                                        <option value="1"<?php if($nguoidung["GioiTinh"] == 1): ?> selected="selected"<?php endif; ?>>Nam</option>
                                        <option value="0"<?php if($nguoidung["GioiTinh"] == 0): ?> selected="selected"<?php endif; ?>>Nữ</option>
                                    </select>
                                </div>
                            </div>
                                <div class="content-header">
                                    <h3 class="mb-0">Thông tin phiếu</h3>
                                    <small class="text-muted">Thông tin phiếu xét nghiệm.</small>
                                </div>

                                <div class="row">
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="vertical-confirm-password">Hình thức khám</label>
                                        <select  class="form-select" id="KhamDinhKy">
                                            <option>Vui lòng chọn</option>
                                            <option value="1"<?php if($pkb["KhamDinhKy"] == 1): ?> selected="selected"<?php endif; ?>>Định kỳ</option>
                                            <option value="0"<?php if($pkb["KhamDinhKy"] == 0): ?> selected="selected"<?php endif; ?>>Khẩn cấp</option>
                                        </select>
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="vertical-password">Ngày khám</label>
                                        <input type="date" id="NgayKham" class="form-control" value="<?php echo $pkb["NgayKham"]->format('Y-m-d') ?>"/>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="vertical-username">Tổng quan</label>
                                        <input type="text" id="TongQuan" class="form-control" value="<?php echo $pkb["TongQuan"]?> "/>
                                    </div>
                                    <div class="mb-1 form-password-toggle col-md-6">
                                        <label class="form-label" for="vertical-password">Huyết áp tối đa</label>
                                        <input type="text" id="NhietDo" class="form-control" value="<?php echo $pkb["NhietDo"]?> " />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-1 form-password-toggle col-md-6">
                                        <label class="form-label" for="vertical-password">Chỉ số SpO2</label>
                                        <input type="text" id="ChiSoSpO" class="form-control" value="<?php echo $pkb["ChiSoSpO2"]?> " />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-1 form-password-toggle col-md-6">
                                        <label class="form-label" for="vertical-password">Huyết áp tối đa</label>
                                        <input type="text" id="HuyetApMax" class="form-control" value="<?php echo $pkb["HuyetApMax"]?> " />
                                    </div>
                                    <div class="mb-1 form-password-toggle col-md-6">
                                        <label class="form-label" for="vertical-password">Huyết áp tối thiểu</label>
                                        <input type="text" id="HuyetApMin" class="form-control" value="<?php echo $pkb["HuyetApMin"]?> " />
                                    </div>
                                </div>
                            <div class="" aria-labelledby="address-step-vertical-trigger">
                                <div class="content-header">
                                    <h3 class="mb-0">Kết luận</h3>
                                </div>
                                <div class="row">
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="vertical-address">Chọn tình trạng</label>
                                        <select id="TinhTrang" class="form-select">
                                            <option>Vui lòng chọn</option>
                                            <option value="-1"<?php if($benhnhan["TinhTrang"] == -1): ?> selected="selected"<?php endif; ?>>Mất</option>
                                            <option value="0"<?php if($benhnhan["TinhTrang"] == 0): ?> selected="selected"<?php endif; ?>>Hết bệnh</option>
                                            <option value="1"<?php if($benhnhan["TinhTrang"] == 1): ?> selected="selected"<?php endif; ?>>Đang theo dõi</option>
                                            <option value="2"<?php if($benhnhan["TinhTrang"] == 2): ?> selected="selected"<?php endif; ?>>Đã nhiễm bệnh</option>
                                            <option value="3"<?php if($benhnhan["TinhTrang"] == 3): ?> selected="selected"<?php endif; ?>>Đã trở nặng</option>
                                        </select>
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="vertical-landmark">Nhập kết luận</label>
                                        <input type="text" id="KetLuan" class="form-control" value="<?php echo $pkb["KetLuan"]?>"/>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <button class="btn btn-success" id="update">Cập nhật phiếu</button>
                                </div>

                        </div>
                    </div>
            </section>
        </div>
    </div>
</div>
<!-- END: Content-->
<script>
    //fetch province list and assign it to province dropdown
    $(document).ready(function(){
        //button add click
        $('#update').click(function () {
            //get value from input

            $IDPhieu =$('#id_phieu').val();
            console.log($IDPhieu);

            $id_user = $('#id_user').val();
            console.log($id_user);

            $NgayKham = $('#NgayKham').val();
            console.log($NgayKham);

            $KhamDinhKy = $('#KhamDinhKy').val();
            console.log($KhamDinhKy);

            $TongQuan = $('#TongQuan').val();
            console.log($TongQuan);

            $HuyetApMax = $('#HuyetApMax').val();
            console.log($HuyetApMax);

            $HuyetApMin = $('#HuyetApMin').val();
            console.log($HuyetApMin);

            $NhietDo = $('#NhietDo').val();
            console.log($NhietDo);

            $ChiSoSpO = $('#ChiSoSpO').val();
            console.log($ChiSoSpO);

            $KetLuan = $('#KetLuan').val();
            console.log($KetLuan);

            $TinhTrang = $('#TinhTrang').val();
            console.log($TinhTrang);

            //$detail = $('#detail').val();
            //console.log($ward);


            //$province = $('#province').val();
            //$district = $('#district').val();
            //$room = $('#room').val();

            $.ajax({ url: "http://20.39.185.180/api/admin/update_pkb.php",
                context: document.body,
                dataType: 'json',
                type : 'post',
                data: {
                    'IDPhieu' : $IDPhieu,
                    'id_bn' : $id_user,
                    'NgayKham' : $NgayKham,
                    'KhamDinhKy' : $KhamDinhKy,
                    'TongQuan': $TongQuan,
                    'HuyetApMax' : $HuyetApMax,
                    'HuyetApMin' : $HuyetApMin,
                    'NhietDo' :$NhietDo,
                    'ChiSoSpO' : $ChiSoSpO,
                    'KetLuan' : $KetLuan,
                    'TinhTrang' : $TinhTrang
                    //'ketluan ' : $ketluan
                    //'room' : $room,
                    //'province' : $province,
                    //'district' : $district,
                },
                success: function(data){
                    console.log(data);
                    if($.trim(data))
                    {
                        Swal.fire('Cập nhật thành công');
                    }else{ Swal.fire('Cập nhật thất bại');}
                }
            });
        })
    });


    $(window).on('load', function() {
        if (feather) {
            feather.replace({
                width: 14,
                height: 14
            });
        }
    })
</script>


<?php include('parent/footer.php') ?>
