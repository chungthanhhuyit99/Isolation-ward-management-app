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
                        <h2 class="content-header-title float-start mb-0">Thêm phiếu nhập xuất</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Trang chủ</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Quản lý phiếu nhập xuất</a>
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
                            <div id="account-details-vertical"  aria-labelledby="account-details-vertical-trigger">
                            <div class="content-header">
                                <h3 class="mb-0">Thông tin phiếu</h3>
                                <small class="text-muted">Nhập thông tin phiếu xét nghiệm.</small>
                            </div>

                            <div class="row">
                                <div class="mb-1 col-md-6">
                                    <label class="form-label" for="vertical-confirm-password">Loại phiếu</label>
                                    <select  class="form-select" id="LoaiPhieu">
                                        <option>Vui lòng chọn</option>
                                        <option value="X">Phiếu xuất</option>
                                        <option value="N">Phiếu nhập</option>
                                    </select>
                                </div>
                                <div class="mb-1 col-md-6">
                                    <label class="form-label" for="vertical-password">Ngày</label>
                                    <input type="date" id="Ngay" class="form-control" />

                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-1 col-md-6">
                                    <label class="form-label" for="vertical-first-name">Chọn cơ sở</label>
                                    <select class="select2 w-100" id="CoSo">
                                        <option>Vui lòng chọn</option>
                                    </select>
                                </div>
                            </div>
                                <div class="row">
                                    <div class="mb-1 col-md-12">
                                        <textarea class="form-control" placeholder="Nhập nội dung" rows="5" id="NoiDung"></textarea>
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

    $(document).ready(function(){
        $.ajax({ url: "http://20.39.185.180/api/admin/fetch_macoso.php",
            context: document.body,
            type: 'POST',
            dataType: 'json',
            success: function(data){
                $.each(data, function (index, value) {
                    $('#CoSo').append($('<option/>', {
                        value: value['MaCoSo'],
                        text : value['TenCoSo'],
                    }));
                });
            }
        });

        //button add click
        $('#add').click(function () {
            //get value from input

            $id_user = $('#id_user').val();
            console.log($id_user);

            $Ngay = $('#Ngay').val();
            console.log($Ngay);

            $LoaiPhieu = $('#LoaiPhieu').val();
            console.log($LoaiPhieu);

            $NoiDung = $('#NoiDung').val();
            console.log($NoiDung);

            $CoSo = $('#CoSo').val();
            console.log($CoSo);

            //$KetQuaXetNghiem = $('#KetQuaXetNghiem').val();
            //console.log($KetQuaXetNghiem);

            //$NgayLayMauTiepTheo = $('#NgayLayMauTiepTheo').val();
            //console.log($NgayLayMauTiepTheo);

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

            $.ajax({ url: "http://20.39.185.180/api/admin/add_pnx.php",
                context: document.body,
                dataType: 'json',
                type : 'post',
                data: {
                    'id_bn' : $id_user,
                    'Ngay' : $Ngay,
                    'LoaiPhieu' : $LoaiPhieu,
                    'NoiDung': $NoiDung,
                    'CoSo' : $CoSo


                    //'KetQuaXetNghiem' : $KetQuaXetNghiem,
                    //'NgayLayMauTiepTheo' :$NgayLayMauTiepTheo,
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

