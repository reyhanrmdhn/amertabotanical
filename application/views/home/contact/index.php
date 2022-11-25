  <!--=====================================
                    BANNER PART START
        =======================================-->
  <section class="inner-section single-banner" style="background: url(<?= base_url('assets/img/banner.jpg') ?>) no-repeat center;">
      <div class="container">
          <h2>contact us</h2>
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
                    CONTACT PART START
        =======================================-->
  <section class="inner-section contact-part">
      <div class="container">
          <div class="row">
              <div class="col-lg-12">
                  <?= $this->session->flashdata('message') ?>
              </div>
              <div class="col-lg-4 mx-auto">
                  <!-- <div class="row">
                      <div class="col-lg-12">
                          <div class="contact-card">
                              <i class="icofont-location-pin"></i>
                              <h4>head office</h4>
                              <p>1Hd- 50, 010 Avenue, NY 90001 United States</p>
                          </div>
                      </div>
                  </div> -->
                  <div class="row">
                      <div class="col-lg-12">
                          <div class="contact-card active">
                              <i class="icofont-phone"></i>
                              <h4>phone number</h4>
                              <p>
                                  <a href="#">(+62) 812-8196-3747</a>
                              </p>
                          </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-lg-12">
                          <div class="contact-card">
                              <i class="icofont-email"></i>
                              <h4>Support mail</h4>
                              <p>
                                  <a href="#">info@amertabotanical.com</a>
                              </p>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="col-lg-8 mx-auto">
                  <form class="contact-form" action="<?= base_url('contact/input') ?>" method="POST">
                      <h4>Drop Your Thoughts</h4>
                      <div class="form-group">
                          <div class="form-input-group">
                              <input name="name" class="form-control" type="text" placeholder="Your Name" required>
                              <i class="icofont-user-alt-3"></i>
                          </div>
                      </div>
                      <div class="form-group">
                          <div class="form-input-group">
                              <input name="email" class="form-control" type="email" placeholder="Your Email" required>
                              <i class="icofont-email"></i>
                          </div>
                      </div>
                      <div class="form-group">
                          <div class="form-input-group">
                              <input name="subject" class="form-control" type="text" placeholder="Your Subject" required>
                              <i class="icofont-book-mark"></i>
                          </div>
                      </div>
                      <div class="form-group">
                          <div class="form-input-group">
                              <textarea name="message" class="form-control" placeholder="Your Message" required></textarea>
                              <i class="icofont-paragraph"></i>
                          </div>
                      </div>
                      <div class="form-group">
                          <div class="form-input-group">
                              <?= $script; ?>
                              <?= $widget; ?>
                          </div>
                      </div>
                      <button type="submit" class="form-btn-group">
                          <i class="fas fa-envelope"></i>
                          <span>send message</span>
                      </button>
                  </form>
              </div>
          </div>
      </div>
  </section>
  <!--=====================================
                    CONTACT PART END
        =======================================-->