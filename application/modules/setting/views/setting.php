<!-- **********************************Content body start***********************************-->
<div class="content-body">
    <!-- Page Title -->
    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <div class="page-title-bar">
                <div class="page-title-bar-icon">
                    <i class="fa-solid fa-chart-pie"></i>
                </div>
                <div class="page-title-bar-icon-form">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url('dashboard'); ?>">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="#">Setting</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- End Page Title -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="error-content">
                    <div class="card mb-0">
                        <div class="card-body text-center pt-5">
                            <img src="<?= base_url('assets/images/apps/logo/' . $this->session->userdata('logo')); ?>" class="logo-app-page" alt="">
                            <h4 class="mt-4"><i class="fa fa-info text-primary"></i> <?= $this->session->userdata('appname') ?></h4>
                            <p><?= $this->session->userdata('develop') ?> <?= $this->session->userdata('year_dev') ?>.</p>
                            <form class="mt-5 mb-5">
                                <div class="text-center mb-4 mt-4">
                                    <a href="<?= base_url('dashboard'); ?>" class="btn btn-primary">Lihat Dashboard</a>
                                </div>
                            </form>
                            <div class="text-center">
                                <ul class="list-inline">
                                    <li class="list-inline-item"><a href="javascript:void()" class="btn btn-facebook"><i class="fa fa-facebook"></i></a>
                                    </li>
                                    <li class="list-inline-item"><a href="javascript:void()" class="btn btn-twitter"><i class="fa fa-twitter"></i></a>
                                    </li>
                                    <li class="list-inline-item"><a href="javascript:void()" class="btn btn-linkedin"><i class="fa fa-linkedin"></i></a>
                                    </li>
                                    <li class="list-inline-item"><a href="javascript:void()" class="btn btn-google-plus"><i class="fa fa-google-plus"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--**********************************Content body end***********************************-->