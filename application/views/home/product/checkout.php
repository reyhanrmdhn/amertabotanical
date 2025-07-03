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
                    CHECKOUT PART START
        =======================================-->
<section class="inner-section checkout-part">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="account-card">
                    <div class="account-title">
                        <h4>Your order</h4>
                        <button type="button" class="cancel" data-id_pesanan="<?= $order['id_pesanan'] ?>">cancel this order</button>
                    </div>
                    <div class="account-content">
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
                        <div class="checkout-charge">
                            <ul>
                                <li>
                                    <span>Sub total</span>
                                    <span>$ <?= $order['total_pesanan']; ?></span>
                                </li>
                                <li>
                                    <span>delivery fee</span>
                                    <span>Free</span>
                                </li>
                                <li>
                                    <span>discount</span>
                                    <span>$ 0</span>
                                </li>
                                <li>
                                    <span>Total</span>
                                    <span>$ <?= $order['total_pesanan']; ?></span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <form action="<?= base_url('product/proceed_checkout') ?>" method="POST">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="account-card">
                                <div class="account-title">
                                    <h4>contact number</h4>
                                </div>
                                <div class="account-content">
                                    <input type="text" name="contact_number" class="form-control" required placeholder="Type your Contact here...">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="account-card">
                                <div class="account-title">
                                    <h4>delivery address</h4>
                                </div>
                                <div class="account-content">
                                    <textarea name="contact_address" rows="10" class="form-control" required placeholder="Type your Address here..."></textarea>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="checkout-proced">
                        <input type="hidden" name="id_pesanan" value="<?= $order['id_pesanan'] ?>">
                        <button type="submit" class="btn btn-inline">proced to checkout</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<!--=====================================
                    CHECKOUT PART END
        =======================================-->