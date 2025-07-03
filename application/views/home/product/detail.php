<!--=====================================
                    BANNER PART START
        =======================================-->
<section class="inner-section single-banner" style="background: url(<?= base_url('assets/img/banner.jpg') ?>) no-repeat center;">
    <div class="container">
        <h2><?= $title; ?></h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url() ?>">Home</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url() ?>">Product</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?= $title; ?></li>
        </ol>
    </div>
</section>
<!--=====================================
                    BANNER PART END
        =======================================-->
<!--=====================================
                PRODUCT DETAILS PART START
        =======================================-->
<section class="inner-section" style="margin-top:100px">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <?= $this->session->flashdata('message') ?>
            </div>
            <div class="col-lg-6">
                <div class="details-gallery">
                    <ul class="details-preview <?php if ($produk['stok'] == 0) { ?> product-disable <?php } ?>">
                        <?php foreach ($image as $img) { ?>
                            <li><img src="<?= base_url('assets/product/' . $img['gambar']) ?>" alt="product"></li>
                        <?php } ?>
                    </ul>
                    <ul class="details-thumb">
                        <?php foreach ($image as $img) { ?>
                            <li><img src="<?= base_url('assets/product/' . $img['gambar']) ?>" alt="product"></li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
            <div class="col-lg-6">
                <ul class="product-navigation">
                    <?php
                    $x = 0;
                    $item = [];
                    foreach ($all_produk as $all) {
                        $item[$x] = $all['id_produk'];
                        if ($all['id_produk'] == $produk['id_produk']) {
                            $posisi = $x;
                        }
                        $x++;
                    }
                    ?>
                    <li class="product-nav-prev">
                        <?php if ($posisi > 0) { ?>
                            <a href="<?= base_url('product/detail/' . $item[$posisi - 1]) ?>">
                                <i class="icofont-arrow-left"></i>
                                prev product
                            </a>
                        <?php } ?>
                    </li>
                    <li class="product-nav-next">
                        <?php if ($posisi != ($x - 1)) { ?>
                            <a href="<?= base_url('product/detail/' . $item[$posisi + 1]) ?>">
                                next product
                                <i class="icofont-arrow-right"></i>
                            </a>
                        <?php } ?>
                    </li>
                </ul>
                <div class="details-content">
                    <h3 class="details-name"><a href="#"><?= $produk['nama_produk']; ?></a></h3>
                    <!-- <div class="details-meta">
                        <p>SKU:<span>1234567</span></p>
                        <p>BRAND:<a href="#">radhuni</a></p>
                    </div> -->
                    <div class="details-rating">
                        <i class="active icofont-star"></i>
                        <i class="active icofont-star"></i>
                        <i class="active icofont-star"></i>
                        <i class="active icofont-star"></i>
                        <i class="active icofont-star"></i>
                        <!-- <i class="icofont-star"></i>
                        <a href="#">(3 reviews)</a> -->
                    </div>
                    <h3 class="details-price">
                        <?php if ($produk['harga_lama'] != 0) { ?>
                            <del>$<?= $produk['harga_lama']; ?></del>
                        <?php } ?>
                        <span>$<?= $produk['harga']; ?></span>
                    </h3>
                    <div style="height: 170px">
                        <p class="details-desc">
                            <?= $produk['deskripsi']; ?>
                        </p>
                    </div>
                    <!-- <div class="details-list-group">
                        <label class="details-list-title">Share:</label>
                        <ul class="details-share-list">
                            <li><a href="#" class="icofont-facebook" title="Facebook"></a></li>
                            <li><a href="#" class="icofont-twitter" title="Twitter"></a></li>
                            <li><a href="#" class="icofont-linkedin" title="Linkedin"></a></li>
                            <li><a href="#" class="icofont-instagram" title="Instagram"></a></li>
                        </ul>
                    </div> -->
                    <?php if (is_ecommerce()) : ?>
                        <div class="details-add-group">
                            <button <?php if ($produk['stok'] == 0) { ?> disabled <?php } ?> class="product-add add-cart" title="Add to Cart" data-name="<?= $produk['nama_produk']; ?>" data-price="<?= $produk['harga'] ?>" data-id="<?= $produk['id_produk']; ?>">
                                <i class="fas fa-shopping-basket"></i>
                                <span>add to cart</span>
                            </button>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!--=====================================
                PRODUCT DETAILS PART END
        =======================================-->
<!--=====================================
                  PRODUCT TAB PART START
        =======================================-->
<section class="inner-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <ul class="nav nav-tabs">
                    <li><a href="#tab-desc" class="tab-link active" data-bs-toggle="tab">descriptions</a></li>
                    <li><a href="#tab-reve" class="tab-link" data-bs-toggle="tab">reviews (<?= $rating_num; ?>)</a></li>
                </ul>
            </div>
        </div>
        <div class="tab-pane fade show active" id="tab-desc">
            <div class="row">
                <div class="col-lg-12">
                    <div class="product-details-frame">
                        <div class="tab-descrip">
                            <p><?= $produk['deskripsi_panjang']; ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="tab-reve">
            <div class="row">
                <div class="col-lg-12">
                    <div class="product-details-frame">
                        <ul class="review-list">
                            <?php foreach ($rating as $r) { ?>
                                <li class="review-item">
                                    <div class="review-media">
                                        <a class="review-avatar" href="#">
                                            <img src="<?= base_url('assets/img/user/' . $r['image']) ?>" alt="review">
                                        </a>
                                        <h5 class="review-meta">
                                            <a href="#"><?= $r['name']; ?></a>
                                            <span><?= date('F m, Y', $r['tanggal_review']); ?></span>
                                        </h5>
                                    </div>
                                    <ul class="review-rating">
                                        <?php for ($i = 0; $i < $r['rating']; $i++) { ?>
                                            <li class="icofont-ui-rating"></li>
                                        <?php  } ?>
                                        <?php for ($i = 0; $i < 5 - $r['rating']; $i++) { ?>
                                            <li class="icofont-ui-rate-blank"></li>
                                        <?php  } ?>
                                    </ul>
                                    <p class="review-desc"><?= $r['review']; ?></p>
                                </li>
                            <?php } ?>
                        </ul>
                        </ul>
                    </div>
                    <div class="product-details-frame">
                        <h3 class="frame-title">add your review</h3>
                        <form class="review-form" action="<?= base_url('product/add_review') ?>" method="POST">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="star-rating">
                                        <input type="radio" id="star-5"><label for="star-5" id="star-5"></label>
                                        <input type="radio" id="star-4"><label for="star-4" id="star-4"></label>
                                        <input type="radio" id="star-3"><label for="star-3" id="star-3"></label>
                                        <input type="radio" id="star-2"><label for="star-2" id="star-2"></label>
                                        <input type="radio" id="star-1"><label for="star-1" id="star-1"></label>
                                    </div>
                                    <input type="hidden" name="rating" id="rating" value="0">
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <textarea name="review" class="form-control" placeholder="Describe"></textarea>
                                    </div>
                                </div>
                                <?php if ($user) { ?>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Name" value="<?= $user['name'] ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input type="email" class="form-control" placeholder="Email" value="<?= $user['email'] ?>" readonly>
                                        </div>
                                    </div>
                                    <input type="hidden" name="id_user" value="<?= $user['id'] ?>">
                                    <input type="hidden" name="id_produk" value="<?= $produk['id_produk']; ?>">
                                    <button type="submit" class="btn btn-inline">
                                        <i class="icofont-water-drop"></i>
                                        <span>drop your review</span>
                                    </button>
                                <?php } else { ?>
                                    <button type="button" class="btn btn-inline" disabled>
                                        <i class="icofont-holer"></i>
                                        <span>Login first</span>
                                    </button>
                                <?php } ?>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--=====================================
                    PRODUCT TAB PART END
        =======================================-->