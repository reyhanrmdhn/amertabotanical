<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="main-content">

    <div class="page-content">

        <!-- Page-Title -->
        <div class="page-title-box">
            <div class="container-fluid">
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
                                <h4 class="header-title">Customer List</h4>
                                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th width="5%">No</th>
                                            <th>Name</th>
                                            <th>Registered</th>
                                            <th>Country</th>
                                            <th width="5%" style="text-align: center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $x = 1; ?>
                                        <?php foreach ($customer as $p) { ?>
                                            <tr>
                                                <td><?= $x; ?></td>
                                                <td><?= $p['name']; ?></td>
                                                <td><?= date('F d, Y', $p['date_created']); ?></td>
                                                <td><?= $p['country']; ?></td>
                                                <td style="text-align: center">
                                                    <button type="button" class="btn btn-info btn-sm" onclick="location.href='<?= base_url('admin/customer_detail/' . $p['id']) ?>'"><i class="fas fa-eye"></i></button>
                                                </td>
                                            </tr>
                                            <?php $x++ ?>
                                        <?php } ?>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->


            </div> <!-- container-fluid -->
        </div>
        <!-- end page-content-wrapper -->
    </div>
    <!-- End Page-content -->