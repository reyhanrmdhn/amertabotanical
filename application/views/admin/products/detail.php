<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="main-content">

    <div class="page-content">

        <!-- Page-Title -->
        <div class="page-title-box">
            <div class="container-fluid">
                <a href="<?= base_url('admin/products') ?>" class="waves-effect btn btn-dark mb-3">
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
                    <div class="col-lg-8">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <h5 class="mb-4">Product Detail</h5>
                                            </div>
                                            <div class="col-lg-6" style="text-align: right">
                                                <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editProductModal"><i class="fas fa-pencil-alt"></i>&nbsp;&nbsp; Edit</button>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <h5 class="font-size-14">Name</h5>
                                            <input class="form-control" name="nama_produk" value="<?= $produk['nama_produk'] ?>" type="text" placeholder="Type Here..." readonly>
                                        </div>
                                        <div class="mb-3">
                                            <h5 class="font-size-14">Short Description</h5>
                                            <input class="form-control" value="<?= $produk['deskripsi'] ?>" type="text" placeholder="Type Here..." readonly>
                                        </div>
                                        <div class="mb-3">
                                            <h5 class="font-size-14">Description</h5>
                                            <textarea class="form-control" name="deskripsi" rows="5" placeholder="Type Here..." readonly><?= $produk['deskripsi_panjang'] ?></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="mb-4">Stock</h5>
                                        <div class="mb-3">
                                            <select name="stock" class="form-control" id="stokForm">
                                                <option value="1" <?php if ($produk['stok'] == 1) { ?> selected <?php } ?>>In Stock</option>
                                                <option value="0" <?php if ($produk['stok'] == 0) { ?> selected <?php } ?>>Out Of Stock</option>
                                            </select>
                                            <input type="hidden" id="id_produk" value="<?= $produk['id_produk'] ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <h5 class="mb-4">Pricing</h5>
                                            </div>
                                            <div class="col-lg-6" style="text-align: right">
                                                <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editPriceModal"><i class="fas fa-pencil-alt"></i>&nbsp;&nbsp; Edit</button>
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <h5 class="font-size-14">Price</h5>
                                            <input class="form-control" value="<?= '$ ' . number_format($produk['harga']) ?>" type="text" placeholder="Type Here..." readonly>
                                        </div>
                                        <div class="mb-3">
                                            <h5 class="font-size-14">Old Price</h5>
                                            <input class="form-control" value="<?= '$ ' . number_format($produk['harga_lama']) ?>" type="text" placeholder="Type Here..." readonly>
                                        </div>
                                        <?php if ($produk['harga_lama'] != 0) { ?>
                                            <?php $potongan = intval($produk['harga_lama']) - intval($produk['harga']) ?>
                                            <?php $percent = ((intval($produk['harga_lama']) - intval($produk['harga'])) / intval($produk['harga_lama'])) * 100; ?>
                                            <div class="mb-3">
                                                <h5 class="text-success">Discount : $<?= $potongan; ?> (<?= round($percent); ?>%)</h5>
                                            </div>
                                        <?php  } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <h5 class="mb-4">Images</h5>
                                    </div>
                                    <div class="col-lg-6" style="text-align: right">
                                        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addImageModal"><i class="fas fa-plus"></i>&nbsp;&nbsp; Add</button>
                                    </div>
                                </div>
                                <?php $image = $this->m_global->get_image($produk['id_produk'])->result_array() ?>
                                <div class="row">
                                    <?php foreach ($image as $i) { ?>
                                        <div class="col-lg-3">
                                            <img src="<?= base_url('assets/product/' . $i['gambar']) ?>" alt="produk" width="150" height="auto">
                                            <button style="vertical-align: top;" class="btn btn-danger deleteImage" data-id="<?= $i['id_image'] ?>" data-id_produk="<?= $produk['id_produk'] ?>" type="button"> <i class="fas fa-trash-alt"></i></button>
                                        </div>
                                    <?php } ?>
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

    <div class="modal fade" id="editProductModal" tabindex="-1" role="dialog" aria-labelledby="editProductModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editProductModalLabel">Edit Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('admin/edit_product') ?>" method="POST">
                    <div class="modal-body">
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Product Name</label>
                            <div class="col-md-9">
                                <input class="form-control" name="nama_produk" value="<?= $produk['nama_produk'] ?>" type="text" placeholder="Type Here..." required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Description</label>
                            <div class="col-md-9">
                                <textarea class="form-control" name="deskripsi" rows="3" placeholder="Type Here..." required><?= $produk['deskripsi']; ?></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Description <br> (Long Version)</label>
                            <div class="col-md-9">
                                <textarea class="form-control" name="deskripsi_panjang" rows="6" placeholder="Type Here..." required><?= $produk['deskripsi_panjang']; ?></textarea>
                            </div>
                        </div>
                    </div>
                    <div class=" modal-footer">
                        <input type="hidden" name="id_produk" value="<?= $produk['id_produk'] ?>">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="addImageModal" tabindex="-1" role="dialog" aria-labelledby="addImageModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addImageModalLabel">Add Image</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('admin/add_image_product') ?>" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Product Image</label>
                            <div class="col-md-9">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="customFile" name="image" accept="image/*">
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="id_produk" value="<?= $produk['id_produk'] ?>">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editPriceModal" tabindex="-1" role="dialog" aria-labelledby="editPriceModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editPriceModalLabel">Edit Price ($)</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('admin/edit_price') ?>" method="POST">
                    <div class="modal-body">
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Old Price</label>
                            <div class="col-md-9">
                                <input class="form-control number" name="harga_lama" value="<?= $produk['harga'] ?>" type="text" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">New Price</label>
                            <div class="col-md-9">
                                <input class="form-control number" name="harga_baru" type="text" placeholder="Type Here...">
                            </div>
                        </div>
                    </div>
                    <div class=" modal-footer">
                        <input type="hidden" name="id_produk" value="<?= $produk['id_produk'] ?>">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>