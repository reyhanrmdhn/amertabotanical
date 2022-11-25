<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="main-content">

    <div class="page-content">

        <!-- Page-Title -->
        <div class="page-title-box">
            <div class="container-fluid">
                <a href="<?= base_url('admin/inbox') ?>" class="waves-effect btn btn-dark mb-3">
                    <div class="d-inline-block icons-sm mr-1"><i class="fas fa-arrow-left"></i></div>
                    &nbsp;<span>Back</span>
                </a>
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h4 class="page-title mb-1"><?= $title; ?></h4>
                    </div>
                </div>

            </div>
        </div>
        <!-- end page title end breadcrumb -->

        <div class="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                   <div class="col-12">
                        <?= $this->session->flashdata('message'); ?>
                        <div class="card">
                            <div class="card-body">
                                <div class="media mb-4">
                                    <img class="d-flex mr-3 rounded-circle avatar-sm" src="<?= base_url('assets/img/user/user.png') ?>">
                                    <div class="media-body">
                                        <h4 class="font-size-16"><?= $inbox['name']; ?></h4>
                                        <p class="text-muted font-size-13"><?= $inbox['email']; ?></p>
                                    </div>
                                </div>
                                <h4 class="font-size-16"><?= $inbox['subject']; ?></h4>

                                <p><?= $inbox['message']; ?></p>
                            </div>

                        </div>
                    </div>

                </div> <!-- end col -->
            </div> <!-- end row -->


        </div> <!-- container-fluid -->
    </div>
    <!-- end page-content-wrapper -->
</div>
<!-- End Page-content -->