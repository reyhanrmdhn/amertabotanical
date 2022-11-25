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

<section class="inner-section about-company">

    <div class="container">

        <div class="row align-items-center">

            <div class="col-lg-6">

                <div class="about-content">

                    <h2>Our Motive is to Provide Best for Those Who Deserve</h2>

                    <p class="mb-2">

                        Since 2022, Amerta Botanicals has been supplying pure, potent, premium botanical supplements to health-conscious people located throughout the country.

                    </p>

                    <p class="mb-2">

                        Headquartered in Pontianak, Indonesia (Borneo), we are a passionate, driven team of people who genuinely care about the health and well-being of our customers.

                    </p>

                    <p class="mb-2">

                        Our passion for botanicals is reflected in the quality of the products we sell, how we serve our customers, and the way we work hard every day to bring positive change to the world.

                    </p>

                </div>

            </div>

            <div class="col-lg-6">

                <div class="about-img">

                    <?php $image = $this->m_global->get_contentAbout_image()->result_array() ?>

                    <?php foreach ($image as $i) { ?>

                        <img src="<?= base_url('assets/banner/' . $i['image']) ?>" alt="about">

                    <?php } ?>

                </div>

            </div>

        </div>

    </div>

</section>

<!--=====================================

                    ABOUT PART END

        =======================================-->







<!--=====================================

                    CHOOSE PART START

        =======================================-->

<section class="about-choose">

    <div class="container">

        <div class="row">

            <div class="col-11 col-md-9 col-lg-7 col-xl-6 mx-auto">

                <div class="section-heading">

                    <h2>Why People Choose Us</h2>

                </div>

            </div>

        </div>

        <div class="row">

            <div class="col-lg-6">

                <div class="choose-card">

                    <div class="choose-icon">

                        <i class="icofont-safety"></i>

                    </div>

                    <div class="choose-text">

                        <h5>Clean & Sterile</h5>

                        <p>Fresh, Clean, and Sterilization</p>


                    </div>

                </div>

            </div>

            <div class="col-lg-6">

                <div class="choose-card">

                    <div class="choose-icon">

                        <i class="icofont-vehicle-delivery-van"></i>

                    </div>

                    <div class="choose-text">

                        <h4>Free Shipping</h4>

                        <p>Get your order with free shipping from us</p>

                    </div>

                </div>

            </div>

            <div class="col-lg-6 ml-3">

                <div class="choose-card">

                    <div class="choose-icon">

                        <i class="icofont-check-circled"></i>

                    </div>

                    <div class="choose-text">

                        <h4>trusted quality</h4>

                        <p>We only serve the best quality</p>

                    </div>

                </div>

            </div>

            <div class="col-lg-6">

                <div class="choose-card">

                    <div class="choose-icon">

                        <i class="icofont-support"></i>

                    </div>

                    <div class="choose-text">

                        <h4>instant support team</h4>

                        <p>Contact us everytime</p>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

<!--=====================================

                    CHOOSE PART END

        =======================================-->