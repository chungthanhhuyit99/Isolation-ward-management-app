<?php
include('parent/header.php');
include "api/db1.php";
// Turn off error reporting
error_reporting(1);

// Report runtime errors
error_reporting(E_ERROR | E_WARNING | E_PARSE);

// Report all errors
error_reporting(E_ALL);

// Same as error_reporting(E_ALL);
ini_set("error_reporting", E_ALL);

// Report all errors except E_NOTICE
error_reporting(E_ALL & ~E_NOTICE);
$id_user = $_GET['id'];
$get = sqlsrv_query($conn, "SELECT * FROM NguoiDung WHERE  IDNguoiDung = '$id_user'");

$nhansu = sqlsrv_fetch_array($get);
var_dump($nhansu['HovaTen']);
$dd = sqlsrv_query($conn, "SELECT * FROM DieuDuong WHERE  IDDieuDuong = '$id_user'");
$cm_dd = sqlsrv_fetch_array($dd);


$bs = sqlsrv_query($conn, "SELECT * FROM BacSi WHERE  IDBacSi = '$id_user'");
$cm_bs = sqlsrv_fetch_array($bs);

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
                        <h2 class="content-header-title float-start mb-0">Chi tiết nhân sự</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Trang chủ</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Quản lý nhân sự</a>
                                </li>
                                <li class="breadcrumb-item active">Cập nhật nhân sự
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
                                <h3 class="mb-0">Thông tin nhân sự</h3>
                                <small class="text-muted">Thông tin nhân sự.</small>
                            </div>

                            <div class="row">
                                <div class="mb-1 col-md-6">
                                    <label class="form-label" for="vertical-username">Họ và tên</label>
                                    <input type="text" id="id_user"  hidden class="form-control" value="<?php echo $nhansu["IDNguoiDung"] ?>"/>
                                    <input type="text" id="fullname" class="form-control" value= " <?php echo $nhansu["HovaTen"]?>" />
                                </div>
                                <div class="mb-1 col-md-6">
                                    <label class="form-label" for="vertical-email">Số điện thoại</label>
                                    <input type="number" id="phone" class="form-control" value="<?php echo $nhansu["SDT"] ?>" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-1 form-password-toggle col-md-6">
                                    <label class="form-label" for="vertical-password">Ngày sinh</label>
                                    <input type="date" id="dob" class="form-control" value="<?php echo $nhansu["NgaySinh"]->format('Y-m-d') ?>"/>
                                </div>
                                <div class="mb-1 form-password-toggle col-md-6">
                                    <label class="form-label" for="vertical-confirm-password">Giới tính</label>
                                    <select  class="form-select" id="gender">
                                        <option>Vui lòng chọn</option>
                                        <option value="1" <?php if($nhansu["GioiTinh"] == 1): ?> selected="selected"<?php endif; ?> >Nam</option>
                                        <option value="0" <?php if($nhansu["GioiTinh"] == 0): ?> selected="selected"<?php endif; ?> >Nữ</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-1 form-password-toggle col-md-6">
                                    <label class="form-label" for="vertical-password">Quốc tịch</label>
                                    <input type="text" id="national" class="form-control" value="<?php echo $nhansu["Quoctich"] ?>" />
                                </div>

                            </div>
                            <div class="" aria-labelledby="address-step-vertical-trigger">
                                <div class="content-header">
                                    <h3 class="mb-0">Chuyên môn</h3>

                                </div>
                                <div class="row">
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="vertical-address">Chọn vai trò</label>
                                        <select id="chuyenmon" class="form-select">
                                            <option>Vui lòng chọn</option>
                                            <option value="NV"<?php if($nhansu["VaiTro"] == 'NV'): ?> selected="selected"<?php endif; ?>>Điều dưỡng - Đơn vị công tác</option>
                                            <option value="BS"<?php if($nhansu["VaiTro"] == 'BS'): ?> selected="selected"<?php endif; ?>>Bác sĩ - Trình độ chuyên môn</option>
                                        </select>
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="vertical-landmark">Nhập trình độ chuyên môn</label>
                                        <input type="text" id="chitiettrinhdo" class="form-control" value=" <?php if ($nhansu["VaiTro"] == 'NV') echo $cm_dd["DonViCongTac"]; if ($nhansu["VaiTro"] == 'BS') echo $cm_bs["TrinhDoChuyenMon"]; ?>"/>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <button class="btn btn-success" id="update">Cập nhật nhân sự</button>
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
        $('#update').click(function () {

            $id_user = $('#id_user').val();
            console.log($id_user);

            $fullname = $('#fullname').val();
            console.log($fullname);

            $dob = $('#dob').val();
            console.log($dob);

            $phone = $('#phone').val();
            console.log($phone);

            $gender = $('#gender').val();
            console.log($gender);

            $national = $('#national').val();
            console.log($national);

            $chuyenmon = $('#chuyenmon').val();
            console.log($chuyenmon);

            $chitiettrinhdo=$('#chitiettrinhdo').val();
            console.log($chitiettrinhdo);

            $.ajax({ url: "http://20.39.185.180/api/admin/update_nhansu.php",
                context: document.body,
                dataType: 'json',
                type : 'post',
                data: {
                    'id_user' : $id_user,
                    'fullname' : $fullname,
                    'dob' : $dob,
                    'phone': $phone,
                    'national' : $national,
                    'gender' : $gender,
                    'chuyenmon' :$chuyenmon,
                    'chitiettrinhdo':$chitiettrinhdo
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
<!-- END: Content-->
<?php include('parent/footer.php') ?>

