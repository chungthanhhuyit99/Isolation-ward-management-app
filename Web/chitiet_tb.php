<?php include('parent/header.php');
include "api/db1.php";
$id_tb = $_GET['id'];
$gettb = sqlsrv_query($conn, "SELECT * FROM ThongBao WHERE ID = '$id_tb'");
$tb =sqlsrv_fetch_array($gettb);
var_dump($id_tb);

?>

<!-- BEGIN: Content-->
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0">Cập nhật thông báo</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Trang chủ</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Quản lý thông báo</a>
                                </li>
                                <li class="breadcrumb-item active">Cập nhật thông báo
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
                                <h3 class="mb-0">Thông tin thông báo</h3>
                                <small class="text-muted">Nhập thông tin thông báo.</small>
                            </div>

                            <div class="row">
                                <div class="mb-1 col-md-6">
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="vertical-password">Tiêu đề</label>
                                        <input type="text" id="id_tb"  hidden class="form-control" value="<?php echo $id_tb ?>"/>
                                        <input type="text" id="id_cb"  hidden class="form-control" value="<?php echo $tb["IDCanBo"] ?>"/>
                                        <input type="text" id="TieuDe" class="form-control" value="<?php echo $tb["TieuDe"] ?>"/>
                                    </div>
                                </div>
                                <div class="mb-1 col-md-6">
                                    <label class="form-label" for="vertical-password">Ngày đăng</label>
                                    <input type="date" id="NgayDang" class="form-control" value="<?php echo $tb["NgayDang"]->format('Y-m-d') ?>"/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-1 col-md-12">
                                    <textarea class="form-control" placeholder="Nhập nội dung" rows="5" id="NoiDung"><?php echo $tb["NoiDung"] ?></textarea>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between">
                                <button class="btn btn-success" id="update">Cập nhật thông báo</button>
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
            //button add click
            $('#update').click(function () {
                //get value from input

                $id_tb = $('#id_tb').val();
                console.log($id_tb);

                $TieuDe = $('#TieuDe').val();
                console.log($TieuDe);

                $NgayDang = $('#NgayDang').val();
                console.log($NgayDang);

                $NoiDung = $('#NoiDung').val();
                console.log($NoiDung);

                $id_cb = $('#id_cb').val();
                console.log($id_cb);

                $.ajax({ url: "http://20.39.185.180/api/admin/update_tb.php",
                    context: document.body,
                    dataType: 'json',
                    type : 'post',
                    data: {
                        'id_tb' : $id_tb,
                        'TieuDe' : $TieuDe,
                        'NgayDang' : $NgayDang,
                        'NoiDung': $NoiDung,
                        'id_cb':$id_cb
                    },
                    success: function(data){
                        console.log(data);
                        if($.trim(data))
                        {
                            Swal.fire('Cập nhật thành công');
                        }else{ Swal.fire('Cập nhật thất bại');}
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