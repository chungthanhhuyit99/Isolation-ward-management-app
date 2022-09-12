<?php include('parent/header.php');
include "api/db1.php";
$id_taikhoan = $_GET['id'];
$gettaikhoan = sqlsrv_query($conn, "SELECT * FROM NguoiDung WHERE   IDNguoiDung = '$id_taikhoan'");
$taikhoan =sqlsrv_fetch_array($gettaikhoan);

?>


<!-- BEGIN: Content-->
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <section class="invoice-list-wrapper">
                <!--<div class="row">
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="card-body d-flex align-items-center justify-content-between">
                                <div>
                                    <h3 class="fw-bolder mb-75">21,459</h3>
                                    <span>Tổng bệnh nhân</span>
                                </div>
                                <div class="avatar bg-light-primary p-50">
                                        <span class="avatar-content">
                                            <i data-feather="user" class="font-medium-4"></i>
                                        </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="card-body d-flex align-items-center justify-content-between">
                                <div>
                                    <h3 class="fw-bolder mb-75">4,567</h3>
                                    <span>Bệnh nhân trở nặng</span>
                                </div>
                                <div class="avatar bg-light-danger p-50">
                                        <span class="avatar-content">
                                            <i data-feather="user-plus" class="font-medium-4"></i>
                                        </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="card-body d-flex align-items-center justify-content-between">
                                <div>
                                    <h3 class="fw-bolder mb-75">19,860</h3>
                                    <span>Bệnh nhân đang theo dõi</span>
                                </div>
                                <div class="avatar bg-light-success p-50">
                                        <span class="avatar-content">
                                            <i data-feather="user-check" class="font-medium-4"></i>
                                        </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="card-body d-flex align-items-center justify-content-between">
                                <div>
                                    <h3 class="fw-bolder mb-75">237</h3>
                                    <span>Bệnh nhân đã tử vong</span>
                                </div>
                                <div class="avatar bg-light-warning p-50">
                                        <span class="avatar-content">
                                            <i data-feather="user-x" class="font-medium-4"></i>
                                        </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>-->
            </section>
            <!-- Vertical Wizard -->
            <section class="vertical-wizard">
                <div class="vertical-wizard-example">
                    <div class="card-body">
                        <div id="account-details-vertical"  aria-labelledby="account-details-vertical-trigger">
                            <div class="content-header">
                                <h3 class="mb-0">Thông tin tài khoản</h3>
                                <small class="text-muted">Nhập thông tin tài khoản.</small>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-1 col-md-6">
                                <label class="form-label" for="vertical-username">UserName</label>
                                <input type="text" id="id_taikhoan"  hidden class="form-control" value="<?php echo $id_taikhoan ?>"/>
                                <input type="text" id="Name" class="form-control" value="<?php echo $taikhoan["HovaTen"] ?>" readonly="readonly"/>
                            </div>
                            <div class="mb-1 form-password-toggle col-md-6">
                                <label class="form-label" for="vertical-confirm-password">Vai trò</label>
                                <select  class="form-select" id="VaiTro" disabled="disabled">
                                    <option>Vui lòng chọn</option>
                                    <option value="CB"<?php if($taikhoan["VaiTro"] == 'CB'): ?> selected="selected"<?php endif; ?>>Cán bộ</option>
                                    <option value="BS"<?php if($taikhoan["VaiTro"] == 'BS'): ?> selected="selected"<?php endif; ?>>Bác sĩ</option>
                                    <option value="NV"<?php if($taikhoan["VaiTro"] == 'NV'): ?> selected="selected"<?php endif; ?>>Điều dưỡng</option>
                                    <option value="NV"<?php if($taikhoan["VaiTro"] == 'BN'): ?> selected="selected"<?php endif; ?>>Bệnh nhân</option>
                                </select>
                            </div>

                        </div>
                        <div class="row">
                            <div class="mb-1 form-password-toggle col-md-6">
                                <label class="form-label" for="vertical-confirm-password">Trạng thái</label>
                                <select  class="form-select" id="TrangThai">
                                    <option>Vui lòng chọn</option>
                                    <option value = "1" <?php if($taikhoan["TrangThai"] == 1): ?> selected="selected"<?php endif; ?>>Hoạt động</option>
                                    <option value = "0" <?php if($taikhoan["TrangThai"] == 0): ?> selected="selected"<?php endif; ?>>Ngưng hoạt động</option>
                                </select>
                            </div>
                        </div>
                            <div class="row">
                                <div class="mb-1 col-md-6">
                                    <label class="form-label" for="vertical-username">UserName</label>
                                    <input type="text" id="UserName" class="form-control"  value="<?php echo $taikhoan["UserName"] ?>"/>
                                </div>
                                <div class="mb-1 col-md-6">
                                    <label class="form-label" for="vertical-email">PassWord</label>
                                    <input type="number" id="PassWord" class="form-control" value="<?php echo $taikhoan["PassWord"] ?>" />
                                </div>
                            <div class="" aria-labelledby="address-step-vertical-trigger">
                                <div class="d-flex justify-content-between">
                                    <button class="btn btn-success" id="update">Cập nhật tài khoản</button>
                                </div>
                            </div>
                        </div>
                    </div>
            </section>
        </div>
    </div>
</div>
</div>
    <script>
        $(document).ready(function(){
            //button add click
            $('#update').click(function () {
                //get value from input

                $id_taikhoan = $('#id_taikhoan').val();
                console.log($id_taikhoan);

                $UserName = $('#UserName').val();
                console.log($UserName);

                $PassWord = $('#PassWord').val();
                console.log($PassWord);

                $TrangThai = $('#TrangThai').val();
                console.log($TrangThai);

                $.ajax({ url: "http://20.39.185.180/api/admin/update_taikhoan.php",
                    context: document.body,
                    dataType: 'json',
                    type : 'post',
                    data: {
                        'id_taikhoan':$id_taikhoan,
                        'UserName' : $UserName,
                        'PassWord' : $PassWord,
                        'TrangThai': $TrangThai
                    },
                    success: function(data){
                        console.log(data);
                        if($.trim(data))
                        {
                            Swal.fire('Thêm thành công');
                            /*$("#success_message").attr("style", "display: none");*/
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