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
                                <div class="row">
                                    <div class="col-lg-6">
                                        <h5 class="mb-4">Images</h5>
                                    </div>
                                    <div class="col-lg-6" style="text-align: right">
                                        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addImageModal"><i class="fas fa-plus"></i>&nbsp;&nbsp; Add</button>
                                    </div>
                                </div>

                                <div class="row">
                                    <?php foreach ($gallery as $i) { ?>
                                        <div class="col-xl-3 col-md-4 col-sm-6">
                                            <button type="button" style="z-index:1000;position:absolute;right:0;margin:35px 20px 0 0" class="btn btn-danger deleteImageGallery" data-id="<?= $i['id_gallery'] ?>"><i class=" fas fa-trash-alt"></i></button>
                                            <div class="gallery-box mt-4">
                                                <a class="gallery-popup" href="<?= base_url('assets/gallery/' . $i['url']) ?>" title="">
                                                    <img class="gallery-demo-img img-fluid mx-auto" src="<?= base_url('assets/gallery/' . $i['url']) ?>" />
                                                    <div class="gallery-overlay">
                                                        <div class="overlay-content">
                                                            <!-- <h5 class="overlay-title">Person riding on snowmobile</h5>
                                                            <p class="text-uppercase mb-0">Joseph Clark</p> -->
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    <?php } ?>
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

    <div class="modal fade" id="addImageModal" tabindex="-1" role="dialog" aria-labelledby="addImageModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addImageModalLabel">Add Image</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('admin/add_image_gallery') ?>" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Image</label>
                            <div class="col-md-9">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="customFile" name="image" accept="image/*">
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>