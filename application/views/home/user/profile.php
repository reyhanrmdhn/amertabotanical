        <!--=====================================
                    BANNER PART START
        =======================================-->
        <section class="inner-section single-banner" style="background: url(<?= base_url('assets/img/banner.jpg') ?>) no-repeat center;">
            <div class="container">
                <h2>my profile</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">profile</li>
                </ol>
            </div>
        </section>
        <!--=====================================
                    BANNER PART END
        =======================================-->
        <!--=====================================
                    PROFILE PART START
        =======================================-->
        <section class="inner-section profile-part">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <?= $this->session->flashdata('message'); ?>
                        <div class="account-card">
                            <div class="account-title">
                                <h4>my profile</h4>
                                <button id="editProfile" data-id="<?= $user['id'] ?>" data-name="<?= $user['name'] ?>" data-email="<?= $user['email'] ?>">edit profile</button>
                            </div>
                            <div class="account-content">
                                <div class="row">
                                    <div class="col-lg-2">
                                        <div class="profile-image">
                                            <a href="javascript:void(0)"><img src="<?= base_url('assets/img/user/' . $user['image']) ?>" alt="user"></a>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-4">
                                        <div class="form-group">
                                            <label class="form-label">name</label>
                                            <input class="form-control" type="text" value="<?= $user['name'] ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-4">
                                        <div class="form-group">
                                            <label class="form-label">Email</label>
                                            <input class="form-control" type="email" value="<?= $user['email'] ?>">
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="profile-btn">
                                            <a href="javascript:void(0)" id="changePass" data-id="<?= $user['id'] ?>">change pass.</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="account-card">
                            <div class="account-title">
                                <h4>my order</h4>
                            </div>
                            <div class="account-content">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="table-scroll">
                                            <table class="table-list">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">No.</th>
                                                        <th scope="col">Order ID</th>
                                                        <th scope="col">Order date</th>
                                                        <th scope="col">Qty</th>
                                                        <th scope="col">Total Price</th>
                                                        <th scope="col">status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php if ($order) { ?>
                                                        <?php $x = 1; ?>
                                                        <?php foreach ($order as $item) { ?>
                                                            <tr>
                                                                <td class="table-serial">
                                                                    <h6><?= $x; ?></h6>
                                                                </td>
                                                                <td class="table-name">
                                                                    <?php
                                                                    if ($item['status_pesanan'] == 0) {
                                                                        $redirect = 'product/checkout/' . $item['id_pesanan'];
                                                                    } else {
                                                                        $redirect = 'product/order/' . $item['id_pesanan'];
                                                                    }
                                                                    ?>
                                                                    <h6><a href="<?= base_url($redirect) ?>" style="text-decoration:underline;color:#A6D064"><?= $item['id_pesanan']; ?></a></h6>
                                                                </td>
                                                                <td class="table-price">
                                                                    <h6><?= date('F m, Y', $item['tanggal_pesanan']); ?></h6>
                                                                </td>
                                                                <?php $detail = $this->m_global->get_order_detail($item['id_pesanan'])->num_rows(); ?>
                                                                <td class="table-price">
                                                                    <h6><?= $detail; ?></h6>
                                                                </td>
                                                                <td class="table-price">
                                                                    <h6>$ <?= $item['total_pesanan']; ?></h6>
                                                                </td>
                                                                <td class="table-status">
                                                                    <?php
                                                                    if ($item['status_pesanan'] == 0) {
                                                                        echo '<h6 class="text-warning">waiting for checkout</h6>';
                                                                    } else if ($item['status_pesanan'] == 1) {
                                                                        echo '<h6 class="text-warning">order received</h6>';
                                                                    } else if ($item['status_pesanan'] == 2) {
                                                                        echo '<h6 class="text-info">order processed</h6>';
                                                                    } else if ($item['status_pesanan'] == 3) {
                                                                        echo '<h6 class="text-info">order shipped</h6>';
                                                                    } else if ($item['status_pesanan'] == 4) {
                                                                        echo '<h6 class="text-success">order delivered</h6>';
                                                                    }
                                                                    ?>
                                                                </td>
                                                            </tr>
                                                            <?php $x++; ?>
                                                        <?php } ?>
                                                    <?php } else { ?>
                                                        <td colspan="6">There is no data</td>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--=====================================
                    PROFILE PART END
        =======================================-->
        <!--=====================================
                    MODAL EDIT FORM START
        =======================================-->
        <!-- profile edit form -->
        <div class="modal fade" id="profile_edit">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <button class="modal-close" data-bs-dismiss="modal"><i class="icofont-close"></i></button>
                    <form class="modal-form" action="<?= base_url('user/edit') ?>" method="POST" enctype="multipart/form-data">
                        <div class="form-title">
                            <h3>edit profile info</h3>
                        </div>
                        <div class="form-group">
                            <label class="form-label">profile image</label>
                            <input name="image" class="form-control" type="file" accept="image/*">
                        </div>
                        <div class="form-group">
                            <label class="form-label">name</label>
                            <input name="name" required class="form-control name" type="text">
                        </div>
                        <div class="form-group">
                            <label class="form-label">email</label>
                            <input name="email" readonly class="form-control email" type="text">
                        </div>
                        <input type="hidden" name="id" class="id">
                        <button class="form-btn" type="submit">save profile info</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal fade" id="change_password">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <button class="modal-close" data-bs-dismiss="modal"><i class="icofont-close"></i></button>
                    <form class="modal-form" action="<?= base_url('user/change_password') ?>" method="POST">
                        <div class="form-title">
                            <h3>change password</h3>
                        </div>
                        <div class="form-group">
                            <label class="form-label">old password</label>
                            <input type="password" id="old_password" required class="form-control" type="text">
                            <p id="message1"></p>
                        </div>
                        <div class="form-group">
                            <label class="form-label">new password</label>
                            <input type="password" id="new_password" required class="form-control" type="text">
                        </div>
                        <div class="form-group">
                            <label class="form-label">repeat new password</label>
                            <input type="password" name="new_password" id="new_password2" required class="form-control" type="text">
                            <p id="message"></p>
                        </div>
                        <input type="hidden" name="id" id="id_user" class="id">
                        <button class="form-btn" type="submit" id="btn_changePass" disabled>change password</button>
                    </form>
                </div>
            </div>
        </div>
        <!--=====================================
                    MODAL EDIT FORM END
        =======================================-->