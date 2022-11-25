<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="main-content">

    <div class="page-content">

        <!-- Page-Title -->
        <div class="page-title-box">
            <div class="container-fluid">
                <a href="<?= base_url('admin/orders') ?>" class="waves-effect btn btn-dark mb-3">
                    <div class="d-inline-block icons-sm mr-1"><i class="fas fa-arrow-left"></i></div>
                    &nbsp;<span>Back</span>
                </a>

                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h4 class="page-title mb-1">Order #<?= $orders['id_pesanan']; ?></h4>
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
                    <div class="col-lg-8">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card" style="margin-bottom: 10px">
                                    <div class="card-body">
                                        <h5 class="mb-4">Items</h5>
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead class="thead-light">
                                                    <th>Image</th>
                                                    <th>Name</th>
                                                    <th>Price</th>
                                                    <th>Qty</th>
                                                    <th>Total</th>
                                                </thead>
                                                <tbody>
                                                    <?php $items = $this->m_global->admin_getOrderDetailProduct($orders['id_pesanan'])->result_array(); ?>
                                                    <?php foreach ($items as $item) { ?>
                                                        <?php $image = $this->m_global->get_image($item['id_produk'])->row_array(); ?>
                                                        <tr>
                                                            <td>
                                                                <img src="<?= base_url('assets/product/' . $image['gambar']) ?>" alt="" width="50" height="50">
                                                            </td>
                                                            <td><?= $item['nama_produk']; ?></td>
                                                            <td>$<?= $item['harga_item']; ?></td>
                                                            <td><?= $item['qty']; ?></td>
                                                            <td style="text-align:right;">$<?= $item['qty'] * $item['harga_item']; ?>&nbsp;&nbsp;</td>
                                                        </tr>
                                                    <?php  } ?>
                                                    <tr>
                                                        <th colspan="5" style="background-color: #DEDEDE">
                                                            <h5>
                                                                Total
                                                                <span style="float:right">$<?= $orders['total_pesanan']; ?>&nbsp;&nbsp;</span>
                                                            </h5>
                                                        </th>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="mb-4">Transfer Evidence</h5>
                                        <div class="table-responsive">
                                            <table class="table" style="text-align: center">
                                                <thead class="thead-light">
                                                    <th>Image</th>
                                                    <th>Date</th>
                                                </thead>
                                                <tbody>
                                                    <?php $tf = $this->m_global->get_bukti_tf($orders['id_pesanan']) ?>
                                                    <?php if ($tf) { ?>
                                                        <th>
                                                            <div class="gallery-box">
                                                                <a class="gallery-popup" href="<?= base_url('assets/img/bukti_tf/' . $tf['bukti_tf']) ?>" title="">
                                                                    <img class="gallery-demo-img img-fluid mx-auto" src="<?= base_url('assets/img/bukti_tf/' . $tf['bukti_tf']) ?>" alt="1" height="auto" width="250px" style="border-radius :10px" />
                                                                </a>
                                                            </div>
                                                        </th>
                                                        <th style="vertical-align: top"><?= date('F m, Y (H:i)', $tf['date_added']); ?></th>
                                                    <?php } else { ?>
                                                        <th colspan="2">There is no data</th>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card" style="margin-bottom:10px">
                                    <div class="card-body">
                                        <h5 class="mb-4">Ordes Status</h5>
                                        <div>
                                            <select name="status_pesanan" id="order_status" class="form-control">
                                                <option value="1" disabled <?php if ($orders['status_pesanan'] == 1) { ?> selected <?php } ?>>Order Received</option>
                                                <option value="2" <?php if ($orders['status_pesanan'] == 2) { ?> selected <?php } ?>>Order Processed</option>
                                                <option value="3" <?php if ($orders['status_pesanan'] == 3) { ?> selected <?php } ?>>Order Shipped</option>
                                                <option value="4" <?php if ($orders['status_pesanan'] == 5) { ?> selected <?php } ?>>Order Delivered</option>
                                            </select>
                                            <input type="hidden" id="id_pesanan" value="<?= $orders['id_pesanan'] ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card" style="margin-bottom:10px">
                                    <div class="card-body">
                                        <h5 class="mb-4">Customer</h5>
                                        <div>
                                            <?php $user = $this->db->get_where('user', ['id' => $orders['id_user']])->row_array() ?>
                                            <img src="<?= base_url('assets/img/user/' . $user['image']) ?>" height="50" width="50" alt="" class="rounded-circle">
                                            <span style="font-size: 18px;font-weight:600;margin-left:10px"><?= $user['name']; ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card" style="margin-bottom:10px">
                                    <div class="card-body">
                                        <h5 class="mb-4">Contact</h5>
                                        <div>
                                            <span style="color: #A4CC64">
                                                <?= $orders['contact_number']; ?> <br>
                                                <?= $user['email']; ?>
                                            </span>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="mb-4">Shipping Address</h5>
                                        <div>
                                            <span style="color: #A4CC64">
                                                <?= $orders['contact_address']; ?>
                                            </span>
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