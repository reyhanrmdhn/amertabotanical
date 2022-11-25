</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <!--=====================================
                    META TAG PART START
        =======================================-->
    <!-- REQUIRE META -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- AUTHOR META -->
    <!--=====================================
                    META-TAG PART END
        =======================================-->
    <!-- WEBPAGE TITLE -->
    <title>Change Password | Amerta Botanical</title>
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
                            <h2>Change Password</h2>
                            <p>Change your new Password Here</p>
                        </div>
                        <div>
                            <?= $this->session->flashdata('message'); ?>
                        </div>
                        <div class="user-form-group">
                            <form class="user-form" action="<?= base_url('auth/changePassword') ?>" method="POST">
                                <div class="form-group">
                                    <input type="password" name="password" id="password" class="form-control" placeholder="Enter your New Password">
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password2" id="password2" class="form-control" placeholder="Repeat your password">
                                </div>
                                <p class="message mb-3"></p>
                                <div class="form-button">
                                    <button type="submit" id="btnChangePass">Change Password</button>
                                </div>
                            </form>
                        </div>
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

        $("#password, #password2").on("keyup", function() {
            if ($("#password").val() == "") {
                $(".message").html("Password is Empty").css("color", "red");
                $("#btnChangePass").prop("disabled", true);
            } else if (this.value.length < 8) {
                $(".message").html("Password is too short!").css("color", "red");
                $("#btnChangePass").prop("disabled", true);
            } else if ($("#password").val() == $("#password2").val()) {
                $(".message").html("Password Matching").css("color", "green");
                $("#btnChangePass").prop("disabled", false);
            } else {
                $(".message").html("Password Not Matching").css("color", "red");
                $("#btnChangePass").prop("disabled", true);
            }
        });
    </script>
    <!--=====================================
                    JS LINK PART END
        =======================================-->
</body>

</html>