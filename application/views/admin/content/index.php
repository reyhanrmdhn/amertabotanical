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
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#home" role="tab">
                                            <i class="fas fa-home mr-1"></i> <span class="d-none d-md-inline-block">Home</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#about" role="tab">
                                            <i class="fas fa-user mr-1"></i> <span class="d-none d-md-inline-block">About</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- Tab panes -->
                        <div class="tab-content mb-4">
                            <div class="tab-pane active" id="home" role="tabpanel">
                                <button class="btn btn-primary btn-block mb-3" onclick="location.href='<?= base_url('admin/add_content/home') ?>'"><i class="fas fa-plus"></i>&nbsp; Add Banner Home</button>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="card-deck-wrapper">
                                            <?php $content = $this->m_global->get_content('home'); ?>
                                            <div class="card-deck">
                                                <?php
                                                foreach ($content as $c) { ?>
                                                    <?php $image = $this->m_global->get_contentHome_image($c['id_content']); ?>
                                                    <div class="card">
                                                        <img class="card-img-top img-fluid" src="<?= base_url('assets/banner/' . $image['image']) ?>" alt="Card image cap">
                                                        <div class="card-body">
                                                            <h4 class="card-title font-size-16 mt-0"><?= $c['judul']; ?></h4>
                                                            <p class="card-text">
                                                                <?= $c['deskripsi']; ?>
                                                            </p>
                                                            <button class="btn btn-danger deleteContentHome" data-id="<?= $c['id_content'] ?>"><i class="fas fa-trash-alt"></i> Delete this</button>
                                                        </div>
                                                    </div>
                                                <?php
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="about" role="tabpanel">
                                <?php $limit = $this->m_global->get_contentAbout_image()->num_rows() ?>
                                <?php if ($limit < 4) { ?>
                                    <button class="btn btn-primary btn-block mb-3" data-toggle="modal" data-target="#addImageModal"><i class="fas fa-plus"></i>&nbsp; Add Image</button>
                                <?php  } ?>
                                <div class="card px-3">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <h1 class="mt-4">Our Motive Is To Provide Best For Those Who Deserve</h1>
                                            <div style="font-size: 18px" class="mt-4">
                                                <p>
                                                    Since 2022, Amerta Botanicals has been supplying pure, potent, premium botanical supplements to health-conscious people located throughout the country.
                                                </p>
                                                <p>
                                                    Headquartered in Pontianak, Indonesia (Borneo), we are a passionate, driven team of people who genuinely care about the health and well-being of our customers.
                                                </p>
                                                <p>
                                                    Our passion for botanicals is reflected in the quality of the products we sell, how we serve our customers, and the way we work hard every day to bring positive change to the world.
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="row">
                                                        <?php $imageAbout = $this->m_global->get_contentAbout_image()->result_array(); ?>
                                                        <?php foreach ($imageAbout as $im) { ?>
                                                            <div class="col-lg-6">
                                                                <button type="button" style="z-index:1000;position:absolute;right:0;margin:35px 20px 0 0" class="btn btn-danger deleteImageAbout" data-id_content_image="<?= $im['id_content_image'] ?>"><i class=" fas fa-trash-alt"></i></button>
                                                                <div class="gallery-box mt-4">
                                                                    <a class="gallery-popup" href="<?= base_url('assets/banner/' . $im['image']) ?>" title="">
                                                                        <img class="gallery-demo-img img-fluid mx-auto" src="<?= base_url('assets/banner/' . $im['image']) ?>" />
                                                                        <div class="gallery-overlay">
                                                                            <div class="overlay-content">
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
                <form action="<?= base_url('admin/add_contentAbout_image') ?>" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Content Image</label>
                            <div class="col-md-9">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="customFile" name="image" accept="image/*">
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="url" value="about">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>