<!--=====================================
                    BANNER PART START
        =======================================-->
<section class="inner-section single-banner" style="background: url(<?= base_url('assets/img/banner.jpg') ?>) no-repeat center;">
    <div class="container">
        <h2><?= $title; ?></h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?= $title; ?></li>
        </ol>
    </div>
</section>
<!--=====================================
                    BANNER PART END
        =======================================-->


<!--=====================================
                     ABOUT PART START
        =======================================-->
<section class="inner-section">
    <div class="container">
        <div class="row container-grid projects-wrapper">
            <?php foreach ($gallery as $i) { ?>
                <div class="col-xl-3 col-md-4 col-sm-6 gallery">
                    <div class="gallery-box">
                        <a class="gallery-popup" href="<?= base_url('assets/gallery/' . $i['url']) ?>" title="">
                            <img class="gallery-demo-img img-fluid mx-auto" src="<?= base_url('assets/gallery/' . $i['url']) ?>" alt="1" />
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
</section>
<!--=====================================
                    ABOUT PART END
        =======================================-->