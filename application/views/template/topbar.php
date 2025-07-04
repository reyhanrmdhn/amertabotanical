<body>
    <div class="backdrop"></div>
    <a class="backtop fas fa-arrow-up" href="#"></a>
    <!--=====================================
                    HEADER TOP PART START
        =======================================-->
    <div class="header-top">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-12">
                    <div class="header-top-welcome">
                        <p>Welcome to Amerta Botanical, Your Best Kratom Online Store!</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--=====================================
                    HEADER TOP PART END
        =======================================-->
    <!--=====================================
                    HEADER PART START
        =======================================-->
    <header class="header-part">
        <div class="container">
            <div class="header-content">
                <div class="header-media-group">
                    <button class="header-user"><img src="<?= base_url('vendor/template/') ?>images/user.png" alt="user"></button>
                    <a href="<?= base_url() ?>"><img src="<?= base_url('vendor/template/') ?>images/logo.png" alt="logo"></a>
                    <button class="header-src"><i class="fas fa-search"></i></button>
                </div>
                <a href="<?= base_url() ?>" class="header-logo">
                    <img src="<?= base_url('vendor/template/') ?>images/logo.png" alt="logo">
                </a>
                <form class="header-form">
                    <input type="text" placeholder="Search anything...">
                    <button><i class="fas fa-search"></i></button>
                </form>
                <?php if ($this->session->userdata('email')) { ?>
                    <a href="<?= base_url('user') ?>" class="header-widget" title="My Account" style="margin-right:30px">
                        <img src="<?= base_url('assets/img/user/' . $user['image']) ?>" alt="user">
                        <span><?= $user['name']; ?></span>
                    </a>
                <?php } else { ?>
                    <?php if (is_ecommerce()) : ?>
                        <a href="<?= base_url('auth') ?>" class="header-widget" title="My Account" style="margin-right:30px">
                            <img src="<?= base_url('vendor/template/') ?>images/user.png" alt="user">
                            <span>login</span>
                        </a>
                    <?php endif; ?>
                <?php } ?>
                <?php if (is_ecommerce()) : ?>
                    <div class="header-widget-group">
                        <button class="header-widget header-cart" title="Cartlist">
                            <i class="fas fa-shopping-basket"></i>
                            <sup class="cart-item-total"></sup>
                        </button>
                        <?php if ($this->session->userdata('email')) { ?>
                            <button class="header-widget" title="Logout" style="margin-left: 10px" data-bs-toggle="modal" data-bs-target="#logoutModal">
                                <i class="fas fa-sign-out-alt logoutBtn"></i>
                            </button>
                        <?php } ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </header>
    <!--=====================================
                    HEADER PART END
        =======================================-->
    <!--=====================================
                    NAVBAR PART START
        =======================================-->
    <nav class="navbar-part">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="navbar-content">
                        <ul class="navbar-list">
                            <li class="navbar-item">
                                <a class="navbar-link" <?php if ($this->uri->segment(1) == "" | $this->uri->segment(1) == "home") { ?> style="color:#C7ED8A" <?php } ?> href="<?= base_url() ?>">home</a>
                            </li>
                            <li class="navbar-item">
                                <a class="navbar-link" <?php if ($this->uri->segment(1) == "about") { ?> style="color:#C7ED8A" <?php } ?> href="<?= base_url('about') ?>">about</a>
                            </li>
                            <li class="navbar-item">
                                <a class="navbar-link" <?php if ($this->uri->segment(1) == "product") { ?> style="color:#C7ED8A" <?php } ?> href="<?= base_url('product') ?>">products</a>
                            </li>
                            <li class="navbar-item">
                                <a class="navbar-link" <?php if ($this->uri->segment(1) == "gallery") { ?> style="color:#C7ED8A" <?php } ?> href="<?= base_url('gallery') ?>">gallery</a>
                            </li>
                            <li class="navbar-item">
                                <a class="navbar-link" <?php if ($this->uri->segment(1) == "contact") { ?> style="color:#C7ED8A" <?php } ?> href="<?= base_url('contact') ?>">contact</a>
                            </li>
                        </ul>
                        <div class="navbar-info-group">
                            <div class="navbar-info">
                                <i class="icofont-ui-touch-phone"></i>
                                <p>
                                    <small>call us</small>
                                    <span>(+62) 812-8196-3747</span>
                                </p>
                            </div>
                            <div class="navbar-info">
                                <i class="icofont-ui-email"></i>
                                <p>
                                    <small>email us</small>
                                    <span>info@amertabotanical.com</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <!--=====================================
                    NAVBAR PART END
        =======================================-->
    <!--=====================================
                  CART SIDEBAR PART START
        =======================================-->
    <aside class="cart-sidebar">
        <?php if ($carts) { ?>
            <div class="cart-header">
                <div class="cart-total">
                    <i class="fas fa-shopping-basket"></i>
                    <span>total item (<span class="cart-item-total"></span>)</span>
                </div>
                <button class="cart-close"><i class="icofont-close"></i></button>
            </div>
            <ul class="cart-list">
                <p style="text-align:center;color:red" class="mt-2 remove-text"></p>
                <?php foreach ($carts as $item) { ?>
                    <li class="cart-item item-<?= $item['rowid'] ?>">
                        <div class="cart-media">
                            <a href="#"><img src="<?= get_product_image($item['id']) ?>" alt="product"></a>
                            <button class="cart-delete remove-item" data-rowid="<?= $item['rowid']; ?>"><i class="far fa-trash-alt"></i></button>
                        </div>
                        <div class="cart-info-group">
                            <div class="cart-info">
                                <h6><a href="product-single.html"><?= $item['name']; ?></a></h6>
                                <p style="color: #A6D064">$ <?= $item['price']; ?></p>
                            </div>
                            <form action="<?= base_url('product/proceed_order') ?>" method="POST">
                                <div class="cart-action-group">
                                    <div class="product-action">
                                        <button type="button" class="action-minus" title="Quantity Minus"><i class="icofont-minus"></i></button>
                                        <input class="action-input number" title="Quantity Number" type="text" name="qty[]" value="1">
                                        <button type="button" class="action-plus" title="Quantity Plus"><i class="icofont-plus"></i></button>
                                    </div>
                                </div>
                        </div>
                    </li>
                    <input type="hidden" name="id_produk[]" value="<?= $item['id'] ?>">
                    <input type="hidden" name="price[]" value="<?= $item['price'] ?>">
                <?php } ?>
            </ul>
            <div class="cart-footer">
                <a class="cart-checkout-btn" href="javascript:void(0)">
                    <button type="submit">
                        <span class="checkout-label">Proceed to Checkout</span>
                    </button>
                </a>
            </div>
            </form>
        <?php } else { ?>
            <?php if (is_ecommerce()) : ?>
                <div class="cart-header">
                    <div class="cart-total">
                        <i class="fas fa-shopping-basket"></i>
                        <span>total item (0)</span>
                    </div>
                    <button class="cart-close"><i class="icofont-close"></i></button>
                </div>
                <div style="height: 500px;display:flex;justify-content:center">
                    <h3 class="my-auto text-danger">Cart Empty</h3>
                </div>
            <?php endif; ?>
        <?php } ?>
    </aside>
    <!--=====================================
                    CART SIDEBAR PART END
        =======================================-->
    <!--=====================================
                  NAV SIDEBAR PART START
        =======================================-->
    <aside class="nav-sidebar">
        <div class="nav-header">
            <a href="#"><img src="<?= base_url('vendor/template/') ?>images/logo.png" alt="logo"></a>
            <button class="nav-close"><i class="icofont-close"></i></button>
        </div>
        <div class="nav-content">
            <!-- This commentable code show when user login or register -->
            <?php if ($user) { ?>
                <div class="nav-profile">
                    <a class="nav-user" href="#"><img src="<?= base_url('vendor/template/') ?>images/user.png" alt="user"></a>
                    <h4 class="nav-name"><a href="profile.html">Miron Mahmud</a></h4>
                </div>
            <?php } else { ?>
                <?php if (is_ecommerce()) : ?>
                    <div class="nav-btn mt-3 mb-0" style="border-radius: 10px">
                        <a href="<?= base_url('auth') ?>" class="btn btn-inline">
                            <i class="fa fa-unlock-alt"></i>
                            <span>Login Required</span>
                        </a>
                    </div>
                <?php endif; ?>
            <?php } ?>
            <div class="nav-select-group">
            </div>
            <ul class="nav-list">
                <li>
                    <a class="nav-link" href="<?= base_url() ?>"><i class="icofont-home"></i>Home</a>
                </li>
                <li>
                    <a class="nav-link" href="<?= base_url('products') ?>"><i class="icofont-food-cart"></i>Products</a>
                </li>
                <?php if ($user) { ?>
                    <li>
                        <a class="nav-link" href="<?= base_url('user/profile') ?>"><i class="icofont-page"></i>My Profile</a>
                    </li>
                    <li><a class="nav-link" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#logoutModal"><i class="icofont-logout"></i>logout</a></li>
                <?php } ?>
            </ul>
            <div class="nav-info-group">
                <div class="row">
                    <div class="col-lg-12">
                        <button class="btn btn-sm btn-inline" style="width: 100%">
                            <i class="fab fa-whatsapp"></i>
                            call us
                        </button>
                    </div>
                </div>
            </div>
            <div class="nav-footer">
                <p> &copy; Amerta Botanical <?= date('Y'); ?></p>
            </div>
        </div>
    </aside>
    <!--=====================================
                  NAV SIDEBAR PART END
        =======================================-->
    <!--=====================================
                    MOBILE-MENU PART START
        =======================================-->
    <div class="mobile-menu">
        <a href="<?= base_url() ?>">
            <i class="fas fa-home" <?php if ($this->uri->segment(1) == "" || $this->uri->segment(1) == "home") { ?> style="color:#A6D064" <?php } ?>></i>
            <span <?php if ($this->uri->segment(1) == "" || $this->uri->segment(1) == "home") { ?> style="color:#A6D064" <?php } ?>>Home</span>
        </a>
        <a href="<?= base_url() ?>about">
            <i class="fas fa-info" <?php if ($this->uri->segment(1) == "about") { ?> style="color:#A6D064" <?php } ?>></i>
            <span <?php if ($this->uri->segment(1) == "about") { ?> style="color:#A6D064" <?php } ?>>about</span>
        </a>
        <a href="<?= base_url() ?>product">
            <i class="fas fa-box" <?php if ($this->uri->segment(1) == "product") { ?> style="color:#A6D064" <?php } ?>></i>
            <span <?php if ($this->uri->segment(1) == "product") { ?> style="color:#A6D064" <?php } ?>>products</span>
        </a>
        <a href="<?= base_url() ?>gallery">
            <i class="fas fa-images" <?php if ($this->uri->segment(1) == "gallery") { ?> style="color:#A6D064" <?php } ?>></i>
            <span <?php if ($this->uri->segment(1) == "gallery") { ?> style="color:#A6D064" <?php } ?>>gallery</span>
        </a>
        <?php if (is_ecommerce()) : ?>
            <button class="cart-btn" title="Cart">
                <i class="fas fa-shopping-basket"></i>
                <span>cart</span>
                <sup class="cart-item-total"></sup>
            </button>
        <?php endif; ?>
    </div>
    <!--=====================================
                    MOBILE-MENU PART END
        =======================================-->
    <!--=====================================
                    PRODUCT VIEW START
        =======================================-->
    <div class="modal fade" id="product-view">
        <div class="modal-dialog">
            <div class="modal-content">
                <button class="modal-close icofont-close" data-bs-dismiss="modal"></button>
                <div class="product-view">
                    <div class="row">
                        <div class="col-md-6 col-lg-6">
                            <div class="view-gallery">
                                <div class="view-label-group">
                                    <label class="view-label new">new</label>
                                </div>
                                <ul class="preview-slider slider-arrow productImage">
                                </ul>
                                <ul class="thumb-slider productImageSlider">
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6">
                            <div class="view-details">
                                <h3 class="view-name">
                                    <a href="product-video.html" class="productName"></a>
                                </h3>
                                <div class="view-rating">
                                    <i class="active icofont-star"></i>
                                    <i class="active icofont-star"></i>
                                    <i class="active icofont-star"></i>
                                    <i class="active icofont-star"></i>
                                    <i class="active icofont-star"></i>
                                    <!-- <a href="product-video.html">(3 reviews)</a> -->
                                </div>
                                <h3 class="view-price">
                                    <span class="productPrice"></span>
                                    <!-- <span>$24.00<small>/per kilo</small></span> -->
                                </h3>
                                <div style="height: 200px">
                                    <p class="view-desc productDesc"></p>
                                </div>
                                <?php if (is_ecommerce()) : ?>
                                    <div class="view-add-group mt-3">
                                        <button class="product-add add-cart" title="Add to Cart">
                                            <i class="fas fa-shopping-basket"></i>
                                            <span>add to cart</span>
                                        </button>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="logoutModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <button class="modal-close icofont-close" data-bs-dismiss="modal"></button>
                <div class="product-view">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="view-details">
                                <h3 class="view-name" style="text-align: center">
                                    Are you sure want to Logout?
                                </h3>
                                <div class="view-add-group mt-4">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <button class="btn btn-danger" style="border-color: #dc3545;float:left" onclick="location.href='<?= base_url('auth/logout') ?>'">
                                                <i class="fas fa-sign-out-alt"></i>
                                                <span>logout</span>
                                            </button>
                                            <button class="btn btn-inline" style="float:right" data-bs-dismiss="modal">
                                                <i class="fas fa-times"></i>
                                                <span>cancel</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="cancelOrderModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <button class="modal-close icofont-close" data-bs-dismiss="modal"></button>
                <div class="product-view">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="view-details">
                                <h3 class="view-name">
                                    Are you sure want to Cancel this order?
                                </h3>
                                <div class="view-add-group mt-4">
                                    <div class="row">
                                        <div class="col-lg-6" style="text-align: right">
                                            <button id="cancelOrder" class="btn btn-danger" style="border-color: #dc3545">
                                                <i class="fas fa-check"></i>
                                                <span>yes</span>
                                            </button>
                                        </div>
                                        <div class="col-lg-6" style="text-align: left">
                                            <button class="btn btn-inline" data-bs-dismiss="modal">
                                                <i class="fas fa-times"></i>
                                                <span>no</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="bukti_tf_modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <button class="modal-close icofont-close" data-bs-dismiss="modal"></button>
                <div class="product-view">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="view-details">
                                <div class="view-add-group mt-4">
                                    <img class="bukti_tf_img" width="300px" height="auto">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--=====================================
                    PRODUCT VIEW END
        =======================================-->