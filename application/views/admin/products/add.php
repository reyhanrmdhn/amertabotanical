<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="main-content">
    <div class="page-content">
        <!-- Page-Title -->
        <div class="page-title-box">
            <div class="container-fluid">
                <a href="javascript:void(0)" class="waves-effect btn btn-dark mb-3" onclick="goBack()">
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
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">Input New Products</h4>
                                <p class="card-title-desc">Fill these forms to add new Product</p>
                                <form action="<?= base_url('admin/input_product') ?>" method="POST" enctype="multipart/form-data">
                                    <div class="form-group row">
                                        <label for="nama_produk" class="col-md-2 col-form-label">Product Name</label>
                                        <div class="col-md-10">
                                            <input class="form-control" name="nama_produk" id="nama_produk" type="text" placeholder="Type Here..." required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="price" class="col-md-2 col-form-label">Price</label>
                                        <div class="col-md-10">
                                            <input class="form-control number" name="harga" id="price" type="text" placeholder="Type Here..." required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="deskripsi" class="col-md-2 col-form-label">Description</label>
                                        <div class="col-md-10">
                                            <textarea name="deskripsi" id="deskripsi" rows="3" class="form-control" placeholder="Type Here..."></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="deskripsi" class="col-md-2 col-form-label">Description <br> (Long Version)</label>
                                        <div class="col-md-10">
                                            <textarea name="deskripsi_panjang" id="deskripsi" rows="6" class="form-control" placeholder="Type Here..."></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="image" class="col-md-2 col-form-label">Product Image</label>
                                        <div class="col-md-10">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="customFile" name="image" accept="image/*" required>
                                                <label class="custom-file-label" for="customFile">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12" style="text-align:right">
                                            <button type="submit" class="btn btn-primary"><i class="fas fa-plus"></i>&nbsp;&nbsp; Add Product</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->
            </div> <!-- container-fluid -->
        </div>
        <!-- end page-content-wrapper -->
    </div>
    <!-- End Page-content -->