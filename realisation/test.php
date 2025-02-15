<!DOCTYPE php>
<php class="no-js" lang="fr">
    <?php 

include "./manager/cartManager.php";
   


session_start();


$cartManager = new CartManager();
$cartManager->initCode();

$quantity = $cartManager->getCartQuantity();

$Categorie = 'Face care';
$data = $cartManager->getAllProducts();
if(isset($_COOKIE['cartCookie'])){
$cart = $cartManager->getCart($_COOKIE['cartCookie']);

$quantityTotal = 0;
$cartLineList = $cart->getCartLineList()[0];

    foreach($cartLineList as $cartLine){
        $quantityTotal += $cartLine->getProductCartQuantity();
    }
}
?>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Brancy - Cosmetic & Beauty Salon Website Template</title>
        <meta name="robots" content="noindex, follow" />
        <meta name="description" content="Brancy - Cosmetic & Beauty Salon Website Template">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="keywords"
            content="bootstrap, ecommerce, ecommerce php, beauty, cosmetic shop, beauty products, cosmetic, beauty shop, cosmetic store, shop, beauty store, spa, cosmetic, cosmetics, beauty salon" />
        <meta name="author" content="codecarnival" />

        <!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="./assets/images/favicon.webp">

        <!-- CSS (Font, Vendor, Icon, Plugins & Style CSS files) -->

        <!-- Font CSS -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap"
            rel="stylesheet">

        <!-- Vendor CSS (Bootstrap & Icon Font) -->
        <link rel="stylesheet" href="./assets/css/vendor/bootstrap.min.css">

        <!-- Plugins CSS (All Plugins Files) -->
        <link rel="stylesheet" href="assets/css/plugins/swiper-bundle.min.css">
        <link rel="stylesheet" href="assets/css/plugins/font-awesome.min.css">
        <link rel="stylesheet" href="assets/css/plugins/fancybox.min.css">
        <link rel="stylesheet" href="assets/css/plugins/nice-select.css">

        <!-- Style CSS -->
        <link rel="stylesheet" href="./assets/css/style.min.css">
        <link rel="stylesheet" href="./assets/css/custom.css">

    </head>



    <body>

        <!--== Wrapper Start ==-->
        <div class="wrapper">

            <!--== Start Header Wrapper ==-->
            <header class="header-area sticky-header header-transparent">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-5 col-lg-2 col-xl-1">
                            <div class="header-logo">
                                <a href="index.php">
                                    <img class="logo-main" src="assets/images/logo.webp" width="95" height="68"
                                        alt="Logo" />
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-7 col-xl-7 d-none d-lg-block">
                            <div class="header-navigation ps-7">
                                <ul class="main-nav justify-content-start">
                                    <li class="has-submenu"><a href="index.php">home</a>

                                    </li>
                                    <li><a href="about-us.php">about</a></li>
                                    <li class="has-submenu position-static"><a href="#">shop</a>
                                        <ul class="submenu-nav-mega">
                                            <li><a href="#/" class="mega-title">categories</a>
                                                <ul>

                                                    <li><a href="hare-care.php">Hare care</a></li>
                                                    <li><a href="Face-care.php">Face care</a></li>
                                                    <li><a href="blusher.php">Blusher</a></li>
                                                    <li><a href="lip-stick.php">Lip stick</a></li>
                                                    <li><a href="skin-care.php">Skin care</a></li>
                                                </ul>
                                            </li>


                                        </ul>
                                    </li>

                                    <li><a href="contact.php">Contact</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-7 col-lg-3 col-xl-4">
                            <div class="header-action justify-content-end">
                                <button class="header-action-btn ms-0" type="button" data-bs-toggle="offcanvas"
                                    data-bs-target="#AsideOffcanvasSearch" aria-controls="AsideOffcanvasSearch">
                                    <span class="icon">
                                        <svg width="30" height="30" viewBox="0 0 30 30" fill="none"
                                            xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink">
                                            <rect class="icon-rect" width="30" height="30" fill="url(#pattern1)" />
                                            <defs>
                                                <pattern id="pattern1" patternContentUnits="objectBoundingBox" width="1"
                                                    height="1">
                                                    <use xlink:href="#image0_504:11" transform="scale(0.0333333)" />
                                                </pattern>
                                                <image id="image0_504:11" width="30" height="30"
                                                    xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAABmJLR0QA/wD/AP+gvaeTAAABiUlEQVRIie2Wu04CQRSGP0G2EUtIbHwA8B3EQisLIcorEInx8hbEZ9DKy6toDI1oAgalNFpDoYWuxZzJjoTbmSXERP7kZDbZ859vdmb27MJcf0gBUAaugRbQk2gBV3IvmDa0BLwA4Zh4BorTACaAU6fwPXAI5IAliTxwBDScvJp4vWWhH0BlTLEEsC+5Fu6lkgNdV/gKDnxHCw2I9rSiNQNV8baBlMZYJtpTn71KAg9SY3dUYn9xezLPgG8P8BdwLteq5X7CzDbnAbXKS42WxtQVUzoGeFlqdEclxXrnhmhhkqR+8KuMqzHA1vumAddl3IwB3pLxVmOyr1NjwKQmURJ4lBp7GmOAafghpg1qdSDeDrCoNReJWmZB4dsAPsW7rYVa1Rx4FbOEw5TEPKmFvgMZX3DCgYeYNniMaQ5piTXghGhPLdTmZ33hYNpem98f/UHRwSxvhqhXx4anMA3/EmhiOlJPJnSBOb3uQcpOE65VhujPpAms/Bu4u+x3swRbeB24mTV4LgB+AFuLedkPkcmmAAAAAElFTkSuQmCC" />
                                            </defs>
                                        </svg>
                                    </span>
                                </button>

                                <button class="header-action-btn" style="width: 50px;" type="button"
                                    data-bs-toggle="offcanvas" data-bs-target="#AsideOffcanvasCart"
                                    aria-controls="AsideOffcanvasCart">
                                    <span class="icon">
                                        <span>
                                            <?php 
                                                echo $quantityTotal 
                                            ?>
                                        </span>
                                        <svg width="30" height="30" viewBox="0 0 30 30" fill="none"
                                            xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink">
                                            <rect class="icon-rect" width="30" height="30" fill="url(#pattern2)" />
                                            <defs>
                                                <pattern id="pattern2" patternContentUnits="objectBoundingBox" width="1"
                                                    height="1">
                                                    <use xlink:href="#image0_504:9" transform="scale(0.0333333)" />
                                                </pattern>
                                                <image id="image0_504:9" width="30" height="30"
                                                    xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAABmJLR0QA/wD/AP+gvaeTAAABFUlEQVRIie2VMU7DMBSGvwAqawaYuAmKxCW4A1I5Qg4AA93KBbp1ZUVUlQJSVVbCDVhgzcTQdLEVx7WDQ2xLRfzSvzzb+d6zn2MYrkugBBYevuWsHKiFn2JBMwH8Bq6Aw1jgBwHOYwGlPgT4LDZ4I8BJDNiEppl034UEJ8DMAJ0DByHBACPgUYEugePQUKkUWAmnsaB/Ry/YO9aXCwlT72AdrqaWEohwBWxSwc8ReIVtYIr5bM5pXqO+Men7rozGlkVSv4lJj1WQfsbvXVkNVNk1eEK4ik9/yuwzAPhLh5iuU4jtftMDR4ZJJXChxTJ2H3zXGDgWc43/X2Wro8G81a8u2fXU2nXiLVAxvNIKuPGW/r/2SltF+a3Rkw4pmwAAAABJRU5ErkJggg==" />
                                            </defs>
                                        </svg>
                                    </span>
                                </button>

                                <a class="header-action-btn" href="my-account.php">
                                    <span class="icon">
                                        <svg width="30" height="30" viewBox="0 0 30 30" fill="none"
                                            xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink">
                                            <rect class="icon-rect" width="30" height="30" fill="url(#pattern3)" />
                                            <defs>
                                                <pattern id="pattern3" patternContentUnits="objectBoundingBox" width="1"
                                                    height="1">
                                                    <use xlink:href="#image0_504:10" transform="scale(0.0333333)" />
                                                </pattern>
                                                <image id="image0_504:10" width="30" height="30"
                                                    xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAABmJLR0QA/wD/AP+gvaeTAAABEUlEQVRIie3UMUoDYRDF8Z8psqUpLBRrBS+gx7ATD6E5iSjeQQ/gJUzEwmChnZZaKZiQ0ljsLkhQM5/5Agr74DX7DfOfgZ1Hoz+qAl30Marcx2H1thCtY4DJN76parKqmAH9DM+6eTcArX2QE3yVAO7lBA8TwMNIw6UgeJI46My+rWCjUQL0LVIUBd8lgEO1UfBZAvg8oXamCuWNRu64nRNMmUo/wReSXLXayoDoKc9miMvqW/ZNG2VRNLla2MYudrCFTvX2intlnl/gGu/zDraGYzyLZ/UTjrD6G2AHpxgnAKc9xgmWo9BNPM4BnPYDNiLg24zQ2oNpyFdZvRKZLlGhnvvKPzXXti/Yy7hEo3+iD9EHtgdqxQnwAAAAAElFTkSuQmCC" />
                                            </defs>
                                        </svg>
                                    </span>
                                </a>

                                <button class="header-menu-btn" type="button" data-bs-toggle="offcanvas"
                                    data-bs-target="#AsideOffcanvasMenu" aria-controls="AsideOffcanvasMenu">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!--== End Header Wrapper ==-->

            <main class="main-content">

                <!--== Start Hero Area Wrapper ==-->
                <section class="hero-slider-area position-relative">
                    <div class="swiper hero-slider-container">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide hero-slide-item">
                                <div class="container">
                                    <div class="row align-items-center position-relative">
                                        <div class="col-12 col-md-6">
                                            <div class="hero-slide-content">
                                                <div class="hero-slide-text-img"><img
                                                        src="assets/images/slider/text-theme.webp" width="427"
                                                        height="232" alt="Image"></div>
                                                <h2 class="hero-slide-title">CLEAN FRESH</h2>
                                                <p class="hero-slide-desc">Lorem ipsum dolor sit amet, consectetur
                                                    adipiscing elit ut aliquam, purus sit amet luctus venenatis.</p>
                                                <a class="btn btn-border-dark" href="index.php">BUY NOW</a>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="hero-slide-thumb">
                                                <img src="./img/ezgif.com-gif-maker.png" width="841" height="832"
                                                    alt="Image">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="hero-slide-text-shape"><img src="assets/images/slider/text1.webp" width="70"
                                        height="955" alt="Image"></div>
                                <div class="hero-slide-social-shape"></div>
                            </div>
                            <div class="swiper-slide hero-slide-item">
                                <div class="container">
                                    <div class="row align-items-center position-relative">
                                        <div class="col-12 col-md-6">
                                            <div class="hero-slide-content">
                                                <div class="hero-slide-text-img"><img
                                                        src="assets/images/slider/text-theme.webp" width="427"
                                                        height="232" alt="Image"></div>
                                                <h2 class="hero-slide-title">Facial Cream</h2>
                                                <p class="hero-slide-desc">Lorem ipsum dolor sit amet, consectetur
                                                    adipiscing elit ut aliquam, purus sit amet luctus venenatis.</p>
                                                <a class="btn btn-border-dark" href="index.php">BUY NOW</a>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="hero-slide-thumb">
                                                <img src="assets/images/slider/slider2.webp" width="841" height="832"
                                                    alt="Image">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="hero-slide-text-shape"><img src="assets/images/slider/text1.webp" width="70"
                                        height="955" alt="Image"></div>
                                <div class="hero-slide-social-shape"></div>
                            </div>
                        </div>
                        <!--== Add Pagination ==-->
                        <div class="hero-slider-pagination"></div>
                    </div>
                    <div class="hero-slide-social-media">
                        <a href="https://www.pinterest.com/" target="_blank" rel="noopener"><i
                                class="fa fa-pinterest-p"></i></a>
                        <a href="https://twitter.com/" target="_blank" rel="noopener"><i class="fa fa-twitter"></i></a>
                        <a href="https://www.facebook.com/" target="_blank" rel="noopener"><i
                                class="fa fa-facebook"></i></a>
                    </div>
                </section>
                <!--== End Hero Area Wrapper ==-->

                <!--== Start Product Category Area Wrapper ==-->
                <section class="section-space pb-0">
                    <div class="container">
                        <div class="row g-3 g-sm-6 d-flex justify-content-center">
                            <div class="col-6 col-lg-4 col-lg-2 col-xl-2">
                                <!--== Start Product Category Item ==-->
                                <a href="hare-care.php" class="product-category-item">
                                    <img class="icon" src="assets/images/shop/category/1.webp" width="70" height="80"
                                        alt="Image-HasTech">
                                    <h3 class="title">Hare care</h3>
                                    <span class="flag-new">new</span>
                                </a>
                                <!--== End Product Category Item ==-->
                            </div>
                            <div class="col-6 col-lg-4 col-lg-2 col-xl-2">
                                <!--== Start Product Category Item ==-->
                                <a href="skin-care.php" class="product-category-item" data-bg-color="#FFEDB4">
                                    <img class="icon" src="assets/images/shop/category/2.webp" width="80" height="80"
                                        alt="Image-HasTech">
                                    <h3 class="title">Skin care</h3>
                                </a>
                                <!--== End Product Category Item ==-->
                            </div>
                            <div class="col-6 col-lg-4 col-lg-2 col-xl-2 mt-lg-0 mt-sm-6 mt-4">
                                <!--== Start Product Category Item ==-->
                                <a href="lip-stick.php" class="product-category-item" data-bg-color="#DFE4FF">
                                    <img class="icon" src="assets/images/shop/category/3.webp" width="80" height="80"
                                        alt="Image-HasTech">
                                    <h3 class="title">Lip stick</h3>
                                </a>
                                <!--== End Product Category Item ==-->
                            </div>
                            <div class="col-6 col-lg-4 col-lg-2 col-xl-2 mt-xl-0 mt-sm-6 mt-4">
                                <!--== Start Product Category Item ==-->
                                <a href="face-care.PHP" class="product-category-item" data-bg-color="#FFEACC">
                                    <img class="icon" src="assets/images/shop/category/4.webp" width="80" height="80"
                                        alt="Image-HasTech">
                                    <h3 class="title">Face skin</h3>
                                    <span data-bg-color="#835BF4" class="flag-new">sale</span>
                                </a>
                                <!--== End Product Category Item ==-->
                            </div>
                            <div class="col-6 col-lg-4 col-lg-2 col-xl-2 mt-xl-0 mt-sm-6 mt-4">
                                <!--== Start Product Category Item ==-->
                                <a href="blusher.php" class="product-category-item" data-bg-color="#FFDAE0">
                                    <img class="icon" src="assets/images/shop/category/5.webp" width="80" height="80"
                                        alt="Image-HasTech">
                                    <h3 class="title">Blusher</h3>
                                </a>
                                <!--== End Product Category Item ==-->
                            </div>

                        </div>
                    </div>
                </section>
                <!--== End Product Category Area Wrapper ==-->

                <!--== Start Product Area Wrapper ==-->
                <section class="section-space">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="section-title text-center">
                                    <h2 class="title">Top sale</h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit ut aliquam, purus sit
                                        amet luctus venenatis</p>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-n4 mb-sm-n10 g-3 g-sm-6">
                            <div class="col-6 col-lg-4 mb-4 mb-sm-9">
                                <!--== Start Product Item ==-->
                                <!-- produit -->
                                <?php  foreach($data as $value){ ?>
                                <div class="product-item">
                                    <div class="product-thumb">
                                        <a class="d-block" href="product-details.php?id=<?php echo $value->getId()?>">
                                            <img src="./img/<?php echo $value->getImage()?>" width="370" height="450"
                                                alt="Image-HasTech">
                                        </a>
                                        <span class="flag-new">new</span>
                                        <div class="product-action">
                                            <button type="button" class="product-action-btn action-btn-quick-view"
                                                value="<?php echo $value->getId() ?>" data-bs-toggle="modal"
                                                data-bs-target="#action-QuickViewModal">
                                                <i class="fa fa-expand"></i>

                                            </button>
                                            <button type="button" class="product-action-btn action-btn-cart"
                                                data-bs-toggle="modal" data-bs-target="#action-CartAddModal"
                                                data-id=<?php echo $value->getId()?>
                                                data-product-image=<?php echo urlencode($value->getImage())?>
                                                data-product-name=<?php echo urlencode($value->getName())?>>
                                                <span>Add to cart</span>
                                            </button>
                                            <button type="button" class="product-action-btn action-btn-wishlist"
                                                data-bs-toggle="modal" data-bs-target="#action-WishlistModal">
                                                <i class="fa fa-heart-o"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="product-info">
                                        <h4 id="test" class="title"><a
                                                href="product-details.php?id=<?php echo $value->getId() ?>"><?php echo $value->getName() ?></a>
                                        </h4>
                                        <div class="prices">
                                            <span class="price"><?php echo $value->getPrice() ?> DH</span>

                                        </div>
                                    </div>
                                    <div class="product-action-bottom">
                                        <button type="button" class="product-action-btn action-btn-quick-view"
                                            data-bs-toggle="modal" data-bs-target="#action-QuickViewModal">
                                            <i class="fa fa-expand"></i>
                                        </button>
                                        <button type="button" class="product-action-btn action-btn-wishlist"
                                            data-bs-toggle="modal" data-bs-target="#action-WishlistModal">
                                            <i class="fa fa-heart-o"></i>
                                        </button>
                                        <button type="button" class="product-action-btn action-btn-cart"
                                            data-bs-toggle="modal" data-bs-target="#action-CartAddModal">
                                            <span>Add to cart</span>
                                        </button>
                                    </div>
                                </div>

                                <!--== End prPduct Item ==-->
                            </div>
                            <div class="col-6 col-lg-4 mb-4 mb-sm-9">
                                <?php } ?>

                                <!--== End prPduct Item ==-->
                            </div>
                        </div>
                    </div>
                </section>

            </main>

            <!--== Start Footer Area Wrapper ==-->
            <footer class="footer-area">
                <!--== Start Footer Main ==-->
                <div class="footer-main">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6 col-lg-4">
                                <div class="widget-item">
                                    <div class="widget-about">
                                        <a class="widget-logo" href="index.php">
                                            <img src="assets/images/logo.webp" width="95" height="68" alt="Logo">
                                        </a>
                                        <p class="desc">Lorem Ipsum is simply dummy text of the printing and typesetting
                                            industry. Lorem Ipsum has been.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-5 mt-md-0 mt-9">
                                <div class="widget-item">
                                    <h4 class="widget-title">Information</h4>
                                    <ul class="widget-nav">

                                        <li><a href="about-us.php">About us</a></li>
                                        <li><a href="contact.php">Contact</a></li>
                                        <li><a href="faq.php">Privacy</a></li>
                                        <li><a href="my-account.php">Login</a></li>
                                        <li><a href="#">Shop</a></li>
                                        <li><a href="my-account.php">My Account</a></li>
                                        <li><a href="faq.php">FAQs</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3 mt-lg-0 mt-6">
                                <div class="widget-item">
                                    <h4 class="widget-title">Social Info</h4>
                                    <div class="widget-social">
                                        <a href="https://twitter.com/" target="_blank" rel="noopener"><i
                                                class="fa fa-twitter"></i></a>
                                        <a href="https://www.facebook.com/" target="_blank" rel="noopener"><i
                                                class="fa fa-facebook"></i></a>
                                        <a href="https://www.pinterest.com/" target="_blank" rel="noopener"><i
                                                class="fa fa-pinterest-p"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--== End Footer Main ==-->

                <!--== Start Footer Bottom ==-->
                <div class="footer-bottom">
                    <div class="container pt-0 pb-0">
                        <div class="footer-bottom-content">
                            <p class="copyright">© 2022 Brancy. Made with <i class="fa fa-heart"></i> by <a
                                    target="_blank" href="https://themeforest.net/user/codecarnival">Codecarnival.</a>
                            </p>
                        </div>
                    </div>
                </div>
                <!--== End Footer Bottom ==-->
            </footer>
            <!--== End Footer Area Wrapper ==-->

            <!--== Scroll Top Button ==-->
            <div id="scroll-to-top" class="scroll-to-top"><span class="fa fa-angle-up"></span></div>

            <!--== Start Product Quick Wishlist Modal ==-->
            <aside class="product-action-modal modal fade" id="action-WishlistModal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="product-action-view-content">
                                <button type="button" class="btn-close" data-bs-dismiss="modal">
                                    <i class="fa fa-times"></i>
                                </button>
                                <div class="modal-action-messages">
                                    <i class="fa fa-check-square-o"></i> Added to wishlist successfully!
                                </div>
                                <div class="modal-action-product">
                                    <div class="thumb">
                                        <img src="assets/images/shop/modal1.webp" alt="Organic Food Juice" width="466"
                                            height="320">
                                    </div>
                                    <h4 class="product-name"><a href="product-details.php">Readable content DX22</a>
                                    </h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </aside>
            <!--== End Product Quick Wishlist Modal ==-->

            <!--== Start Product Quick Add Cart Modal ==-->



            <aside class="product-action-modal modal fade" id="action-CartAddModal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="product-action-view-content">
                                <button type="button" class="btn-close" data-bs-dismiss="modal">
                                    <i class="fa fa-times"></i>
                                </button>
                                <div class="modal-action-messages">
                                    <i class="fa fa-check-square-o"></i> Added to cart successfully!
                                </div>
                                <div class="modal-action-product">
                                    <div class="thumb">
                                        <img id="modal-image" src="" alt="Organic Food Juice" width="466" height="320">
                                    </div>
                                    <h4 class="product-name"><a id="modal-name" href="product-details.php">Readable
                                            content DX22</a></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </aside>
            <!--== SCRIPTS Product Quick Add Cart Modal ==-->
            <script>
                var cartModal = document.getElementById('action-CartAddModal');
                cartModal.addEventListener('show.bs.modal', function (event) {
                    // Button that triggered the modal
                    var button = event.relatedTarget
                    // Extract info from data-bs-* attributes
                    var productName = button.getAttribute('data-product-name')
                    var productImage = button.getAttribute('data-product-image')
                    // If necessary, you could initiate an AJAX request here
                    // and then do the updating in a callback.
                    //
                    // Update the modal's content.
                    var modalTitle = document.getElementById('modal-name')
                    var modalImage = document.getElementById('modal-image')


                    modalTitle.textContent = productName.replace(/\+/g, ' ')
                    modalImage.src = "./img/" + productImage.replace(/\+/g, ' ')
                })
            </script>
            <!--== End Product Quick Add Cart Modal ==-->

            <!--== Start Aside Search Form ==-->
            <aside class="aside-search-box-wrapper offcanvas offcanvas-top" tabindex="-1" id="AsideOffcanvasSearch"
                aria-labelledby="offcanvasTopLabel">
                <div class="offcanvas-header">
                    <h5 class="d-none" id="offcanvasTopLabel">Aside Search</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"><i
                            class="fa fa-close"></i></button>
                </div>
                <div class="offcanvas-body">
                    <div class="container pt--0 pb--0">
                        <div class="search-box-form-wrap">
                            <div class="search-note">
                                <p>Start typing and press Enter to search</p>
                            </div>
                            <form action="#" method="post">
                                <div class="aside-search-form position-relative">
                                    <label for="SearchInput" class="visually-hidden">Search</label>
                                    <input id="SearchInput" type="search" class="form-control"
                                        placeholder="Search entire store…">
                                    <button class="search-button" type="submit"><i class="fa fa-search"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </aside>
            <!--== End Aside Search Form ==-->

            <!--== Start Product Quick View Modal ==-->
            <aside class="product-cart-view-modal modal fade" id="action-QuickViewModal" tabindex="-1"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="product-quick-view-content">
                                <button type="button" class="btn-close" data-bs-dismiss="modal">
                                    <span class="fa fa-close"></span>
                                </button>
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <!--== Start Product Thumbnail Area ==-->
                                            <div class="product-single-thumb">
                                                <img src="./img/<?php echo $value->getImage() ?>" width="544"
                                                    height="560" alt="Image-HasTech">
                                            </div>
                                            <!--== End Product Thumbnail Area ==-->
                                        </div>
                                        <div class="col-lg-6">
                                            <!--== Start Product Info Area ==-->
                                            <div class="product-details-content">
                                                <?php foreach($data as $value)  ?>

                                                <h3 class="product-details-title"><?php echo $value->getName() ?></h3>
                                                <div class="product-details-review mb-5">
                                                    <div class="product-review-icon">
                                                        <i class="fa fa-star-o"></i>
                                                        <i class="fa fa-star-o"></i>
                                                        <i class="fa fa-star-o"></i>
                                                        <i class="fa fa-star-o"></i>
                                                        <i class="fa fa-star-half-o"></i>
                                                    </div>
                                                    <button type="button"
                                                        class="product-review-show"><?php echo $value->getCategory() ?></button>
                                                </div>
                                                <p class="mb-6"><?php echo $value->getDescription() ?></p>
                                                <div class="product-details-pro-qty">
                                                    <div class="pro-qty">
                                                        <input type="text" title="Quantity" value="01">
                                                    </div>
                                                </div>
                                                <div class="product-details-action">
                                                    <h4 class="price"><?php echo $value->getPrice() ?> DH</h4>
                                                    <div class="product-details-cart-wishlist">
                                                        <button type="button" class="btn" data-bs-toggle="modal"
                                                            data-bs-target="#action-CartAddModal">Add to cart</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--== End Product Info Area ==-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </aside>
            <!--== End Product Quick View Modal ==-->

            <!--== Start Aside Cart ==-->
            <aside class="aside-cart-wrapper offcanvas offcanvas-end" tabindex="-1" id="AsideOffcanvasCart"
                aria-labelledby="offcanvasRightLabel">
                <div class="offcanvas-header">
                    <h1 class="d-none" id="offcanvasRightLabel">Shopping Cart</h1>
                    <button class="btn-aside-cart-close" data-bs-dismiss="offcanvas" aria-label="Close">Shopping Cart <i
                            class="fa fa-chevron-right"></i></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="aside-cart-product-list">
                        <?php 

            
                    $cartLineList = $cart->getCartLineList()[0];

                    $cartQuantity = $cartManager->getCartQuantity();
                    $totalPrice = 0;
                    if($cartLineList != null){
                    foreach($cartLineList as $value){
                ?>
                        <?php $totalPrice = ($totalPrice + $value->getProduct()->getPrice()) * $value->getProductCartQuantity()?>
                        <li class="aside-product-list-item">
                            <a href="#/" class="remove">×</a>
                            <a href="product-details.php">
                                <img src="./img/<?php echo $value->getProduct()->getImage()?>" width="68" height="84"
                                    alt="Image">
                                <span class="product-title"><?= $value->getProduct()->getName() ?></span>
                            </a>
                            <span class="product-price"><?=$value->getProductCartQuantity()?> ×
                                <?= $value->getProduct()->getPrice() ?> DH</span>
                        </li>
                        <?php } }?>
                    </ul>
                    <p class="cart-total"><span>Subtotal:</span><span class="amount"><?= $totalPrice?> DH</span></p>
                    <a class="btn-total" href="product-cart.php">View cart</a>
                    <a class="btn-total" href="product-checkout.php">Checkout</a>
                </div>
            </aside>
            <!--== End Aside Cart ==-->

            <!--== Start Aside Menu ==-->
            <aside class="off-canvas-wrapper offcanvas offcanvas-start" tabindex="-1" id="AsideOffcanvasMenu"
                aria-labelledby="offcanvasExampleLabel">
                <div class="offcanvas-header">
                    <h1 class="d-none" id="offcanvasExampleLabel">Aside Menu</h1>
                    <button class="btn-menu-close" data-bs-dismiss="offcanvas" aria-label="Close">menu <i
                            class="fa fa-chevron-left"></i></button>
                </div>
                <div class="offcanvas-body">
                    <div id="offcanvasNav" class="offcanvas-menu-nav">
                        <ul>
                            <li class="offcanvas-nav-parent"><a class="offcanvas-nav-item" href="#">home</a>

                            </li>
                            <li class="offcanvas-nav-parent"><a class="offcanvas-nav-item" href="about-us.php">about</a>
                            </li>
                            <li class="offcanvas-nav-parent"><a class="offcanvas-nav-item" href="#">shop</a>
                                <ul>
                                    <li><a href="#" class="offcanvas-nav-item">Shop Layout</a>
                                        <ul>
                                            <li><a href="#">Shop 3 Column</a></li>
                                            <li><a href="product-four-columns.php">Shop 4 Column</a></li>
                                            <li><a href="product-left-sidebar.php">Shop Left Sidebar</a></li>
                                            <li><a href="product-right-sidebar.php">Shop Right Sidebar</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#" class="offcanvas-nav-item">Single Product</a>
                                        <ul>
                                            <li><a href="product-details-normal.php">Single Product Normal</a></li>
                                            <li><a href="product-details.php">Single Product Variable</a></li>
                                            <li><a href="product-details-group.php">Single Product Group</a></li>
                                            <li><a href="product-details-affiliate.php">Single Product Affiliate</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li><a href="#" class="offcanvas-nav-item">Others Pages</a>
                                        <ul>
                                            <li><a href="product-cart.php">Shopping Cart</a></li>
                                            <li><a href="product-checkout.php">Checkout</a></li>
                                            <li><a href="product-wishlist.php">Wishlist</a></li>
                                            <li><a href="product-compare.php">Compare</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>


                            <li class="offcanvas-nav-parent"><a class="offcanvas-nav-item"
                                    href="contact.php">Contact</a></li>
                        </ul>
                    </div>
                </div>
            </aside>
            <!--== End Aside Menu ==-->

        </div>
        <!--== Wrapper End ==-->

        <!-- JS Vendor, Plugins & Activation Script Files -->

        <!-- Vendors JS -->
        <script src="./assets/js/vendor/modernizr-3.11.7.min.js"></script>
        <script src="./assets/js/vendor/jquery-3.6.0.min.js"></script>
        <script src="./assets/js/vendor/jquery-migrate-3.3.2.min.js"></script>
        <script src="./assets/js/vendor/bootstrap.bundle.min.js"></script>

        <!-- Plugins JS -->
        <script src="./assets/js/plugins/swiper-bundle.min.js"></script>
        <script src="./assets/js/plugins/fancybox.min.js"></script>
        <script src="./assets/js/plugins/jquery.nice-select.min.js"></script>

        <!-- Custom Main JS -->
        <script src="./assets/js/main.js"></script>

    </body>

</php>