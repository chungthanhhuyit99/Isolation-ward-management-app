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
                        <h2 class="content-header-title float-start mb-0">Thêm cơ sở, khu, giường, phòng</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Trang chủ</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Quản lý cơ sở, khu, giường, phòng</a>
                                </li>
                                <li class="breadcrumb-item active">Thêm
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
                                <h3 class="mb-0">Thêm cơ sở</h3>
                                <small class="text-muted">Nhập thông tin cơ sở.</small>
                            </div>
                            <div class="row">
                                <div class="mb-1 col-md-6">
                                    <label class="form-label" for="vertical-language">Tên cơ sở</label>
                                    <input type="text" id="TenCoSo" class="form-control"  />
                                </div>
                                <div class="mb-1 col-md-6">
                                    <label class="form-label" for="vertical-language">Địa chỉ</label>
                                    <input type="text" id="DiaChi" class="form-control"  />
                                </div>
                            </div>
                            <div class="d-flex justify-content-between">
                                <button class="btn btn-success" id="add-coso">Thêm cơ sở</button>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="vertical-wizard">
                <div class="vertical-wizard-example">
                    <div class="card-body">
                        <div id="account-details-vertical"  aria-labelledby="account-details-vertical-trigger">
                            <div class="content-header">
                                <h3 class="mb-0">Thêm khu</h3>
                                <small class="text-muted">Nhập thông tin khu.</small>
                            </div>
                            <div class="row">
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="vertical-first-name">Cơ sở</label>
                                        <select class="select2 w-100" id="CoSo-khu">
                                            <option>Vui lòng chọn</option>
                                        </select>
                                    </div>
                                <div class="mb-1 col-md-6">
                                    <label class="form-label" for="vertical-language">Mã Khu</label>
                                    <input type="text" id="MaKhu" class="form-control" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-1 col-md-6">
                                    <label class="form-label" for="vertical-language">Tên Khu</label>
                                    <input type="text" id="TenKhu" class="form-control" />
                                </div>
                            </div>
                            <div class="d-flex justify-content-between">
                                <button class="btn btn-success" id="add-khu">Thêm khu</button>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="snow-editor">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Thêm phòng</h4>
                            </div>
                            <div class="card-body">
                                <div class="content-header">
                                    <h5 class="mb-0">Địa điểm cách ly</h5>
                                    <small class="text-muted">Nhập thông tin phòng.</small>
                                </div>
                                <div class="row">
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="vertical-first-name">Cơ sở</label>
                                        <select class="select2 w-100" id="CoSo-khu-phong">
                                            <option>Vui lòng chọn</option>
                                        </select>
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="vertical-first-name">Khu</label>
                                        <select class="select2 w-100" id="khu-phong">
                                            <option>Vui lòng chọn</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="vertical-language">ID phòng</label>
                                        <input type="text" id="id-room" class="form-control" />
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="vertical-language">Số lượng giường</label>
                                        <input type="text" id="soluong_bed" class="form-control" />
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <button class="btn btn-success" id="add-phong">Thêm phòng</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="snow-editor">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Thêm giường</h4>
                            </div>
                            <div class="card-body">
                                <div class="content-header">
                                    <h5 class="mb-0">Địa điểm cách ly</h5>
                                    <small class="text-muted">Nhập thông tin giường.</small>
                                </div>
                                <div class="row">
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="vertical-first-name">Cơ sở</label>
                                        <select class="select2 w-100" id="CoSo-khu-phong-giuong">
                                            <option>Vui lòng chọn</option>
                                        </select>
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="vertical-first-name">Khu</label>
                                        <select class="select2 w-100" id="khu-phong-giuong">
                                            <option>Vui lòng chọn</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="vertical-first-name">Phòng</label>
                                        <select class="select2 w-100" id="phong-giuong">
                                            <option>Vui lòng chọn</option>
                                        </select>
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="vertical-language">ID giường</label>
                                        <input type="text" id="giuong" class="form-control" />
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <button class="btn btn-success" id="add-giuong">Thêm giường</button>
                                </div>
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
        $.ajax({ url: "http://20.39.185.180/api/admin/fetch_coso.php",
            context: document.body,
            type: 'POST',
            dataType: 'json',
            success: function(data){
                $.each(data, function (index, value) {
                    $('#CoSo-khu').append($('<option/>', {
                        value: value['MaCoSo'],
                        text :  value['TenCoSo'],
                    }));
                });
            }
        });
        $('#add-coso').click(function () {
            //get value from input
            function reload() {
                $("#CoSo-khu").load("http://20.39.185.180/api/admin/fetch_coso.php");
            }
            $TenCoSo = $('#TenCoSo').val();
            console.log($TenCoSo);

            $DiaChi = $('#DiaChi').val();
            console.log($DiaChi);

            $.ajax({ url: "http://20.39.185.180/api/admin/add_coso.php",
                context: document.body,
                dataType: 'json',
                type : 'post',
                data: {
                    'TenCoSo' : $TenCoSo,
                    'DiaChi' : $DiaChi
                },
                success: function(data){
                    console.log(data);
                    if($.trim(data))
                    {
                        Swal.fire('Thêm thành công');
                    }else{ Swal.fire('Thêm thất bại');}
                }
            });
            $('#CoSo-khu')
                .find('option')
                .remove()
                .end()
                .append('<option>Vui lòng chọn</option>');
            $.ajax({ url: "http://20.39.185.180/api/admin/fetch_coso.php",
                context: document.body,
                type: 'POST',
                dataType: 'json',
                success: function(data){
                    $.each(data, function (index, value) {
                        $('#CoSo-khu').append($('<option/>', {
                            value: value['MaCoSo'],
                            text :  value['TenCoSo'],
                        }));
                    });
                }
            });
        })

        //button add click
        $('#add-khu').click(function () {
            //get value from input
            $MaCoSo = $('#CoSo-khu').val();
            console.log($MaCoSo);

            $MaKhu = $('#MaKhu').val();
            console.log($MaKhu);

            $TenKhu = $('#TenKhu').val();
            console.log($TenKhu);

            $.ajax({ url: "http://20.39.185.180/api/admin/add_khu.php",
                context: document.body,
                dataType: 'json',
                type : 'post',
                data: {
                    'MaCoSo' : $MaCoSo,
                    'MaKhu' : $MaKhu,
                    'TenKhu': $TenKhu
                },
                success: function(data){
                    console.log(data);
                    if($.trim(data))
                    {
                        Swal.fire('Thêm thành công');
                    }else{ Swal.fire('Thêm thất bại');}
                }
            });

            $('#khu-phong')
                .find('option')
                .remove()
                .end()
                .append('<option>Vui lòng chọn</option>');
            $.ajax({ url: "http://20.39.185.180/api/admin/fetch_khu.php",
                context: document.body,
                type: 'POST',
                dataType: 'json',
                success: function(data){
                    $.each(data, function (index, value) {
                        $('#CoSo-khu-phong').append($('<option/>', {
                            value: value['MaKhu'],
                            text :  value['TenKhu'],
                        }));
                    });
                }
            });
        })

        $.ajax({ url: "http://20.39.185.180/api/admin/fetch_coso.php",
            context: document.body,
            type: 'POST',
            dataType: 'json',
            success: function(data){
                $.each(data, function (index, value) {
                    $('#CoSo-khu-phong').append($('<option/>', {
                        value: value['MaCoSo'],
                        text :  value['TenCoSo'],
                    }));
                });
            }
        });
        $('#CoSo-khu-phong').on('change', function (e) {
            //clear previous value
            $('#khu-phong')
                .find('option')
                .remove()
                .end()
                .append('<option>Vui lòng chọn</option>');
            $MaCoSo = $('#CoSo-khu-phong').val();
            console.log($MaCoSo);
            $.ajax({ url: "http://20.39.185.180/api/admin/fetch_khu.php",
                context: document.body,
                dataType: 'json',
                type : 'post',
                data: { 'MaCoSo' : $MaCoSo},
                success: function(data){
                    console.log(data);
                    $.each(data, function (index, value) {
                        $('#khu-phong').append($('<option/>', {
                            value: value['MaKhu'],
                            text : value['TenKhu']
                        }));
                    });
                }
            });
        });

        $('#add-phong').click(function () {
            //get value from input
            $MaKhu = $('#khu-phong').val();
            console.log($MaKhu);

            $IDPhong = $('#id-room').val();
            console.log($IDPhong);

            $SoLuongGiuong = $('#soluong_bed').val();
            console.log($SoLuongGiuong);

            $.ajax({ url: "http://20.39.185.180/api/admin/add_phong.php",
                context: document.body,
                dataType: 'json',
                type : 'post',
                data: {
                    'MaKhu' : $MaKhu,
                    'IDPhong' : $IDPhong,
                    'SoLuongGiuong': $SoLuongGiuong
                },
                success: function(data){
                    console.log(data);
                    if($.trim(data))
                    {
                        Swal.fire('Thêm thành công');
                    }else{ Swal.fire('Thêm thất bại');}
                }
            });
            $('#phong-giuong')
                .find('option')
                .remove()
                .end()
                .append('<option>Vui lòng chọn</option>');
            $.ajax({ url: "http://20.39.185.180/api/admin/fetch_phong.php",
                context: document.body,
                type: 'POST',
                dataType: 'json',
                success: function(data){
                    $.each(data, function (index, value) {
                        $('#CoSo-khu-phong').append($('<option/>', {
                            value: value['IDPhong'],
                            text :  value['IDPhong'],
                        }));
                    });
                }
            });

        })


        $.ajax({ url: "http://20.39.185.180/api/admin/fetch_coso.php",
            context: document.body,
            type: 'POST',
            dataType: 'json',
            success: function(data){
                $.each(data, function (index, value) {
                    $('#CoSo-khu-phong-giuong').append($('<option/>', {
                        value: value['MaCoSo'],
                        text :  value['TenCoSo'],
                    }));
                });
            }
        });
        $('#CoSo-khu-phong-giuong').on('change', function (e) {
            //clear previous value
            $('#khu-phong-giuong')
                .find('option')
                .remove()
                .end()
                .append('<option>Vui lòng chọn</option>');
            $MaCoSo = $('#CoSo-khu-phong-giuong').val();
            console.log($MaCoSo);
            $.ajax({ url: "http://20.39.185.180/api/admin/fetch_khu.php",
                context: document.body,
                dataType: 'json',
                type : 'post',
                data: { 'MaCoSo' : $MaCoSo},
                success: function(data){
                    console.log(data);
                    $.each(data, function (index, value) {
                        $('#khu-phong-giuong').append($('<option/>', {
                            value: value['MaKhu'],
                            text : value['TenKhu']
                        }));
                    });
                }
            });
        });
        $('#khu-phong-giuong').on('change', function (e) {
            //clear previous value
            $('#phong-giuong')
                .find('option')
                .remove()
                .end()
                .append('<option>Vui lòng chọn</option>');
            $MaKhu = $('#khu-phong-giuong').val();
            console.log($MaKhu);
            $.ajax({ url: "http://20.39.185.180/api/admin/fetch_phong.php",
                context: document.body,
                dataType: 'json',
                type : 'post',
                data: { 'MaKhu' : $MaKhu},
                success: function(data){
                    console.log(data);
                    $.each(data, function (index, value) {
                        $('#phong-giuong').append($('<option/>', {
                            value: value['IDPhong'],
                            text : value['IDPhong']
                        }));
                    });
                }
            });
        });
        $('#add-giuong').click(function () {
            //get value from input

            $IDPhong = $('#phong-giuong').val();
            console.log($IDPhong);

            $IDGiuong = $('#giuong').val();
            console.log($IDGiuong);

            $.ajax({ url: "http://20.39.185.180/api/admin/add_giuong.php",
                context: document.body,
                dataType: 'json',
                type : 'post',
                data: {
                    'IDPhong' : $IDPhong,
                    'IDGiuong': $IDGiuong
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




