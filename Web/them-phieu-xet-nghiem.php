<?php include('parent/header.php');
include "api/db1.php";
$id_user = $_GET['id'];
$get = sqlsrv_query($conn, "SELECT * FROM NguoiDung WHERE  IDNguoiDung = '$id_user'");
var_dump($id_user);
$getbenhnhan = sqlsrv_query($conn, "SELECT * FROM BenhNhan WHERE  IDBenhNhan = '$id_user'");
$getphieu = sqlsrv_query($conn, "SELECT * FROM PhieuNhapXuat WHERE  IDBenhNhan = '$id_user'");

$nguoidung = sqlsrv_fetch_array($get);
$benhnhan = sqlsrv_fetch_array($getbenhnhan);
$phieu =sqlsrv_fetch_array($getphieu);
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
                        <h2 class="content-header-title float-start mb-0">Thêm phiếu xét nghiệm</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Trang chủ</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Quản lý phiếu xét nghiệm</a>
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
                        <div id="account-details-vertical"  aria-labelledby="account-details-vertical-trigger">
                            <div class="content-header">
                                <h3 class="mb-0">Thông tin phiếu</h3>
                                <small class="text-muted">Nhập thông tin phiếu xét nghiệm.</small>
                            </div>

                            <div class="row">
                                <div class="mb-1 col-md-6">
                                    <label class="form-label" for="vertical-confirm-password">PCR</label>
                                    <select  class="form-select" id="PCR">
                                        <option>Vui lòng chọn</option>
                                        <option value="1">Dương tính</option>
                                        <option value="0">Âm tính</option>
                                    </select>
                                </div>
                                <div class="mb-1 col-md-6">
                                    <label class="form-label" for="vertical-email">Chỉ số CT</label>
                                    <input type="number" id="ChiSoCT" class="form-control" placeholder="20"  />
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-1 col-md-6">
                                    <label class="form-label" for="vertical-password">Ngày lấy mẫu</label>
                                    <input type="date" id="NgayLayMau" class="form-control" />
                                </div>
                                <div class="mb-1 col-md-6">
                                    <label class="form-label" for="NgayTraKetQua">Ngày trả kết quả</label>
                                    <input type="date" id="NgayTraKetQua" class="form-control" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-1 col-md-6">
                                    <label class="form-label" for="vertical-password">Ngày lấy mẫu tiếp theo</label>
                                    <input type="date" id="NgayLayMauTiepTheo" class="form-control" />
                                </div>
                            </div>
                        </div>
                        <div class="" aria-labelledby="address-step-vertical-trigger">
                            <div class="content-header">
                                <h3 class="mb-0">Kết quả xét nghiệm</h3>
                            </div>
                            <div class="row">
                                <div class="mb-1 col-md-6">
                                    <label class="form-label" for="vertical-address">Chọn kết quả xét nghiệm</label>
                                    <select id="KetQuaXetNghiem" class="form-select">
                                        <option>Vui lòng chọn</option>
                                        <option value="0">Âm tính</option>
                                        <option value="1">Dương tính</option>
                                    </select>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between">
                                <button class="btn btn-success" id="add">Thêm phiếu</button>
                            </div>
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
        $('#add').click(function () {
            //get value from input

            $id_user = $('#id_user').val();
            console.log($id_user);

            $NgayLayMau = $('#NgayLayMau').val();
            console.log($NgayLayMau);

            $PCR = $('#PCR').val();
            console.log($PCR);

            $NgayTraKetQua = $('#NgayTraKetQua').val();
            console.log($NgayTraKetQua);

            $ChiSoCT = $('#ChiSoCT').val();
            console.log($ChiSoCT);

            $KetQuaXetNghiem = $('#KetQuaXetNghiem').val();
            console.log($KetQuaXetNghiem);

            $NgayLayMauTiepTheo = $('#NgayLayMauTiepTheo').val();
            console.log($NgayLayMauTiepTheo);

            //$spo = $('#spo').val();
            //console.log($spo);

            //$ketluan = $('#ketluan').val();
            //console.log($ketluan);

            //$ward = $('#ward').val();
            //console.log($ward);

            //$detail = $('#detail').val();
            //console.log($ward);


            //$province = $('#province').val();
            //$district = $('#district').val();
            //$room = $('#room').val();

            $.ajax({ url: "http://20.39.185.180/api/admin/add_pxn.php",
                context: document.body,
                dataType: 'json',
                type : 'post',
                data: {
                    'id_bn' : $id_user,
                    'NgayLayMau' : $NgayLayMau,
                    'PCR' : $PCR,
                    'NgayTraKetQua': $NgayTraKetQua,
                    'ChiSoCT' : $ChiSoCT,
                    'KetQuaXetNghiem' : $KetQuaXetNghiem,
                    'NgayLayMauTiepTheo' :$NgayLayMauTiepTheo,
                    //'spo' : $spo,
                    //'ketluan' : $ketluan
                    //'ward' : $ward,
                    //'ketluan ' : $ketluan
                    //'room' : $room,
                    //'province' : $province,
                    //'district' : $district,

                },
                success: function(data){
                    console.log(data);
                    if($.trim(data))
                    {
                        Swal.fire('Thêm thành công');
                    }else{ Swal.fire('Thêm thất bại');}
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
