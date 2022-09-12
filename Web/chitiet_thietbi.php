<?php include('parent/header.php');
include "api/db1.php";
$id_thietbi = $_GET['id'];
$getthietbi = sqlsrv_query($conn, "SELECT * FROM ThietBi WHERE IDThietBi = '$id_thietbi'");
$thietbi =sqlsrv_fetch_array($getthietbi);
var_dump($id_thietbi);

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
                        <h2 class="content-header-title float-start mb-0">Cập nhật thiết bị</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Trang chủ</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Quản lý thiết bị</a>
                                </li>
                                <li class="breadcrumb-item active">Cập nhật thiết bị
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
                                        <input type="text" id="id_thietbi"  hidden class="form-control" value="<?php echo $id_thietbi ?>"/>
                                        <input type="text" id="id_dd"  hidden class="form-control" value="<?php echo $thietbi["IDDieuDuong"] ?>"/>
                                        <input type="text" id="Ten" class="form-control" value="<?php echo $thietbi["Ten"] ?>"/>
                                    </div>
                                </div>
                                <div class="mb-1 col-md-6">
                                    <label class="form-label" for="vertical-password">Ngày Nhập</label>
                                    <input type="date" id="NgayNhap" class="form-control" value="<?php echo $thietbi["NgayNhap"]->format('Y-m-d') ?>"/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-1 col-md-6">
                                    <label class="form-label" for="vertical-confirm-password">Tình trạng</label>
                                    <select  class="form-select" id="TinhTrang">
                                        <option>Vui lòng chọn</option>
                                        <option value = "1" <?php if($thietbi["TinhTrang"] == 1): ?> selected="selected"<?php endif; ?>>Bình thường</option>
                                        <option value = "0" <?php if($thietbi["TinhTrang"] == 0): ?> selected="selected"<?php endif; ?>>Hư hỏng</option>
                                    </select>
                                </div>
                                <div class="mb-1 col-md-12">
                                    <textarea class="form-control" placeholder="Nhập nội dung" rows="5" id="Mota"><?php echo $thietbi["Mota"] ?></textarea>
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

            $id_thietbi = $('#id_thietbi').val();
            console.log($id_thietbi);

            $Ten = $('#Ten').val();
            console.log($Ten);

            $Mota = $('#Mota').val();
            console.log($Mota);

            $TinhTrang = $('#TinhTrang').val();
            console.log($TinhTrang);

            $NgayNhap = $('#NgayNhap').val();
            console.log($NgayNhap);

            $id_dd = $('#id_dd').val();
            console.log($id_dd);

            $.ajax({ url: "http://20.39.185.180/api/admin/update_thietbi.php",
                context: document.body,
                dataType: 'json',
                type : 'post',
                data: {
                    'id_thietbi' : $id_thietbi,
                    'Ten' : $Ten,
                    'Mota' : $Mota,
                    'TinhTrang': $TinhTrang,
                    'NgayNhap':$NgayNhap,
                    'id_dd':$id_dd
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
