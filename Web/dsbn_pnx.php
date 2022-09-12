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
                        <h4 class="card-title">Danh sách bệnh nhân</h4>
                        <div class="row">
                            <div class="col-md-4 status"></div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table id="victim_list" class="table">
                            <thead>
                            <tr>
                                <th></th>
                                <th>Tên bệnh nhân</th>
                                <th>Giới tính</th>
                                <th>CMND/CCCD</th>
                                <th>Ngày nhập viện</th>
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
<a href="/someurl.php?id=1&name=Jose" class="ajax-link"> Click </a>
<a href="/someurl.php?id=2&name=Juan" class="ajax-link"> Click </a>
<a href="/someurl.php?id=3&name=Pedro" class="ajax-link"> Click </a>

<a href="/someurl.php?id=n&name=xxx" class="ajax-link"> Click </a>

<script type="text/javascript">

</script>
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
                    return '<a href="them-phieu-nhap-xuat.php/?id=' + item.IDBenhNhan + '"><button type="button"  class="btn btn-success">Thêm phiếu</button></a>'
                }
            },
            {
                'data': null, wrap: true, "render": function (item) {
                    return '<a href="dspnx.php?id=' + item.IDBenhNhan + '"><button type="button"  class="btn btn-success" >Xem danh sách</button></a>'
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
</script>
<?php include('parent/footer.php') ?>


