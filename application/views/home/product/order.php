<!--=====================================
                    BANNER PART START
        =======================================-->
<section class="inner-section single-banner" style="background: url(<?= base_url('assets/img/banner.jpg') ?>) no-repeat center;">
    <div class="container">
        <h2><?= $title; ?></h2>
    </div>
</section>
<!--=====================================
                    BANNER PART END
        =======================================-->

<!--=====================================
                    ORDERLIST PART START
        =======================================-->
<section class="inner-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <?= $this->session->flashdata('message'); ?>
            </div>
            <div class="col-lg-12">
                <div class="orderlist">
                    <div class="orderlist-head">
                        <h5>order &nbsp;#<?= $order['id_pesanan']; ?></h5>
                        <?php
                        if ($order['status_pesanan'] == 1) {
                            echo '<h5>order received</h5>';
                        } else if ($order['status_pesanan'] == 2) {
                            echo '<h5>order processed</h5>';
                        } else if ($order['status_pesanan'] == 3) {
                            echo '<h5>order shipped</h5>';
                        } else if ($order['status_pesanan'] == 4) {
                            echo '<h5>order delivered</h5>';
                        }
                        ?>
                    </div>
                    <div class="orderlist-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="order-track">
                                    <ul class="order-track-list">
                                        <li class="order-track-item <?php if ($order['status_pesanan'] == 1 || $order['status_pesanan'] == 2 || $order['status_pesanan'] == 3 || $order['status_pesanan'] == 4) { ?> active <?php } ?>">
                                            <i class="icofont-check"></i>
                                            <span>order recieved</span>
                                        </li>
                                        <li class="order-track-item <?php if ($order['status_pesanan'] == 2 || $order['status_pesanan'] == 3 || $order['status_pesanan'] == 4) { ?> active <?php } ?>">
                                            <i class="<?php if ($order['status_pesanan'] == 2 || $order['status_pesanan'] == 3 || $order['status_pesanan'] == 4) { ?> icofont-check <?php } else { ?> icofont-close <?php } ?>"></i>
                                            <span>order processed</span>
                                        </li>
                                        <li class="order-track-item <?php if ($order['status_pesanan'] == 3 || $order['status_pesanan'] == 4) { ?> active <?php } ?>">
                                            <i class="<?php if ($order['status_pesanan'] == 3 || $order['status_pesanan'] == 4) { ?> icofont-check <?php } else { ?> icofont-close <?php } ?>"></i>
                                            <span>order shipped</span>
                                        </li>
                                        <li class="order-track-item <?php if ($order['status_pesanan'] == 4) { ?> active <?php } ?>">
                                            <i class="<?php if ($order['status_pesanan'] == 4) { ?> icofont-check <?php } else { ?> icofont-close <?php } ?>"></i>
                                            <span>order delivered</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <ul class="orderlist-details">
                                    <li>
                                        <h6>order id</h6>
                                        <p>#<?= $order['id_pesanan']; ?></p>
                                    </li>
                                    <li>
                                        <?php $total_item = $this->m_global->get_order_detail($order['id_pesanan'])->num_rows() ?>
                                        <h6>Total Item</h6>
                                        <p><?= $total_item ?></p>
                                    </li>
                                    <li>
                                        <h6>Order Time</h6>
                                        <p><?= date('F m, Y', $order['tanggal_pesanan']); ?></p>
                                    </li>
                                    <li>
                                        <h6>Status</h6>
                                        <?php
                                        if ($order['status_pesanan'] == 1) {
                                            echo '<p>Order Received</p>';
                                        } else if ($order['status_pesanan'] == 2) {
                                            echo '<p>Order Processed</p>';
                                        } else if ($order['status_pesanan'] == 3) {
                                            echo '<p>Order Shipped</p>';
                                        } else if ($order['status_pesanan'] == 4) {
                                            echo '<p>Order Delivered</p>';
                                        }
                                        ?>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-lg-4">
                                <ul class="orderlist-details">
                                    <li>
                                        <h6>Sub Total</h6>
                                        <p>$ <?= $order['total_pesanan']; ?></p>
                                    </li>
                                    <li>
                                        <h6>discount</h6>
                                        <p>$ 0</p>
                                    </li>
                                    <li>
                                        <h6>delivery fee</h6>
                                        <p>Free</p>
                                    </li>
                                    <li>
                                        <h6>Total</h6>
                                        <p>$ <?= $order['total_pesanan']; ?></p>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-lg-4">
                                <div class="orderlist-deliver">
                                    <h6>Delivery location</h6>
                                    <p><?= $order['contact_address']; ?></p>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="table-scroll">
                                    <table class="table-list">
                                        <thead>
                                            <tr>
                                                <th scope="col">No.</th>
                                                <th scope="col">Product</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Price</th>
                                                <th scope="col">quantity</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $order_detail = $this->m_global->get_order_detail($order['id_pesanan'])->result_array() ?>
                                            <?php $x = 1; ?>
                                            <?php foreach ($order_detail as $item) { ?>
                                                <tr>
                                                    <td class="table-serial">
                                                        <h6><?= $x; ?></h6>
                                                    </td>
                                                    <td class="table-image"><img src="<?= get_product_image($item['id_produk']) ?>" alt="product"></td>
                                                    <td class="table-name">
                                                        <h6><?= $item['nama_produk']; ?></h6>
                                                    </td>
                                                    <td class="table-price">
                                                        <h6>$ <?= $item['harga_item']; ?></h6>
                                                    </td>
                                                    <td class="table-quantity">
                                                        <h6><?= $item['qty']; ?></h6>
                                                    </td>
                                                </tr>
                                                <?php $x++; ?>
                                            <?php  } ?>
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
    <?php if ($order['status_pesanan'] == 1) { ?>
        <div class="container">
            <div class="account-card mb-4">
                <div class="account-title mb-3">
                    <h4>payment option</h4>
                </div>
                <div class="account-content">
                    <p class="mb-1" style="color:#A4CC64;font-size:18px">Please pay your order to one of these accounts below </p>
                    <p class="mb-4" style="color:#A4CC64;font-size:18px">Don't forget to screenshot the transfer evidence</p>
                    <div class="row">
                        <div class="col-md-6 col-lg-4">
                            <div class="payment-card payment">
                                <h4>card number</h4>
                                <p>
                                    <span>****</span>
                                    <span>****</span>
                                    <span>****</span>
                                    <sup>1876</sup>
                                </p>
                                <h5>miron mahmud</h5>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="payment-card payment">
                                <h4>card number</h4>
                                <p>
                                    <span>****</span>
                                    <span>****</span>
                                    <span>****</span>
                                    <sup>1876</sup>
                                </p>
                                <h5>miron mahmud</h5>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="payment-card payment">
                                <h4>card number</h4>
                                <p>
                                    <span>****</span>
                                    <span>****</span>
                                    <span>****</span>
                                    <sup>1876</sup>
                                </p>
                                <h5>miron mahmud</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="alert-info">
                <div class="row">
                    <div class="col-lg-4 mb-2 mt-2" style="text-align: left">
                        <h5>Your Order ID</h5>
                        <div class="row mt-2">
                            <div class="col-lg-6" style="padding-right:3px">
                                <input type="text" id="dataCopy" class="form-control" value="#<?= $order['id_pesanan'] ?>">
                            </div>
                            <div class="col-lg-5" style="text-align: left;padding-left:3px">
                                <button class="btn btn-inline py-2" style="margin-left: 10px" onclick="copyTeks()"><i class="fas fa-clipboard"></i>&nbsp; Copy</button>
                            </div>
                            <script type="text/javascript">
                                function copyTeks() {
                                    var valueText = $("#dataCopy").select().val();
                                    document.execCommand("copy");
                                    alertify.success("Copied to clipboard!");
                                }
                            </script>
                        </div>
                    </div>
                    <div class="col-lg-8 mb-2 mt-2" style="text-align: left">
                        <?php $tf = $this->m_global->get_bukti_tf($order['id_pesanan']) ?>
                        <?php if (!$tf) { ?>
                            <h5>Send your transfer evidence (Screenshoot) here</h5>
                            <form action="<?= base_url('product/add_payment') ?>" method="POST" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-lg-9" style="padding-right:3px">
                                        <input type="file" name="image" class="form-control mt-2" accept="image/*" required>
                                    </div>
                                    <div class="col-lg-3" style="text-align: left;padding-left:3px">
                                        <input type="hidden" name="id_pesanan" value="<?= $order['id_pesanan'] ?>">
                                        <button type="submit" class="btn btn-inline py-2 mt-2" style="margin-left:10px"><i class="fas fa-submit"></i>&nbsp; Send</button>
                                    </div>
                                </div>
                            </form>
                        <?php } else { ?>
                            <h5>Your Transfer Evidence</h5>
                            <div class="row">
                                <div class="col-lg-12" style="text-align: left;padding-left:3px">
                                    <button type="button" class="btn btn-inline py-2 mt-2" id="btn_bukti_tf" data-bukti_tf="<?= $tf['bukti_tf'] ?>" style="margin-left:10px"><i class="fas fa-eye"></i>&nbsp; View</button>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="alert-info">
                <div class="row">
                    <div class="col-lg-12" style="text-align: center">
                        <p>Please Contact us via WhatsApp to confirm your Order <br> Don't forget to put your Order ID</p>
                        <a href="https://wa.me/62895600225408" target="_blank" class="btn btn-inline mt-2 py-2"><i class="fab fa-whatsapp"></i>&nbsp; Contact Us</a>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
</section>
<!--=====================================
                    ORDERLIST PART END
        =======================================-->