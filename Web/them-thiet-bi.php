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
                        <h2 class="content-header-title float-start mb-0">Thêm thiết bị</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Trang chủ</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Quản lý thiết bị</a>
                                </li>
                                <li class="breadcrumb-item active">Thêm thiết bị
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
                                <h3 class="mb-0">Thông tin thiết bị</h3>
                                <small class="text-muted">Nhập thông tin thiết bị.</small>
                            </div>

                            <div class="row">
                                <div class="mb-1 col-md-6">
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="vertical-password">Tên thiết bị</label>
                                        <input type="text" id="Ten" class="form-control" />
                                    </div>
                                </div>
                                <div class="mb-1 col-md-6">
                                    <label class="form-label" for="vertical-password">Ngày Nhập</label>
                                    <input type="date" id="NgayNhap" class="form-control" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-1 col-md-6">
                                    <label class="form-label" for="vertical-confirm-password">Tình trạng</label>
                                    <select  class="form-select" id="TinhTrang">
                                        <option>Vui lòng chọn</option>
                                        <option value = "1" >Bình thường</option>
                                        <option value = "0" >Hư hỏng</option>
                                    </select>
                                </div>
                                <div class="mb-1 col-md-12">
                                    <textarea class="form-control" placeholder="Mô tả" rows="5" id="MoTa"></textarea>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between">
                                <button class="btn btn-success" id="add">Thêm thiết bị</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body border-bottom">
                        <h4 class="card-title">Danh sách thiết bị</h4>
                        <div class="row">
                            <div class="col-md-4 status"></div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table id="tb_list" class="table">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tên thiết bị</th>
                                <th>Ngày Nhập</th>
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
    $(document).ready(function(){
        //button add click
        $('#add').click(function () {
            //get value from input

            $Ten = $('#Ten').val();
            console.log($Ten);

            $MoTa = $('#MoTa').val();
            console.log($MoTa);

            $TinhTrang = $('#TinhTrang').val();
            console.log($TinhTrang);

            $NgayNhap = $('#NgayNhap').val();
            console.log($NgayNhap);

            $.ajax({ url: "http://20.39.185.180/api/admin/add_thietbi.php",
                context: document.body,
                dataType: 'json',
                type : 'post',
                data: {
                    'Ten' : $Ten  ,
                    'MoTa' : $MoTa,
                    'TinhTrang': $TinhTrang,
                    'NgayNhap':$NgayNhap
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

    $('#tb_list').DataTable({
        ajax: 'http://20.39.185.180/api/admin/get_ds_thietbi.php',
        language: {
            url: '//cdn.datatables.net/plug-ins/1.12.1/i18n/vi.json'
        },
        columns: [
            // columns according to JSON
            {data: 'IDThietBi'},
            {data: 'Ten'},
            {data: 'NgayNhap.date'},
            {
                'data': null, wrap: true, "render": function (item) {
                    return item.TinhTrang == 0 ? "Hư hỏng" : "Bình thường"
                }
            },
            {
                'data': null, wrap: true, "render": function (item) {
                    return '<a href="chitiet_thietbi.php/?id=' + item.IDThietBi + '"><button type="button"  class="btn btn-success">Xem chi tiết</button></a>'
                }
            },
            {
                'data': null, wrap: true, "render": function (item) {
                    return '<button id = "'+ item.IDThietBi+'" type="button"  onclick="deleteThis(event)" class="btn btn-warning">Xóa</button>'
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
        console.log(e.target.getAttribute('id'));
        $id = e.target.getAttribute('id');
        console.log($id);
        Swal.fire({
            title: 'Bạn có chắc muốn xóa thông báo với ID?',
            text: $id,
            showCancelButton: true,
            confirmButtonText: 'Xóa',

        }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                //ajax
                $.ajax({ url: "http://20.39.185.180/api/admin/delete_thietbi.php",
                    context: document.body,
                    dataType: 'json',
                    type : 'post',
                    data: {
                        'id' : $id
                    },
                    success: function(data){
                        console.log(data);
                        $.each(data, function (index, value) {
                            $('#ward').append($('<option/>', {
                                value: value['id'] ,
                                text : value['id']
                            }));
                        });
                    }
                });
                Swal.fire('Đã xóa!', '', 'success')
            }
        })
    }

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



