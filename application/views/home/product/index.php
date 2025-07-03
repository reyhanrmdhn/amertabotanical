<!--=====================================
                    BANNER PART START
        =======================================-->
<section class="inner-section single-banner" style="background: url(<?= base_url('assets/img/banner.jpg') ?>) no-repeat center;">
    <div class="container">
        <h2><?= $title; ?></h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url() ?>">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?= $title; ?></li>
        </ol>
    </div>
</section>
<!--=====================================
                    BANNER PART END
        =======================================-->
<!--=====================================
                    SHOP PART START
        =======================================-->
<section class="inner-section shop-part">
    <div class="container">
        <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4">
            <?php foreach ($produk as $p) { ?>
                <?php $image = $this->m_global->get_image($p['id_produk'])->row_array(); ?>
                <div class="col">
                    <div class="product-card <?php if ($p['stok'] == 0) { ?> product-disable <?php } ?>">
                        <div class="product-media">
                            <a class="product-image view-product" href="<?= base_url('product/detail/' . $p['id_produk']) ?>">
                                <img src="<?= base_url('assets/product/' . $image['gambar']) ?>" alt="product">
                            </a>
                            <div class="product-widget">
                                <a title="Product View" href="javascript:void(0)" class="fas fa-eye view-product" data-id_produk="<?= $p['id_produk'] ?>" data-name="<?= $p['nama_produk'] ?>" data-harga="<?= $p['harga'] ?>" data-deskripsi="<?= $p['deskripsi'] ?>"></a>
                            </div>
                        </div>
                        <div class="product-content">
                            <div class="product-rating">
                                <i class="active icofont-star"></i>
                                <i class="active icofont-star"></i>
                                <i class="active icofont-star"></i>
                                <i class="active icofont-star"></i>
                                <i class="active icofont-star"></i>
                                <!-- <a href="product-video.html">(3)</a> -->
                            </div>
                            <h6 class="product-name">
                                <a href="product-video.html"><?= $p['nama_produk']; ?></a>
                            </h6>
                            <h6 class="product-price">
                                <?php if ($p['harga_lama'] != 0) { ?>
                                    <del>$<?= $p['harga_lama']; ?></del>
                                <?php } ?>
                                <span>$<?= $p['harga']; ?></span>
                            </h6>
                            <?php if (is_ecommerce()) : ?>
                                <button class="product-add add-cart" title="Add to Cart" data-name="<?= $p['nama_produk']; ?>" data-price="<?= $p['harga'] ?>" data-id="<?= $p['id_produk']; ?>">
                                    <i class="fas fa-shopping-basket"></i>
                                    <span>add</span>
                                </button>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>
<!--=====================================
                    SHOP PART END
        =======================================-->