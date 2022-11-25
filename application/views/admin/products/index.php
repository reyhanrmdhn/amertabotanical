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
                                <div class="row mb-3">
                                    <div class="col-lg-6">
                                        <h4 class="header-title">Product List</h4>
                                    </div>
                                    <div class="col-lg-6" style="text-align: right;">
                                        <button type="button" class="btn btn-primary btn-sm" onclick="location.href='<?= base_url('admin/add_product') ?>'"><i class="fas fa-plus"></i>&nbsp;&nbsp;Add Product</button>
                                    </div>
                                </div>
                                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th width="5%">No</th>
                                            <th>Product</th>
                                            <th width="15%">Stock</th>
                                            <th>Price</th>
                                            <th width="15%" style="text-align: center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $x = 1; ?>
                                        <?php foreach ($produk as $p) { ?>
                                            <?php $image = $this->m_global->get_image($p['id_produk'])->row_array(); ?>
                                            <tr>
                                                <td><?= $x; ?></td>
                                                <td>
                                                    <div class="row">
                                                        <div class="col-lg-2">
                                                            <img src="<?= base_url('assets/product/' . $image['gambar']) ?>" alt="" width="50" height="50">
                                                        </div>
                                                        <div class="col-lg-10">
                                                            <p style="margin:10px 0"><a href="<?= base_url('admin/detail_product/' . $p['id_produk']) ?>" class="title-product"><?= $p['nama_produk']; ?></a></p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <h4>
                                                        <?php if ($p['stok'] == 1) { ?>
                                                            <span class="badge badge-soft-success">In Stock</span>
                                                        <?php } else { ?>
                                                            <span class="badge badge-soft-danger">Out of Stock</span>
                                                        <?php } ?>
                                                    </h4>
                                                </td>
                                                <td>$ <?= number_format($p['harga']); ?></td>
                                                <td style="text-align: center">
                                                    <button type="button" class="btn btn-info btn-sm" onclick="location.href='<?= base_url('admin/detail_product/' . $p['id_produk']) ?>'"><i class="fas fa-eye"></i></button>
                                                    <button type="button" class="btn btn-danger btn-sm deleteProduct" data-id="<?= $p['id_produk'] ?>"><i class="fas fa-trash-alt"></i></button>
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