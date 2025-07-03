    <!--=====================================
                    BANNER PART START
        =======================================-->
    <section class="home-index-slider slider-arrow slider-dots">
        <?php $content = $this->m_global->get_content('home'); ?>
        <?php foreach ($content as $c) { ?>
            <div class="banner-part banner">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-6 col-lg-6">
                            <div class="banner-content">
                                <h1><?= $c['judul']; ?></h1>
                                <p><?= $c['deskripsi']; ?></p>
                                <div class="banner-btn">
                                    <a class="btn btn-inline" href="<?= base_url('product') ?>">
                                        <i class="fas fa-shopping-basket"></i>
                                        <span>shop now</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6">
                            <div class="banner-img">
                                <?php $image = $this->m_global->get_contentHome_image($c['id_content']); ?>
                                <img src="<?= base_url('assets/banner/' . $image['image']) ?>" alt="index">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </section>
    <!--=====================================
                    BANNER PART END
        =======================================-->
    <!--=====================================
                    INTRO PART START
        =======================================-->
    <section class="intro-part">
        <div class="container">
            <div class="row intro-content">
                <div class="col-sm-6 col-lg-3">
                    <div class="intro-wrap">
                        <div class="intro-icon">
                            <i class="fas fa-truck"></i>
                        </div>
                        <div class="intro-content">
                            <h5>free shipping</h5>
                            <p>Get your order with free shipping from us</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="intro-wrap">
                        <div class="intro-icon">
                            <i class="fas fa-hand-sparkles"></i>
                        </div>
                        <div class="intro-content">
                            <h5>Clean & Sterile</h5>
                            <p>Fresh, Clean, and Sterilization</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="intro-wrap">
                        <div class="intro-icon">
                            <i class="fas fa-headset"></i>
                        </div>
                        <div class="intro-content">
                            <h5>instant support team</h5>
                            <p>Support you everytime, Contact us</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="intro-wrap">
                        <div class="intro-icon">
                            <i class="fas fa-check"></i>
                        </div>
                        <div class="intro-content">
                            <h5>trusted quality</h5>
                            <p>We only serve the best quality</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=====================================
                    INTRO PART END
        =======================================-->
    <!--=====================================
                    RECENT PART START
        =======================================-->
    <section class="section recent-part" style="margin-top:50px">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading">
                        <h2>our product</h2>
                    </div>
                </div>
            </div>
            <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4">
                <?php foreach ($produk as $p) { ?>
                    <?php $image = $this->m_global->get_image($p['id_produk'])->row_array(); ?>
                    <div class="col">
                        <div class="product-card <?php if ($p['stok'] == 0) { ?> product-disable <?php } ?>">
                            <div class="product-media">
                                <div class="product-label">
                                    <label class="label-text new">new</label>
                                </div>
                                <a class="product-image view-product" href="javascript:void(0)" data-id_produk="<?= $p['id_produk'] ?>" data-name="<?= $p['nama_produk'] ?>" data-harga="<?= $p['harga'] ?>" data-deskripsi="<?= $p['deskripsi'] ?>">
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
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-btn-25">
                        <a href="<?= base_url('product') ?>" class="btn btn-outline">
                            <i class="fas fa-eye"></i>
                            <span>show more</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=====================================
                    RECENT PART END
        =======================================-->
    <!--=====================================
                    PROMOTION PART START
        =======================================-->
    <!-- <div class="section promo-part">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="promo-img">
                        <a href=""><img src="<?= base_url('vendor/template/') ?>images/promo/home/03.jpg" alt="promo"></a>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!--=====================================
                    PROMOTION PART END
        =======================================-->
    <!--=====================================
                  TESTIMONIAL PART START
        =======================================-->
    <section class="section testimonial-part">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading">
                        <h2>client's feedback</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="testimonial-slider slider-arrow">
                        <div class="testimonial-card">
                            <i class="fas fa-quote-left"></i>
                            <p>
                                in my experience, the highest quality kratom on the market, sold at a very fair price and shipped fast. No other provider I’ve tried has been able to match their consistency and quality. Highly recommended.
                            </p>
                            <h5>Gavin J</h5>
                            <ul>
                                <li class="fas fa-star"></li>
                                <li class="fas fa-star"></li>
                                <li class="fas fa-star"></li>
                                <li class="fas fa-star"></li>
                                <li class="fas fa-star"></li>
                            </ul>
                            <img src="<?= base_url('assets/img/user/user.png') ?>" alt="testimonial">
                        </div>
                        <div class="testimonial-card">
                            <i class="fas fa-quote-left"></i>
                            <p>Quality kratom, quick shipping, good prices.</p>
                            <h5>elizabeth</h5>
                            <ul>
                                <li class="fas fa-star"></li>
                                <li class="fas fa-star"></li>
                                <li class="fas fa-star"></li>
                                <li class="fas fa-star"></li>
                                <li class="fas fa-star"></li>
                            </ul>
                            <img src="<?= base_url('assets/img/user/user.png') ?>" alt="testimonial">
                        </div>
                        <div class="testimonial-card">
                            <i class="fas fa-quote-left"></i>
                            <p>I've been buying this one for a while now. It delivers results everyday. Gives me energy and calms my nerves for a busy schedule. Highly Recommend.</p>
                            <h5>ronald</h5>
                            <ul>
                                <li class="fas fa-star"></li>
                                <li class="fas fa-star"></li>
                                <li class="fas fa-star"></li>
                                <li class="fas fa-star"></li>
                                <li class="fas fa-star"></li>
                            </ul>
                            <img src="<?= base_url('assets/img/user/user.png') ?>" alt="testimonial">
                        </div>
                        <div class="testimonial-card">
                            <i class="fas fa-quote-left"></i>
                            <p>Properly dosed, this strain boosts my mood and helps me feel motivated to move. I only use it in the early morning before doing my cardio workout. Within thirty minutes of ingestion, I’m ready to go.</p>
                            <h5>benjamin</h5>
                            <ul>
                                <li class="fas fa-star"></li>
                                <li class="fas fa-star"></li>
                                <li class="fas fa-star"></li>
                                <li class="fas fa-star"></li>
                                <li class="fas fa-star"></li>
                            </ul>
                            <img src="<?= base_url('assets/img/user/user.png') ?>" alt="testimonial">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=====================================
                   TESTIMONIAL PART END
        =======================================-->