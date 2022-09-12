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
                            <h2 class="content-header-title float-start mb-0">Thống kê</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Trang chủ</a>
                                    </li>

                                    <li class="breadcrumb-item active">Thống kê
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
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
                    <div class="card">
                        <div class="card-body border-bottom">
                            <h4 class="card-title">Thống kê theo</h4>
                            <div class="row">
                                <div class="col-md-4 status"></div>
                            </div>
                        </div>
                        <table class="table" border="0" cellspacing="5" cellpadding="5">
                            <tbody><tr>
                                <td>Ngày nhỏ nhất:</td>
                                <td><input type="text" class="form-control" id="min" name="min"></td>
                            </tr>
                            <tr>
                                <td>Ngày lớn nhất:</td>
                                <td><input type="text" class="form-control" id="max" name="max"></td>
                            </tr>
                            </tbody></table>
                        <div class="table-responsive">
                            <table id="victim_list" class="table display">
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
        var minDate, maxDate;

        // Refilter the table
        $('#min, #max').on('change', function () {

            table.draw();
        });

        // Create date inputs
        minDate = new DateTime($('#min'), {
            format: 'MMMM Do YYYY'
        });
        maxDate = new DateTime($('#max'), {
            format: 'MMMM Do YYYY'
        });

        // DataTables initialisation
        var table = $('#victim_list').DataTable({
            ajax: 'http://20.39.185.180/api/admin/get_ds_bn.php',
            language: {
                url: '//cdn.datatables.net/plug-ins/1.12.1/i18n/vi.json'
            },
            select: true,
            columns: [
                // columns according to JSON
                {'data': null, "render": function ( data, type, full, meta ) {
                        return  meta.row + 1;
                    } },
                {data: 'HovaTen'},
                {
                    data: null, "render": function (item) {
                        return item.GioiTinh == 0 ? "Nữ" : "Nam"
                    }
                },
                {data: 'CCCD'},
                {data: 'Ngay.date'},
                {data: 'IDGiuong'},
                {
                    'data': null, "render": function (item) {
                        return item.TinhTrang == -1 ? "Đã mất" : item.TinhTrang == 0 ? "Đã hết bệnh" : item.TinhTrang == 1 ? "Đang theo dõi" : item.TinhTrang == 2 ? "Nhiễm bệnh" : "Bệnh trở nặng"
                    }
                },
                {
                    'data': null, wrap: true, "render": function (item) {
                        return '<a href="chitiet.php/?id=' + item.IDBenhNhan + '"><button type="button"  class="btn btn-success">Xem chi tiết</button></a>'
                    }
                },

            ],
            dom: 'PlBfrtip',
            columnDefs: [
                {
                    searchPanes: {
                        show: false,
                    },
                    targets: [1]
                },
                {
                    searchPanes: {
                        show: false,
                    },
                    targets: [3]
                },
                {
                    searchPanes: {
                        show: false,
                    },
                    targets: [4]
                },
                {
                    searchPanes: {
                        show: false,
                    },
                    targets: [5]
                },
                {
                    searchPanes: {
                        show: true,
                        options: [
                            {
                                label: 'Nam',
                                value: function(rowData, rowIdx) {
                                    console.log(rowData['GioiTinh']);
                                    return rowData['GioiTinh'] == 1;
                                }
                            },
                            {
                                label: 'Nữ',
                                value: function(rowData, rowIdx) {
                                    return rowData['GioiTinh'] == 0;
                                }
                            }
                        ]
                    },
                    targets: [2]
                },
                {
                    searchPanes: {
                        show: true,
                        options: [
                            {
                                label: 'Đã mất',
                                value: function(rowData, rowIdx) {
                                    return rowData['TinhTrang'] == -1;
                                }
                            },
                            {
                                label: 'Đã hết bệnh',
                                value: function(rowData, rowIdx) {
                                    return rowData['TinhTrang'] == 0;
                                }
                            },
                            {
                                label: 'Đang theo dõi',
                                value: function(rowData, rowIdx) {
                                    return rowData['TinhTrang'] == 1;
                                }
                            },
                            {
                                label: 'Nhiễm bệnh',
                                value: function(rowData, rowIdx) {
                                    return rowData['TinhTrang'] == 2;
                                }
                            },
                            {
                                label: 'Bệnh trở nặng',
                                value: function(rowData, rowIdx) {
                                    return rowData['TinhTrang'] == 3;
                                }
                            }
                        ]
                    },
                    targets: [6]
                },

            ],
            select: {
                style:    'os',
                selector: 'td:first-child'
            },
            buttons: [
                'copy', 'excel', 'pdf', 'print'
            ]

        });


        // Custom filtering function which will search data in column four between two values
        $.fn.dataTable.ext.search.push(
            function( settings, data, dataIndex ) {
                var min = minDate.val();
                var max = maxDate.val();
                var date = new Date( data[4] );

                if (
                    ( min === null && max === null ) ||
                    ( min === null && date <= max ) ||
                    ( min <= date   && max === null ) ||
                    ( min <= date   && date <= max )
                ) {
                    return true;
                }
                return false;
            }

        );
        table.on('select.dt', () => {
            table.searchPanes.rebuildPane(0, true);
        });

        table.on('deselect.dt', () => {
            table.searchPanes.rebuildPane(0, true);
        });
    </script>
<?php include('parent/footer.php') ?>