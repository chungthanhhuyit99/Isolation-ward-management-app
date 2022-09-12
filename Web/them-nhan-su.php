<?php include('parent/header.php') ?>

<!-- BEGIN: Content-->
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0">Thêm nhân sự</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Trang chủ</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Quản lý nhân sự</a>
                                </li>
                                <li class="breadcrumb-item active">Thêm nhân sự
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
                                <small class="text-muted">Nhập thông tin nhân sự.</small>
                            </div>

                            <div class="row">
                                <div class="mb-1 col-md-6">
                                    <label class="form-label" for="vertical-username">Họ và tên</label>
                                    <input type="text" id="fullname" class="form-control"  />
                                </div>
                                <div class="mb-1 col-md-6">
                                    <label class="form-label" for="vertical-email">Số điện thoại</label>
                                    <input type="number" id="phone" class="form-control" placeholder="0121345548"  />
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-1 form-password-toggle col-md-6">
                                    <label class="form-label" for="vertical-password">Ngày sinh</label>
                                    <input type="date" id="dob" class="form-control" />
                                </div>
                                <div class="mb-1 form-password-toggle col-md-6">
                                    <label class="form-label" for="vertical-confirm-password">Giới tính</label>
                                    <select  class="form-select" id="gender">
                                        <option>Vui lòng chọn</option>
                                        <option value="1">Nam</option>
                                        <option value="0">Nữ</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-1 form-password-toggle col-md-6">
                                    <label class="form-label" for="vertical-password">Quốc tịch</label>
                                    <input type="text" id="national" class="form-control"  />
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
                                        <option value="1">Điều dưỡng </option>
                                        <option value="2">Bác sĩ </option>
                                    </select>
                                </div>
                                <div class="mb-1 col-md-6">
                                    <label class="form-label" for="vertical-landmark">Nhập trình độ chuyên môn</label>
                                    <input type="text" id="chitiettrinhdo" class="form-control" />
                                </div>
                            </div>
                            <div class="d-flex justify-content-between">
                                <button class="btn btn-success" id="add">Thêm nhân sự</button>
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
        $('#add').click(function () {

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

            $.ajax({ url: "http://20.39.185.180/api/admin/add_nhansu.php",
                context: document.body,
                dataType: 'json',
                type : 'post',
                data: {
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
