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
                            <h2 class="content-header-title float-start mb-0">Thêm bệnh nhân</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Trang chủ</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#">Quản lý bệnh nhân</a>
                                    </li>
                                    <li class="breadcrumb-item active">Thêm bệnh nhân
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
                    <div class="bs-stepper vertical vertical-wizard-example">
                        
                        <div class="bs-stepper-header">
                            <div class="step" data-target="#account-details-vertical" role="tab" id="account-details-vertical-trigger">
                                <button type="button" class="step-trigger">
                                    <span class="bs-stepper-box">1</span>
                                    <span class="bs-stepper-label">
                                        <span class="bs-stepper-title">Thông tin cá nhân</span>
                                        <span class="bs-stepper-subtitle">Nhập các thông tin cơ bản</span>
                                    </span>
                                </button>
                            </div>
                            <div class="step" data-target="#personal-info-vertical" role="tab" id="personal-info-vertical-trigger">
                                <button type="button" class="step-trigger">
                                    <span class="bs-stepper-box">2</span>
                                    <span class="bs-stepper-label">
                                        <span class="bs-stepper-title">Địa chỉ</span>

                                    </span>
                                </button>
                            </div>
                            <div class="step" data-target="#address-step-vertical" role="tab" id="address-step-vertical-trigger">
                                <button type="button" class="step-trigger">
                                    <span class="bs-stepper-box">3</span>
                                    <span class="bs-stepper-label">
                                        <span class="bs-stepper-title">Tình trạng sức khỏe</span>
                                        <span class="bs-stepper-subtitle">Thông tin sức khỏe lúc nhập viện</span>
                                    </span>
                                </button>
                            </div>

                        </div>
                        <div class="bs-stepper-content">
                            <div id="account-details-vertical" class="content" role="tabpanel" aria-labelledby="account-details-vertical-trigger">
                                <div class="content-header">
                                    <h5 class="mb-0">Thông tin bệnh nhân</h5>
                                    <small class="text-muted">Nhập thông tin bệnh nhân.</small>
                                </div>
                                <div class="row">
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="vertical-username">Họ và tên</label>
                                        <input type="text" id="fullname" class="form-control"  />
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Please enter your name.</div>
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
                                        <input type="text" id="national" class="form-control" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
                                    </div>
                                    <div class="mb-1 form-password-toggle col-md-6">
                                        <label class="form-label" for="vertical-confirm-password">CMND/CCCD</label>
                                        <input type="text" id="id" class="form-control" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <button class="btn btn-outline-secondary btn-prev" disabled>
                                        <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
                                        <span class="align-middle d-sm-inline-block d-none">Trước đó</span>
                                    </button>
                                    <button class="btn btn-primary btn-next">
                                        <span class="align-middle d-sm-inline-block d-none">Tiếp theo</span>
                                        <i data-feather="arrow-right" class="align-middle ms-sm-25 ms-0"></i>
                                    </button>
                                </div>
                            </div>
                            <div id="personal-info-vertical" class="content" role="tabpanel" aria-labelledby="personal-info-vertical-trigger">
                                <div class="content-header">
                                    <h5 class="mb-0">Địa chỉ bệnh nhân</h5>
                                    <small>Nhập thông tin nơi cư trú bệnh nhân.</small>
                                </div>
                                <div class="row">
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="vertical-first-name">Tỉnh thành</label>
                                        <select class="select2 w-100" id="province">
                                            <option>Vui lòng chọn</option>
                                        </select>
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="vertical-last-name">Quận/ huyện</label>
                                        <select class="select2 w-100" id="district">
                                            <option>Vui lòng chọn</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="vertical-country">Phường/xã/thị trấn</label>
                                        <select class="select2 w-100" id="ward">
                                            <option >Vui lòng chọn</option>

                                        </select>
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="vertical-language">Chi tiết địa chỉ</label>
                                        <input type="text" id="detail" class="form-control" placeholder="Nhập chi tiết địa chỉ" />
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <button class="btn btn-primary btn-prev">
                                        <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
                                        <span class="align-middle d-sm-inline-block d-none">Trước đó</span>
                                    </button>
                                    <button class="btn btn-primary btn-next">
                                        <span class="align-middle d-sm-inline-block d-none">Tiếp theo</span>
                                        <i data-feather="arrow-right" class="align-middle ms-sm-25 ms-0"></i>
                                    </button>
                                </div>
                            </div>
                            <div id="address-step-vertical" class="content" role="tabpanel" aria-labelledby="address-step-vertical-trigger">
                                <div class="content-header">
                                    <h5 class="mb-0">Tình trạng sức khỏe</h5>

                                </div>
                                <div class="row">
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="vertical-address">Tình trạng sức khỏe</label>
                                        <select id="status" class="form-select">
                                            <option>Vui lòng chọn</option>
                                            <option value="1">Đang theo dõi</option>
                                            <option value="2">Đã nhiễm bệnh</option>
                                            <option value="3">Đã trở nặng</option>
                                        </select>
                                    </div>
                                    <!--<div class="mb-1 col-md-6">
                                        <label class="form-label" for="vertical-landmark">Lưu ý</label>
                                        <input type="text" id="vertical-landmark" class="form-control" />
                                    </div>-->
                                    <!--<div class="mb-1 col-md-6">
                                        <label class="form-label" for="vertical-username">Tên cán bộ</label>
                                        <select class="select2 form-select select2-hidden-accessible" id="cb" data-select2-id="select2-basic" tabindex="-1" aria-hidden="true">
                                            <option >Vui lòng chọn</option>
                                        </select>
                                    </div>-->
                                </div>
                                <div class="d-flex justify-content-between">
                                    <button class="btn btn-primary btn-prev">
                                        <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
                                        <span class="align-middle d-sm-inline-block d-none">Trước đó</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- /Vertical Wizard -->
                <section class="snow-editor">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Thông tin nhập viện</h4>
                                </div>
                                    <div class="card-body">
                                    <div class="content-header">
                                        <h5 class="mb-0">Địa điểm cách ly</h5>
                                        <small class="text-muted">Nhập thông tin phòng và giường bệnh.</small>
                                    </div>
                                    <div class="row">
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="vertical-username">Số phòng</label>
                                            <select class="select2 form-select select2-hidden-accessible" id="room" data-select2-id="select2-basic" tabindex="-1" aria-hidden="true">
                                                <option >Vui lòng chọn</option>
                                            </select>
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="vertical-email">Số giường</label>
                                            <select class="select2 form-select select2-hidden-accessible" id="bed" data-select2-id="select2-basic" tabindex="-1" aria-hidden="true">
                                                <option >Vui lòng chọn</option>
                                            </select>
                                        </div>
                                    </div>
                                        <div class="row">
                                            <div class="mb-1 col-md-6">
                                                <label class="form-label" for="vertical-user">Tên cán bộ</label>
                                                <select class="select2 form-select " id="cb" >
                                                    <option >Vui lòng chọn</option>
                                                </select>
                                            </div>
                                            <label class="form-label" for="vertical-username">Nội dung nhập</label>
                                            <div class="mb-1 col-md-12">
                                                <textarea class="form-control" placeholder="Nhập dung nhập" rows="4" id="note"></textarea>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                </section>
                <button class="btn btn-success" id="add">Thêm bệnh nhân</button>
            </div>
        </div>
    </div>
    <!-- END: Content-->


    <script>
        //fetch province list and assign it to province dropdown
        $(document).ready(function(){
            //load room
            $.ajax({ url: "http://20.39.185.180/api/admin/fetch_cb.php",
                context: document.body,
                type: 'POST',
                dataType: 'json',
                success: function(data){

                    $.each(data, function (index, value) {
                        $('#cb').append($('<option/>', {
                            value: value['IDNguoiDung'],
                            text :  value['HovaTen'],
                        }));
                    });
                }
            });
            $.ajax({ url: "http://20.39.185.180/api/admin/fetch_room.php",
                context: document.body,
                type: 'POST',
                dataType: 'json',
                success: function(data){

                    $.each(data, function (index, value) {
                        $('#room').append($('<option/>', {
                            value: value['IDPhong'],
                            text :  value['IDPhong'],
                        }));
                    });
                }
            });
            //catch room on change event, update bed on room base on selected room
            $('#room').on('change', function (e) {
                 //clear previous value
                $('#bed')
                    .find('option')
                    .remove()
                    .end()
                    .append('<option>Vui lòng chọn</option>');
                $room_id = $('#room').val();
                $.ajax({ url: "http://20.39.185.180/api/admin/fetch_bed.php",
                    context: document.body,
                    dataType: 'json',
                    type : 'post',
                    data: { room_id : $room_id},
                    success: function(data){
                        console.log(data);
                        $.each(data, function (index, value) {
                            $('#bed').append($('<option/>', {
                                value: value['IDGiuong'],
                                text : value['IDGiuong']
                            }));
                        });
                    }
                });
            });
            $.ajax({ url: "http://20.39.185.180/api/admin/fetch_province.php",
                context: document.body,
                dataType: 'json',
                success: function(data){
                    $.each(data, function (index, value) {
                        $('#province').append($('<option/>', {
                            value: value['MaTinh'],
                            text : value['TenTinh']
                        }));
                    });
                }
            });

            //catch on change event, update district dropdown base on selected province
            $('#province').on('change', function (e) {
                //clear previous value
                $('#district')
                    .find('option')
                    .remove()
                    .end()
                    .append('<option>Vui lòng chọn</option>');
                $('#ward')
                    .find('option')
                    .remove()
                    .end()
                    .append('<option>Vui lòng chọn</option>')
                ;
                $province_id = $('#province').val();
                $.ajax({ url: "http://20.39.185.180/api/admin/fetch_district.php",
                    context: document.body,
                    dataType: 'json',
                    type : 'post',
                    data: { province_id : $province_id},
                    success: function(data){
                        console.log(data);
                        $.each(data, function (index, value) {
                            $('#district').append($('<option/>', {
                                value: value['MaHuyen'],
                                text : value['TenHuyen']
                            }));
                        });
                    }
                });
            });

            //catch district on change event, update ward dropdown base on selected district
            $('#district').on('change', function (e) {
                //clear previous value
                $('#ward')
                    .find('option')
                    .remove()
                    .end()
                    .append('<option>Vui lòng chọn</option>')
                ;
                console.log(e);
                $district_id = $('#district').val();
                $.ajax({ url: "http://20.39.185.180/api/admin/fetch_ward.php",
                    context: document.body,
                    dataType: 'json',
                    type : 'post',
                    data: { district_id : $district_id},
                    success: function(data){
                        console.log(data);
                        $.each(data, function (index, value) {
                            $('#ward').append($('<option/>', {
                                value: value['MaXa'] ,
                                text : value['Loai'] + ' ' + value['TenXa']
                            }));
                        });
                    }
                });
            });
        //button add click
            $('#add').click(function () {
                //get value from input
                $fullname = $('#fullname').val();
                console.log($fullname);

                $dob = $('#dob').val();
                console.log($dob);

                $phone = $('#phone').val();
                console.log($fullname);

                $gender = $('#gender').val();
                console.log($gender);

                $national = $('#national').val();
                console.log($national);

                $status = $('#status').val();//tinhtrang
                console.log($status);

                $bed = $('#bed').val();
                console.log($bed);

                $id = $('#id').val();
                console.log($id);

                $ward = $('#ward').val();
                console.log($ward);

                $detail = $('#detail').val();
                console.log($ward);


                $idcb = $('#cb').val();
                console.log($idcb);

                $note = $('#note').val();
                console.log($note);

                //$room = $('#room').val();

//'$fullname','$dob','$phone',$gender,'$national',$status,'$bed','$id','$ward','$detail','$id_phieu','N','Nhập viện bệnh nhân','1','50' */
                $.ajax({ url: "http://20.39.185.180/api/admin/add_victim.php",
                    context: document.body,
                    dataType: 'json',
                    type : 'post',
                    data: {
                        'fullname' : $fullname,
                        'dob' : $dob,
                        'phone': $phone,
                        'gender' : $gender,
                        'national' : $national,
                        'status' :$status,
                        'bed' : $bed,
                        'id' : $id,
                        'ward' : $ward,
                        'detail' : $detail,
                        'idcb' : $idcb,
                        'note' : $note
                        //'district' : $district,
                    },
                    success: function(data){
                        console.log(data);
                        if($.trim(data))
                        {
                            Swal.fire('Thêm thành công');
                        }else{ Swal.fire('Thêm thất bại');}

                        $.each(data, function (index, value) {
                            $('#ward').append($('<option/>', {
                                value: value['MaXa'] ,
                                text : value['Loai'] + ' ' + value['TenXa']
                            }));
                        });
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