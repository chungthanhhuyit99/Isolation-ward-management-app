<!-- BEGIN: Content-->
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0">Thêm thông báo</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Trang chủ</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Quản lý thông báo</a>
                                </li>
                                <li class="breadcrumb-item active">Thêm thông báo
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
                                <h3 class="mb-0">Thông tin phiếu</h3>
                                <small class="text-muted">Nhập thông tin thông báo.</small>
                            </div>

                            <div class="row">
                                <div class="mb-1 col-md-6">
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="vertical-password">Tiêu đề</label>
                                        <input type="text" id="TieuDe" class="form-control" />
                                    </div>
                                </div>
                                <div class="mb-1 col-md-6">
                                    <label class="form-label" for="vertical-password">Ngày đăng</label>
                                    <input type="date" id="NgayDang" class="form-control" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-1 col-md-12">
                                    <textarea class="form-control" placeholder="Nhập nội dung" rows="5" id="NoiDung"></textarea>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between">
                                <button class="btn btn-success" id="add">Thêm thông báo</button>
                            </div>
                        </div>
                    </div>
                </div>

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
                                <th>ID</th>
                                <th>Tiêu đề</th>
                                <th>Ngày đăng</th>
                                <th>Nội dung</th>
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

