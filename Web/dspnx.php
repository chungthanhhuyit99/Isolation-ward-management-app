<?php include('parent/header.php');
$id_user = $_GET['id'];
var_dump($id_user);
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
                                    <span>Tổng nhân sự </span>
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
                                    <span>Bác sĩ </span>
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
                                    <span>Điều dưỡng</span>
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
                                    <span>Nhân sự đã nghỉ </span>
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
                        <input type="text" id="id_user"  hidden class="form-control" value="<?php echo $id_user ?>"/>
                        <h4 class="card-title">Danh sách phiếu nhập xuất</h4>
                        <div class="row">
                            <div class="col-md-4 status"></div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table id="victim_list" class="table">
                            <thead>
                            <tr>
                                <th>ID Phiếu</th>
                                <th>Loại phiếu</th>
                                <th>Ngày</th>
                                <th>Mã cơ sở</th>
                                <th>Mã bệnh nhân</th>
                                <th>Mã cán bộ</th>
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
    $id =  $('#id_user').val();
    console.log($id);

    $('#victim_list').DataTable({
        ajax: 'http://20.39.185.180/api/admin/get_ds_pnx.php?id='+$id,
        language: {
            url: '//cdn.datatables.net/plug-ins/1.12.1/i18n/vi.json'
        },
        columns: [
            // columns according to JSON
            {data: 'IDPhieu'},
            {
                'data': null, wrap: true, "render": function (item) {
                    return item.LoaiPhieu == 'N'  ? "Phiếu nhập" :"Phiếu xuất"
                }
            },
            {data: 'Ngay.date'},
            {data: 'MaCoSo'},
            {data: 'IDBenhNhan'},
            {data: 'IDCanBo'},
            {
                'data': null, wrap: true, "render": function (item) {
                    return '<a href="chitiet_pnx.php?id=' + item.IDPhieu + '"><button type="button"  class="btn btn-success">Xem chi tiết</button></a>'
                }
            },
            {
                'data': null, wrap: true, "render": function (item) {
                    return '<button id = "'+item.IDPhieu+'" type="button"  onclick="deleteThis(event)" class="btn btn-warning">Xóa</button>'
                }
            },
        ],
        /*initComplete: function () {
            // Adding role filter once table initialized
            this.api()
                .columns(6)
                .every(function () {
                    var column = this;
                    var label = $('<label class="form-label" for="UserRole">Vai trò </label>').appendTo('.status');
                    var select = $(
                        '<select id="VicStatus" class="form-select text-capitalize mb-md-0 mb-2"><option value=""> Chọn vai trò </option></select>'
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
        console.log(e.target.getAttribute('id'));
        $id = e.target.getAttribute('id');
        console.log($id);
        Swal.fire({
            title: 'Bạn có chắc muốn xóa phiếu xét nghiệm với ID?',
            text: $id,
            showCancelButton: true,
            confirmButtonText: 'Xóa',

        }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                //ajax
                $.ajax({ url: "http://20.39.185.180/api/admin/delete_pnx.php",
                    context: document.body,
                    dataType: 'json',
                    type : 'post',
                    data: {
                        'id' : $id,
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



