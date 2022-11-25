<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="main-content">

    <div class="page-content">

        <!-- Page-Title -->
        <div class="page-title-box">
            <div class="container-fluid">
                <a href="<?= base_url('admin/customers') ?>" class="waves-effect btn btn-dark mb-3">
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
                    </div>
                    <div class="col-lg-4">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card" style="margin-bottom: 30px">
                                    <div class="card-body">
                                        <div class="image text-center">
                                            <img src="<?= get_user_image($customer['id']) ?>" alt="" class="rounded-circle" height="150" width="auto">
                                        </div>
                                        <div class="desc text-center mt-3">
                                            <h3><?= $customer['name']; ?></h3>
                                            <p><?= $customer['email']; ?></p>
                                        </div>
                                        <div class="line" style="border-bottom: 1px solid #DEDEDE;"></div>
                                        <div class="desc mt-3 mx">
                                            <p style="font-weight: bold; font-size:15px" class="mb-1">Registered</p>
                                            <p class="mb-3"><?= date('F m, Y', $customer['date_created']); ?></p>

                                            <p style="font-weight: bold; font-size:15px" class="mb-1">Email</p>
                                            <h5 class="mb-3">
                                                <?php if ($customer['email_valid'] == 0) { ?>
                                                    <span class="badge badge-soft-danger">Not Verified</span>
                                                <?php } else { ?>
                                                    <span class="badge badge-soft-success">Verified</span>
                                                <?php } ?>
                                            </h5>

                                            <p style="font-weight: bold; font-size:15px" class="mb-1">Country</p>
                                            <p><?= $customer['country'] ?></p>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card" style="margin-bottom:10px">
                                    <div class="card-body">
                                        <h5 class="mb-4">Orders</h5>
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead class="thead-light">
                                                    <th>Order ID</th>
                                                    <th>Date</th>
                                                    <th>Status</th>
                                                    <th>Items</th>
                                                    <th>Total</th>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($order as $item) { ?>
                                                        <tr>
                                                            <td>
                                                                <a href="<?= base_url('admin/order_detail/' . $item['id_pesanan']) ?>" style="color:#A4CC64">#<?= $item['id_pesanan']; ?></a>
                                                            </td>
                                                            <td><?= date('F m, Y', $item['tanggal_pesanan']); ?></td>
                                                            <td>
                                                                <?php if ($item['status_pesanan'] == 0) { ?>
                                                                    <span class="badge badge-soft-warning">Order Holded</span>
                                                                <?php } else if ($item['status_pesanan'] == 1) { ?>
                                                                    <span class="badge badge-soft-info">Order Received</span>
                                                                <?php } else if ($item['status_pesanan'] == 2) { ?>
                                                                    <span class="badge badge-soft-info">Order Processed</span>
                                                                <?php } else if ($item['status_pesanan'] == 3) { ?>
                                                                    <span class="badge badge-soft-info">Order Shipped</span>
                                                                <?php } else if ($item['status_pesanan'] == 4) { ?>
                                                                    <span class="badge badge-soft-success">Order Delivered</span>
                                                                <?php } ?>
                                                            </td>
                                                            <td>
                                                                <?php $order_num = $this->m_global->get_order_detail($item['id_pesanan'])->num_rows(); ?>
                                                                <?= $order_num; ?>
                                                            </td>
                                                            <td>
                                                                $<?= $item['total_pesanan']; ?>
                                                            </td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div> <!-- end row -->
                </div> <!-- container-fluid -->
            </div>
            <!-- end page-content-wrapper -->
        </div>
        <!-- End Page-content -->