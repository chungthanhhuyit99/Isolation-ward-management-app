<?php include('parent/header.php') ?>


<!-- BEGIN: Content-->
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <section class="invoice-list-wrapper">
                <div class="row">
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
                </div>
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
                                <th></th>
                                <th>Tên bệnh nhân</th>
                                <th>Giới tính</th>
                                <th>CMND/CCCD</th>
                                <th class="text-truncate">Ngày nhập viện</th>
                                <th>Giường</th>
                                <th>Tình trạng</th>
                                <th></th>
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
                                <th></th>
                                <th>Tên bệnh nhân</th>
                                <th>Giới tính</th>
                                <th>CMND/CCCD</th>
                                <th class="text-truncate">Ngày nhập viện</th>
                                <th>Giường</th>
                                <th>Tình trạng</th>
                                <th></th>
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
                                <th></th>
                                <th>Tên bệnh nhân</th>
                                <th>Giới tính</th>
                                <th>CMND/CCCD</th>
                                <th class="text-truncate">Ngày nhập viện</th>
                                <th>Giường</th>
                                <th>Tình trạng</th>
                                <th></th>
                                <th></th>
                            </tr>
                            </thead>
                        </table>
                    </div>
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
                                <th></th>
                                <th>Tên bệnh nhân</th>
                                <th>Giới tính</th>
                                <th>CMND/CCCD</th>
                                <th class="text-truncate">Ngày nhập viện</th>
                                <th>Giường</th>
                                <th>Tình trạng</th>
                                <th></th>
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

    $('#victim_list').DataTable({
        ajax: 'http://20.39.185.180/api/admin/get_ds_bn.php',
        language: {
            url: '//cdn.datatables.net/plug-ins/1.12.1/i18n/vi.json'
        },
        columns: [
            // columns according to JSON
            {data: 'IDBenhNhan'},
            {data: 'HovaTen'},
            {
                'data': null, wrap: true, "render": function (item) {
                    return item.GioiTinh == 0 ? "Nữ" : "Nam"
                }
            },
            {data: 'CCCD'},
            {data: 'Ngay.date'},
            {data: 'IDGiuong'},
            {
                'data': null, wrap: true, "render": function (item) {
                    return item.TinhTrang == -1 ? "Đã mất" : item.TinhTrang == 0 ? "Đã hết bệnh" : item.TinhTrang == 1 ? "Đang theo dõi" : item.TinhTrang == 2 ? "Nhiễm bệnh" : "Bệnh trở nặng"
                }
            },
            {
                'data': null, wrap: true, "render": function (item) {
                    return '<a href="chitiet.php/?id=' + item.IDBenhNhan + '"><button type="button"  class="btn btn-success">Xem chi tiết</button></a>'
                }
            },
            {
                'data': null, wrap: true, "render": function (item) {
                    return '<button id = "'+ item.IDBenhNhan+'" type="button"  onclick="deleteThis(event)" class="btn btn-warning">Xóa</button>'
                }
            },
        ],
        initComplete: function () {
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
        }
    });
    function deleteThis(e){
        console.log(e.target.getAttribute('id'));
        $id = e.target.getAttribute('id');
        console.log($id);
        Swal.fire({
            title: 'Bạn có chắc muốn xóa bênh nhân với ID?',
            text: $id,
            showCancelButton: true,
            confirmButtonText: 'Xóa',

        }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                //ajax
                $.ajax({ url: "http://20.39.185.180/api/admin/delete_user.php",
                    context: document.body,
                    dataType: 'json',
                    type : 'post',
                    data: {
                        'id_user' : $id,
                        'IDGiuong' : $bed
                    },
                    success: function(data){
                        console.log(data);
                        $.each(data, function (index, value) {
                            $('#ward').append($('<option/>', {
                                value: value['id_user'] ,
                                text : value['id_user']
                            }));
                        });
                    }
                });
                Swal.fire('Đã xóa!', '', 'success')
            }
        })
    }


</script>
<?php include('parent/footer.php') ?>
