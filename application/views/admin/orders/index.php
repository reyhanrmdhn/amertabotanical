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
                                <h4 class="header-title mb-3">Order List</h4>
                                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th width="5%">No</th>
                                            <th>Order ID</th>
                                            <th>Order Date</th>
                                            <th>Customer</th>
                                            <th width="5%">Items</th>
                                            <th width="15%">Status</th>
                                            <th width="5%" style="text-align: center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $x = 1; ?>
                                        <?php foreach ($orders as $p) { ?>
                                            <?php $detail_num = $this->m_global->get_order_detail($p['id_pesanan'])->num_rows(); ?>
                                            <?php  ?>
                                            <tr>
                                                <td><?= $x; ?></td>
                                                <td><a style="color: #A6D064" href="<?= base_url('admin/order_detail/' . $p['id_pesanan']) ?>">#<?= $p['id_pesanan']; ?></a></td>
                                                <td><?= date('F d, Y', $p['tanggal_pesanan']); ?></td>
                                                <td><?= $p['name']; ?></td>
                                                <td style="text-align:center"><?= $detail_num; ?></td>
                                                <td>
                                                    <h4>
                                                        <?php if ($p['status_pesanan'] == 0) { ?>
                                                            <span class="badge badge-soft-warning">Order Holded</span>
                                                        <?php } else if ($p['status_pesanan'] == 1) { ?>
                                                            <span class="badge badge-soft-info">Order Received</span>
                                                        <?php } else if ($p['status_pesanan'] == 2) { ?>
                                                            <span class="badge badge-soft-info">Order Processed</span>
                                                        <?php } else if ($p['status_pesanan'] == 3) { ?>
                                                            <span class="badge badge-soft-info">Order Shipped</span>
                                                        <?php } else if ($p['status_pesanan'] == 4) { ?>
                                                            <span class="badge badge-soft-success">Order Delivered</span>
                                                        <?php } ?>
                                                    </h4>
                                                </td>
                                                <td style="text-align: center">
                                                    <button type="button" class="btn btn-info btn-sm" onclick="location.href='<?= base_url('admin/order_detail/' . $p['id_pesanan']) ?>'"><i class="fas fa-eye"></i></button>
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