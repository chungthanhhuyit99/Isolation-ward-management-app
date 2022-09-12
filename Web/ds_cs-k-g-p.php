<?php include('parent/header.php');
include "api/db1.php";
$getgiuongco = sqlsrv_num_rows(sqlsrv_query($conn,"SELECT * FROM Giuong where TinhTrang = 1",  array(), array("Scrollable"=>"buffered")));

$getgiuong = sqlsrv_num_rows(sqlsrv_query($conn,"SELECT * FROM Giuong",  array(), array("Scrollable"=>"buffered")));

$getgiuongtrong = sqlsrv_num_rows(sqlsrv_query($conn,"SELECT * FROM Giuong where TinhTrang = 0",  array(), array("Scrollable"=>"buffered")));
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
                <div class="card">
                    <div class="card-body border-bottom">
                        <h4 class="card-title">Danh sách cơ sở</h4>
                        <div class="row">
                            <div class="col-md-4 status"></div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table id="coso_list" class="table">
                            <thead>
                            <tr>
                                <th>Mã cơ sở</th>
                                <th>Tên cơ sở</th>
                                <th>Địa chỉ</th>
                                <th></th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body border-bottom">
                        <h4 class="card-title">Danh sách khu</h4>
                        <div class="row">
                            <div class="col-md-4 status"></div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table id="khu_list" class="table">
                            <thead>
                            <tr>
                                <th>Mã khu</th>
                                <th>Tên khu</th>
                                <th>Tên cơ sở</th>
                                <th>Địa chỉ</th>
                                <th></th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body border-bottom">
                        <h4 class="card-title">Danh sách phòng</h4>
                        <div class="row">
                            <div class="col-md-4 status"></div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table id="phong_list" class="table">
                            <thead>
                            <tr>
                                <th>Tên phòng</th>
                                <th>Số lượng giường</th>
                                <th>Tên khu</th>
                                <th>Tên cơ sở</th>
                                <th></th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="card-body d-flex align-items-center justify-content-between">
                                <div>
                                    <h3 class="fw-bolder mb-75"><?php echo $getgiuong ?></h3>
                                    <span>Tổng số giường</span>
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
                                    <h3 class="fw-bolder mb-75"><?php echo $getgiuongtrong ?></h3>
                                    <span>Số giường trống</span>
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
                                    <h3 class="fw-bolder mb-75"><?php echo $getgiuongco ?></h3>
                                    <span>Số giường đã có bệnh nhân</span>
                                </div>
                                <div class="avatar bg-light-success p-50">
                                        <span class="avatar-content">
                                            <i data-feather="user-check" class="font-medium-4"></i>
                                        </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--<div class="col-lg-3 col-sm-6">
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
                    </div>-->
                </div>
                <div class="card">
                    <div class="card-body border-bottom">
                        <h4 class="card-title">Danh sách giường</h4>
                        <div class="row">
                            <div class="col-md-4 status"></div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table id="giuong_list" class="table">
                            <thead>
                            <tr>
                                <th>Tên giường</th>
                                <th>Tên phòng</th>
                                <th>Tên khu</th>
                                <th>Tên cơ sở</th>
                                <th>Trạng thái</th>
                                <th></th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>

