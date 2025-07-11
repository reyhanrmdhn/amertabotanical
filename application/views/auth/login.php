<!DOCTYPE html>
<html lang="en">

<head>
    <!--=====================================
                    META TAG PART START
        =======================================-->
    <!--=====================================
                    META-TAG PART END
        =======================================-->
    <!-- WEBPAGE TITLE -->
    <title>Login Page | Amerta Botanical</title>
    <!--=====================================
                    CSS LINK PART START
        =======================================-->
    <!-- FAVICON -->
    <link rel="icon" href="<?= base_url('vendor/template/') ?>images/favicon.png">
    <!-- FONTS -->
    <link rel="stylesheet" href="<?= base_url('vendor/template/') ?>fonts/flaticon/flaticon.css">
    <link rel="stylesheet" href="<?= base_url('vendor/template/') ?>fonts/icofont/icofont.min.css">
    <link rel="stylesheet" href="<?= base_url('vendor/template/') ?>fonts/fontawesome/fontawesome.min.css">
    <!-- VENDOR -->
    <link rel="stylesheet" href="<?= base_url('vendor/template/') ?>vendor/venobox/venobox.min.css">
    <link rel="stylesheet" href="<?= base_url('vendor/template/') ?>vendor/slickslider/slick.min.css">
    <link rel="stylesheet" href="<?= base_url('vendor/template/') ?>vendor/niceselect/nice-select.min.css">
    <link rel="stylesheet" href="<?= base_url('vendor/template/') ?>vendor/bootstrap/bootstrap.min.css">
    <!-- CUSTOM -->
    <link rel="stylesheet" href="<?= base_url('vendor/template/') ?>css/main.css">
    <link rel="stylesheet" href="<?= base_url('vendor/template/') ?>css/user-auth.css">
    <!--=====================================
                    CSS LINK PART END
        =======================================-->
</head>

<body>
    <!--=====================================
                    USER FORM PART START
        =======================================-->
    <section class="user-form-part">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-sm-5">
                    <div class="user-form-logo">
                        <a href="<?= base_url() ?>"><img src="<?= base_url('vendor/template/') ?>images/logo.png" alt="logo"></a>
                    </div>
                    <div class="user-form-card">
                        <div class="user-form-title">
                            <h2>welcome!</h2>
                            <p>Use your credentials to access</p>
                        </div>
                        <div>
                            <?= $this->session->flashdata('message'); ?>
                        </div>
                        <div class="user-form-group">
                            <form class="user-form" action="<?= base_url('auth') ?>" method="POST">
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control" placeholder="Enter your email" required>
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" class="form-control" placeholder="Enter your password" required>
                                </div>
                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="checkbox" value="" id="check">
                                    <label class="form-check-label" for="check">Remember Me</label>
                                </div>
                                <div class="form-button">
                                    <button type="submit">login</button>
                                    <p>Forgot your password?<a href="<?= base_url('auth/forgot_password') ?>">reset here</a></p>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="user-form-remind">
                        <p>Don't have any account?<a href="<?= base_url('auth/registration') ?>">register here</a></p>
                    </div>
                    <div class="user-form-footer">
                        <p>Copyright &COPY; PT. Amerta Persada Nusantara</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=====================================
                    USER FORM PART END
        =======================================-->
    <!--=====================================
                    JS LINK PART START
        =======================================-->
    <!-- VENDOR -->
    <script src="<?= base_url('vendor/template/') ?>vendor/bootstrap/jquery-1.12.4.min.js"></script>
    <script src="<?= base_url('vendor/template/') ?>vendor/bootstrap/popper.min.js"></script>
    <script src="<?= base_url('vendor/template/') ?>vendor/bootstrap/bootstrap.min.js"></script>
    <script src="<?= base_url('vendor/template/') ?>vendor/countdown/countdown.min.js"></script>
    <script src="<?= base_url('vendor/template/') ?>vendor/niceselect/nice-select.min.js"></script>
    <script src="<?= base_url('vendor/template/') ?>vendor/slickslider/slick.min.js"></script>
    <script src="<?= base_url('vendor/template/') ?>vendor/venobox/venobox.min.js"></script>
    <!-- CUSTOM -->
    <script src="<?= base_url('vendor/template/') ?>js/nice-select.js"></script>
    <script src="<?= base_url('vendor/template/') ?>js/countdown.js"></script>
    <script src="<?= base_url('vendor/template/') ?>js/accordion.js"></script>
    <script src="<?= base_url('vendor/template/') ?>js/venobox.js"></script>
    <script src="<?= base_url('vendor/template/') ?>js/slick.js"></script>
    <script src="<?= base_url('vendor/template/') ?>js/main.js"></script>
    <script>
        $(document).ready(function() {
            window.setTimeout(function() {
                $('.alert').fadeTo(500, 0).slideUp(500, function() {
                    $(this).remove();
                });
            }, 2500);
        });
    </script>
    <!--=====================================
                    JS LINK PART END
        =======================================-->
</body>

</html>