<!-- END: Content-->
<script>

    $('#coso_list').DataTable({
        ajax: 'http://20.39.185.180/api/admin/get_ds_coso.php',
        language: {
            url: '//cdn.datatables.net/plug-ins/1.12.1/i18n/vi.json'
        },
        columns: [
            // columns according to JSON
            {data: 'MaCoSo'},
            {data: 'TenCoSo'},
            {data: 'DiaChi'},
            {
                'data': null, wrap: true, "render": function (item) {
                    return '<button idcs = "'+ item.MaCoSo+'" type="button"  onclick="deleteThis(event)" class="btn btn-warning">Xóa</button>'
                }
            },
        ],
        /*initComplete: function () {
            // Adding role filter once table initialized
            this.api()
                .columns(6)
                .every(function () {
                    var column = this;
                    var label = $('<label class="form-label" for="UserRole">Tình trạng</label>').appendTo('.status');
                    var select = $(
                        '<select id="VicStatus" class="form-select text-capitalize mb-md-0 mb-2"><option value=""> Chọn tình trạng </option></select>'
                    )
                        .appendTo('.status')
                        .on('change', function () {
                            var val = $.fn.dataTable.util.escapeRegex($(this).val());
                            column.search(val ? '^' + val + '$' : '', true, false).draw();
                        });
                    column
                        .data()
                        .unique()
                        .sort()
                        .each(function (d, j) {
                            console.log(d);
                            select.append('<option value="' + d + '" class="text-capitalize">' + d + '</option>');
                        });
                });
        }*/
    });

    function deleteThis(e){
        console.log(e.target.getAttribute('idcs'));
        $idcs = e.target.getAttribute('idcs');
        console.log($idcs);
        Swal.fire({
            title: 'Bạn có chắc muốn xóa cơ sở với ID?',
            text: $idcs,
            showCancelButton: true,
            confirmButtonText: 'Xóa',
        }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                //ajax
                $.ajax({ url: "http://20.39.185.180/api/admin/delete_coso.php",
                    context: document.body,
                    dataType: 'json',
                    type : 'post',
                    data: {
                        'id_cs' : $idcs
                    },
                    success: function(data){
                        console.log(data);
                    }
                });
                Swal.fire('Đã xóa!', '', 'success')
            }
        })
    }


    $('#khu_list').DataTable({
        ajax: 'http://20.39.185.180/api/admin/get_ds_khu.php',
        language: {
            url: '//cdn.datatables.net/plug-ins/1.12.1/i18n/vi.json'
        },
        columns: [
            // columns according to JSON
            {data: 'MaKhu'},
            {data: 'TenKhu'},
            {data: 'TenCoSo'},
            {data: 'DiaChi'},
            {
                'data': null, wrap: true, "render": function (item) {
                    return '<button idk = "'+ item.MaCoSo+'" type="button"  onclick="deleteThis(event)" class="btn btn-warning">Xóa</button>'
                }
            },
        ],

    });
    function deleteThis(e){
        console.log(e.target.getAttribute('idk'));
        $idk = e.target.getAttribute('idk');
        console.log($idk);
        Swal.fire({
            title: 'Bạn có chắc muốn xóa khu với ID?',
            text: $idk,
            showCancelButton: true,
            confirmButtonText: 'Xóa',
        }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                //ajax
                $.ajax({ url: "http://20.39.185.180/api/admin/delete_khu.php",
                    context: document.body,
                    dataType: 'json',
                    type : 'post',
                    data: {
                        'id_k' : $idk
                    },
                    success: function(data){
                        console.log(data);
                    }
                });
                Swal.fire('Đã xóa!', '', 'success')
            }
        })
    }
    $('#phong_list').DataTable({
        ajax: 'http://20.39.185.180/api/admin/get_ds_phong.php',
        language: {
            url: '//cdn.datatables.net/plug-ins/1.12.1/i18n/vi.json'
        },
        columns: [
            // columns according to JSON
            {data: 'IDPhong'},
            {data: 'SoLuongGiuong'},
            {data: 'TenKhu'},
            {data: 'TenCoSo'},
            {
                'data': null, wrap: true, "render": function (item) {
                    return '<button idp = "'+ item.IDPhong+'" type="button"  onclick="deleteThis(event)" class="btn btn-warning">Xóa</button>'
                }
            },
        ],
    });

    function deleteThis(e){
        console.log(e.target.getAttribute('idp'));
        $idp = e.target.getAttribute('idp');
        console.log($idp);
        Swal.fire({
            title: 'Bạn có chắc muốn xóa phòng với ID?',
            text: $idp,
            showCancelButton: true,
            confirmButtonText: 'Xóa',
        }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                //ajax
                $.ajax({ url: "http://20.39.185.180/api/admin/delete_phong.php",
                    context: document.body,
                    dataType: 'json',
                    type : 'post',
                    data: {
                        'id_p' : $idp
                    },
                    success: function(data){
                        console.log(data);
                    }
                });
                Swal.fire('Đã xóa!', '', 'success')
            }
        })
    }

    $('#giuong_list').DataTable({
        ajax: 'http://20.39.185.180/api/admin/get_ds_giuong.php',
        language: {
            url: '//cdn.datatables.net/plug-ins/1.12.1/i18n/vi.json'
        },
        columns: [
            // columns according to JSON
            {data: 'IDGiuong'},
            {data: 'IDPhong'},
            {data: 'TenKhu'},
            {data: 'TenCoSo'},
            {
                'data': null, wrap: true, "render": function (item) {
                    return item.TinhTrang == 1 ? "Đã có bệnh nhân" : "Còn trống"
                }
            },
            {
                'data': null, wrap: true, "render": function (item) {
                    return '<button idg = "'+ item.IDGiuong+'" type="button"  onclick="deleteThis(event)" class="btn btn-warning">Trả giường</button>'
                }
            },
        ],

    });
    function deleteThis(e){
        console.log(e.target.getAttribute('idg'));
        $idg = e.target.getAttribute('idg');
        console.log($idg);
        Swal.fire({
            title: 'Bạn có muốn trả giường với ID?',
            text: $idg,
            showCancelButton: true,
            confirmButtonText: 'Xóa',
        }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                //ajax
                $.ajax({ url: "http://20.39.185.180/api/admin/delete_giuong.php",
                    context: document.body,
                    dataType: 'json',
                    type : 'post',
                    data: {
                        'id_g' : $idg
                    },
                    success: function(data){
                        console.log(data);
                    }
                });
                Swal.fire('Đã trả giường!', '', 'success')
            }
        })
    }


</script>
<?php include('parent/footer.php') ?>
